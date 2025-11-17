@extends('layouts.master')

@section('title', 'Detail Data Kepemilikan Lahan Hutan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-tree me-2"></i>
                Detail Data Kepemilikan Lahan Hutan
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $hutan->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $hutan->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Data Kepemilikan Lahan Hutan</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Milik Negara (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($hutan->milik_negara, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Milik Adat/Ulayat (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($hutan->milik_adat_ulayat, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Perhutani/Instansi Sektoral (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($hutan->perhutani_instansi_sektoral, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Milik Masyarakat Perorangan (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($hutan->milik_masyarakat_perorangan, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas Hutan (Ha)</label>
                        <p class="form-control-plaintext">{{ number_format($hutan->luas_hutan, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>

             <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('hutan.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('hutan.update')
                        <a href="{{ route('hutan.edit', $hutan->id) }}" class="btn btn-warning">
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
