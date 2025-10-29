@extends('layouts.master')

@section('title', 'Detail Data Kepemilikan Lahan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-file-alt me-2"></i>
                Detail Data Kepemilikan Lahan
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $lahan->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $lahan->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Keluarga Pemilik Tanah Pertanian (Ha)</h6>
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki < 10 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($lahan->memiliki_kurang_10_ha, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 10-50 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($lahan->memiliki_10_50_ha, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki 50-100 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($lahan->memiliki_50_100_ha, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki > 100 Ha</label>
                        <p class="form-control-plaintext">{{ number_format($lahan->memiliki_lebih_100_ha, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Jumlah Keluarga</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Memiliki Tanah</label>
                        <p class="form-control-plaintext">{{ number_format($lahan->jml_keluarga_memiliki_tanah, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tidak Memiliki Tanah</label>
                        <p class="form-control-plaintext">{{ number_format($lahan->jml_keluarga_tidak_memiliki_tanah, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Petani Tanaman Pangan</label>
                        <p class="form-control-plaintext">{{ number_format($lahan->jml_keluarga_petani_tanaman_pangan, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('lahan.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('lahan.update')
                        <a href="{{ route('lahan.edit', $lahan->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
