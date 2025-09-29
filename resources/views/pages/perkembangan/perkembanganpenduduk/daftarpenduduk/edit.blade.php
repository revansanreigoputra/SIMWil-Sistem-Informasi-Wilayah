@extends('layouts.master')

@section('title', 'Edit Perkembangan Penduduk')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Edit Data Perkembangan Penduduk</h4>
        <form action="{{ route('perkembangan-penduduk.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jumlah Laki-laki Tahun Ini</label>
                    <input type="number" name="jumlah_laki_laki_tahun_ini" class="form-control"
                           value="{{ $data->jumlah_laki_laki_tahun_ini }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jumlah Perempuan Tahun Ini</label>
                    <input type="number" name="jumlah_perempuan_tahun_ini" class="form-control"
                           value="{{ $data->jumlah_perempuan_tahun_ini }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jumlah Laki-laki Tahun Lalu</label>
                    <input type="number" name="jumlah_laki_laki_tahun_lalu" class="form-control"
                           value="{{ $data->jumlah_laki_laki_tahun_lalu }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jumlah Perempuan Tahun Lalu</label>
                    <input type="number" name="jumlah_perempuan_tahun_lalu" class="form-control"
                           value="{{ $data->jumlah_perempuan_tahun_lalu }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jumlah KK Laki-laki Tahun Ini</label>
                    <input type="number" name="jumlah_kepala_keluarga_laki_laki_tahun_ini" class="form-control"
                           value="{{ $data->jumlah_kepala_keluarga_laki_laki_tahun_ini }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jumlah KK Perempuan Tahun Ini</label>
                    <input type="number" name="jumlah_kepala_keluarga_perempuan_tahun_ini" class="form-control"
                           value="{{ $data->jumlah_kepala_keluarga_perempuan_tahun_ini }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jumlah KK Laki-laki Tahun Lalu</label>
                    <input type="number" name="jumlah_kepala_keluarga_laki_laki_tahun_lalu" class="form-control"
                           value="{{ $data->jumlah_kepala_keluarga_laki_laki_tahun_lalu }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jumlah KK Perempuan Tahun Lalu</label>
                    <input type="number" name="jumlah_kepala_keluarga_perempuan_tahun_lalu" class="form-control"
                           value="{{ $data->jumlah_kepala_keluarga_perempuan_tahun_lalu }}">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('perkembangan-penduduk.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
