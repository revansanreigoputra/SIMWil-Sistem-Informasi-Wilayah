@extends('layouts.master')

@section('title', 'Detail Data Kualitas Air Minum')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-water me-2"></i>
                Detail Data Kualitas Air Minum
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $kualitasAirMinum->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Air Minum</label>
                        <p class="form-control-plaintext">{{ $kualitasAirMinum->jenisAirMinum->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Baik</label>
                        <p class="form-control-plaintext">{{ ucfirst($kualitasAirMinum->baik) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Berbau</label>
                        <p class="form-control-plaintext">{{ ucfirst($kualitasAirMinum->berbau) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Berwarna</label>
                        <p class="form-control-plaintext">{{ ucfirst($kualitasAirMinum->berwarna) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Berasa</label>
                        <p class="form-control-plaintext">{{ ucfirst($kualitasAirMinum->berasa) }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('kualitas-air-minum.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('kualitas-air-minum.update')
                        <a href="{{ route('kualitas-air-minum.edit', $kualitasAirMinum->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
