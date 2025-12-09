@extends('layouts.master')

@section('title', 'Detail Data Wisata')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-eye me-2"></i>
                Detail Data Wisata
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal</label>
                        <p class="form-control-plaintext">{{ $wisata->tanggal->format('d F Y') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $wisata->desa->nama_desa }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Area Wisata</label>
                        <p class="form-control-plaintext">{{ $wisata->areaWisata->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keberadaan</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-{{ $wisata->keberadaan == 'ada' ? 'success' : 'danger' }}">
                                {{ $wisata->keberadaan }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas (m²)</label>
                        <p class="form-control-plaintext">{{ number_format($wisata->luas_m2, 2, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tingkat Pemanfaatan</label>
                        <p class="form-control-plaintext">
                            <span class="badge bg-{{ $wisata->tingkat_pemanfaatan == 'aktif' ? 'info' : 'warning' }}">
                                {{ $wisata->tingkat_pemanfaatan }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="d-flex gap-2 mt-4">
                @can('wisata.update')
                    <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>
                        Edit
                    </a>
                @endcan
                <a href="{{ route('wisata.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
