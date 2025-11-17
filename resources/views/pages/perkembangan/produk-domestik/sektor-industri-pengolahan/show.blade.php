@extends('layouts.master')

@section('title', 'Detail - Sektor Industri Pengolahan')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow border-0 my-4">
        <div class="card-header bg-primary text-white fw-bold d-flex justify-content-between align-items-center">
            <span><i class="bi bi-gear-fill me-2"></i> DETAIL SEKTOR INDUSTRI PENGOLAHAN</span>
            <a href="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6 mb-2">
                    <strong>Desa:</strong><br>
                    <span>{{ $sektor->desa->nama_desa ?? '-' }}</span>
                </div>
                <div class="col-md-6 mb-2">
                    <strong>Tanggal:</strong><br>
                    <span>{{ \Carbon\Carbon::parse($sektor->tanggal)->translatedFormat('d F Y') }}</span>
                </div>
            </div>

            <hr>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Jenis Industri</strong><br>
                        <span>{{ $sektor->jenis_industri }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Total Nilai Produksi Tahun Ini (Rp)</strong><br>
                        <span>{{ number_format($sektor->nilai_produksi, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Total Nilai Bahan Baku (Rp)</strong><br>
                        <span>{{ number_format($sektor->nilai_bahan_baku, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Total Nilai Bahan Penolong (Rp)</strong><br>
                        <span>{{ number_format($sektor->nilai_bahan_penolong, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Total Biaya Antara (Rp)</strong><br>
                        <span>{{ number_format($sektor->biaya_antara, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 border rounded bg-light">
                        <strong>Total Jumlah Jenis Industri (Jenis)</strong><br>
                        <span>{{ number_format($sektor->jumlah_jenis_industri, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end gap-2">
            <a href="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
            @can('sektor-industri-pengolahan.update')
                <a href="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.edit', $sektor->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
            @endcan
        </div>
    </div>
</div>
@endsection
