@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-user-edit text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Detail Data Mutasi Penduduk</h4>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        {{-- Header --}}
        <div class="card-header bg-gradient bg-primary text-white py-4">
            <div class="d-flex align-items-center">
                <div>
                    <h4 class="mb-0 fw-bold">Detail Data Mutasi</h4>
                    <small class="text-light">Informasi lengkap mutasi penduduk</small>
                </div>
            </div>
        </div>

        {{-- Body --}}
        <div class="card-body p-4">
            <div class="row g-3">
                {{-- NIK --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold text-muted">
                            <i class="fas fa-id-card me-2 text-primary"></i> NIK
                        </label>
                        <input type="text" class="form-control" value="{{ $mutasi->nik }}" readonly>
                    </div>
                </div>

                {{-- Nomor --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold text-muted">
                            <i class="fas fa-hashtag me-2 text-success"></i> Nomor
                        </label>
                        <input type="text" class="form-control" value="{{ $mutasi->nomor }}" readonly>
                    </div>
                </div>

                {{-- Tanggal --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold text-muted">
                            <i class="fas fa-calendar-alt me-2 text-warning"></i> Tanggal Mutasi
                        </label>
                        <input type="text" class="form-control" value="{{ $mutasi->tanggal->format('d M Y') }}" readonly>
                    </div>
                </div>

                {{-- Jenis --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold text-muted">
                            <i class="fas fa-random me-2 text-danger"></i> Jenis
                        </label>
                        <input type="text" class="form-control" value="{{ ucfirst($mutasi->jenis) }}" readonly>
                    </div>
                </div>

                {{-- Penyebab --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold text-muted">
                            <i class="fas fa-info-circle me-2 text-secondary"></i> Penyebab
                        </label>
                        <input type="text" class="form-control" value="{{ $mutasi->penyebab }}" readonly>
                    </div>
                </div>

                {{-- Kecamatan --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold text-muted">
                            <i class="fas fa-map-marked-alt me-2 text-info"></i> Kecamatan
                        </label>
                        <input type="text" class="form-control" value="{{ $mutasi->kecamatan }}" readonly>
                    </div>
                </div>

                {{-- Desa --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold text-muted">
                            <i class="fas fa-home me-2 text-primary"></i> Desa
                        </label>
                        <input type="text" class="form-control" value="{{ $mutasi->desa }}" readonly>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-4 text-end">
                <a href="{{ route('mutasi.data.index') }}" class="btn btn-outline-primary px-4">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
