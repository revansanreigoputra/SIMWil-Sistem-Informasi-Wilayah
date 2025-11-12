@extends('layouts.master')

@section('title', 'Detail Desa')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-house-door-fill me-2"></i> Informasi Desa
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-3 border rounded bg-light">
                                <small class="text-muted">Kode PUM</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->kode_pum }}</h4>
                            </div>

                            <div class="p-3 border rounded bg-light mt-3">
                                <small class="text-muted">Nama Desa</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->nama_desa }}</h4>
                            </div>

                            <div class="p-3 border rounded bg-light mt-3">
                                <small class="text-muted">Kecamatan</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->kecamatan->nama_kecamatan ?? '-' }}</h4>
                            </div>

                            <div class="p-3 border rounded bg-light mt-3">
                                <small class="text-muted">Status</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->status }}</h4>
                            </div>

                            <div class="p-3 border rounded bg-light mt-3">
                                <small class="text-muted">Tipologi</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->tipologi }}</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded bg-light">
                                <small class="text-muted">Kelurahan Terluar</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->kelurahan_terluar ?? '-' }}</h4>
                            </div>

                            <div class="p-3 border rounded bg-light mt-3">
                                <small class="text-muted">Luas</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->luas ?? '-' }}</h4>
                            </div>

                            <div class="p-3 border rounded bg-light mt-3">
                                <small class="text-muted">Bujur</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->bujur ?? '-' }}</h4>
                            </div>

                            <div class="p-3 border rounded bg-light mt-3">
                                <small class="text-muted">Lintang</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->lintang ?? '-' }}</h4>
                            </div>

                            <div class="p-3 border rounded bg-light mt-3">
                                <small class="text-muted">Ketinggian</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->ketinggian ?? '-' }}</h4>
                            </div>

                            <div class="p-3 border rounded bg-light mt-3">
                                <small class="text-muted">Dibuat Pada</small>
                                <h4 class="fw-semibold mt-1 mb-0 text-dark">{{ $desa->created_at->format('d F Y H:i') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($desa->perangkatDesas->count() > 0)
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-people-fill me-2"></i> Daftar Perangkat Desa
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 80px;">No</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($desa->perangkatDesas as $perangkat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="fw-medium">{{ $perangkat->nama }}</td>
                                            <td>{{ $perangkat->jabatan->nama_jabatan ?? '-' }}</td>
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
        <a href="{{ route('desa.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Kembali
        </a>
    </div>
@endsection