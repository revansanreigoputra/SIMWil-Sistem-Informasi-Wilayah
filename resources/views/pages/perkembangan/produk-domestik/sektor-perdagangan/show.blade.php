@extends('layouts.master')

@section('title', 'Detail - SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN')

@section('content')
<div class="card">
    <div class="card-body">
        <h5>Tanggal: {{ $data->tanggal }}</h5>
        <hr>

        <h5 class="bg-warning p-2">Sub-Sektor Perdagangan Besar</h5>
        <ul>
            <li>Jumlah jenis: {{ $data->jumlah_jenis_perdagangan_besar }}</li>
            <li>Total transaksi: Rp{{ number_format($data->total_nilai_transaksi_besar,0,',','.') }}</li>
            {{-- Nama field diperbaiki --}}
            <li>Total aset: Rp{{ number_format($data->total_nilai_aset_perdagangan_besar,0,',','.') }}</li> 
            <li>Total biaya dikeluarkan: Rp{{ number_format($data->total_biaya_yang_dikeluarkan_besar,0,',','.') }}</li>
            <li>Biaya antara lainnya: Rp{{ number_format($data->biaya_antara_lainnya_besar,0,',','.') }}</li>
        </ul>

        <h5 class="bg-warning p-2">Sub-Sektor Perdagangan Kecil</h5>
        <ul>
            <li>Jumlah jenis: {{ $data->jumlah_jenis_perdagangan_kecil }}</li>
            <li>Total transaksi: Rp{{ number_format($data->total_nilai_transaksi_kecil,0,',','.') }}</li>
            {{-- Nama field diperbaiki --}}
            <li>Total biaya dikeluarkan: Rp{{ number_format($data->total_biaya_yang_dikeluarkan_kecil,0,',','.') }}</li> 
            {{-- Nama field diperbaiki --}}
            <li>Total aset: Rp{{ number_format($data->total_nilai_aset_perdagangan_kecil,0,',','.') }}</li> 
        </ul>

        <h5 class="bg-warning p-2">Sub-Sektor Hotel</h5>
        <ul>
            {{-- Nama field diperbaiki --}}
            <li>Jumlah penginapan: {{ $data->jumlah_penginapan_dan_akomodasi }}</li> 
            <li>Total pendapatan: Rp{{ number_format($data->total_pendapatan_hotel,0,',','.') }}</li>
            <li>Total biaya pemeliharaan: Rp{{ number_format($data->total_biaya_pemeliharaan,0,',','.') }}</li>
            {{-- Nama field diperbaiki --}}
            <li>Biaya antara lainnya: Rp{{ number_format($data->biaya_antara_hotel,0,',','.') }}</li> 
            <li>Pendapatan diperoleh: Rp{{ number_format($data->pendapatan_diperoleh_hotel,0,',','.') }}</li>
        </ul>

        <h5 class="bg-warning p-2">Sub-Sektor Restoran</h5>
        <ul>
            <li>Tempat konsumsi: {{ $data->jumlah_tempat_konsumsi }}</li>
            {{-- Nama field diperbaiki --}}
            <li>Biaya konsumsi: Rp{{ number_format($data->biaya_konsumsi_dikeluarkan,0,',','.') }}</li> 
            {{-- Nama field diperbaiki --}}
            <li>Biaya antara lainnya: Rp{{ number_format($data->biaya_antara_restoran,0,',','.') }}</li> 
            {{-- Nama field diperbaiki --}}
            <li>Pendapatan diperoleh: Rp{{ number_format($data->pendapatan_diperoleh_restoran,0,',','.') }}</li> 
        </ul>

        <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection