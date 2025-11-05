@extends('layouts.master')

@section('title', 'Detail Kualitas Ibu Hamil')

@section('action')
    <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.edit', $data->id) }}" class="btn btn-warning mb-3">
        <i class="fas fa-edit me-2"></i>
        Edit Data
    </a>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-eye me-2"></i>
                        <h4 class="card-title mb-0">Detail Data Kualitas Ibu Hamil</h4>
                    </div>
                </div>
            </div>

            <!-- Informasi Dasar -->
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

            <!-- Jumlah Ibu dan Pemeriksaan -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-female text-primary me-2"></i>
                        Data Ibu dan Pemeriksaan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Ibu Hamil</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_ibu_hamil) }} orang</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Total Pemeriksaan</label>
                            <p class="form-control-plaintext">{{ number_format($data->total_pemeriksaan) }} kali</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Melahirkan</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_melahirkan) }} orang</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Kematian Ibu</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_kematian_ibu) }} orang</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Ibu Nifas Hidup</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_ibu_nifas_hidup) }} orang</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jumlah Ibu Nifas</label>
                            <p class="form-control-plaintext">{{ number_format($data->jumlah_ibu_nifas) }} orang</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tempat Pemeriksaan -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-hospital-user text-primary me-2"></i>
                        Tempat Pemeriksaan
                    </h5>
                </div>
                <div class="card-body">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">jumlah pemeriksaan Posyandu</label>
            <p class="form-control-plaintext">
                {{ number_format($data->periksa_posyandu ?? 0) }} orang
            </p>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">jumlah pemeriksaan Puskesmas</label>
            <p class="form-control-plaintext">
                {{ number_format($data->periksa_puskesmas ?? 0) }} orang
            </p>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">jumlah pemeriksaan Rumah Sakit</label>
            <p class="form-control-plaintext">
                {{ number_format($data->periksa_rumah_sakit ?? 0) }} orang
            </p>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">jumlah pemeriksaan Dokter Praktek</label>
            <p class="form-control-plaintext">
                {{ number_format($data->periksa_dokter_praktek ?? 0) }} orang 
            </p>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">jumlah pemeriksaan Bidan Praktek</label>
            <p class="form-control-plaintext">
                {{ number_format($data->periksa_bidan_praktek ?? 0) }} orang
            </p>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label fw-semibold">jumlah pemeriksaan Dukun Terlatih</label>
            <p class="form-control-plaintext">
                {{ number_format($data->periksa_dukun_terlatih ?? 0) }} orang
            </p>
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
