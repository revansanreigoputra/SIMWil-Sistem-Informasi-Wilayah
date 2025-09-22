@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Edit Kop Surat</h4>
    </div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 rounded-3">
            
            <!-- Header -->
            <div class="card-header bg-primary text-white rounded-top">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-edit me-2"></i> Edit Kop Surat
                </h5>
            </div>

            <!-- Body -->
            <div class="card-body bg-light">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    {{-- Nama Kop Surat --}}
                    <div class="mb-3">
                        <label for="nama_kop" class="form-label fw-semibold text-dark">Nama Kop Surat</label>
                        <textarea class="form-control rounded-3" id="nama_kop" name="nama_kop" rows="3">PEMERINTAH PROVINSI JAWA BARAT KABUPATEN YOGYAKARTA</textarea>
                        <div class="form-text">Contoh: PEMERINTAH PROVINSI ... KABUPATEN ...</div>
                    </div>

                    {{-- Logo --}}
                    <div class="mb-3">
                        <label for="logo" class="form-label fw-semibold text-dark">Logo</label>
                        <div class="d-flex align-items-center mt-2">
                            <img src="{{ asset('images/logo_dummy.png') }}" 
                                 alt="Logo" width="100" 
                                 class="me-3 rounded shadow-sm border bg-white p-1">
                            <input type="file" class="form-control rounded-3" id="logo" name="logo">
                        </div>
                        <div class="form-text">Unggah logo baru jika ingin mengganti.</div>
                    </div>

                    <!-- Footer dalam card -->
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('layanan.template.kop_surat.index') }}" 
                           class="btn btn-outline-primary rounded-pill px-4 me-2">
                            <i class="fas fa-times me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
