@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-3 mb-4">
        <i class="fas fa-file-alt text-danger me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Hapus Permohonan</h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-5">

                    <!-- Ikon Warning -->
                    <div class="mb-4">
                        <i class="fas fa-exclamation-triangle text-danger fa-4x"></i>
                    </div>

                    <h4 class="fw-bold text-dark mb-3">Yakin ingin menghapus permohonan ini?</h4>

                    <p class="text-muted mb-1">
                        Nama: <span class="fw-semibold text-dark">Budi Santoso</span>
                    </p>
                    <p class="text-muted mb-4">
                        Jenis Surat: <span class="fw-semibold text-dark">SK Domisili</span>
                    </p>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ url('layanan/permohonan') }}" 
                           class="btn btn-light border rounded-pill px-4 shadow-sm">
                            <i class="fas fa-times me-1"></i> Batal
                        </a>
                        <button class="btn btn-danger rounded-pill px-4 shadow-sm">
                            <i class="fas fa-trash-alt me-1"></i> Hapus
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
