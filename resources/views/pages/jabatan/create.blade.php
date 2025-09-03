@extends('layouts.master')

@section('title', 'Tambah Jabatan')

@section('content')
<div class="container">
    <h1>Buat Jabatan Baru</h1>

    <form action="{{ route('jabatan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
            <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }}" required>
            @error('nama_jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
