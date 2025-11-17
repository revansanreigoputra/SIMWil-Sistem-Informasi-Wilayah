@extends('layouts.master')

@section('title', 'Detail - SEKTOR BANGUNAN/KONSTRUKSI')

@section('content')
<div class="card">
    <div class="card-header bg-info text-white fw-bold">
        DETAIL DATA SEKTOR BANGUNAN/KONSTRUKSI
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Desa:</strong> {{ $bangunan->desa->nama_desa ?? '-' }}
        </div>
        <div class="mb-3">
            <strong>Tanggal:</strong> {{ $bangunan->tanggal }}
        </div>
        <div class="mb-3">
            <strong>Jumlah Bangunan Tahun Ini (Unit):</strong> {{ $bangunan->jumlah_bangunan_tahun_ini }}
        </div>
        <div class="mb-3">
            <strong>Biaya Pemeliharaan (Rp):</strong> {{ number_format($bangunan->biaya_pemeliharaan, 0, ',', '.') }}
        </div>
        <div class="mb-3">
            <strong>Total Nilai Bangunan (Rp):</strong> {{ number_format($bangunan->total_nilai_bangunan, 0, ',', '.') }}
        </div>
        <div class="mb-3">
            <strong>Biaya Antara Lainnya (Rp):</strong> {{ number_format($bangunan->biaya_antara_lainnya, 0, ',', '.') }}
        </div>

        <a href="{{ route('perkembangan.produk-domestik.sektor-bangunan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
