@extends('layouts.master')

@section('title', 'Detail Energi Penerangan')

@section('action')
    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.edit', $energiPenerangan->id) }}" class="btn btn-warning mb-3">
        <i class="fas fa-edit me-2"></i>
        Edit Data
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-eye me-2"></i>
                            <h4 class="card-title mb-0">Detail Data Energi Penerangan</h4>
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
                                    <label class="form-label fw-semibold">Desa</label>
                                    <p class="form-control-plaintext">{{ $energiPenerangan->desa->nama_desa }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Tanggal</label>
                                    <p class="form-control-plaintext">{{ $energiPenerangan->tanggal->format('d-m-Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sumber Listrik -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-plug text-primary me-2"></i>
                            Sumber Listrik
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Listrik PLN</label>
                                    <p class="form-control-plaintext">{{ number_format($energiPenerangan->listrik_pln) }} unit</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Diesel Umum</label>
                                    <p class="form-control-plaintext">{{ number_format($energiPenerangan->diesel_umum) }} unit</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Genset Pribadi</label>
                                    <p class="form-control-plaintext">{{ number_format($energiPenerangan->genset_pribadi) }} unit</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Tanpa Penerangan</label>
                                    <p class="form-control-plaintext">{{ number_format($energiPenerangan->tanpa_penerangan) }} unit</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sumber Energi Tradisional -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-tree text-primary me-2"></i>
                            Sumber Energi Tradisional
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Lampu Minyak</label>
                                    <p class="form-control-plaintext">{{ number_format($energiPenerangan->lampu_minyak) }} unit</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Kayu Bakar</label>
                                    <p class="form-control-plaintext">{{ number_format($energiPenerangan->kayu_bakar) }} unit</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label fw-semibold">Batu Bara</label>
                                    <p class="form-control-plaintext">{{ number_format($energiPenerangan->batu_bara) }} unit</p>
                                </div>
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
