@extends('layouts.master')

@section('title', 'Edit Data - SEKTOR BANGUNAN/KONSTRUKSI')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Edit Data Bangunan/Konstruksi</h5>
       <form action="{{ route('perkembangan.produk-domestik.sektor-bangunan.update', $sektorBangunan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ $sektorBangunan->tanggal }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Jumlah Bangunan Tahun Ini</label>
        <input type="number" name="jumlah_bangunan_tahun_ini" value="{{ $sektorBangunan->jumlah_bangunan_tahun_ini }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Biaya Pemeliharaan</label>
        <input type="number" name="biaya_pemeliharaan" value="{{ $sektorBangunan->biaya_pemeliharaan }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Total Nilai Bangunan</label>
        <input type="number" name="total_nilai_bangunan" value="{{ $sektorBangunan->total_nilai_bangunan }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Biaya Antara Lainnya</label>
        <input type="number" name="biaya_antara_lainnya" value="{{ $sektorBangunan->biaya_antara_lainnya }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
    </div>
</div>
@endsection
