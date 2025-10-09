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

            {{-- Hidden JSON Data Map for JavaScript (Correct) --}}
            <div id="jenis-surat-map" data-map="{{ json_encode($jenisSurats) }}" style="display: none;"></div>
            <div id="data-storage-container" data-old-custom-data="{{ json_encode(old('custom_data', [])) }}" style="display: none;"></div>

            {{-- Bagian I: Pilih Jenis Surat (Correct) --}}
            <h5 class="mt-3 mb-3 pb-2 border-bottom">Pilih Jenis Surat</h5>
            <div class="mb-4">
                <label for="jenis_surat_id" class="form-label fw-semibold">Jenis Surat</label>
                <select name="jenis_surat_id" id="jenis_surat_id" class="form-select @error('jenis_surat_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Jenis Surat --</option>
                    @foreach ($jenisSurats as $jenis)
                    <option
                        value="{{ $jenis->id }}"
                        {{ old('jenis_surat_id', optional($defaultJenisSurat)->id) == $jenis->id ? 'selected' : '' }} >
                        {{ $jenis->nama }}
                    </option>
                    @endforeach
                </select>
                @error('jenis_surat_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bagian II: Data Pemohon (id_anggota_keluargas FIX) --}}
            <h5 class="mt-3 mb-3 pb-2 border-bottom">Data Pemohon</h5>
            <div class="mb-3">
                <label for="id_anggota_keluargas" class="form-label fw-semibold">Pilih Pemohon</label>
                <select name="id_anggota_keluargas" id="id_anggota_keluargas" class="form-select @error('id_anggota_keluargas') is-invalid @enderror" required>
                    <option value="">-- Pilih Anggota Keluarga/Penduduk --</option>
                    @foreach ($anggotaKeluargas as $anggota)
                    @php $selectedValue = old('id_anggota_keluargas'); @endphp
                    @if (isset($anggota->is_kk) && $anggota->is_kk)
                    <option
                        value="{{ $anggota->id }}"
                        style="font-weight: bold; background-color: #f0f0f0;"
                        {{ $selectedValue == $anggota->id ? 'selected' : '' }}>
                        {{ $anggota->nik }} - {{ $anggota->nama }}
                    </option>
                    @else
                    <option
                        value="{{ $anggota->id }}"
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

            {{-- Bagian III: CUSTOM DYNAMIC FIELDS CONTAINER (Unchanged) --}}
            <h5 class="mt-4 mb-3 pb-2 border-bottom" id="custom-fields-title" style="display: none;">Data Tambahan Surat</h5>
            <div id="custom-fields-container" class="row g-3 mb-4"></div>
            
            {{-- Bagian IV: Isi dan Pengaturan Surat --}}
            <h5 class="mt-4 mb-3 pb-2 border-bottom">Isi dan Pengaturan Surat</h5>

            {{-- Nomor Surat Otomatis (Unchanged) --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nomor Surat Otomatis</label>
                <div class="row g-2 align-items-center">
                    <div class="col-3">
                        <input type="number" name="nomor_urut_input" id="nomor_urut_input" class="form-control @error('nomor_urut_input') is-invalid @enderror" value="{{ old('nomor_urut_input', $nextNomorUrut) }}" required>
                        @error('nomor_urut_input')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" name="jenis_surat_kode" id="jenis_surat_kode" class="form-control" value="{{ $defaultCode }}" placeholder="{{ $defaultCode }}" readonly>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" value="/{{ $romanMonth }}/{{ $currentYear }}" readonly>
                    </div>
                    <input type="hidden" name="nomor_surat_full" id="nomor_surat_full">
                </div>
            </div>
            
            {{-- Tanggal Permohonan (Unchanged) --}}
            <div class="mb-3">
                <label for="tanggal_permohonan" class="form-label fw-semibold">Tanggal Permohonan</label>
                <input type="date" name="tanggal_permohonan" class="form-control" value="{{ old('tanggal_permohonan', now()->format('Y-m-d')) }}" required>
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
                    <select name="id_ttds" id="id_ttds" class="form-select @error('id_ttds') is-invalid @enderror" required>
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
                    <select name="id_kop_templates" id="id_kop_templates" class="form-select @error('id_kop_templates') is-invalid @enderror" required>
                        <option value="">-- Pilih Kop Surat --</option>
                        @foreach ($kopTemplates as $kop)
                        <option value="{{ $kop->id }}" {{ old('id_kop_templates') == $kop->id ? 'selected' : '' }}>
                            {{ $kop->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('id_kop_templates')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
    
    // CAPTURE PHP DEFAULTS (These are the initial values loaded on the page)
    const initialPembuka = '{{ old("paragraf_pembuka", optional($defaultJenisSurat)->paragraf_pembuka) }}'.trim();
    const initialPenutup = '{{ old("paragraf_penutup", optional($defaultJenisSurat)->paragraf_penutup) }}'.trim();


    // --- Utility Functions ---

    function initializeDataMap() {
        const jsonString = $('#jenis-surat-map').data('map');
        if (jsonString) {
            jenisSuratDataMap = jsonString.reduce((map, item) => {
                map[item.id] = item;
                return map;
            }, {});
        }

        const dataContainer = document.getElementById('data-storage-container');
        if (dataContainer) {
            oldCustomData = JSON.parse(dataContainer.dataset.oldCustomData || '{}');
        }
    }
    
    // Function to combine the split number (unchanged)
    function updateFullNomorSurat() {
        const sequence = $('#nomor_urut_input').val() || '000';
        const code = $('#jenis_surat_kode').val();
        const monthYear = '/{{ $romanMonth ?? "XI" }}/{{ $currentYear ?? "2025" }}';
        $('#nomor_surat_full').val(sequence + '/' + code + monthYear);
    }
    
    // Function to render custom fields (omitted for brevity, assume correct)
    function renderCustomFields(jenisSuratId) {
        const container = $('#custom-fields-container');
        const title = $('#custom-fields-title');
        container.empty(); // Clear existing fields

        if (!jenisSuratId || !jenisSuratDataMap[jenisSuratId]) {
            title.hide();
            return;
        }

        const templateData = jenisSuratDataMap[jenisSuratId];
        // The required_variables array holds the definition for fields like 'nama', 'rt', 'usaha'
        const requiredVariables = templateData.required_variables || []; 
        let hasCustomFields = false;

        requiredVariables.forEach(variable => {
            // Only render input fields for CUSTOM variables (type !== 'system')
            if (variable.type !== 'system') {
                hasCustomFields = true;
                const key = variable.key;
                const label = variable.label;
                const type = variable.type || 'text';
                const inputName = `custom_data[${key}]`;

                // Retrieve old value from the global oldCustomData object
                const oldValue = oldCustomData[key] || ''; 
                
                // Note: isInvalid must be handled manually or by server reload.
                // We assume it reloads the page to show errors.
                const isInvalid = false; // Placeholder

                let inputHtml = '';

                // Generate the input field based on the 'type' defined in the template
                if (type === 'textarea') {
                    inputHtml = `
                        <textarea name="${inputName}" id="custom_${key}" class="form-control" rows="3" required>${oldValue}</textarea>
                    `;
                } else {
                    inputHtml = `
                        <input type="${type}" 
                               name="${inputName}" 
                               id="custom_${key}" 
                               class="form-control ${isInvalid ? 'is-invalid' : ''}" 
                               value="${oldValue}" 
                               required>
                        ${isInvalid ? '<div class="invalid-feedback">Field ini wajib diisi.</div>' : ''}
                    `;
                }

                // Append the field to the container
                container.append(`
                    <div class="col-md-6 mb-3">
                        <label for="custom_${key}" class="form-label fw-semibold">${label} <span class="text-danger">*</span></label>
                        ${inputHtml}
                    </div>
                `);
            }
        });

        // Toggle the title visibility
        title.toggle(hasCustomFields);
    }
   function fetchAndSetNomorUrut(jenisSuratId) {
        if (!jenisSuratId) return;

        $.ajax({
            url: '{{ url("layanan/permohonan/get-next-number") }}/' + jenisSuratId,
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    const nextNum = response.next_number;
                    const inputField = $('#nomor_urut_input');
                    
                    // Only set the value if the field is NOT marked as manually overridden.
                    if (!inputField.data('user-entered')) {
                         inputField.val(nextNum);
                    }
                    updateFullNomorSurat();
                }
            },
            error: function() {
                console.error("Failed to fetch next sequential number.");
                if ($('#nomor_urut_input').val() === '') {
                    $('#nomor_urut_input').val('1');
                }
                updateFullNomorSurat();
            }
        });
    }


    // --- Core Synchronization Logic ---
     $(document).ready(function() {
        initializeDataMap();

        const jenisSuratSelect = $('#jenis_surat_id');
        const nomorUrutInput = $('#nomor_urut_input');
        const pembukaField = $('#paragraf_pembuka');
        const penutupField = $('#paragraf_penutup');
        
        // --- User-Entered Flag Logic (Corrected from previous step) ---
        if (nomorUrutInput.val() !== '') {
            nomorUrutInput.data('user-entered', true);
        } else {
            nomorUrutInput.removeData('user-entered');
        }
        nomorUrutInput.on('input', function() {
            nomorUrutInput.data('user-entered', true);
            updateFullNomorSurat();
        });


        // --- Event Listener: Jenis Surat Change ---
         jenisSuratSelect.on('change', function() {
            const selectedId = $(this).val();

            // 1. Retrieve the full data object from the map
            const templateData = jenisSuratDataMap[selectedId] || {};
            const newCode = templateData.kode || 'XXXX';
            const newPembuka = templateData.paragraf_pembuka || ''; // Use the key from the model/JSON
            const newPenutup = templateData.paragraf_penutup || ''; // Use the key from the model/JSON

            // 2. Nomor Surat Code Update
            $('#jenis_surat_kode').val(newCode).attr('placeholder', newCode);
            updateFullNomorSurat();

            // 3. Paragraf Textarea Synchronization (The FIX)
            // Use the original value capture logic but compare against the new template defaults
            if (pembukaField.val().trim() === initialPembuka || pembukaField.val().trim() === '') {
                pembukaField.val(newPembuka);
            }
            if (penutupField.val().trim() === initialPenutup || penutupField.val().trim() === '') {
                penutupField.val(newPenutup);
            }
            
            // 4. Sequential Number Logic (AJAX)
            if (selectedId) {
                if (nomorUrutInput.val() === '1' || nomorUrutInput.val() === '') {
                    nomorUrutInput.removeData('user-entered');
                }
                fetchAndSetNomorUrut(selectedId); 
            } else {
                nomorUrutInput.val('').removeData('user-entered');
            }
            
            // 5. Render Custom Fields
            renderCustomFields(selectedId);
        });

        // Trigger change on load
        jenisSuratSelect.trigger('change');
    });
</script>
@endpush