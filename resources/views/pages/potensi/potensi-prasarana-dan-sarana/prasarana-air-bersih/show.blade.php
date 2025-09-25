@extends('layouts.master')

@section('title', 'Detail Prasarana Air Bersih')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-eye me-2"></i>
            Detail Prasarana Air Bersih
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
                    <p class="form-control-plaintext fw-bold fs-6">{{ $airBersih->tanggal->format('d-m-Y') }}</p>
                </div>
            </div>
        </div>

        <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Data Sumber Air</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-industry me-1"></i>
                        Sumur Pompa
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($airBersih->sumur_pompa) }} unit</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-water me-1"></i>
                        Sumur Gali
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($airBersih->sumur_gali) }} unit</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-tint me-1"></i>
                        Mata Air
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($airBersih->mata_air) }} unit</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-lake me-1"></i>
                        Embung
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($airBersih->embung) }} unit</p>
                </div>
            </div>
        </div>

        <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Fasilitas Distribusi Air</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-faucet me-1"></i>
                        Hidran Umum
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($airBersih->hidran_umum) }} unit</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-battery-full me-1"></i>
                        Tangki Air Bersih
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($airBersih->tangki_air_bersih) }} unit</p>
                </div>
            </div>
        </div>

        <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Penampungan dan Pengolahan Air</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-cloud-rain me-1"></i>
                        Penampung Air Hujan
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($airBersih->penampung_air_hujan) }} unit</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-cogs me-1"></i>
                        Bangunan Pengolahan Air
                    </label>
                    <p class="form-control-plaintext fw-bold fs-6">{{ number_format($airBersih->bangunan_pengolahan_air) }} unit</p>
                </div>
            </div>
        </div>

        <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Total Prasarana</h6>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-calculator me-1"></i>
                        Total Prasarana Air Bersih
                    </label>
                    <div class="bg-light rounded p-3">
                        <p class="fs-3 fw-bold text-primary mb-0 text-center">
                            <i class="fas fa-water me-2"></i>
                            {{ number_format($airBersih->total_prasarana) }} unit
                        </p>
                    </div>
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
                        <small class="text-muted">{{ $airBersih->created_at->format('d-m-Y H:i:s') }}</small>
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
                        <small class="text-muted">{{ $airBersih->updated_at->format('d-m-Y H:i:s') }}</small>
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
                        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.index') }}"
                            class="btn btn-outline-secondary rounded">
                            <i class="fas fa-arrow-left me-1"></i>
                            Kembali
                        </a>
                        @can('air_bersih.update')
                            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.edit', $airBersih->id) }}"
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