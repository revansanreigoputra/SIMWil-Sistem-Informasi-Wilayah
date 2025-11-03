@extends('layouts.master')

@section('title', 'Edit Data Kualitas Ibu Hamil')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">

                {{-- 1. Informasi Dasar --}}

                <div class="col-md-6 mb-3">
            </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                   <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}" required> 
                </div>

                {{-- 2. Data Ibu dan Pemeriksaan --}}
                <div class="col-md-6 mb-3">
                    <label for="jumlah_ibu_hamil" class="form-label">Jumlah Ibu Hamil</label>
                    <input type="number" name="jumlah_ibu_hamil" class="form-control" value="{{ $data->jumlah_ibu_hamil }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="total_pemeriksaan" class="form-label">Total Pemeriksaan</label>
                    <input type="number" name="total_pemeriksaan" class="form-control" value="{{ $data->total_pemeriksaan }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_melahirkan" class="form-label">Jumlah Melahirkan</label>
                    <input type="number" name="jumlah_melahirkan" class="form-control" value="{{ $data->jumlah_melahirkan }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_kematian_ibu" class="form-label">Jumlah Kematian Ibu</label>
                    <input type="number" name="jumlah_kematian_ibu" class="form-control" value="{{ $data->jumlah_kematian_ibu }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_ibu_nifas_hidup" class="form-label">Jumlah Ibu Nifas Hidup</label>
                    <input type="number" name="jumlah_ibu_nifas_hidup" class="form-control" value="{{ $data->jumlah_ibu_nifas_hidup }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_ibu_nifas" class="form-label">Jumlah Ibu Nifas</label>
                    <input type="number" name="jumlah_ibu_nifas" class="form-control" value="{{ $data->jumlah_ibu_nifas }}" required>
                </div>

                {{-- 3. Tempat Pemeriksaan (Periksa) --}}
                <div class="col-md-6 mb-3">
                    <label for="periksa_posyandu" class="form-label">Periksa di Posyandu</label>
                    <input type="number" name="periksa_posyandu" class="form-control" value="{{ $data->periksa_posyandu }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_puskesmas" class="form-label">Periksa di Puskesmas</label>
                    <input type="number" name="periksa_puskesmas" class="form-control" value="{{ $data->periksa_puskesmas }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_rumah_sakit" class="form-label">Periksa di Rumah Sakit</label>
                    <input type="number" name="periksa_rumah_sakit" class="form-control" value="{{ $data->periksa_rumah_sakit }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_dokter_praktek" class="form-label">Periksa di Dokter Praktek</label>
                    <input type="number" name="periksa_dokter_praktek" class="form-control" value="{{ $data->periksa_dokter_praktek }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_bidan_praktek" class="form-label">Periksa di Bidan Praktek</label>
                    <input type="number" name="periksa_bidan_praktek" class="form-control" value="{{ $data->periksa_bidan_praktek }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="periksa_dukun_terlatih" class="form-label">Periksa di Dukun Terlatih</label>
                    <input type="number" name="periksa_dukun_terlatih" class="form-control" value="{{ $data->periksa_dukun_terlatih }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection