@extends('layouts.master')

@section('title', 'Detail Data Deposit dan Produksi Galian')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-gem me-2"></i>
                Detail Data Deposit Produksi Galian
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Bahan Galian</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->komoditasGalian->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->status }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hasil Produksi</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->hasil_produksi }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Langsung Ke Konsumen</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->dijual_langsung_ke_konsumen == 'ya' ? 'Ya' : 'Tidak' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui KUD</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->dijual_melalui_kud == 'ya' ? 'Ya' : 'Tidak' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Tengkulak</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->dijual_melalui_tengkulak == 'ya' ? 'Ya' : 'Tidak' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Pengecer</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->dijual_melalui_pengecer == 'ya' ? 'Ya' : 'Tidak' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Ke Perusahaan</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->dijual_ke_perusahaan == 'ya' ? 'Ya' : 'Tidak' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Ke Lumbung Desa/Kelurahan</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->dijual_ke_lumbung_desa_kelurahan == 'ya' ? 'Ya' : 'Tidak' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tidak Dijual</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->tidak_dijual == 'ya' ? 'Ya' : 'Tidak' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kepemilikan</label>
                        <p class="form-control-plaintext">{{ $depositProduksiGalian->kepemilikan }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('deposit-produksi-galian.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('deposit-produksi-galian.update')
                        <a href="{{ route('deposit-produksi-galian.edit', $depositProduksiGalian->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
