@extends('layouts.master')

@section('title', 'Detail Data Sumber Air Panas')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-water me-2"></i>
                Detail Data Sumber Air Panas
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $pSumberAirPanas->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Sumber Air Panas</label>
                        <p class="form-control-plaintext">{{ $pSumberAirPanas->jenisSumberAirPanas->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Lokasi</label>
                        <p class="form-control-plaintext">{{ $pSumberAirPanas->jumlah_lokasi }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pemanfaatan</label>
                        <p class="form-control-plaintext">{{ implode(', ', json_decode($pSumberAirPanas->pemanfaatan, true) ?? []) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kepemilikan</label>
                        <p class="form-control-plaintext">{{ implode(', ', json_decode($pSumberAirPanas->kepemilikan, true) ?? []) }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('p-sumber-air-panas.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('p-sumber-air-panas.update')
                        <a href="{{ route('p-sumber-air-panas.edit', $pSumberAirPanas->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
