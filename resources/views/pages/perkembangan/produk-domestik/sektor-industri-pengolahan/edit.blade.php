@extends('layouts.master')

@section('title', 'Edit Data Sektor Industri Pengolahan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.update', $sektorIndustriPengolahan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal"
                    value="{{ old('tanggal', $sektorIndustriPengolahan->tanggal) }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_industri" class="form-label">Jenis Industri</label>
                <input type="text" name="jenis_industri" id="jenis_industri"
                    value="{{ old('jenis_industri', $sektorIndustriPengolahan->jenis_industri) }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nilai_produksi" class="form-label">Total Nilai Produksi (Rp)</label>
                <input type="number" name="nilai_produksi" id="nilai_produksi"
                    value="{{ old('nilai_produksi', $sektorIndustriPengolahan->nilai_produksi) }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nilai_bahan_baku" class="form-label">Total Nilai Bahan Baku (Rp)</label>
                <input type="number" name="nilai_bahan_baku" id="nilai_bahan_baku"
                    value="{{ old('nilai_bahan_baku', $sektorIndustriPengolahan->nilai_bahan_baku) }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nilai_bahan_penolong" class="form-label">Total Nilai Bahan Penolong (Rp)</label>
                <input type="number" name="nilai_bahan_penolong" id="nilai_bahan_penolong"
                    value="{{ old('nilai_bahan_penolong', $sektorIndustriPengolahan->nilai_bahan_penolong) }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="biaya_antara" class="form-label">Total Biaya Antara (Rp)</label>
                <input type="number" name="biaya_antara" id="biaya_antara"
                    value="{{ old('biaya_antara', $sektorIndustriPengolahan->biaya_antara) }}"
                    class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_jenis_industri" class="form-label">Total Jumlah Jenis Industri (Jenis)</label>
                <input type="number" name="jumlah_jenis_industri" id="jumlah_jenis_industri"
                    value="{{ old('jumlah_jenis_industri', $sektorIndustriPengolahan->jumlah_jenis_industri) }}"
                    class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
