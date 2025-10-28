@extends('layouts.master')

@section('title', 'Detail Data Jenis Lahan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-map me-2"></i>
                Detail Data Jenis Lahan
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $jlahan->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $jlahan->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Tanah Sawah (Ha)</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sawah Irigasi Teknis</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->sawah_irigasi_teknis, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sawah Irigasi Setengah Teknis</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->sawah_irigasi_setengah_teknis, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sawah Tadah Hujan</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->sawah_tadah_hujan, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sawah Pasang Surut</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->sawah_pasang_surut, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas Tanah Sawah</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->luas_tanah_sawah, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Tanah Basah (Ha)</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanah Rawa</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->tanah_rawa, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pasang Surut</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->pasang_surut, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lahan Gambut</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->lahan_gambut, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Situ/Waduk/Danau</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->situ_waduk_danau, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas Tanah Basah</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->luas_tanah_basah, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Tanah Kering (Ha)</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanah Ladang</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->tanah_ladang, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pemukiman</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->pemukiman, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pekarangan</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->pekarangan, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas Tanah Kering</label>
                        <p class="form-control-plaintext">{{ number_format($jlahan->luas_tanah_kering, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

             <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('jlahan.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('jlahan.update')
                        <a href="{{ route('jlahan.edit', $jlahan->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection