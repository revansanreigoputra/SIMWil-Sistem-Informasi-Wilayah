@extends('layouts.master')

@section('title', 'Edit - PERILAKU HIDUP BERSIH DAN SEHAT')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $data->tanggal) }}" required>
                </div>
            </div>

            <h5 class="mt-4 mb-2">Kepemilikan WC</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label>Keluarga WC Sehat</label>
                    <input type="number" name="keluarga_wc_sehat" class="form-control" value="{{ old('keluarga_wc_sehat', $data->keluarga_wc_sehat) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Keluarga WC Tidak Standar</label>
                    <input type="number" name="keluarga_wc_tidak_standar" class="form-control" value="{{ old('keluarga_wc_tidak_standar', $data->keluarga_wc_tidak_standar) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Buang Air di Sungai</label>
                    <input type="number" name="keluarga_buang_air_sungai" class="form-control" value="{{ old('keluarga_buang_air_sungai', $data->keluarga_buang_air_sungai) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Fasilitas MCK Umum</label>
                    <input type="number" name="keluarga_mck_umum" class="form-control" value="{{ old('keluarga_mck_umum', $data->keluarga_mck_umum) }}">
                </div>
            </div>

            <h5 class="mt-4 mb-2">Frekuensi Makan Keluarga</h5>
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label>Makan 1x</label>
                    <input type="text" name="makan_1x" class="form-control" value="{{ old('makan_1x', $data->makan_1x) }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Makan 2x</label>
                    <input type="text" name="makan_2x" class="form-control" value="{{ old('makan_2x', $data->makan_2x) }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Makan 3x</label>
                    <input type="text" name="makan_3x" class="form-control" value="{{ old('makan_3x', $data->makan_3x) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Makan > 3x</label>
                    <input type="text" name="makan_lebih_3x" class="form-control" value="{{ old('makan_lebih_3x', $data->makan_lebih_3x) }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Belum Tentu Makan</label>
                    <input type="text" name="belum_tentu_makan" class="form-control" value="{{ old('belum_tentu_makan', $data->belum_tentu_makan) }}">
                </div>
            </div>

            <h5 class="mt-4 mb-2">Tempat Berobat Keluarga</h5>
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label>Dukun Terlatih</label>
                    <input type="text" name="dukun_terlatih" class="form-control" value="{{ old('dukun_terlatih', $data->dukun_terlatih) }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Tenaga Kesehatan</label>
                    <input type="text" name="tenaga_kesehatan" class="form-control" value="{{ old('tenaga_kesehatan', $data->tenaga_kesehatan) }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Obat Tradisional</label>
                    <input type="text" name="obat_tradisional_dukun" class="form-control" value="{{ old('obat_tradisional_dukun', $data->obat_tradisional_dukun) }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Paranormal</label>
                    <input type="text" name="paranormal" class="form-control" value="{{ old('paranormal', $data->paranormal) }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Obat Keluarga Sendiri</label>
                    <input type="text" name="obat_keluarga_sendiri" class="form-control" value="{{ old('obat_keluarga_sendiri', $data->obat_keluarga_sendiri) }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Tidak Diobati</label>
                    <input type="text" name="tidak_diobati" class="form-control" value="{{ old('tidak_diobati', $data->tidak_diobati) }}">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-warning">Perbarui</button>
                <a href="{{ route('perkembangan.kesehatan-masyarakat.perilaku-hidup-bersih-dan-sehat.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
