@extends('layouts.master')

@section('title', 'Detail Data Kepemilikan Lahan Buah')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-file-alt me-2"></i>
                Detail Data Kepemilikan Lahan Buah
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $kepemilikan->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $kepemilikan->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Luas Lahan (Pohon)</h6>
            <div class="row">
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki < 10</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_kurang_10, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 10-50</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_10_50, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 50-100</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_50_100, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 100-500</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_100_500, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 500-1000</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_500_1000, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki > 1000</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_lebih_1000, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Jumlah Keluarga</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki Tanah</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->jumlah_keluarga_memiliki_tanah, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tidak Memiliki Tanah</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->jumlah_keluarga_tidak_memiliki_tanah, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Petani Buah</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->jumlah_keluarga_petani_buah, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('kepemilikan.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('kepemilikan.update')
                        <a href="{{ route('kepemilikan.edit', $kepemilikan->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
