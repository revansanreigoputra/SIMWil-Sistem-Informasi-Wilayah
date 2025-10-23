@extends('layouts.master')

@section('title', 'Edit - Sektor Perdagangan, Hotel, dan Restoran')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Data - Sektor Perdagangan, Hotel, dan Restoran</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-perdagangan.update', $sektorPerdagangan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="tanggal">Tanggal Input</label>
                <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal', $sektorPerdagangan->tanggal) }}" required>
            </div>

            <hr>
            <h5 class="mt-4">Perdagangan Besar</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Jumlah Jenis Perdagangan Besar</label>
                    <input type="number" name="jumlah_jenis_perdagangan_besar" value="{{ old('jumlah_jenis_perdagangan_besar', $sektorPerdagangan->jumlah_jenis_perdagangan_besar) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Total Nilai Transaksi Besar</label>
                    <input type="number" name="total_nilai_transaksi_besar" value="{{ old('total_nilai_transaksi_besar', $sektorPerdagangan->total_nilai_transaksi_besar) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    {{-- Nama field diperbaiki --}}
                    <label>Total Nilai Aset Perdagangan</label>
                    <input type="number" name="total_nilai_aset_perdagangan_besar" value="{{ old('total_nilai_aset_perdagangan_besar', $sektorPerdagangan->total_nilai_aset_perdagangan_besar) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Total Biaya Yang Dikeluarkan Besar</label>
                    <input type="number" name="total_biaya_yang_dikeluarkan_besar" value="{{ old('total_biaya_yang_dikeluarkan_besar', $sektorPerdagangan->total_biaya_yang_dikeluarkan_besar) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Biaya Lainnya (Besar)</label>
                    <input type="number" name="biaya_antara_lainnya_besar" value="{{ old('biaya_antara_lainnya_besar', $sektorPerdagangan->biaya_antara_lainnya_besar) }}" class="form-control">
                </div>
            </div>

            <hr>
            <h5 class="mt-4">Perdagangan Kecil</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Jumlah Jenis Perdagangan Kecil</label>
                    <input type="number" name="jumlah_jenis_perdagangan_kecil" value="{{ old('jumlah_jenis_perdagangan_kecil', $sektorPerdagangan->jumlah_jenis_perdagangan_kecil) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Total Nilai Transaksi Kecil</label>
                    <input type="number" name="total_nilai_transaksi_kecil" value="{{ old('total_nilai_transaksi_kecil', $sektorPerdagangan->total_nilai_transaksi_kecil) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    {{-- Nama field diperbaiki --}}
                    <label>Total Biaya Dikeluarkan Kecil</label>
                    <input type="number" name="total_biaya_yang_dikeluarkan_kecil" value="{{ old('total_biaya_yang_dikeluarkan_kecil', $sektorPerdagangan->total_biaya_yang_dikeluarkan_kecil) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    {{-- Nama field diperbaiki --}}
                    <label>Total Nilai Aset Kecil</label>
                    <input type="number" name="total_nilai_aset_perdagangan_kecil" value="{{ old('total_nilai_aset_perdagangan_kecil', $sektorPerdagangan->total_nilai_aset_perdagangan_kecil) }}" class="form-control">
                </div>
            </div>

            <hr>
            <h5 class="mt-4">Hotel</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    {{-- Nama field diperbaiki --}}
                    <label>Jumlah Penginapan</label>
                    <input type="number" name="jumlah_penginapan_dan_akomodasi" value="{{ old('jumlah_penginapan_dan_akomodasi', $sektorPerdagangan->jumlah_penginapan_dan_akomodasi) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Total Pendapatan Hotel</label>
                    <input type="number" name="total_pendapatan_hotel" value="{{ old('total_pendapatan_hotel', $sektorPerdagangan->total_pendapatan_hotel) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Total Biaya Pemeliharaan</label>
                    <input type="number" name="total_biaya_pemeliharaan" value="{{ old('total_biaya_pemeliharaan', $sektorPerdagangan->total_biaya_pemeliharaan) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    {{-- Nama field diperbaiki --}}
                    <label>Biaya Lainnya (Hotel)</label>
                    <input type="number" name="biaya_antara_hotel" value="{{ old('biaya_antara_hotel', $sektorPerdagangan->biaya_antara_hotel) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Pendapatan Diperoleh Hotel</label>
                    <input type="number" name="pendapatan_diperoleh_hotel" value="{{ old('pendapatan_diperoleh_hotel', $sektorPerdagangan->pendapatan_diperoleh_hotel) }}" class="form-control">
                </div>
            </div>

            <hr>
            <h5 class="mt-4">Restoran</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Jumlah Tempat Konsumsi</label>
                    <input type="number" name="jumlah_tempat_konsumsi" value="{{ old('jumlah_tempat_konsumsi', $sektorPerdagangan->jumlah_tempat_konsumsi) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    {{-- Nama field diperbaiki --}}
                    <label>Biaya Konsumsi</label>
                    <input type="number" name="biaya_konsumsi_dikeluarkan" value="{{ old('biaya_konsumsi_dikeluarkan', $sektorPerdagangan->biaya_konsumsi_dikeluarkan) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    {{-- Nama field diperbaiki --}}
                    <label>Biaya Lainnya (Restoran)</label>
                    <input type="number" name="biaya_antara_restoran" value="{{ old('biaya_antara_restoran', $sektorPerdagangan->biaya_antara_restoran) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    {{-- Nama field diperbaiki --}}
                    <label>Pendapatan Diperoleh Restoran</label>
                    <input type="number" name="pendapatan_diperoleh_restoran" value="{{ old('pendapatan_diperoleh_restoran', $sektorPerdagangan->pendapatan_diperoleh_restoran) }}" class="form-control">
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Perbarui Data</button>
            </div>
        </form>
    </div>
</div>
@endsection