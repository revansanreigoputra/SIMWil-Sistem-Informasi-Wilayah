@extends('layouts.master')

@section('title', 'Detail Data Kepemilikan Lahan Kebun')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-file-alt me-2"></i>
                Detail Data Kepemilikan Lahan Kebun
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

            <h6 class="fw-bold text-primary mt-4 mb-3">Luas Lahan Perkebunan (Ha)</h6>
            <div class="row">
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki < 5 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_kurang_dari_5_ha, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 10-50 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_10_50_ha, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 50-100 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_50_100_ha, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 100-500 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_100_500_ha, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 500-1000 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_500_1000_ha, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki > 1000 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->memiliki_lebih_dari_1000_ha, 2, ',', '.') }}</p>
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
                        <label class="form-label fw-semibold">Petani Perkebunan</label>
                        <p class="form-control-plaintext">{{ number_format($kepemilikan->jumlah_keluarga_petani_perkebunan, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('kebun.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('kebun.update')
                        <a href="{{ route('kebun.edit', $kepemilikan->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
