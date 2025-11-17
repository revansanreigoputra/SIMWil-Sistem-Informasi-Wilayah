@extends('layouts.public')

@section('title', 'Formulir Pengajuan Surat: ' . $jenisSurat->nama)

@section('content')
    <div class="container py-5 mt-10">
        <div class="row   justify-content-center">
            <div class="card shadow-sm">
                <div class="card-header text-white  ">
                    <h1 class="h4 mb-0 text-center title-text-primary  fw-bold">
                        Pengajuan Surat: {{ $jenisSurat->nama }}
                    </h1>
                    <p class="mb-0 text-center small">Data NIK Anda telah terverifikasi.</p>
                </div>

                <div class="card-body">
                    {{-- debug --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- END debug --}}

                    <form method="POST" action="{{ route('public.permohonanSurat.store') }}">
                        @csrf

                        <input type="hidden" name="id_format_nomor_surats" value="{{ $jenisSurat->id }}">
                        <input type="hidden" name="id_anggota_keluargas" value="{{ $anggotaKeluarga->id }}">
                        <input type="hidden" name="id_kop_templates" value="{{ $jenisSurat->kop_template_id }}">

                        <div id="jenis-surat-map" data-map="{{ json_encode([$jenisSurat]) }}" style="display: none;">
                        </div>
                        <div id="data-storage-container" data-old-custom-data="{{ json_encode(old('custom_data', [])) }}"
                            style="display: none;">
                        </div>

                        <h5 class="mt-3 mb-3 pb-2 border-bottom">
                            Data Pemohon (Terverifikasi)
                        </h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jenis Surat</label>
                                <input type="text" class="form-control bg-light" value="{{ $jenisSurat->nama }}"
                                    readonly>

                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">NIK</label>
                                <input type="text" class="form-control" value="{{ $anggotaKeluarga->nik }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ $anggotaKeluarga->nama }}" readonly>
                            </div> 
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Alamat Email (untuk Notifikasi) <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $anggotaKeluarga->email ?? old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        {{-- END: Data Pemohon --}}


                        {{-- Bagian III: CUSTOM DYNAMIC FIELDS CONTAINER --}}
                        <h5 class="mt-4 mb-3 pb-2 border-bottom" id="custom-fields-title">
                            Data Keperluan Surat
                        </h5>

                        <div id="custom-fields-container" class="row g-3 mb-4">
                            <p class="text-center text-muted">Memuat field tambahan...</p>
                        </div>
                        {{-- END: CUSTOM DYNAMIC FIELDS CONTAINER --}}


                        {{-- Bagian IV: Isi dan Pengaturan Surat (Teks Pembuka/Penutup) --}}
                        <h5 class="mt-4 mb-3 pb-2 border-bottom">Isi Surat</h5>

                        <div class="mb-3">
                            <label class="form-label">Teks Pembuka Surat</label>
                            <textarea rows="3" class="form-control @error('paragraf_pembuka') is-invalid @enderror" name="paragraf_pembuka"
                                id="paragraf_pembuka" required>{{ old('paragraf_pembuka', $jenisSurat->paragraf_pembuka) }}</textarea>

                            @error('paragraf_pembuka')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teks Penutup Surat</label>
                            <textarea rows="5" class="form-control @error('paragraf_penutup') is-invalid @enderror" name="paragraf_penutup"
                                id="paragraf_penutup" required>{{ old('paragraf_penutup', $jenisSurat->paragraf_penutup) }}</textarea>

                            @error('paragraf_penutup')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 🛑 BAGIAN INI DIHAPUS/DISEMBUNYIKAN KARENA HANYA UNTUK ADMIN --}}
                        {{-- Nomor Surat Otomatis, Penanda Tangan, Kop Surat (sudah di hidden input), Status Verifikasi --}}
                        <div style="display: none;">
                            {{-- ⚠️ STATUS HARUS DIKIRIM SEBAGAI HIDDEN INPUT DENGAN NILAI DEFAULT --}}
                            <input type="hidden" name="status" value="belum_diverifikasi">
                            {{-- ID Tanda Tangan harus diset otomatis/dihilangkan/disimpan sebagai default di controller --}}
                            <input type="hidden" name="id_ttds" value="1">
                            {{-- Nomot Urut dan Tahun akan diisi oleh Admin --}}
                            <input type="hidden" name="tanggal_permohonan" value="{{ now()->format('Y-m-d') }}">
                        </div>

                        <div class="mt-5 ">
                            <p style="color: red; font-size: 0.875rem;"> (* Status awal: Belum Diverifikasi) </p>
                            <button type="submit" class="btn btn-outline-primary mt-4 w-100">
                                <span> <i class="bi bi-send me-2"></i> Kirim Permohonan Surat
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
@push('script')
    <script>
        let jenisSuratDataMap = {};
        let oldCustomData = {};
        const preselectedJenisSuratId = '{{ $jenisSurat->id }}';

        function initializePublicDataMap() {
            const jsonString = $('#jenis-surat-map').data('map');


            if (jsonString) {
                try {
                    let dataArray = Array.isArray(jsonString) ? jsonString : JSON.parse(jsonString || '[]');
                    jenisSuratDataMap = dataArray.reduce((map, item) => {
                        map[item.id] = item;
                        return map;
                    }, {});

                } catch (e) {

                }
            }

            const dataContainer = document.getElementById('data-storage-container');
            if (dataContainer) {
                oldCustomData = JSON.parse(dataContainer.dataset.oldCustomData || '{}');
            }
        }

        function renderCustomFields(jenisSuratId) {
            const container = $('#custom-fields-container');
            container.empty();

            if (!jenisSuratId || !jenisSuratDataMap[jenisSuratId]) {
                console.log("DEBUG 3: Jenis Surat ID or Map is missing.");
                return;
            }

            const templateData = jenisSuratDataMap[jenisSuratId];

            // 🛑 CRITICAL DEBUG: Check the required_variables before decoding
            let requiredVariables = templateData.required_variables;


            if (typeof requiredVariables === 'string') {
                try {
                    requiredVariables = JSON.parse(requiredVariables || '[]');
                } catch (e) {
                    console.error("DEBUG ERROR: Failed to JSON.parse required_variables string:", requiredVariables, e);
                    requiredVariables = []; // Fail gracefully
                }
            }
            if (!Array.isArray(requiredVariables)) {
                console.error("DEBUG ERROR: requiredVariables is not an array:", requiredVariables);
                requiredVariables = [];
            }


            let hasCustomFields = false;

            requiredVariables.forEach((variable, index) => {
                const type = variable.type || 'text';



                // 🛑 THE FILTER LINE
                if (variable.type === 'system' || variable.model || variable.type === 'composite') {

                    return;
                }

                // --- If the code reaches here, it should render an input ---

                hasCustomFields = true;
                const key = variable.key;
                const label = variable.label;
                const inputName = `custom_data[${key}]`;
                const oldValue = oldCustomData[key] || '';
                const isRequired = variable.required !== false;
                const inputClass = variable.class || 'form-control';
                let inputHtml = '';
                let labelHtml =
                    `<label for="custom_${key}" class="form-label fw-semibold">${label} ${isRequired ? '<span class="text-danger">*</span>' : ''}</label>`;
                let requiredAttr = isRequired ? 'required' : '';

                if (type === 'textarea') {
                    inputHtml =
                        `<textarea name="${inputName}" id="custom_${key}" class="${inputClass}" rows="3" ${requiredAttr}>${oldValue}</textarea>`;
                } else if (type === 'select' && variable.options) {
                    let options = '<option value="">-- Pilih --</option>';
                    variable.options.forEach(option => {
                        const selected = option == oldValue ? 'selected' : '';
                        options += `<option value="${option}" ${selected}>${option}</option>`;
                    });
                    inputHtml =
                        `<select name="${inputName}" id="custom_${key}" class="form-select" ${requiredAttr}>${options}</select>`;
                } else {
                    inputHtml =
                        `<input type="${type}" name="${inputName}" id="custom_${key}" class="${inputClass}" value="${oldValue}" ${requiredAttr}>`;
                }

                container.append(`
                    <div class="col-md-6 mb-3">
                        ${labelHtml}
                        ${inputHtml}
                    </div>
                `);
            });

            if (!hasCustomFields) {

                container.html(
                    '<div class="col-12"><p class=" text-center text-warning fw-semibold">Jenis surat ini tidak memerlukan data tambahan, Anda dapat langsung mengirim permohonan.</p></div>'
                );
            }
        }


        $(document).ready(function() {
            initializePublicDataMap();
            renderCustomFields(preselectedJenisSuratId);
        });
    </script>
@endpush
