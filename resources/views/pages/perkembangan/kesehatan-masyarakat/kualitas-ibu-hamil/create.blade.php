@extends('layouts.master')

@section('title', 'Tambah Data Kualitas Ibu Hamil')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-4">Form Tambah Data Kualitas Ibu Hamil</h5>

        <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_ibu_hamil" class="form-label">Jumlah Ibu Hamil</label>
                    <input type="number" name="jumlah_ibu_hamil" id="jumlah_ibu_hamil" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="total_pemeriksaan" class="form-label">Total Pemeriksaan</label>
                    <input type="number" name="total_pemeriksaan" id="total_pemeriksaan" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_melahirkan" class="form-label">Jumlah Melahirkan</label>
                    <input type="number" name="jumlah_melahirkan" id="jumlah_melahirkan" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_kematian_ibu" class="form-label">Jumlah Kematian Ibu</label>
                    <input type="number" name="jumlah_kematian_ibu" id="jumlah_kematian_ibu" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_ibu_nifas_hidup" class="form-label">Jumlah Ibu Nifas Hidup</label>
                    <input type="number" name="jumlah_ibu_nifas_hidup" id="jumlah_ibu_nifas_hidup" class="form-control" required>
                </div>

                {{-- Kolom tambahan --}}
                <div class="col-md-6 mb-3">
                    <label for="periksa_posyandu" class="form-label">Periksa di Posyandu</label>
                    <input type="number" name="periksa_posyandu" id="periksa_posyandu" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="periksa_puskesmas" class="form-label">Periksa di Puskesmas</label>
                    <input type="number" name="periksa_puskesmas" id="periksa_puskesmas" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="periksa_rumah_sakit" class="form-label">Periksa di Rumah Sakit</label>
                    <input type="number" name="periksa_rumah_sakit" id="periksa_rumah_sakit" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="periksa_dokter_praktek" class="form-label">Periksa di Dokter Praktek</label>
                    <input type="number" name="periksa_dokter_praktek" id="periksa_dokter_praktek" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="periksa_bidan_praktek" class="form-label">Periksa di Bidan Praktek</label>
                    <input type="number" name="periksa_bidan_praktek" id="periksa_bidan_praktek" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="periksa_dukun_terlatih" class="form-label">Periksa di Dukun Terlatih</label>
                    <input type="number" name="periksa_dukun_terlatih" id="periksa_dukun_terlatih" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_ibu_nifas" class="form-label">Jumlah Ibu Nifas</label>
                    <input type="number" name="jumlah_ibu_nifas" id="jumlah_ibu_nifas" class="form-control" required>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
