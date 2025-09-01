@extends('layouts.master')

@section('title', 'Tambah Desa')

@section('content')
    <div class="container">
        <form action="{{ route('desa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Kecamatan</label>
                <select name="kecamatan_id" class="form-control" required>
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Nama Desa</label>
                <input type="text" name="nama_desa" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="desa">Desa</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Kelurahan Terluar</label>
                <input type="text" name="kelurahan_terluar" class="form-control">
            </div>
            <div class="mb-3">
                <label>Tipologi</label>
                <input type="text" name="tipologi" class="form-control">
            </div>
            <div class="mb-3">
                <label>Luas</label>
                <input type="number" name="luas" class="form-control">
            </div>
            <div class="mb-3">
                <label>Bujur</label>
                <input type="text" name="bujur" class="form-control">
            </div>
            <div class="mb-3">
                <label>Lintang</label>
                <input type="text" name="lintang" class="form-control">
            </div>
            <div class="mb-3">
                <label>Ketinggian</label>
                <input type="number" name="ketinggian" class="form-control">
            </div>
            <div class="mb-3">
                <label>Kode PUM</label>
                <input type="text" name="kode_pum" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('desa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
