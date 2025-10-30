@extends('layouts.master')

@section('title', 'Detail Data Apotik Hidup')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-leaf me-2"></i>
                Detail Data Apotik Hidup
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $apotikhidup->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $apotikhidup->desa->nama_desa }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Komoditas</label>
                        <p class="form-control-plaintext">{{ $apotikhidup->komoditas->nama }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Data Produksi</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas Produksi (m²)</label>
                        <p class="form-control-plaintext">{{ number_format($apotikhidup->luas_produksi, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hasil Produksi (kg)</label>
                        <p class="form-control-plaintext">{{ number_format($apotikhidup->hasil_produksi, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Produksi</label>
                        <p class="form-control-plaintext">{{ number_format($apotikhidup->jumlah_produksi, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('apotikhidup.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('apotikhidup.update')
                        <a href="{{ route('apotikhidup.edit', $apotikhidup->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
