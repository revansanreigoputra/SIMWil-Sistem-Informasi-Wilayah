@extends('layouts.master')

@section('title', 'Buat Permohonan Surat Baru')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0" id="form-title">Formulir Permohonan Surat Baru</h1>
        </div>

        <div class="card-body">
 
            <form method="POST" action="{{ route('layanan.permohonan.store') }}">
                @csrf

                {{-- Hidden JSON Data Map for JavaScript (CRUCIAL: Ensure mutasi_type is included in $jenisSurats) --}}
                <div id="jenis-surat-map" data-map="{{ json_encode($jenisSurats) }}" style="display: none;"></div>
                <div id="data-storage-container" data-old-custom-data="{{ json_encode(old('custom_data', [])) }}"
                    style="display: none;"></div>

                {{-- container form kelahiran --}}
                {{-- ... di bawah div#data-storage-container ... --}}

                <div id="master-data-container" data-agama-list="{{ json_encode($agamaList) }}"
                    data-hubungan-list="{{ json_encode($hubunganKeluargaList) }}"
                    data-goldar-list="{{ json_encode($golonganDarahList) }}"
                    data-kewarganegaraan-list="{{ json_encode($kewarganegaraanList) }}"
                    data-pendidikan-list="{{ json_encode($pendidikanList) }}"
                    data-pekerjaan-list="{{ json_encode($mataPencaharianList) }}" style="display: none;">
                </div>

                {{-- Bagian I: Pilih Jenis Surat (Correct) --}}
                <h5 class="mt-3 mb-3 pb-2 border-bottom">Pilih Jenis Surat</h5>
                <div class="mb-4">
                    <label for="jenis_surat_id" class="form-label fw-semibold">Jenis Surat</label>
                    <select name="jenis_surat_id" id="jenis_surat_id"
                        class="form-select @error('jenis_surat_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Jenis Surat --</option>
                        @foreach ($jenisSurats as $js)
                            <option value="{{ $js->id }}">{{ $js->nama }} ({{ $js->mutasi_type }})</option>
                        @endforeach

                    </select>
                    @error('jenis_surat_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div id="jenis-surat-map" data-map='@json($jenisSurats)' style="display: none;"></div>

                {{-- Bagian II: Data Pemohon (DIBUAT DINAMIS) --}}
                <h5 class="mt-3 mb-3 pb-2 border-bottom" id="pemohon-title">Data Pemohon</h5>
                <div class="mb-3" id="pemohon-select-container">
                    <label for="id_anggota_keluargas" class="form-label fw-semibold">Pilih Pemohon</label>
                    <select name="id_anggota_keluargas" id="id_anggota_keluargas"
                        class="form-select @error('id_anggota_keluargas') is-invalid @enderror" required>
                        <option value="">-- Pilih Anggota Keluarga/Penduduk --</option>
                        @foreach ($anggotaKeluargas as $anggota)
                            @php $selectedValue = old('id_anggota_keluargas'); @endphp
                            @if (isset($anggota->is_kk) && $anggota->is_kk)
                                <option value="{{ $anggota->id }}" style="font-weight: bold; background-color: #f0f0f0;"
                                    {{ $selectedValue == $anggota->id ? 'selected' : '' }}>
                                    {{ $anggota->nik }} - {{ $anggota->nama }}
                                </option>
                            @else
                                <option value="{{ $anggota->id }}"
                                    {{ $selectedValue == $anggota->id ? 'selected' : '' }}>
                                    {{ $anggota->nik }} - {{ $anggota->nama }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('id_anggota_keluargas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- BARU: Input Pilihan KK (Hanya untuk Kelahiran) --}}
                <div class="mb-3" id="data-keluarga-select-container" style="display: none;">
                    <label for="id_data_keluargas" class="form-label fw-semibold">Pilih Kepala Keluarga (Tempat Anggota Baru
                        dimasukkan)</label>
                    <select name="selected_id" id="selected_id" class="form-control">
                        <option value="">-- Pilih Kepala Keluarga atau Anggota --</option>
                        @foreach ($dataKeluargas as $kk)
                            <option value="kk_{{ $kk->id }}">{{ $kk->no_kk }} - {{ $kk->kepala_keluarga }}
                            </option>
                        @endforeach
                        @foreach ($anggotaKeluargas as $anggota)
                            <option value="{{ $anggota->id }}">{{ $anggota->nama }} (Anggota)</option>
                        @endforeach
                    </select>
                </div>

                {{-- Bagian III: CUSTOM DYNAMIC FIELDS CONTAINER (Unchanged) --}}
                <h5 class="mt-4 mb-3 pb-2 border-bottom" id="custom-fields-title" style="display: none;">Data Tambahan Surat
                </h5>
                <div id="custom-fields-container" class="row g-3 mb-4"></div>

                {{-- Bagian IV: Isi dan Pengaturan Surat --}}
                <h5 class="mt-4 mb-3 pb-2 border-bottom">Isi dan Pengaturan Surat</h5>

                {{-- Nomor Surat Otomatis (Unchanged) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor Surat Otomatis</label>
                    <div class="row g-2 align-items-center">
                        <div class="col-3">
                            <input type="number" name="nomor_urut_input" id="nomor_urut_input"
                                class="form-control @error('nomor_urut_input') is-invalid @enderror"
                                value="{{ old('nomor_urut_input', $nextNomorUrut) }}" required>

                            {{-- This displays the error message from the Controller --}}
                            @error('nomor_urut_input')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <input type="text" name="jenis_surat_kode" id="jenis_surat_kode" class="form-control"
                                value="{{ $defaultCode }}" placeholder="{{ $defaultCode }}" readonly>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" value="/{{ $romanMonth }}/{{ $currentYear }}"
                                readonly>
                        </div>

                    </div>
                </div>

                {{-- Tanggal Permohonan (Unchanged) --}}
                <div class="mb-3">
                    <label for="tanggal_permohonan" class="form-label fw-semibold">Tanggal Permohonan</label>
                    <input type="date" name="tanggal_permohonan" class="form-control"
                        value="{{ old('tanggal_permohonan', now()->format('Y-m-d')) }}" required>
                </div>

                {{-- Paragraf Pembuka/Penutup (Unchanged) --}}
                <div class="mb-3">
                    <label class="form-label">Teks Pembuka Surat</label>
                    <textarea rows="3" class="form-control" name="paragraf_pembuka" id="paragraf_pembuka" required>{{ old('paragraf_pembuka', optional($defaultJenisSurat)->paragraf_pembuka) }}</textarea>
                    @error('paragraf_pembuka')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Teks Penutup Surat</label>
                    <textarea rows="5" class="form-control" name="paragraf_penutup" id="paragraf_penutup" required>{{ old('paragraf_penutup', optional($defaultJenisSurat)->paragraf_penutup) }}</textarea>
                    @error('paragraf_penutup')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Bagian V: Penanda Tangan (TTDS FIX) & Kop Surat (KOP TEMPLATES FIX) --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="id_ttds" class="form-label fw-semibold">Penanda Tangan</label>
                        <select name="id_ttds" id="id_ttds" class="form-select @error('id_ttds') is-invalid @enderror"
                            required>
                            <option value="">-- Pilih Pejabat Penanda Tangan --</option>
                            @foreach ($ttds as $ttd)
                                <option value="{{ $ttd->id }}" {{ old('id_ttds') == $ttd->id ? 'selected' : '' }}>
                                    {{ $ttd->nama }} ({{ $ttd->jabatan }})
                                </option>
                            @endforeach
                        </select>
                        @error('id_ttds')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="id_kop_templates" class="form-label fw-semibold">Kop Surat</label>
                        <select name="id_kop_templates" id="id_kop_templates"
                            class="form-select @error('id_kop_templates') is-invalid @enderror" required>
                            <option value="">-- Pilih Kop Surat --</option>
                            @foreach ($kopTemplates as $kop)
                                <option value="{{ $kop->id }}"
                                    {{ old('id_kop_templates') == $kop->id ? 'selected' : '' }}>
                                    {{ $kop->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kop_templates')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card bg-card-inside-body my-4 pb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="form-label">Status Verifikasi</label>
                                <select name="status" id="status"
                                    class="form-select bg-primary text-white  @error('status') is-invalid @enderror"
                                    required>
                                    <option value="belum_diverifikasi"
                                        {{ old('status') == 'belum_diverifikasi' ? 'selected' : '' }}>Belum Diverifikasi
                                    </option>
                                    <option value="diverifikasi" {{ old('status') == 'diverifikasi' ? 'selected' : '' }}>
                                        Diverifikasi</option>
                                    <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak
                                    </option>
                                    <option value="sudah_diambil"
                                        {{ old('status') == 'sudah_diambil' ? 'selected' : '' }}>Sudah Diambil</option>
                                </select>

                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12" id="catatan-penolakan-container">
                                <label for="catatan_penolakan" class="form-label">Catatan Penolakan</label>
                                <textarea rows="3" class="form-control" name="catatan_penolakan" id="catatan_penolakan">{{ old('catatan_penolakan') }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4 w-100">
                    <i class="fas fa-paper-plane me-2"></i> Ajukan & Buat Permohonan Surat
                </button>
            </form>
        </div>
    </div>
@endsection
@push('addon-script')
    <script>
        // --- Global Data Setup ---
        let jenisSuratDataMap = {};
        let oldCustomData = {};

        let masterData = {
            agama: [],
            hubungan: [],
            goldar: [],
            kewarganegaraan: [],
            pendidikan: [],
            pekerjaan: []
        };

        // CAPTURE PHP DEFAULTS
        const initialPembuka = '{{ old('paragraf_pembuka', optional($defaultJenisSurat)->paragraf_pembuka) }}'.trim();
        const initialPenutup = '{{ old('paragraf_penutup', optional($defaultJenisSurat)->paragraf_penutup) }}'.trim();

        // --- Utility Functions ---
        function initializeDataMap() {
            const jsonString = $('#jenis-surat-map').data('map');
            if (jsonString) {
                let dataArray = Array.isArray(jsonString) ? jsonString : JSON.parse(jsonString || '[]');
                jenisSuratDataMap = dataArray.reduce((map, item) => {
                    map[item.id] = item;
                    return map;
                }, {});
            }

            const dataContainer = document.getElementById('data-storage-container');
            if (dataContainer) {
                oldCustomData = JSON.parse(dataContainer.dataset.oldCustomData || '{}');
            }

            // Load all master data
            const masterContainer = $('#master-data-container');
            if (masterContainer.length) {
                masterData.agama = masterContainer.data('agama-list') || [];
                masterData.hubungan = masterContainer.data('hubungan-list') || [];
                masterData.goldar = masterContainer.data('goldar-list') || [];
                masterData.kewarganegaraan = masterContainer.data('kewarganegaraan-list') || [];
                masterData.pendidikan = masterContainer.data('pendidikan-list') || [];
                masterData.pekerjaan = masterContainer.data('pekerjaan-list') || [];
            }
        }

        function renderCustomFields(jenisSuratId) {
            const container = $('#custom-fields-container');
            const title = $('#custom-fields-title');
            container.empty();

            if (!jenisSuratId || !jenisSuratDataMap[jenisSuratId]) {
                title.hide();
                return;
            }

            const templateData = jenisSuratDataMap[jenisSuratId];
            const requiredVariables = templateData.required_variables || [];
            let hasCustomFields = false;

            requiredVariables.forEach(variable => {
                if (variable.type === 'system') return;

                hasCustomFields = true;
                const key = variable.key;
                const label = variable.label;
                const type = variable.type || 'text';
                const inputName = `custom_data[${key}]`;
                const oldValue = oldCustomData[key] || '';
                const isRequired = variable.required !== false;
                const inputClass = variable.class || 'form-control';
                let inputHtml = '';
                let labelHtml =
                    `<label for="custom_${key}" class="form-label fw-semibold">${label} ${isRequired ? '<span class="text-danger">*</span>' : ''}</label>`;
                let requiredAttr = isRequired ? 'required' : '';

                // Determine master data source
                let listData = [];
                let displayKey = 'nama';

                switch (variable.model) {
                    case 'Agama':
                        listData = masterData.agama;
                        displayKey = 'agama'; // fixed to match correct column name
                        break;
                    case 'HubunganKeluarga':
                        listData = masterData.hubungan;
                        displayKey = 'nama';
                        break;
                    case 'GolonganDarah':
                        listData = masterData.goldar;
                        displayKey = 'golongan_darah';
                        break;
                    case 'Kewarganegaraan':
                        listData = masterData.kewarganegaraan;
                        displayKey = 'kewarganegaraan';
                        break;
                    case 'Pendidikan':
                        listData = masterData.pendidikan;
                        displayKey = 'pendidikan';
                        break;
                    case 'MataPencaharian':
                        listData = masterData.pekerjaan;
                        displayKey = 'mata_pencaharian';
                        break;
                }

                // --- Render Input ---
                if (type === 'textarea') {
                    inputHtml =
                        `<textarea name="${inputName}" id="custom_${key}" class="${inputClass}" rows="3" ${requiredAttr}>${oldValue}</textarea>`;
                } else if (variable.model) {
                    // Select (from DB)
                    let options = '<option value="">-- Pilih --</option>';
                    listData.forEach(item => {
                        const selected = item.id == oldValue ? 'selected' : '';
                        const displayText = item[displayKey] || item.nama;
                        options += `<option value="${item.id}" ${selected}>${displayText}</option>`;
                    });
                    inputHtml =
                        `<select name="${inputName}" id="custom_${key}" class="form-select" ${requiredAttr}>${options}</select>`;
                } else if (type === 'select' && variable.options) {
                    // Static select
                    let options = '<option value="">-- Pilih --</option>';
                    variable.options.forEach(option => {
                        const selected = option == oldValue ? 'selected' : '';
                        options += `<option value="${option}" ${selected}>${option}</option>`;
                    });
                    inputHtml =
                        `<select name="${inputName}" id="custom_${key}" class="form-select" ${requiredAttr}>${options}</select>`;
                } else {
                    // Text, date, number, etc.
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

            title.toggle(hasCustomFields);
        }

        function handleStatusChange() {
            const statusSelect = $('#status');
            const container = $('#catatan-penolakan-container');
            const textarea = $('#catatan_penolakan');
            const warning = $('#catatan-required-warning');

            if (statusSelect.val() === 'ditolak') {
                container.slideDown(200);
                warning.show();
                textarea.attr('required', true);
            } else {
                container.slideUp(200);
                warning.hide();
                textarea.removeAttr('required');
            }
        }

        // --- Core Logic ---
        $(document).ready(function() {
            initializeDataMap();

            const jenisSuratSelect = $('#jenis_surat_id');
            const pembukaField = $('#paragraf_pembuka');
            const penutupField = $('#paragraf_penutup');
            const statusSelect = $('#status');
            const pemohonSelectContainer = $('#pemohon-select-container');
            const pemohonTitle = $('#pemohon-title');
            const anggotaSelect = $('#id_anggota_keluargas');
            const kkSelectContainer = $('#data-keluarga-select-container');
            const kkSelect = $('#id_data_keluargas');
            const mainForm = $('form');

            handleStatusChange();
            statusSelect.on('change', handleStatusChange);

            jenisSuratSelect.on('change', function() {
                const selectedId = $(this).val();

                // Reset hidden fields
                mainForm.find('input[name="custom_data[status_kk_record]"]').remove();
                mainForm.find('input[name="custom_data[tanggal_inaktif]"]').remove();

                if (!selectedId) {
                    pemohonSelectContainer.show();
                    kkSelectContainer.hide();
                    pemohonTitle.show();
                    anggotaSelect.attr('required', true);
                    kkSelect.removeAttr('required');
                    renderCustomFields(null);
                    return;
                }

                const templateData = jenisSuratDataMap[selectedId] || {};
                const mutasiType = templateData.mutasi_type || 'none';
                const newCode = templateData.kode || 'XXXX';
                const newPembuka = templateData.paragraf_pembuka || '';
                const newPenutup = templateData.paragraf_penutup || '';
                const isMutasiMasukKK = mutasiType === 'mutasi_masuk_kk';
                const isKelahiran = mutasiType === 'pencatatan_kelahiran';

                if (isMutasiMasukKK) {
                    pemohonSelectContainer.hide();
                    kkSelectContainer.hide();
                    anggotaSelect.removeAttr('required');
                    kkSelect.removeAttr('required');
                    pemohonTitle.show();

                    $('<input>').attr({
                        type: 'hidden',
                        name: 'custom_data[status_kk_record]',
                        value: 'active'
                    }).appendTo(mainForm);

                    $('<input>').attr({
                        type: 'hidden',
                        name: 'custom_data[tanggal_inaktif]',
                        value: null
                    }).appendTo(mainForm);
                } else if (isKelahiran) {
                    pemohonSelectContainer.hide();
                    kkSelectContainer.show();
                    pemohonTitle.show();
                    anggotaSelect.removeAttr('required');
                    kkSelect.attr('required', true);
                } else {
                    pemohonSelectContainer.show();
                    kkSelectContainer.hide();
                    pemohonTitle.show();
                    anggotaSelect.attr('required', true);
                    kkSelect.removeAttr('required');
                }

                $('#jenis_surat_kode').val(newCode).attr('placeholder', newCode);

                if (pembukaField.val().trim() === initialPembuka || pembukaField.val().trim() === '') {
                    pembukaField.val(newPembuka);
                }
                if (penutupField.val().trim() === initialPenutup || penutupField.val().trim() === '') {
                    penutupField.val(newPenutup);
                }

                renderCustomFields(selectedId);
            });

            jenisSuratSelect.trigger('change');
        });
    </script>
@endpush
