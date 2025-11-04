@extends('layouts.master')

@section('title', 'Tambah - SEKTOR PERDAGANGAN')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-4">Tambah Data Sektor Perdagangan</h5>

        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.store') }}" method="POST">
            @csrf

            <!-- Tanggal -->
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
            </div>

            <!-- Karyawan Perdagangan Hasil Bumi -->
            <div class="mb-3">
                <label class="form-label">Karyawan Perdagangan Hasil Bumi</label>
                <input type="number" name="karyawan_perdagangan_hasil_bumi" class="form-control" min="0" placeholder="Masukkan jumlah karyawan">
            </div>

            <!-- Pengusaha Perdagangan Hasil Bumi -->
            <div class="mb-3">
                <label class="form-label">Pengusaha Perdagangan Hasil Bumi</label>
                <input type="number" name="pengusaha_perdagangan_hasil_bumi" class="form-control" min="0" placeholder="Masukkan jumlah pengusaha">
            </div>

            <!-- Buruh Perdagangan Hasil Bumi -->
            <div class="mb-3">
                <label class="form-label">Buruh Perdagangan Hasil Bumi</label>
                <input type="number" name="buruh_perdagangan_hasil_bumi" class="form-control" min="0" placeholder="Masukkan jumlah buruh">
            </div>

            <!-- Jumlah Total -->
            <div class="mb-3">
                <label class="form-label">Jumlah Total</label>
                <input type="number" name="jumlah" class="form-control" min="0" placeholder="Masukkan total keseluruhan">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
