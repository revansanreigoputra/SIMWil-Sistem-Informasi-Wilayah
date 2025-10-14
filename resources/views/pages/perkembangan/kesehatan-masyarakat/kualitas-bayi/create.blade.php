@extends('layouts.master')

@section('title', 'Tambah Data Kualitas Bayi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Formulir Tambah Data Kualitas Bayi</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_keguguran_kandungan" class="form-label">Jumlah Keguguran Kandungan</label>
                    <input type="number" name="jumlah_keguguran_kandungan" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_bayi_lahir" class="form-label">Jumlah Bayi Lahir</label>
                    <input type="number" name="jumlah_bayi_lahir" class="form-control" value="0" required>
                </div>
                  <div class="col-md-6 mb-3">
                    <label for="jumlah_bayi_lahir_mati" class="form-label">Jumlah bayi lahir mati</label>
                    <input type="number" name="jumlah_bayi_lahir" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_bayi_lahir_hidup" class="form-label">Jumlah Bayi Lahir Hidup</label>
                    <input type="number" name="jumlah_bayi_lahir_hidup" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_bayi_mati_0_1_bulan" class="form-label">Jumlah Bayi Mati (0-1 Bulan)</label>
                    <input type="number" name="jumlah_bayi_mati_0_1_bulan" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_bayi_mati_1_12_bulan" class="form-label">Jumlah Bayi Mati (1-12 Bulan)</label>
                    <input type="number" name="jumlah_bayi_mati_1_12_bulan" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_bayi_lahir_berat_kurang_2_5_kg" class="form-label">Jml Bayi Lahir Berat < 2.5 kg</label>
                    <input type="number" name="jumlah_bayi_lahir_berat_kurang_2_5_kg" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_bayi_0_5_tahun_hidup_disabilitas" class="form-label">Jml Bayi 0-5 Thn Hidup Disabilitas</label>
                    <input type="number" name="jumlah_bayi_0_5_tahun_hidup_disabilitas" class="form-control" value="0" required>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection