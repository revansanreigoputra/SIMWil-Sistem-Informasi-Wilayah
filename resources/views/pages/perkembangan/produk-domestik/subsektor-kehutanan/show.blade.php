@extends('layouts.master')

@section('title', 'Detail - Subsektor Kehutanan')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow border-0 my-4">
        <div class="card-header bg-success text-white fw-bold d-flex justify-content-between align-items-center">
            <span><i class="bi bi-tree-fill me-2"></i> DETAIL SUBSEKTOR KEHUTANAN</span>
            <a href="{{ route('perkembangan.produk-domestik.subsektor-kehutanan.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6 mb-2">
                    <strong>Desa:</strong><br>
                    <span>{{ $kehutanan->desa->nama_desa ?? '-' }}</span>
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Tanggal:</strong><br>
                    <span>{{ \Carbon\Carbon::parse($kehutanan->tanggal)->translatedFormat('d F Y') }}</span>
                </div>
            </div>

            <hr>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Total Nilai Produksi Tahun Ini (Rp)</strong><br>
                        <span>{{ number_format($kehutanan->total_nilai_produksi_tahun_ini, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Total Nilai Bahan Baku yang Digunakan (Rp)</strong><br>
                        <span>{{ number_format($kehutanan->total_nilai_bahan_baku_digunakan, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Total Nilai Bahan Penolong yang Digunakan (Rp)</strong><br>
                        <span>{{ number_format($kehutanan->total_nilai_bahan_penolong_digunakan, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Total Biaya Antara yang Dihabiskan (Rp)</strong><br>
                        <span>{{ number_format($kehutanan->total_biaya_antara_dihabiskan, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end gap-2">
            <a href="{{ route('perkembangan.produk-domestik.subsektor-kehutanan.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
            @can('subsektor-kehutanan.update')
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-kehutanan-{{ $kehutanan->id }}">
                    <i class="bi bi-pencil-square"></i> Edit
                </button>
            @endcan
        </div>
    </div>
</div>
@endsection
