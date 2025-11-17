@extends('layouts.master')

@section('title', 'Detail Data Hasil Produksi Hutan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-tree me-2"></i>
                Detail Data Hasil Produksi Hutan
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->desa->nama_desa }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Komoditas</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->komoditas->nama }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Data Produksi</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hasil Produksi</label>
                        <p class="form-control-plaintext">{{ number_format($hasilhutan->hasil_produksi, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Satuan</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->satuan->nama }}</p>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mt-4 mb-3">Pemasaran Hasil</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Langsung ke Konsumen</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->dijual_langsung_ke_konsumen }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual ke Pasar</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->dijual_ke_pasar }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui KUD</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->dijual_melalui_kud }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Tengkulak</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->dijual_melalui_tengkulak }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual Melalui Pengecer</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->dijual_melalui_pengecer }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Dijual ke Lumbung Desa</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->dijual_ke_lumbung_desa_kelurahan }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tidak Dijual</label>
                        <p class="form-control-plaintext">{{ $hasilhutan->tidak_dijual }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('hasilhutan.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('hasilhutan.update')
                        <a href="{{ route('hasilhutan.edit', $hasilhutan->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
