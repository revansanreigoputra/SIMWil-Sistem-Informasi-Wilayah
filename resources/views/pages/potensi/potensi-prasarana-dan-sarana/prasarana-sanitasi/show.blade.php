@extends('layouts.master')

@section('title', 'Detail Data Prasarana Sanitasi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-eye me-2"></i>
            Detail Data Prasarana Sanitasi
        </h5>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-calendar me-1"></i>
                        Tanggal
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ $sanitasi->tanggal->format('d-m-Y') }}</p>
                </div>
            </div>
        </div>

        <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Data Prasarana Sanitasi</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-water me-1"></i>
                        Sumur Resapan Air
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($sanitasi->sumur_resapan_air) }} unit</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-restroom me-1"></i>
                        MCK Umum
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($sanitasi->mck_umum) }} unit</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-home me-1"></i>
                        Jamban Keluarga
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($sanitasi->jamban_keluarga) }} unit</p>
                </div>
            </div>
        </div>

        <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Data Drainase</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-stream me-1"></i>
                        Saluran Drainase
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">
                        <span class="badge bg-info text-dark">
                            {{ $sanitasi->getSaluranDrainaseOptions()[$sanitasi->saluran_drainase] ?? $sanitasi->saluran_drainase }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-tools me-1"></i>
                        Kondisi Saluran
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">
                        @php
                            $kondisi = $sanitasi->getKondisiSaluranOptions()[$sanitasi->kondisi_saluran] ?? $sanitasi->kondisi_saluran;
                            $badgeClass = match(strtolower($kondisi)) {
                                'baik' => 'bg-success',
                                'rusak', 'buruk' => 'bg-danger',
                                'sedang' => 'bg-warning text-dark',
                                default => 'bg-secondary'
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $kondisi }}</span>
                    </p>
                </div>
            </div>
        </div>

        <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Informasi Sistem</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-plus-circle me-1"></i>
                        Dibuat Pada
                    </label>
                    <p class="form-control-plaintext">
                        <small class="text-muted">{{ $sanitasi->created_at->format('d-m-Y H:i:s') }}</small>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-edit me-1"></i>
                        Terakhir Diupdate
                    </label>
                    <p class="form-control-plaintext">
                        <small class="text-muted">{{ $sanitasi->updated_at->format('d-m-Y H:i:s') }}</small>
                    </p>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div></div>
                    <div class="btn-group gap-2">
                        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.index') }}"
                            class="btn btn-outline-secondary rounded">
                            <i class="fas fa-arrow-left me-1"></i>
                            Kembali
                        </a>
                        @can('sanitasi.update')
                            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.edit', $sanitasi->id) }}"
                                class="btn btn-warning rounded">
                                <i class="fas fa-edit me-1"></i>
                                Edit Data
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection