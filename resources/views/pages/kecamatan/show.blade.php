@extends('layouts.master')

@section('title', 'Detail Kecamatan')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-geo-alt-fill me-2"></i> Informasi Kecamatan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-3 rounded border bg-light">
                                <small class="text-muted d-block">Nama Kecamatan</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $kecamatan->nama_kecamatan }}</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded border bg-light">
                                <small class="text-muted d-block">Jumlah Desa</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $kecamatan->desas->count() }}</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded border bg-light">
                                <small class="text-muted d-block">Dibuat Pada</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">
                                    {{ $kecamatan->created_at->format('d F Y H:i') }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($kecamatan->desas->count() > 0)
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-building-fill me-2"></i> Daftar Desa
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 80px;">No</th>
                                        <th>Nama Desa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kecamatan->desas as $desa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="fw-medium">{{ $desa->nama_desa }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
   <div class="mt-4 d-flex justify-content-end gap-2">
        <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Kembali
        </a>
    </div>
@endsection
