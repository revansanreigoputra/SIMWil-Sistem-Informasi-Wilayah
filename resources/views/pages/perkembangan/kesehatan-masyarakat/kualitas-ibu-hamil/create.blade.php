@extends('layouts.master')

@section('title', 'Tambah Data Kualitas Ibu Hamil')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_ibu_hamil">Jumlah Ibu Hamil</label>
                    <input type="number" name="jumlah_ibu_hamil" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="total_pemeriksaan">Total Pemeriksaan</label>
                    <input type="number" name="total_pemeriksaan" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_melahirkan">Jumlah Melahirkan</label>
                    <input type="number" name="jumlah_melahirkan" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_kematian_ibu">Jumlah Kematian Ibu</label>
                    <input type="number" name="jumlah_kematian_ibu" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_ibu_nifas_hidup">Jumlah Ibu Nifas Hidup</label>
                    <input type="number" name="jumlah_ibu_nifas_hidup" class="form-control" required>
                </div>

                {{-- Kolom tambahan --}}
                <div class="col-md-6 mb-3">
                    <label for="periksa_posyandu">Periksa di Posyandu</label>
                    <input type="number" name="periksa_posyandu" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_puskesmas">Periksa di Puskesmas</label>
                    <input type="number" name="periksa_puskesmas" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_rumah_sakit">Periksa di Rumah Sakit</label>
                    <input type="number" name="periksa_rumah_sakit" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_dokter_praktek">Periksa di Dokter Praktek</label>
                    <input type="number" name="periksa_dokter_praktek" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_bidan_praktek">Periksa di Bidan Praktek</label>
                    <input type="number" name="periksa_bidan_praktek" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_dukun_terlatih">Periksa di Dukun Terlatih</label>
                    <input type="number" name="periksa_dukun_terlatih" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_ibu_nifas">Jumlah Ibu Nifas</label>
                    <input type="number" name="jumlah_ibu_nifas" class="form-control" required>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
