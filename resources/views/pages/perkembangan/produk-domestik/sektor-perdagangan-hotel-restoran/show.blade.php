@extends('layouts.master')

@section('title', 'Detail - SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN')

@section('content')
<div class="card">
    <div class="card-body">
        <h5><b>Desa:</b> {{ $data->desa->nama_desa ?? '-' }}</h5>
        <h6><b>Tanggal:</b> {{ $data->tanggal }}</h6>

        <hr>
        <h5 class="fw-bold text-primary">🟠 Sub-Sektor Perdagangan Besar</h5>
        <ul>
            <li>Jumlah Jenis: {{ $data->total_jenis_perdagangan_besar }}</li>
            <li>Total Nilai Transaksi: {{ $data->total_nilai_transaksi_besar }}</li>
            <li>Total Aset: {{ $data->total_aset_perdagangan_besar }}</li>
            <li>Total Biaya Dikeluarkan: {{ $data->total_biaya_dikeluarkan_besar }}</li>
            <li>Total Biaya Antara: {{ $data->total_biaya_antara_besar }}</li>
        </ul>

        <h5 class="fw-bold text-primary">🟠 Sub-Sektor Perdagangan Kecil</h5>
        <ul>
            <li>Jumlah Jenis: {{ $data->total_jenis_perdagangan_kecil }}</li>
            <li>Total Nilai Transaksi: {{ $data->total_nilai_transaksi_kecil }}</li>
            <li>Total Biaya Dikeluarkan: {{ $data->total_biaya_dikeluarkan_kecil }}</li>
            <li>Total Aset: {{ $data->total_aset_perdagangan_kecil }}</li>
        </ul>

        <h5 class="fw-bold text-primary">🟠 Sub-Sektor Hotel</h5>
        <ul>
            <li>Jumlah Penginapan: {{ $data->total_penginapan }}</li>
            <li>Total Pendapatan Hotel: {{ $data->total_pendapatan_hotel }}</li>
            <li>Total Biaya Pemeliharaan Hotel: {{ $data->total_biaya_pemeliharaan_hotel }}</li>
            <li>Total Biaya Antara Hotel: {{ $data->total_biaya_antara_hotel }}</li>
            <li>Total Pendapatan Diperoleh Hotel: {{ $data->total_pendapatan_diperoleh_hotel }}</li>
        </ul>

        <h5 class="fw-bold text-primary">🟠 Sub-Sektor Restoran</h5>
        <ul>
            <li>Total Tempat Konsumsi: {{ $data->total_tempat_konsumsi }}</li>
            <li>Biaya Konsumsi Dikeluarkan: {{ $data->biaya_konsumsi_dikeluarkan }}</li>
            <li>Biaya Lainnya Restoran: {{ $data->biaya_lainnya_restoran }}</li>
            <li>Total Pendapatan Restoran: {{ $data->total_pendapatan_restoran }}</li>
        </ul>

        <div class="text-end">
            <a href="{{ route('sektor-perdagangan-hotel-restoran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
