@extends('layouts.master')

@section('title', 'Detail - SEKTOR PERTAMBANGAN DAN GALIAN')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white fw-bold">
            DETAIL SEKTOR PERTAMBANGAN DAN GALIAN
        </div>
        <div class="card-body">
            <div class="mb-3"><strong>Desa:</strong> {{ $pertambangan->desa->nama_desa ?? '-' }}</div>
            <div class="mb-3"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pertambangan->tanggal)->translatedFormat('d F Y') }}</div>

            <hr>

            <div class="mb-3"><strong>Total Nilai Produksi Tahun Ini (Rp):</strong> {{ number_format($pertambangan->total_nilai_produksi_tahun_ini, 0, ',', '.') }}</div>
            <div class="mb-3"><strong>Total Nilai Bahan Baku yang Digunakan (Rp):</strong> {{ number_format($pertambangan->total_nilai_bahan_baku_digunakan, 0, ',', '.') }}</div>
            <div class="mb-3"><strong>Total Nilai Bahan Penolong yang Digunakan (Rp):</strong> {{ number_format($pertambangan->total_nilai_bahan_penolong_digunakan, 0, ',', '.') }}</div>
            <div class="mb-3"><strong>Total Biaya Antara yang Dihabiskan (Rp):</strong> {{ number_format($pertambangan->total_biaya_antara_dihabiskan, 0, ',', '.') }}</div>
            <div class="mb-3"><strong>Jumlah Total Jenis Bahan Tambang dan Galian (Buah):</strong> {{ $pertambangan->jumlah_total_jenis_bahan_tambang_dan_galian }}</div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('perkembangan.produk-domestik.sektor-pertambangan.index') }}" class="btn btn-secondary">Kembali</a>
            @can('sektor-pertambangan.update')
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-pertambangan-{{ $pertambangan->id }}">Edit</button>
            @endcan
        </div>
    </div>
</div>

