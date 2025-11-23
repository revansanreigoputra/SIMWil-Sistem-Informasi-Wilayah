@extends('layouts.master')

@section('title', 'Detail Data Sumber Air Bersih')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-water me-2"></i>
                Detail Data Sumber Air Bersih
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $pSumberAirBersih->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Sumber Air Bersih</label>
                        <p class="form-control-plaintext">{{ $pSumberAirBersih->sumberAirBersih->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah</label>
                        <p class="form-control-plaintext">{{ $pSumberAirBersih->jumlah }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pemanfaat</label>
                        <p class="form-control-plaintext">{{ $pSumberAirBersih->pemanfaat }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kondisi</label>
                        <p class="form-control-plaintext">{{ ucfirst($pSumberAirBersih->kondisi) }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('p-sumber-air-bersih.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('p-sumber-air-bersih.update')
                        <a href="{{ route('p-sumber-air-bersih.edit', $pSumberAirBersih->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
