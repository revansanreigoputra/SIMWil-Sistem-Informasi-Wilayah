@extends('layouts.master')

@section('title', 'Detail Data Jenis dan Produksi Ikan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-fish me-2"></i>
                Detail Data Jenis dan Produksi Ikan
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Ikan</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->namaIkan->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hasil Produksi</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->hasil_produksi }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga Jual</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->harga_jual }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nilai Produksi</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->nilai_produksi }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nilai Bahan Baku</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->nilai_bahan_baku }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nilai Bahan Penolong</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->nilai_bahan_penolong }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Biaya Antara Yang Dihabiskan</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->biaya_antara_yang_dihabiskan }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Saldo Produksi</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->saldo_produksi }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Jenis Usaha Perikanan</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->jumlah_jenis_usaha_perikanan }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Langsung Ke Konsumen</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->dijual_langsung_ke_konsumen }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Langsung Ke Pasar</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->dijual_langsung_ke_pasar }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui KUD</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->dijual_melalui_kud }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Tengkulak</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->dijual_melalui_tengkulak }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Pengecer</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->dijual_melalui_pengecer }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Ke Lumbung Desa/Kelurahan</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->dijual_ke_lumbung_desa_kelurahan }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tidak Dijual</label>
                        <p class="form-control-plaintext">{{ $pNamaIkan->tidak_dijual }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('p-nama-ikan.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('p-nama-ikan.update')
                        <a href="{{ route('p-nama-ikan.edit', $pNamaIkan->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
