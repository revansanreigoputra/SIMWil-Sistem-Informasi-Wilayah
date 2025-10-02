{{-- resources/views/pages/layanan/template/jenis_surats/create.blade.php (ADJUSTED) --}}

@extends('layouts.master')

@section('title', 'Tambah Jenis Dokumen & Template')

@section('action')
<a href="{{ route('jenis_surats.index') }}" class="btn btn-primary">
    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white rounded-top">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-plus-circle me-2"></i> Tambah Jenis Dokumen & Template
            </h5>
        </div>

        <div class="card-body bg-light">
            <form action="{{ route('jenis_surats.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="kop_template_id" class="form-label fw-semibold text-dark">Template Kop Surat</label>
                    <select name="kop_template_id" id="kop_template_id" class="form-select
                        @error('kop_template_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Template Kop Dokumen --</option>
                        @foreach ($kopTemplates as $template)
                        <option value="{{ $template->id }}"
                            {{ old('kop_template_id') == $template->id ? 'selected' : '' }}>
                            {{ $template->nama }} - {{ $template->jenis_kop }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label fw-semibold text-dark">Kode Surat / Laporan <span class="text-danger">*</span></label>
                    <small class="text-muted">Isi Hanya Kode saja Untuk tanggal dan nomor akan dibuat otomatis</small>
                    <input type="text"
                        class="form-control @error('kode') is-invalid @enderror"
                        id="kode"
                        name="kode"
                        value="{{ old('kode') }}"
                        placeholder="Format: /SKU/ ">
                    @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold text-dark">Nama Jenis Laporan/Surat <span class="text-danger">*</span></label>
                    <input type="text"
                        class="form-control @error('nama') is-invalid @enderror"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Contoh: SURAT KETERANGAN USAHA">
                    @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- add or retrieve anggota keluarga start-->
                <div class="card bg-card-inside-body p-3">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Data Penduduk</label>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end">
                            <button type="button" id="add-variable-btn"
                                class="btn btn-sm btn-primary p-2 mt-2">Tambah Data Inputan</button>
                        </div>
                        <small class="text-muted">Isi data penduduk yang diperlukan sesuai jenis surat/laporan ini. </small>
                        <small class="text-muted">Contoh: Nama, NIK, Alamat, dll.</small>

                        <div id="variable-list" class="mt-3">
                        </div>
                    </div>



                    <template id="variable-row-template">
                        <div class="input-group mb-3 variable-row">

                            {{-- --}}
                            <select name="variables[TEMP_INDEX][source]" class="form-select variable-source-select">
                                <option value="">-- Pilih jenis data --</option>
                                {{-- Generate Options List ONCE in PHP --}}
                                @foreach ($systemVariables as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>

                            {{-- HIDDEN INPUT FOR TYPE: Defaults to 'system' --}}
                            <input type="hidden" name="variables[TEMP_INDEX][type]" value="system" class="variable-type-hidden">

                            <div class="custom-key-container d-none ms-2">
                                {{-- CUSTOM TEXT INPUTS --}}
                                <input type="text" name="variables[TEMP_INDEX][key]" placeholder="Kata Kunci Data (tgl_kematian)" class="form-control variable-key-input">
                                <input type="text" name="variables[TEMP_INDEX][label]" placeholder="Label/Nama Tampilan" class="form-control variable-label-input">

                                {{-- CUSTOM TYPE SELECT: OVERRIDES HIDDEN INPUT --}}
                                <select name="variables[TEMP_INDEX][type]" class="form-select variable-type-select ms-1" style="width: 150px;">
                                    <option value="text">Teks</option>
                                    <option value="date">Tanggal</option>
                                    <option value="number">Nomor</option>
                                </select>
                            </div>

                            <button type="button" class="btn btn-outline-danger remove-variable-btn">X</button>
                        </div>
                    </template>
                </div>
                <!-- add or retrieve anggota keluarga end -->

                <div class="mb-3">
                    <label for="paragraf_pembuka" class="form-label fw-semibold text-dark">Paragraf Pembuka <span class="text-danger">*</span></label>

                    <textarea name="paragraf_pembuka" rows="3" id="paragraf_pembuka" class="form-control @error('paragraf_pembuka') is-invalid @enderror" placeholder="Ini paragraph pembuka  ">{{ old('paragraf_pembuka') }}</textarea>
                    @error('paragraf_pembuka')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="paragraf_penutup" class="form-label fw-semibold text-dark">Paragraf Penutup <span class="text-danger">*</span></label>

                    <textarea name="paragraf_penutup" rows="3" id="paragraf_penutup" class="form-control @error('paragraf_penutup') is-invalid @enderror" placeholder="Ini paragraf penutup  ">{{ old('paragraf_penutup') }}</textarea>
                    @error('paragraf_penutup')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('jenis_surats.index') }}"
                        class="btn btn-outline-primary rounded-pill px-4 me-2">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="fas fa-save me-1"></i> Simpan Template
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
        let rowIndex = 0;

        addVariableBtn.addEventListener('click', function() {
            const template = document.getElementById('variable-row-template').innerHTML;
            const newRowHtml = template.replace(/TEMP_INDEX/g, rowIndex++);
            variableList.insertAdjacentHTML('beforeend', newRowHtml);
        });

        variableList.addEventListener('click', function(e) {
            // Remove row logic
            if (e.target.classList.contains('remove-variable-btn')) {
                e.target.closest('.variable-row').remove();
            }
        });

        variableList.addEventListener('change', function(e) {
            // Custom variable visibility logic
            if (e.target.classList.contains('variable-source-select')) {
                const row = e.target.closest('.variable-row');
                const customContainer = row.querySelector('.custom-key-container');
                const keyInput = row.querySelector('.variable-key-input');
                const labelInput = row.querySelector('.variable-label-input');

                if (e.target.value === '__CUSTOM__') {
                    customContainer.classList.remove('d-none');
                    keyInput.setAttribute('required', 'required');
                    labelInput.setAttribute('required', 'required');
                } else {
                    customContainer.classList.add('d-none');
                    keyInput.removeAttribute('required');
                    labelInput.removeAttribute('required');

                    // For system variables, the key and label are already known
                    keyInput.value = e.target.value; // Set the known database key
                    labelInput.value = e.target.options[e.target.selectedIndex].text; // Set the display label
                }
            }
        });
    });
</script>
@endpush