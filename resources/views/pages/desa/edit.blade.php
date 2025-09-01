@extends('layouts.master')

@section('title', 'Edit Desa')

@section('content')
<div class="container">
    <form action="{{ route('desa.update', $desa->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Kecamatan</label>
            <select name="kecamatan_id" class="form-control" required>
                @foreach($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->id }}" {{ $desa->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                    {{ $kecamatan->nama_kecamatan }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama Desa</label>
            <input type="text" name="nama_desa" class="form-control" value="{{ $desa->nama_desa }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="desa" {{ $desa->status == 'desa' ? 'selected' : '' }}>Desa</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Kelurahan Terluar</label>
            <input type="text" name="kelurahan_terluar" class="form-control" value="{{ $desa->kelurahan_terluar }}">
        </div>
        <div class="mb-3">
            <label>Tipologi</label>
            <input type="text" name="tipologi" class="form-control" value="{{ $desa->tipologi }}">
        </div>
        <div class="mb-3">
            <label>Luas</label>
            <input type="number" name="luas" class="form-control" value="{{ $desa->luas }}">
        </div>
        <div class="mb-3">
            <label>Bujur</label>
            <input type="text" name="bujur" class="form-control" value="{{ $desa->bujur }}">
        </div>
        <div class="mb-3">
            <label>Lintang</label>
            <input type="text" name="lintang" class="form-control" value="{{ $desa->lintang }}">
        </div>
        <div class="mb-3">
            <label>Ketinggian</label>
            <input type="number" name="ketinggian" class="form-control" value="{{ $desa->ketinggian }}">
        </div>
        <div class="mb-3">
            <label>Kode PUM</label>
            <input type="text" name="kode_pum" class="form-control" value="{{ $desa->kode_pum }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('desa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
