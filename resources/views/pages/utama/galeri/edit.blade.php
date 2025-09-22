@extends('layouts.master')

@section('title', 'Edit Album Galeri')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Nama Album</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('utama.galeri.update', $galeri->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="album" class="form-label">Nama Album</label>
                    <input type="text" name="album" id="album" class="form-control" value="{{ old('album', $galeri->album) }}" required>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('utama.galeri.index') }}" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
