@extends('layouts.master')

@section('title', 'Detail Kualitas Bayi')

@section('action')
    <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.edit', $data->id) }}" class="btn btn-warning mb-3">
        <i class="fas fa-edit me-2"></i>
        Edit Data
    </a>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-eye me-2"></i>
                        <h4 class="card-title mb-0">Detail Data Kualitas Bayi</h4>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        Informasi Dasar
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label fw-semibold">Tanggal</label>
                                <p class="form-control-plaintext">{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-baby text-primary me-2"></i>
                        Rincian Data Bayi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Keguguran Kandungan</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_keguguran_kandungan) }} kasus</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Bayi Lahir</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_bayi_lahir) }} bayi</p>
                        </div>
                         <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Bayi Lahir mati</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_bayi_lahir_mati) }} bayi</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Bayi Lahir Hidup</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_bayi_lahir_hidup) }} bayi</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Bayi Mati (0-1 Bulan)</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_bayi_mati_0_1_bulan) }} bayi</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Bayi Mati (1-12 Bulan)</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_bayi_mati_1_12_bulan) }} bayi</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Bayi Lahir Berat Kurang Dari 2.5 kg</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_bayi_lahir_berat_kurang_2_5_kg) }} bayi</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Bayi 0-5 Tahun Hidup yang Disabilitas</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_bayi_0_5_tahun_hidup_disabilitas) }} bayi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
<style>
    .form-control-plaintext {
        padding-top: 0.375rem;
        padding-bottom: 0.375rem;
        margin-bottom: 0;
        line-height: 1.5;
        color: #495057;
        background-color: transparent;
        border: solid transparent;
        border-width: 1px 0;
    }
</style>
@endpush