@extends('layouts.master')

@section('title', 'Buat Permohonan Surat Baru')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0" id="form-title">Formulir Permohonan Surat Baru</h1>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('permohonan.store') }}">
                @csrf

                {{-- Hidden JSON Data Map for JavaScript (CRUCIAL: Ensure mutasi_type is included in $jenisSurats) --}}
                {{-- <div id="jenis-surat-map" data-map="{{ json_encode($jenisSurats) }}" style="display: none;"></div>
                <div id="data-storage-container" data-old-custom-data="{{ json_encode(old('custom_data', [])) }}"
                    style="display: none;"></div> --}}

                {{-- Hidden JSON Data Map for JavaScript (CRUCIAL: Ensure mutasi_type is included in $jenisSurats) --}}
                <div id="jenis-surat-map" data-map="{{ json_encode($jenisSurats) }}" style="display: none;"></div>
                <div id="data-storage-container" data-old-custom-data="{{ json_encode($oldCustomData ?? []) }}"
                    style="display: none;"></div>

                {{-- NEW: Hidden Input for Pre-selected Jenis Surat (Required if the select is disabled) --}}
                @if ($preselected_jenis_surat_id ?? null)
                    <input type="hidden" name="jenis_surat_id" value="{{ $preselected_jenis_surat_id }}">
                @endif
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
                        class="form-select @error('jenis_surat_id') is-invalid @enderror" required {{-- ADDITIONALLY DISABLE the select if pre-selected, to prevent modal popup --}}
                        {{ $preselected_jenis_surat_id ?? null ? 'disabled' : '' }}
                        data-next-nomor-url="{{ route('permohonan.get_next_nomor', ['jenisSuratId' => 0]) }}">
                        <option value="">-- Pilih Jenis Surat --</option>
                        @foreach ($jenisSurats as $js)
                            <option value="{{ $js->id }}" {{-- Use pre-selected variable from controller --}}
                                {{ ($preselected_jenis_surat_id ?? null) == $js->id ? 'selected' : '' }}>
                                {{ $js->nama }} ({{ $js->mutasi_type }})
                            </option>
                        @endforeach
                    </select>
                    @error('jenis_surat_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

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
                                    {{ $kop->jenis_kop }} - {{ $kop->nama }}
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
                                    <option value="siap_diambil" {{ old('status') == 'siap_diambil' ? 'selected' : '' }}>
                                        Siap Diambil</option>
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

            {{-- modal form if jenis surats has mutasi_type mutasi masuk kk --}}
            <div class="modal fade" id="kkMasukModal" tabindex="-1" aria-labelledby="kkMasukModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header  text-dark">
                            <h5 class="modal-title" id="kkMasukModalLabel"><i
                                    class="fas fa-exclamation-triangle me-2"></i> Pilihan Data Masuk Domisili</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center p-4">
                            <p class="lead">Pilih proses administrasi untuk warga baru:</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('permohonan.masuk_kk.create') }}"
                                        class="btn btn-outline-secondary btn-sm w-full px-3 py-2 shadow-md  ">
                                        <span class="text-small text-dark">Buat KK Baru</span>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('permohonan.masuk_kk.create_existing_kk') }}"
                                        class="btn btn-outline-secondary btn-sm  w-full px-3 py-2 shadow-md">
                                        <span class="text-small text-dark">Masuk KK yang ada</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="batalMasukKK">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
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


        // CAPTURE PHP DEFAULTS AND PRE-SELECTION DATA
        const initialPembuka = '{{ old('paragraf_pembuka', optional($defaultJenisSurat)->paragraf_pembuka) }}'.trim();
        const initialPenutup = '{{ old('paragraf_penutup', optional($defaultJenisSurat)->paragraf_penutup) }}'.trim();

        // CRITICAL: Capture the two new variables from the controller
        const preselectedJenisSuratId = '{{ $preselected_jenis_surat_id ?? null }}';
        const preselectedPemohonId = '{{ $preselected_pemohon_id ?? null }}'; // This is the ID of the new resident

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
            // Memastikan fungsi initializeDataMap() sudah didefinisikan dan dipanggil
            initializeDataMap();

            const jenisSuratSelect = $('#jenis_surat_id');
            const pembukaField = $('#paragraf_pembuka');
            const penutupField = $('#paragraf_penutup');
            const statusSelect = $('#status');
            const pemohonSelectContainer = $('#pemohon-select-container');
            const pemohonTitle = $('#pemohon-title');
            const anggotaSelect = $('#id_anggota_keluargas');
            const kkSelectContainer = $('#data-keluarga-select-container');
            const kkSelect = $('#selected_id');
            const mainForm = $('form');

            // Menggunakan referensi jQuery untuk modal
            let kkMasukModal = $('#kkMasukModal');

            // Flag untuk melacak apakah pre-selection sudah dilakukan
            let initialChangeDone = false;


            // ------------------------------------------------------------------------
            // **LOGIKA PEMROSESAN UTAMA DI DALAM on('change')**
            // Fungsi ini akan dipanggil oleh trigger() maupun oleh event user
            // ------------------------------------------------------------------------
            const handleJenisSuratChange = function(skipModalCheck = false) {
                const selectedId = jenisSuratSelect.val();

                // PENTING: Hapus semua hidden fields mutasi yang mungkin tersisa dari pemilihan sebelumnya
                mainForm.find('input[name^="custom_data[status_kk_record]"]').remove();
                mainForm.find('input[name^="custom_data[tanggal_inaktif]"]').remove();

                const templateData = jenisSuratDataMap[selectedId] || {};
                const mutasiType = templateData.mutasi_type || 'none';
                const newCode = templateData.kode || 'XXXX';
                const newPembuka = templateData.paragraf_pembuka || '';
                const newPenutup = templateData.paragraf_penutup || '';
                const isMutasiMasukKK = mutasiType === 'mutasi_masuk_kk';
                const isKelahiran = mutasiType === 'pencatatan_kelahiran';

                // ---------------------------------------------------------------------------------
                // 1. PENGHALANG MODAL & LOGIKA MUTASI KK MASUK 
                // ---------------------------------------------------------------------------------

                // Jika form tidak disabled (dipilih manual OLEH USER) DAN jenisnya KK Masuk
                if (!jenisSuratSelect.is(':disabled') && isMutasiMasukKK && kkMasukModal.length && !
                    skipModalCheck) {
                    console.log("Memicu Modal PermohonanMasukKK...");
                    kkMasukModal.modal('show');

                    // Atur ulang nilai select agar form utama tidak bisa disubmit
                    jenisSuratSelect.val('');

                    // Sembunyikan semua kontainer yang tidak relevan
                    pemohonSelectContainer.hide();
                    kkSelectContainer.hide();
                    anggotaSelect.removeAttr('required');
                    kkSelect.removeAttr('required');
                    pemohonTitle.show();
                    renderCustomFields(null);
                    return; // Hentikan proses lebih lanjut
                }

                // Jika tidak ada surat terpilih (setelah reset modal atau di awal)
                if (!selectedId) {
                    pemohonSelectContainer.show();
                    kkSelectContainer.hide();
                    pemohonTitle.show();
                    anggotaSelect.attr('required', true);
                    kkSelect.removeAttr('required');
                    renderCustomFields(null);
                    return;
                }

                // ---------------------------------------------------------------------------------
                // 2. LOGIKA UPDATE TAMPILAN (Berjalan saat pre-select atau pilih manual)
                // ---------------------------------------------------------------------------------

                // --- Logika Penentuan Pemohon/KK Tujuan (Kelahiran vs Lainnya) ---
                if (isKelahiran) {
                    pemohonSelectContainer.hide();
                    kkSelectContainer.show();
                    pemohonTitle.show();
                    anggotaSelect.removeAttr('required');
                    kkSelect.attr('required', true);
                } else {
                    // Logic for all other types (termasuk Masuk Domisili yang sudah di-preselect)
                    pemohonSelectContainer.show();
                    kkSelectContainer.hide();
                    pemohonTitle.show();
                    anggotaSelect.attr('required', true);
                    kkSelect.removeAttr('required');
                }

                // --- Update fields yang umum untuk semua surat ---
                $('#jenis_surat_kode').val(newCode).attr('placeholder', newCode);

                // Update paragraf pembuka/penutup
                if (pembukaField.val().trim() === initialPembuka || pembukaField.val().trim() === '' ||
                    jenisSuratSelect.is(':disabled')) {
                    pembukaField.val(newPembuka);
                }
                if (penutupField.val().trim() === initialPenutup || penutupField.val().trim() === '' ||
                    jenisSuratSelect.is(':disabled')) {
                    penutupField.val(newPenutup);
                }
                renderCustomFields(selectedId);
                // render nomor surat
                let url = jenisSuratSelect.data('next-nomor-url');

                // 2. Replace the dummy '0' with the actual selectedId
                // This regex replaces the last segment of the URL if it is '0'
                url = url.replace(/\/0$/, '/' + selectedId);

                if (url && selectedId) {
                    // Optional: Show loading state
                    // $('#nomor_urut_input').val('Loading...');

                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#nomor_urut_input').val(response.next_number);
                            } else {
                                // Fallback to 1 if calculation fails server-side
                                $('#nomor_urut_input').val(1);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error AJAX next number:', error);
                            // Fallback on error, maybe keep the old value or set to 1
                        }
                    });
                }


            };

            // ------------------------------------------------------------------------
            // **FLOW INITIALIZATION**
            // ------------------------------------------------------------------------

            // --- 1. HANDLE PRA-PILIH DARI CONTROLLER ---
            if (preselectedJenisSuratId && preselectedPemohonId) {
                // Set nilai pada select box
                jenisSuratSelect.val(preselectedJenisSuratId);
                anggotaSelect.val(preselectedPemohonId);

                // **Blokir perubahan jenis surat untuk mencegah modal muncul**
                jenisSuratSelect.attr('disabled', 'disabled');

                // Panggil fungsi perubahan TANPA mengecek modal (skipModalCheck = true)
                handleJenisSuratChange(true);
                initialChangeDone = true; // Tandai bahwa perubahan awal sudah dilakukan
            }

            // --- 2. SETUP EVENT LISTENERS ---

            handleStatusChange();
            statusSelect.on('change', handleStatusChange);

            // Pasang handler ke event 'change' SELECT BOX
            jenisSuratSelect.on('change', function() {
                handleJenisSuratChange(false); // Selalu cek modal ketika user mengubah manual
            });

            // --- 3. EVENT LISTENER UNTUK TOMBOL BATAL DI MODAL ---
            $('#batalMasukKK').on('click', function() {
                if (kkMasukModal.length) {
                    kkMasukModal.modal('hide');
                }
                jenisSuratSelect.val('');
                // Panggil change untuk mereset tampilan form ke kondisi default
                handleJenisSuratChange(true);
            });

            // --- 4. FINAL TRIGGER ---
            // Jika tidak ada preselection (initialChangeDone = false), panggil change untuk inisialisasi default
            if (!initialChangeDone) {
                handleJenisSuratChange(true);
            }
        });
    </script>
@endpush
