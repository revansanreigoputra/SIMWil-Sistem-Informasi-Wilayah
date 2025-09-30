@extends('layouts.master')

@section('title', 'Edit Data Sektor Industri Pengolahan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.update', $sektor->id) }}" method="POST">
            @method('PUT')
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $sektor->tanggal }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jenis_industri" class="form-label">Jenis Industri</label>
                <input type="text" name="jenis_industri" value="{{ $sektor->jenis_industri }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nilai_produksi" class="form-label">Total nilai produksi (Rp)</label>
                <input type="number" name="nilai_produksi" value="{{ $sektor->nilai_produksi }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nilai_bahan_baku" class="form-label">Total nilai bahan baku (Rp)</label>
                <input type="number" name="nilai_bahan_baku" value="{{ $sektor->nilai_bahan_baku }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nilai_bahan_penolong" class="form-label">Total nilai bahan penolong (Rp)</label>
                <input type="number" name="nilai_bahan_penolong" value="{{ $sektor->nilai_bahan_penolong }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="biaya_antara" class="form-label">Total biaya antara (Rp)</label>
                <input type="number" name="biaya_antara" value="{{ $sektor->biaya_antara }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_jenis_industri" class="form-label">Total jumlah jenis industri (Jenis)</label>
                <input type="number" name="jumlah_jenis_industri" value="{{ $sektor->jumlah_jenis_industri }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
