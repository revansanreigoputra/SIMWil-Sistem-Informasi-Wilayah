@extends('layouts.master')

@section('title', 'Tambah Data - SEKTOR BANGUNAN/KONSTRUKSI')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Tambah Data Bangunan/Konstruksi</h5>
        <form action="{{ route('perkembangan.produk-domestik.sektor-bangunan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jumlah Bangunan (Unit)</label>
                <input type="number" name="jumlah_bangunan_tahun_ini" class="form-control">
            </div>

            <div class="mb-3">
                <label>Biaya Pemeliharaan (Rp)</label>
                <input type="number" name="biaya_pemeliharaan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Total Nilai Bangunan (Rp)</label>
                <input type="number" name="total_nilai_bangunan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Biaya Antara Lainnya (Rp)</label>
                <input type="number" name="biaya_antara_lainnya" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('perkembangan.produk-domestik.sektor-bangunan.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
