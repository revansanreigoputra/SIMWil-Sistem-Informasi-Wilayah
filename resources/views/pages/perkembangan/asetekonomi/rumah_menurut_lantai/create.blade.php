@extends('layouts.master')

@section('title', 'Tambah Data Rumah Menurut Lantai')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Rumah Menurut Lantai</h5>
    </div>

    <div class="card-body">
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('perkembangan.asetekonomi.rumah_menurut_lantai.store') }}" method="POST">
            @csrf

            <input type="hidden" name="desa_id" value="{{ session('desa_id') }}">

            <div class="mb-3">
                <label for="jenis_lantai_id" class="form-label">Jenis Lantai</label>
                <select name="jenis_lantai_id" id="jenis_lantai_id" class="form-select" required>
                    <option value="">-- Pilih Jenis Lantai --</option>
                    @foreach($asetLantais as $aset)
                        <option value="{{ $aset->id }}" {{ old('jenis_lantai_id') == $aset->id ? 'selected' : '' }}>
                            {{ $aset->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" min="0" value="{{ old('jumlah', 0) }}" required>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_lantai.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
