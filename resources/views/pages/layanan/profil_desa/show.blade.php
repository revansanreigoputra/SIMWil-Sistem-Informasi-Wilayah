@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Detail Profil Desa</h4>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="card shadow-sm border-0 rounded-3">
        <!-- Header -->
        <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
            <i class="fas fa-info-circle me-2"></i>
            <h5 class="mb-0 fw-bold">Detail Profil Desa</h5>
        </div>

        <!-- Body dengan grid -->
        <div class="card-body p-4">
            <div class="row">
                <!-- Kolom Kiri: Detail -->
                <div class="col-md-8">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 fw-semibold text-muted">
                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>Provinsi
                        </dt>
                        <dd class="col-sm-8">KEPULAUAN RIAU</dd>

                        <dt class="col-sm-4 fw-semibold text-muted">
                            <i class="fas fa-city me-2 text-primary"></i>Kabupaten/Kota
                        </dt>
                        <dd class="col-sm-8">LINGGA</dd>

                        <dt class="col-sm-4 fw-semibold text-muted">
                            <i class="fas fa-landmark me-2 text-primary"></i>Kecamatan
                        </dt>
                        <dd class="col-sm-8">LINGGA</dd>

                        <dt class="col-sm-4 fw-semibold text-muted">
                            <i class="fas fa-university me-2 text-primary"></i>Status
                        </dt>
                        <dd class="col-sm-8">Desa</dd>

                        <dt class="col-sm-4 fw-semibold text-muted">
                            <i class="fas fa-home me-2 text-primary"></i>Desa/Kelurahan
                        </dt>
                        <dd class="col-sm-8">DABO BARU</dd>
                    </dl>
                </div>

                <!-- Kolom Kanan: Logo Desa -->
                <div class="col-md-4 d-flex flex-column align-items-center justify-content-center border-start">
                    <span class="fw-semibold text-muted">Logo Desa</span>
                    <img src="{{ asset('images/logo_desa.png') }}" 
                         alt="Logo Desa" 
                         class="rounded shadow-sm border p-2 bg-white mb-3"
                         style="max-width: 160px;">
                </div>
            </div>
        </div>

        <!-- Footer / Action -->
        <div class="card-footer bg-white border-0 d-flex justify-content-end">
            <a href="{{ route('layanan.profil_desa.edit') }}" class="btn btn-primary rounded-pill px-4">
                <i class="fas fa-edit me-1"></i> Edit Profil
            </a>
        </div>
    </div>
</div>
@endsection
