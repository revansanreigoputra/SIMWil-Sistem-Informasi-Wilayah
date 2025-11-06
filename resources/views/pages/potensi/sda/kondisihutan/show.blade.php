@extends('layouts.master')

@section('title', 'Detail Data Kondisi Hutan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-tree me-2"></i>
                Detail Data Kondisi Hutan
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $kondisihutan->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $kondisihutan->desa->nama_desa }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Hutan</label>
                        <p class="form-control-plaintext">{{ $kondisihutan->jenisHutan->nama }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <h6 class="fw-bold text-primary mt-4 mb-3">Data Kondisi</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kondisi Baik</label>
                        <p class="form-control-plaintext">{{ number_format($kondisihutan->kondisi_baik, 2, ',', '.') }} ha</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kondisi Buruk</label>
                        <p class="form-control-plaintext">{{ number_format($kondisihutan->kondisi_buruk, 2, ',', '.') }} ha</p>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Luas Hutan</label>
                        <p class="form-control-plaintext">{{ number_format($kondisihutan->jumlah_luas_hutan, 2, ',', '.') }} ha</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route('kondisihutan.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can('kondisihutan.update')
                        <a href="{{ route('kondisihutan.edit', $kondisihutan->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
