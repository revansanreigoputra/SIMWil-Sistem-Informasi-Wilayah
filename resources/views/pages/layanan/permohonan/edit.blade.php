@extends('layouts.master')

@section('title', 'Edit Permohonan Surat')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h1 class="h4 mb-0" id="form-title">Formulir Edit Permohonan Surat</h1>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('layanan.permohonan.update', $permohonan->id) }}">
            @csrf
            @method('PUT')

            {{-- Hidden JSON Data Map for JavaScript --}}
            <div id="jenis-surat-map" data-map="{{ json_encode($jenisSurats) }}" style="display: none;"></div>
            {{-- Data Permohonan yang sudah tersimpan untuk di-load di custom fields --}}
            <div id="data-storage-container"
                data-old-custom-data="{{ json_encode(old('custom_data', $permohonan->custom_variables ?? [])) }}"
                style="display: none;">
            </div>

            {{-- Bagian I: Jenis Surat (NOW SELECTABLE) --}}
            <h5 class="mt-3 mb-3 pb-2 border-bottom">Jenis Surat</h5>
            <div class="mb-4">
                <label for="jenis_surat_id" class="form-label fw-semibold">Jenis Surat</label>
                <select name="jenis_surat_id" id="jenis_surat_id" class="form-select @error('jenis_surat_id') is-invalid @enderror" required>
                    <option value="{{ $jenisSurats->first()->id ?? '' }}">-- Pilih Jenis Surat --</option>
                    @foreach ($jenisSurats as $jenis)
                    <option
                        value="{{ $jenis->id }}"
                         {{ (old('jenis_surat_id', $permohonan->jenis_surat_id) == $jenis->id) ? 'selected' : '' }}>
                        {{ $jenis->nama }}
                    </option>
                    @endforeach
                </select>
                @error('jenis_surat_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bagian II: Data Pemohon (id_anggota_keluargas) --}}
            <h5 class="mt-3 mb-3 pb-2 border-bottom">Data Pemohon</h5>
            <div class="mb-3">
                <label for="id_anggota_keluargas" class="form-label fw-semibold">Pilih Pemohon</label>
                <select name="id_anggota_keluargas" id="id_anggota_keluargas" class="form-select @error('id_anggota_keluargas') is-invalid @enderror" required>
                    <option value="">-- Pilih Anggota Keluarga/Penduduk --</option>
                    @foreach ($anggotaKeluargas as $anggota)
                    @php
                    $permohonanSelectedId = $permohonan->id_data_keluargas
                    ? 'kk_' . $permohonan->id_data_keluargas
                    : $permohonan->id_anggota_keluargas;

                    $selectedValue = old('id_anggota_keluargas', $permohonanSelectedId);

                    $currentOptionValue = (isset($anggota->is_kk) && $anggota->is_kk)
                    ? 'kk_' . $anggota->id
                    : $anggota->id;
                    @endphp
                    @if (isset($anggota->is_kk) && $anggota->is_kk)
                    <option
                        value="{{ $currentOptionValue }}"
                        style="font-weight: bold; background-color: #f0f0f0;"
                        {{ $selectedValue == $currentOptionValue ? 'selected' : '' }}>
                        {{ $anggota->nik }} - {{ $anggota->nama }} (Kepala Keluarga)
                    </option>
                    @else
                    <option
                        value="{{ $currentOptionValue }}"
                        {{ $selectedValue == $currentOptionValue ? 'selected' : '' }}>
                        {{ $anggota->nik }} - {{ $anggota->nama }}
                    </option>
                    @endif
                    @endforeach
                </select>
                @error('id_anggota_keluargas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bagian III: CUSTOM DYNAMIC FIELDS CONTAINER --}}
            <h5 class="mt-4 mb-3 pb-2 border-bottom" id="custom-fields-title" style="display: none;">Data Tambahan Surat</h5>
            <div id="custom-fields-container" class="row g-3 mb-4"></div>

            {{-- Bagian IV: Isi dan Pengaturan Surat --}}
            <h5 class="mt-4 mb-3 pb-2 border-bottom">Isi dan Pengaturan Surat</h5>

            {{-- Nomor Surat (Fixed on Edit) --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Nomor Surat</label>
                <div class="row g-2 align-items-center">
                    <div class="col-12">
                        <input type="text" class="form-control" value="{{ $permohonan->nomor_surat }}" readonly>
                    </div>
                    <input type="hidden" name="nomor_surat_full" id="nomor_surat_full" value="{{ $permohonan->nomor_surat }}">
                </div>
            </div>

            {{-- Tanggal Permohonan --}}
            <div class="mb-3">
                <label for="tanggal_permohonan" class="form-label fw-semibold">Tanggal Permohonan</label>
                <input type="date" name="tanggal_permohonan" class="form-control" value="{{ old('tanggal_permohonan', $permohonan->tanggal_permohonan) }}" required>
            </div>

            {{-- Paragraf Pembuka (Editable) --}}
            <div class="mb-3">
                <div class="alert alert-warning alert-sm py-2 px-3 mb-2" role="alert">
                    ⚠️ **Perhatian:** Perubahan pada teks ini hanya berlaku untuk surat nomor  {{ $permohonan->nomor_surat }}  dan TIDAK  akan mengubah template surat yang asli.
                </div>

                <label class="form-label">Teks Pembuka Surat</label>
                <textarea  class="form-control @error('paragraf_pembuka') is-invalid @enderror"
                name="paragraf_pembuka" id="paragraf_pembuka">{{ old('paragraf_pembuka', $permohonan->paragraf_pembuka ?? optional($permohonan->jenisSurat)->paragraf_pembuka) }}</textarea>
                @error('paragraf_pembuka')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Paragraf Penutup (Editable) --}}
            <div class="mb-3"> 
                <label for="paragraf_penutup" class="form-label">Teks Penutup Surat</label>
                <textarea rows="5"
                    class="form-control"
                    name="paragraf_penutup"
                    id="paragraf_penutup"
                    required>{{ old('paragraf_penutup', $permohonan->paragraf_penutup ?? optional($permohonan->jenisSurat)->paragraf_penutup) }}</textarea>
 
            </div>

            {{-- Bagian V: Penanda Tangan & Kop Surat --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_ttds" class="form-label fw-semibold">Penanda Tangan</label>
                    <select name="id_ttds" id="id_ttds" class="form-select @error('id_ttds') is-invalid @enderror" required>
                        <option value="">-- Pilih Pejabat Penanda Tangan --</option>
                        @foreach ($ttds as $ttd)
                        <option
                            value="{{ $ttd->id }}"
                            {{ old('id_ttds', $permohonan->id_ttds) == $ttd->id ? 'selected' : '' }}>
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
                        <option
                            value="{{ $kop->id }}"
                            {{ old('id_kop_templates', $permohonan->id_kop_templates) == $kop->id ? 'selected' : '' }}>
                            {{ $kop->nama }}
                        </option>
                        @endforeach
                    </select>
                    @error('id_kop_templates')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('layanan.permohonan.index') }}" class="btn btn-light border">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    // --- Global Data Setup ---
    let jenisSuratDataMap = {};
    let oldCustomData = {};

    // CAPTURE INITIAL VALUES (Saved values from $permohonan or old input)
    const initialPembuka = '{{ old("paragraf_pembuka", $permohonan->paragraf_pembuka ?? optional($permohonan->jenisSurat)->paragraf_pembuka) }}'.trim();
    const initialPenutup = '{{ old("paragraf_penutup", $permohonan->paragraf_penutup ?? optional($permohonan->jenisSurat)->paragraf_penutup) }}'.trim();


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

    // Function to render custom fields (adapted for EDIT)
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
            if (variable.type !== 'system') {
                hasCustomFields = true;
                const key = variable.key;
                const label = variable.label;
                const type = variable.type || 'text';
                const inputName = `custom_data[${key}]`;

                // Retrieve old value from the global oldCustomData object
                const oldValue = oldCustomData[key] || '';

                const isInvalid = false; 

                let inputHtml = '';

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

                container.append(`
                    <div class="col-md-6 mb-3">
                        <label for="custom_${key}" class="form-label fw-semibold">${label} <span class="text-danger">*</span></label>
                        ${inputHtml}
                    </div>
                `);
            }
        });

        title.toggle(hasCustomFields);
    }
    
    // Function to synchronize paragraph fields based on selected Jenis Surat
    function syncParagraphs(selectedId) {
        const templateData = jenisSuratDataMap[selectedId] || {};
        const newPembuka = templateData.paragraf_pembuka || '';
        const newPenutup = templateData.paragraf_penutup || '';
        const pembukaField = $('#paragraf_pembuka');
        const penutupField = $('#paragraf_penutup');

        // Logic: Only update the textarea if the current value matches the initial value 
        // (saved in the database) OR if the field is empty.
        if (pembukaField.val().trim() === initialPembuka || pembukaField.val().trim() === '') {
             pembukaField.val(newPembuka);
        }
        if (penutupField.val().trim() === initialPenutup || penutupField.val().trim() === '') {
             penutupField.val(newPenutup);
        }
    }


    // --- Core Initialization Logic ---
    $(document).ready(function() {
        initializeDataMap();

        const jenisSuratSelect = $('#jenis_surat_id');

        // --- Event Listener: Jenis Surat Change ---
        jenisSuratSelect.on('change', function() {
            const selectedId = $(this).val();

            // 1. Render Custom Fields based on the new Jenis Surat
            renderCustomFields(selectedId);
            
            // 2. Synchronize Paragraphs based on the new Jenis Surat
            syncParagraphs(selectedId);
        });

        // 1. Initial Render on page load
        const initialJenisSuratId = jenisSuratSelect.val();
        if (initialJenisSuratId) {
             // Load existing custom field data
             renderCustomFields(initialJenisSuratId);
        }
        // Note: Paragraphs are loaded via PHP on page render using the saved values.
    });
</script>
@endpush