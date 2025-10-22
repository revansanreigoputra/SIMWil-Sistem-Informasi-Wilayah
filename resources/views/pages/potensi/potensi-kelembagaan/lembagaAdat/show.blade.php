@extends('layouts.master')

@section('title', 'Detail Data Lembaga Adat')

@section('action')
    <a href="{{ route('potensi.potensi-kelembagaan.lembagaAdat.edit', $adat->id) }}" class="btn btn-warning me-2">
        <i class="fas fa-edit me-2"></i>
        Edit
    </a>
    <a href="{{ route('potensi.potensi-kelembagaan.lembagaAdat.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>
        Kembali
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-eye me-2"></i>
                            <h4 class="card-title mb-0">Detail Data Lembaga Adat</h4>
                        </div>
                    </div>
                </div>

                <!-- Informasi Dasar -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            Informasi Dasar
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-calendar text-muted me-1"></i>
                                        Tanggal
                                    </label>
                                    <p class="form-control-plaintext">{{ $adat->tanggal->format('d-m-Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Struktur dan Kelengkapan Adat -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-sitemap text-primary me-2"></i>
                            Struktur dan Kelengkapan Adat
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-user-tie text-muted me-1"></i>
                                        Pemangku Adat
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->pemangku_adat)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-users text-muted me-1"></i>
                                        Kepengurusan Adat
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->kepengurusan_adat)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-home text-muted me-1"></i>
                                        Rumah Adat
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->rumah_adat)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-gem text-muted me-1"></i>
                                        Barang Pusaka
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->barang_pusaka)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-scroll text-muted me-1"></i>
                                        Naskah Naskah
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->naskah_naskah)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-ellipsis-h text-muted me-1"></i>
                                        Lainnya
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->lainnya)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pranata Adat -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-balance-scale text-primary me-2"></i>
                            Pranata Adat
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-comments text-muted me-1"></i>
                                        Musyawarah Adat
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->musyawarah_adat)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-gavel text-muted me-1"></i>
                                        Sanksi Adat
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->sanksi_adat)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upacara Adat Siklus Kehidupan -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-user-circle text-primary me-2"></i>
                            Upacara Adat Siklus Kehidupan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-baby text-muted me-1"></i>
                                        Upacara Adat Kelahiran
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->upacara_adat_kelahiran)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-ring text-muted me-1"></i>
                                        Upacara Adat Perkawinan
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->upacara_adat_perkawinan)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-cross text-muted me-1"></i>
                                        Upacara Adat Kematian
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->upacara_adat_kematian)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upacara Adat Pengelolaan Sumber Daya -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-leaf text-primary me-2"></i>
                            Upacara Adat Pengelolaan Sumber Daya
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-seedling text-muted me-1"></i>
                                        Upacara Adat Bercocok Tanam
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->upacara_adat_bercocok_tanam)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-fish text-muted me-1"></i>
                                        Upacara Adat Perikanan Laut
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->upacara_adat_perikanan_laut)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-tree text-muted me-1"></i>
                                        Upacara Adat Bidang Kehutanan
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->upacara_adat_bidang_kehutanan)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-mountain text-muted me-1"></i>
                                        Upacara Adat Pengelolaan SDA
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->upacara_adat_pengelolaan_sda)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upacara Adat Lainnya -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-star text-primary me-2"></i>
                            Upacara Adat Lainnya
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-hammer text-muted me-1"></i>
                                        Upacara Adat Pembangunan Rumah
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->upacara_adat_pembangunan_rumah)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="fas fa-handshake text-muted me-1"></i>
                                        Upacara Adat Penyelesaian Masalah
                                    </label>
                                    <p class="form-control-plaintext">
                                        @if($adat->upacara_adat_penyelesaian_masalah)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Ya
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times me-1"></i>Tidak
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection