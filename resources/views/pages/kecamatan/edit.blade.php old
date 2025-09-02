@extends('layouts.master')

@section('title', 'Edit Kecamatan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Data Kecamatan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_kecamatan" class="form-label">Nama Kecamatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror" 
                       id="nama_kecamatan" name="nama_kecamatan" 
                       value="{{ old('nama_kecamatan', $kecamatan->nama_kecamatan) }}" required>
                @error('nama_kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
