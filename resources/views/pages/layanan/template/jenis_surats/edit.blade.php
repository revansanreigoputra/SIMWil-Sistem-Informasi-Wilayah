@extends('layouts.master')

@section('title', 'Edit Format Nomor Surat')

@section('action')
<a href="{{ route('jenis_surats.index') }}" class="btn btn-primary ">
    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white rounded-top">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-edit me-2"></i> Edit Format Dokumen: {{ $jenisSurat->nama }}
            </h5>
        </div>

        <div class="card-body bg-light">
            {{-- Form action points to the update route with the model ID --}}
            <form action="{{ route('jenis_surats.update', $jenisSurat->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Hidden Data for JS Initialization --}}
                <div id="initial-variables-data" data-variables="{{ json_encode($jenisSurat->required_variables ?? []) }}" style="display: none;"></div>
                <div id="system-variables-map" data-map="{{ json_encode($systemVariables) }}" style="display: none;"></div>


                <div class="mb-3">
                    <label for="kop_template_id" class="form-label fw-semibold text-dark">Template Kop Dokumen</label>
                    <select name="kop_template_id" id="kop_template_id" class="form-select
                        @error('kop_template_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Template Kop Dokumen --</option>
                        @foreach ($kopTemplates as $template)
                        <option value="{{ $template->id }}"
                            {{ old('kop_template_id', $jenisSurat->kop_template_id) == $template->id ? 'selected' : '' }}>
                            {{ $template->nama }} - {{ $template->jenis_kop }}
                        </option>
                        @endforeach
                    </select>
                    @error('kop_template_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kode" class="form-label fw-semibold text-dark">Kode Surat / Laporan <span class="text-danger">*</span></label>
                    <small class="text-muted">Isi Hanya Kode saja Untuk tanggal dan nomor akan dibuat otomatis</small>
                    <input type="text"
                        class="form-control @error('kode') is-invalid @enderror"
                        id="kode"
                        name="kode"
                        value="{{ old('kode', $jenisSurat->kode) }}"
                        placeholder="Format: /SKU/ ">
                    @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold text-dark">Nama Jenis Dokumen <span class="text-danger">*</span></label>
                    <input type="text"
                        class="form-control @error('nama') is-invalid @enderror"
                        id="nama"
                        name="nama"
                        value="{{ old('nama', $jenisSurat->nama) }}"
                        placeholder="Contoh: SURAT KETERANGAN USAHA/LAPORAN PERTANGGUNGJAWABAN">
                    @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- START: Data Penduduk / Variable Section --}}
                <div class="card bg-light p-3 border">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-dark">Data Penduduk (Variabel Tambahan)</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end">
                            <button type="button" id="add-variable-btn"
                                class="btn btn-sm btn-primary p-2 mt-2">Tambah Data Inputan</button>
                        </div>
                        <small class="text-muted">Pilih data penduduk/anggota keluarga yang diperlukan sesuai jenis surat ini atau tambah inputan baru.</small>

                        <div id="variable-list" class="mt-3">
                            {{-- EXISTING ROWS WILL BE RENDERED HERE BY JAVASCRIPT --}}
                        </div>
                    </div>
                </div>
                {{-- END: Data Penduduk / Variable Section --}}

                <div class="mb-3 mt-3">
                    <label for="paragraf_pembuka" class="form-label fw-semibold text-dark">Paragraf Pembuka <span class="text-danger">*</span></label>
                    <textarea name="paragraf_pembuka" rows="3" id="paragraf_pembuka" class="form-control @error('paragraf_pembuka') is-invalid @enderror" placeholder="Ini paragraph pembuka disurat">{{ old('paragraf_pembuka', $jenisSurat->paragraf_pembuka) }}</textarea>
                    @error('paragraf_pembuka')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">              
                    <label for="paragraf_penutup" class="form-label fw-semibold text-dark">Paragraf Penutup <span class="text-danger">*</span></label>
                    <textarea name="paragraf_penutup" rows="3" id="paragraf_penutup" class="form-control @error('paragraf_penutup') is-invalid @enderror" placeholder="Ini paragraph penutup disurat">{{ old('paragraf_penutup', $jenisSurat->paragraf_penutup) }}</textarea>
                    @error('paragraf_penutup')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('jenis_surats.index') }}"
                        class="btn btn-outline-primary rounded-pill px-4 me-2">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const variableList = document.getElementById('variable-list');
        const addVariableBtn = document.getElementById('add-variable-btn');
        const systemVariablesMap = JSON.parse(document.getElementById('system-variables-map').dataset.map);
        const initialVariables = JSON.parse(document.getElementById('initial-variables-data').dataset.variables);

        let rowIndex = initialVariables.length; // Start index after loading existing rows

        // --- Template Definition (MUST BE HERE OR IN A SHARED PARTIAL) ---
        // NOTE: This template is copied from your create.blade.php
        const variableRowTemplate = `
            <div class="input-group mb-3 variable-row">
                <select name="variables[TEMP_INDEX][source]" class="form-select variable-source-select">
                    <option value="">-- Pilih jenis data --</option>
                    ${Object.entries(systemVariablesMap).map(([key, label]) => 
                        `<option value="${key}">${label}</option>`
                    ).join('')}
                </select>

                <div class="custom-key-container d-none ms-2">
                    <input type="text" name="variables[TEMP_INDEX][key]" placeholder="Kata Kunci Data (tgl_kematian)" class="form-control variable-key-input">
                    <input type="text" name="variables[TEMP_INDEX][label]" placeholder="Label/Nama Tampilan" class="form-control variable-label-input ms-1">
                    <select name="variables[TEMP_INDEX][type]" class="form-select variable-type-select ms-1" style="width: 150px;">
                        <option value="text">Teks</option>
                        <option value="date">Tanggal</option>
                        <option value="number">Nomor</option>
                    </select>
                </div>

                <button type="button" class="btn btn-outline-danger remove-variable-btn">X</button>
            </div>
        `;

        // --- Initialization Function ---
        function loadInitialVariables() {
            // Loop through the existing variables saved on the model
            initialVariables.forEach((variable, index) => {
                // Determine if it's a system variable or custom input
                const isSystem = variable.type === 'system';

                // Get the base row HTML and replace the temporary index
                let rowHtml = variableRowTemplate.replace(/TEMP_INDEX/g, index);

                // 1. Append the row to the list
                variableList.insertAdjacentHTML('beforeend', rowHtml);

                // 2. Select the correct options and pre-fill inputs
                const newRow = variableList.lastElementChild;
                const sourceSelect = newRow.querySelector('.variable-source-select');
                const keyInput = newRow.querySelector('.variable-key-input');
                const labelInput = newRow.querySelector('.variable-label-input');
                const typeSelect = newRow.querySelector('.variable-type-select');
                const customContainer = newRow.querySelector('.custom-key-container');

                if (isSystem) {
                    // Set the source select to the system key
                    sourceSelect.value = variable.key;

                    // Still set the hidden key/label inputs for submission safety
                    keyInput.value = variable.key;
                    labelInput.value = variable.label;
                } else {
                    // It's a custom field: select the __CUSTOM__ option and prefill inputs
                    sourceSelect.value = '__CUSTOM__';

                    customContainer.classList.remove('d-none');
                    keyInput.value = variable.key;
                    labelInput.value = variable.label;
                    typeSelect.value = variable.type; // Set type for custom field

                    // Re-add required attributes since it is custom
                    keyInput.setAttribute('required', 'required');
                    labelInput.setAttribute('required', 'required');
                }
            });
        }

        // --- Event Handlers ---
        addVariableBtn.addEventListener('click', function() {
            const newRowHtml = variableRowTemplate.replace(/TEMP_INDEX/g, rowIndex++);
            variableList.insertAdjacentHTML('beforeend', newRowHtml);
        });

        variableList.addEventListener('click', function(e) {
            // Remove row logic
            if (e.target.classList.contains('remove-variable-btn')) {
                e.target.closest('.variable-row').remove();
            }
        });

        variableList.addEventListener('change', function(e) {
            // Custom variable visibility logic (Copied from create.blade.php logic)
            if (e.target.classList.contains('variable-source-select')) {
                const row = e.target.closest('.variable-row');
                const customContainer = row.querySelector('.custom-key-container');
                const keyInput = row.querySelector('.variable-key-input');
                const labelInput = row.querySelector('.variable-label-input');

                if (e.target.value === '__CUSTOM__') {
                    customContainer.classList.remove('d-none');
                    keyInput.setAttribute('required', 'required');
                    labelInput.setAttribute('required', 'required');
                    // Clear values when switching to custom mode
                    keyInput.value = '';
                    labelInput.value = '';

                } else {
                    customContainer.classList.add('d-none');
                    keyInput.removeAttribute('required');
                    labelInput.removeAttribute('required');

                    // Set values for system variables based on the map
                    const selectedKey = e.target.value;
                    if (selectedKey) {
                        keyInput.value = selectedKey;
                        labelInput.value = systemVariablesMap[selectedKey];
                    }
                }
            }
        });

        loadInitialVariables();
    });
</script>
@endpush