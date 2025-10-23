@extends('layouts.master')

@section('title', 'Tambah Data - SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-perdagangan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Tanggal *</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <h5 class="bg-warning p-2">Sub-Sektor Perdagangan Besar</h5>
            <div class="row">
                <div class="col-md-6">
                    <label>Jumlah jenis perdagangan besar (Jenis)</label>
                    <input type="number" name="jumlah_jenis_perdagangan_besar" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Total nilai transaksi (Rp)</label>
                    <input type="number" name="total_nilai_transaksi_besar" class="form-control">
                </div>
                <div class="col-md-6">
                    {{-- Nama field diperbaiki --}}
                    <label>Total nilai aset perdagangan yang ada (Rp)</label>
                    <input type="number" name="total_nilai_aset_perdagangan_besar" class="form-control"> 
                </div>
                <div class="col-md-6">
                    <label>Total biaya yang dikeluarkan (Rp)</label>
                    <input type="number" name="total_biaya_yang_dikeluarkan_besar" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Total biaya antara lainnya (Rp)</label>
                    <input type="number" name="biaya_antara_lainnya_besar" class="form-control">
                </div>
            </div>

            <h5 class="bg-warning p-2 mt-3">Sub-Sektor Perdagangan Kecil</h5>
            <div class="row">
                <div class="col-md-6">
                    <label>Jumlah total jenis perdagangan eceran (Jenis)</label>
                    <input type="number" name="jumlah_jenis_perdagangan_kecil" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Total nilai transaksi (Rp)</label>
                    <input type="number" name="total_nilai_transaksi_kecil" class="form-control">
                </div>
                <div class="col-md-6">
                    {{-- Nama field diperbaiki --}}
                    <label>Total nilai biaya yang dikeluarkan (Rp)</label>
                    <input type="number" name="total_biaya_yang_dikeluarkan_kecil" class="form-control"> 
                </div>
                <div class="col-md-6">
                    {{-- Nama field diperbaiki --}}
                    <label>Total nilai aset perdagangan eceran (Rp)</label>
                    <input type="number" name="total_nilai_aset_perdagangan_kecil" class="form-control"> 
                </div>
            </div>

            <h5 class="bg-warning p-2 mt-3">Sub-Sektor Hotel</h5>
            <div class="row">
                <div class="col-md-6">
                    {{-- Nama field diperbaiki --}}
                    <label>Jumlah total penginapan (Jenis)</label>
                    <input type="number" name="jumlah_penginapan_dan_akomodasi" class="form-control"> 
                </div>
                <div class="col-md-6">
                    <label>Jumlah total pendapatan (Rp)</label>
                    <input type="number" name="total_pendapatan_hotel" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Jumlah total biaya pemeliharaan (Rp)</label>
                    <input type="number" name="total_biaya_pemeliharaan" class="form-control">
                </div>
                <div class="col-md-6">
                    {{-- Nama field diperbaiki --}}
                    <label>Jumlah biaya antara lainnya (Rp)</label>
                    <input type="number" name="biaya_antara_hotel" class="form-control"> 
                </div>
                <div class="col-md-6">
                    <label>Jumlah total pendapatan yang diperoleh (Rp)</label>
                    <input type="number" name="pendapatan_diperoleh_hotel" class="form-control">
                </div>
            </div>

            <h5 class="bg-warning p-2 mt-3">Sub-Sektor Restoran</h5>
            <div class="row">
                <div class="col-md-6">
                    <label>Jumlah tempat penyediaan konsumsi (Unit)</label>
                    <input type="number" name="jumlah_tempat_konsumsi" class="form-control">
                </div>
                <div class="col-md-6">
                    {{-- Nama field diperbaiki --}}
                    <label>Biaya konsumsi yang dikeluarkan (Rp)</label>
                    <input type="number" name="biaya_konsumsi_dikeluarkan" class="form-control"> 
                </div>
                <div class="col-md-6">
                    {{-- Nama field diperbaiki --}}
                    <label>Biaya antara lainnya (Rp)</label>
                    <input type="number" name="biaya_antara_restoran" class="form-control"> 
                </div>
                <div class="col-md-6">
                    {{-- Nama field diperbaiki --}}
                    <label>Jumlah total pendapatan yang diperoleh (Rp)</label>
                    <input type="number" name="pendapatan_diperoleh_restoran" class="form-control"> 
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection