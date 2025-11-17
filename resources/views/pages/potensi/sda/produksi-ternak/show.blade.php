@extends('layouts.master')

@section('title', 'Detail Data Produksi Ternak')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-cow me-2"></i>
                Detail Data Produksi Ternak
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $produksiTernak->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $produksiTernak->desa->nama_desa }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Produksi</label>
                        <p class="form-control-plaintext">{{ $produksiTernak->jenisProduksiTernak->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hasil Produksi</label>
                        <p class="form-control-plaintext">{{ number_format($produksiTernak->hasil_produksi, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Satuan</label>
                        <p class="form-control-plaintext">{{ $produksiTernak->satuanProduksiTernak->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nilai Produksi Tahun Ini</label>
                        <p class="form-control-plaintext">{{ number_format($produksiTernak->nilai_produksi_tahun_ini, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nilai Bahan Baku yang Digunakan</label>
                        <p class="form-control-plaintext">{{ number_format($produksiTernak->nilai_bahan_baku_yang_digunakan, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nilai Bahan Penolong yang Digunakan</label>
                        <p class="form-control-plaintext">{{ number_format($produksiTernak->nilai_bahan_penolong_yang_digunakan, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Ternak Tahun Ini</label>
                        <p class="form-control-plaintext">{{ number_format($produksiTernak->jumlah_ternak_tahun_ini, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('produksi-ternak.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('produksi-ternak.update')
                        <a href="{{ route('produksi-ternak.edit', $produksiTernak->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
