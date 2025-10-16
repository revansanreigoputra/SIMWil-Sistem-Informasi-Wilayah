@extends('layouts.master')

@section('title', 'Detail Data Prasarana Olahraga')

@section('content')
    <div class="container-fluid px-4">

        <!-- Main Content Card -->
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            <!-- Card Header with Gradient -->
            <div class="card-header bg-gradient text-white py-3"
                style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="d-flex align-items-center">
                    <div>
                        <h3 class="mb-0 fw-bold text-dark">
                            {{ $prasaranaOlahraga->tanggal?->format('d F Y') ?? '-' }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <!-- Data Prasarana Olahraga Section -->
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 rounded-2 p-2 me-2">
                            <i class="fas fa-futbol text-primary"></i>
                        </div>
                        <h6 class="mb-0 fw-bold text-dark">Data Prasarana Olahraga</h6>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card border border-light-subtle h-100 hover-shadow transition-all">
                                <div class="card-body">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-shrink-0">
                                            <div class="icon-wrapper bg-info bg-opacity-10 rounded-2 p-2">
                                                <i class="fas fa-futbol text-info"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <label class="text-muted small mb-1 d-block">Jenis Prasarana Olahraga</label>
                                            <h6 class="mb-0 fw-bold text-dark">
                                                {{ $prasaranaOlahraga->jpolahraga?->nama ?? '-' }}</h6>
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
                                            <h6 class="mb-0 fw-bold text-dark">
                                                {{ number_format($prasaranaOlahraga->jumlah) }}</h6>
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
                                    <span
                                        class="fw-semibold text-dark">{{ $prasaranaOlahraga->created_at?->format('d M Y, H:i') ?? '-' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <i class="fas fa-edit text-primary me-3 fa-lg"></i>
                                <div>
                                    <small class="text-muted d-block mb-1">Terakhir Diupdate</small>
                                    <span
                                        class="fw-semibold text-dark">{{ $prasaranaOlahraga->updated_at?->format('d M Y, H:i') ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="card-footer bg-white border-top py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.olahraga.index') }}"
                        class="btn btn-light border px-4">
                        <i class="fas fa-arrow-left me-2"></i>
                        Kembali
                    </a>
                    @can('olahraga.update')
                        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.olahraga.edit', $prasaranaOlahraga->id) }}"
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

        .icon-wrapper {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
