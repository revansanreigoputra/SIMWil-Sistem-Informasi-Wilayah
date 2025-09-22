@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Edit Format Nomor Surat</h4>
    </div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 rounded-3">
            <!-- Header -->
            <div class="card-header bg-primary text-white rounded-top">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-edit me-2"></i> Edit Format Nomor Surat
                </h5>
            </div>

            <!-- Body -->
            <div class="card-body bg-light">
                <form action="#" method="POST">
                    {{-- karena ini dummy, action dan method masih kosong --}}
                    @csrf

                    <div class="mb-3">
                        <label for="kode_surat" class="form-label fw-semibold text-dark">Kode Surat</label>
                        <input type="text" 
                               class="form-control" 
                               id="kode_surat" 
                               name="kode_surat" 
                               value="/21/SKUMUM/DS/">
                        <div class="form-text">Contoh: /21/SKUMUM/DS/</div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_surat" class="form-label fw-semibold text-dark">Nama Surat</label>
                        <input type="text" 
                               class="form-control" 
                               id="nama_surat" 
                               name="nama_surat" 
                               value="SURAT KETERANGAN UMUM">
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="card-footer bg-white d-flex justify-content-end">
                <a href="{{ route('layanan.template.format_nomor.index') }}" 
                   class="btn btn-outline-primary rounded-pill px-4 me-2">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary rounded-pill px-4">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
