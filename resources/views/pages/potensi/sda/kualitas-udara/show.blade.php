@extends('layouts.master')

@section('title', 'Detail Data Kualitas Udara')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-wind me-2"></i>
                Detail Data Kualitas Udara
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $kualitasUdara->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $kualitasUdara->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Sumber Pencemaran</label>
                        <p class="form-control-plaintext">{{ $kualitasUdara->sumberPencemaran->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Lokasi Sumber Pencemaran</label>
                        <p class="form-control-plaintext">{{ number_format($kualitasUdara->jumlah_lokasi_sumber_pencemaran, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Polutan</label>
                        <p class="form-control-plaintext">{{ $kualitasUdara->jenis_polutan }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Efek Terhadap Kesehatan</label>
                        <p class="form-control-plaintext">{{ $kualitasUdara->efek_terhadap_kesehatan }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kepemilikan Pemda</label>
                        <p class="form-control-plaintext">{{ $kualitasUdara->kepemilikan_pemda }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kepemilikan Swasta</label>
                        <p class="form-control-plaintext">{{ $kualitasUdara->kepemilikan_swasta }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kepemilikan Perorangan</label>
                        <p class="form-control-plaintext">{{ $kualitasUdara->kepemilikan_perorangan }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('kualitas-udara.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('kualitas-udara.update')
                        <a href="{{ route('kualitas-udara.edit', $kualitasUdara->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
