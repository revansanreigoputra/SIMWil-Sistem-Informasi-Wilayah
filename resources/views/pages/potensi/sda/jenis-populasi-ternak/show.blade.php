@extends('layouts.master')

@section('title', 'Detail Data Populasi Ternak')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-file-alt me-2"></i>
                Detail Data Populasi Ternak
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $jenisPopulasiTernak->tanggal }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $jenisPopulasiTernak->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Ternak</label>
                        <p class="form-control-plaintext">{{ $jenisPopulasiTernak->jenisTernak->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Pemilik</label>
                        <p class="form-control-plaintext">{{ number_format($jenisPopulasiTernak->jumlah_pemilik, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Populasi</label>
                        <p class="form-control-plaintext">{{ number_format($jenisPopulasiTernak->populasi, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Saluran Penjualan</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Langsung ke Konsumen</label>
                        <p class="form-control-plaintext">{{ ucfirst($jenisPopulasiTernak->dijual_langsung_ke_konsumen) }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Ke Pasar Hewan</label>
                        <p class="form-control-plaintext">{{ ucfirst($jenisPopulasiTernak->dijual_ke_pasar_hewan) }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui KUD</label>
                        <p class="form-control-plaintext">{{ ucfirst($jenisPopulasiTernak->dijual_melalui_kud) }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Tengkulak</label>
                        <p class="form-control-plaintext">{{ ucfirst($jenisPopulasiTernak->dijual_melalui_tengkulak) }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Pengecer</label>
                        <p class="form-control-plaintext">{{ ucfirst($jenisPopulasiTernak->dijual_melalui_pengecer) }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Ke Lumbung Desa/Kelurahan</label>
                        <p class="form-control-plaintext">{{ ucfirst($jenisPopulasiTernak->dijual_ke_lumbung_desa_kelurahan) }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tidak Dijual</label>
                        <p class="form-control-plaintext">{{ ucfirst($jenisPopulasiTernak->tidak_dijual) }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('jenis-populasi-ternak.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('jenis-populasi-ternak.update')
                        <a href="{{ route('jenis-populasi-ternak.edit', $jenisPopulasiTernak->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
