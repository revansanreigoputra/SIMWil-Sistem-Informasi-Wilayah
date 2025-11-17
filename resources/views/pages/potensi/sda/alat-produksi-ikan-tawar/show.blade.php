@extends('layouts.master')

@section('title', 'Detail Data Alat Produksi Ikan Tawar')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-fish me-2"></i>
                Detail Data Alat Produksi Ikan Tawar
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $pAlatProduksiIkanTawar->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis dan Alat Produksi</label>
                        <p class="form-control-plaintext">{{ $pAlatProduksiIkanTawar->alatProduksiIkanTawar->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Alat / Luas</label>
                        <p class="form-control-plaintext">{{ $pAlatProduksiIkanTawar->jumlah_alat_luas }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hasil Produksi (Ton/Tahun)</label>
                        <p class="form-control-plaintext">{{ $pAlatProduksiIkanTawar->hasil_produksi }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('p-alat-produksi-ikan-tawar.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('p-alat-produksi-ikan-tawar.update')
                        <a href="{{ route('p-alat-produksi-ikan-tawar.edit', $pAlatProduksiIkanTawar->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
