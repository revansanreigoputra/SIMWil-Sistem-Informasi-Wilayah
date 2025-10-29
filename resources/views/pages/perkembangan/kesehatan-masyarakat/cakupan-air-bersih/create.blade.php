@extends('layouts.master')

@section('title', 'Tambah Data - CAKUPAN PEMENUHAN KEBUTUHAN AIR BERSIH')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>EDIT CAKUPAN PEMENUHAN KEBUTUHAN AIR BERSIH</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal *</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Inputan Angka (Jumlah Keluarga) --}}
            <div class="row mb-3">
                <label for="sumur_gali" class="col-sm-4 col-form-label">Jumlah keluarga menggunakan sumur gali</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('sumur_gali') is-invalid @enderror" id="sumur_gali" name="sumur_gali" value="{{ old('sumur_gali', 0) }}" min="0">
                    @error('sumur_gali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="pelanggan_pam" class="col-sm-4 col-form-label">Jumlah keluarga pelanggan PAM</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('pelanggan_pam') is-invalid @enderror" id="pelanggan_pam" name="pelanggan_pam" value="{{ old('pelanggan_pam', 0) }}" min="0">
                    @error('pelanggan_pam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="penampung_air_hujan" class="col-sm-4 col-form-label">Jumlah keluarga menggunakan Penampung Air Hujan</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('penampung_air_hujan') is-invalid @enderror" id="penampung_air_hujan" name="penampung_air_hujan" value="{{ old('penampung_air_hujan', 0) }}" min="0">
                    @error('penampung_air_hujan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="sumur_pompa" class="col-sm-4 col-form-label">Jumlah keluarga menggunakan sumur pompa</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('sumur_pompa') is-invalid @enderror" id="sumur_pompa" name="sumur_pompa" value="{{ old('sumur_pompa', 0) }}" min="0">
                    @error('sumur_pompa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="perpipaan_air_kran" class="col-sm-4 col-form-label">Jumlah keluarga menggunakan perpipaan air kran</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('perpipaan_air_kran') is-invalid @enderror" id="perpipaan_air_kran" name="perpipaan_air_kran" value="{{ old('perpipaan_air_kran', 0) }}" min="0">
                    @error('perpipaan_air_kran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="hidran_umum" class="col-sm-4 col-form-label">Jumlah keluarga menggunakan hidran umum</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('hidran_umum') is-invalid @enderror" id="hidran_umum" name="hidran_umum" value="{{ old('hidran_umum', 0) }}" min="0">
                    @error('hidran_umum')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="air_sungai" class="col-sm-4 col-form-label">Jumlah keluarga menggunakan air sungai</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('air_sungai') is-invalid @enderror" id="air_sungai" name="air_sungai" value="{{ old('air_sungai', 0) }}" min="0">
                    @error('air_sungai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="embung" class="col-sm-4 col-form-label">Jumlah keluarga menggunakan embung</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('embung') is-invalid @enderror" id="embung" name="embung" value="{{ old('embung', 0) }}" min="0">
                    @error('embung')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="mata_air" class="col-sm-4 col-form-label">Jumlah keluarga yang menggunakan mata air</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('mata_air') is-invalid @enderror" id="mata_air" name="mata_air" value="{{ old('mata_air', 0) }}" min="0">
                    @error('mata_air')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="tidak_akses_air_laut" class="col-sm-4 col-form-label">Jumlah keluarga yang tidak mendapat akses air minum dari air laut</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('tidak_akses_air_laut') is-invalid @enderror" id="tidak_akses_air_laut" name="tidak_akses_air_laut" value="{{ old('tidak_akses_air_laut', 0) }}" min="0">
                    @error('tidak_akses_air_laut')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="tidak_akses_sumber_lain" class="col-sm-4 col-form-label">Jumlah keluarga yang tidak mendapat akses air minum dari sumber di atas</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('tidak_akses_sumber_lain') is-invalid @enderror" id="tidak_akses_sumber_lain" name="tidak_akses_sumber_lain" value="{{ old('tidak_akses_sumber_lain', 0) }}" min="0">
                    @error('tidak_akses_sumber_lain')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="total_keluarga" class="col-sm-4 col-form-label">Total jumlah keluarga</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control @error('total_keluarga') is-invalid @enderror" id="total_keluarga" name="total_keluarga" value="{{ old('total_keluarga', 0) }}" min="0">
                    @error('total_keluarga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <p class="text-danger">* Field yang wajib diisi</p>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('perkembangan.kesehatan-masyarakat.cakupan-air-bersih.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection