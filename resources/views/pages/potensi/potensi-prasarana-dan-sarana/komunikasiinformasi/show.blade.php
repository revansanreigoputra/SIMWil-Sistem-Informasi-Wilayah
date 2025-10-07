@extends('layouts.master')

@section('title', 'Detail Data Komunikasi Informasi')

@section('content')
    <div class="container-fluid px-4">

        <!-- Main Content Card -->
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            <!-- Card Header with Gradient -->
            <div class="card-header bg-gradient text-white py-3" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="d-flex align-items-center">
                    <div>
                        {{-- <h6 class="mb-0 fw-semibold text-dark">Tanggal Pencatatan</h6> --}}
                        <h3 class="mb-0 fw-bold text-dark">{{ $komunikasiInformasi->tanggal?->format('d F Y') ?? '-' }}</h3>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <!-- Data Komunikasi Informasi Section -->
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 rounded-2 p-2 me-2">
                            <i class="fas fa-broadcast-tower text-primary"></i>
                        </div>
                        <h6 class="mb-0 fw-bold text-dark">Data Komunikasi Informasi</h6>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card border border-light-subtle h-100 hover-shadow transition-all">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="icon-wrapper bg-info bg-opacity-10 rounded-2 p-2">
                                                <i class="fas fa-tags text-info"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <label class="text-muted small mb-1 d-block">Kategori</label>
                                            <h6 class="mb-0 fw-bold text-dark">{{ $komunikasiInformasi->kategori?->nama ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border border-light-subtle h-100 hover-shadow transition-all">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="icon-wrapper bg-success bg-opacity-10 rounded-2 p-2">
                                                <i class="fas fa-list text-success"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <label class="text-muted small mb-1 d-block">Jenis</label>
                                            <h6 class="mb-0 fw-bold text-dark">{{ $komunikasiInformasi->jenis?->nama ?? '-' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border border-light-subtle h-100 hover-shadow transition-all">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="icon-wrapper bg-warning bg-opacity-10 rounded-2 p-2">
                                                <i class="fas fa-hashtag text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <label class="text-muted small mb-1 d-block">Jumlah</label>
                                            <h6 class="mb-0 fw-bold text-dark">{{ number_format($komunikasiInformasi->jumlah) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border border-light-subtle h-100 hover-shadow transition-all">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="icon-wrapper bg-danger bg-opacity-10 rounded-2 p-2">
                                                <i class="fas fa-balance-scale text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <label class="text-muted small mb-1 d-block">Satuan</label>
                                            <h6 class="mb-0 fw-bold text-dark">{{ $komunikasiInformasi->satuan }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Informasi Sistem Section -->
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-secondary bg-opacity-10 rounded-2 p-2 me-2">
                            <i class="fas fa-info-circle text-secondary"></i>
                        </div>
                        <h6 class="mb-0 fw-bold text-dark">Informasi Sistem</h6>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="fas fa-plus-circle text-success me-3 fa-lg"></i>
                                <div>
                                    <small class="text-muted d-block mb-1">Dibuat Pada</small>
                                    <span class="fw-semibold text-dark">{{ $komunikasiInformasi->created_at?->format('d M Y, H:i') ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="fas fa-edit text-primary me-3 fa-lg"></i>
                                <div>
                                    <small class="text-muted d-block mb-1">Terakhir Diupdate</small>
                                    <span class="fw-semibold text-dark">{{ $komunikasiInformasi->updated_at?->format('d M Y, H:i') ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="card-footer bg-white border-top py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.index') }}"
                        class="btn btn-light border px-4">
                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali
                    </a>
                    @can('komunikasiinformasi.update')
                        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.komunikasiinformasi.edit', $komunikasiInformasi->id) }}"
                            class="btn btn-warning px-4">
                            <i class="fas fa-edit me-2"></i>
                            Edit Data
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-shadow {
            transition: all 0.3s ease;
        }
        
        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
            transform: translateY(-2px);
        }
        
        .transition-all {
            transition: all 0.3s ease;
        }
        
        .icon-shape {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .icon-wrapper {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
        }

        .breadcrumb a {
            color: #6c757d;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: #495057;
        }
    </style>
@endsection