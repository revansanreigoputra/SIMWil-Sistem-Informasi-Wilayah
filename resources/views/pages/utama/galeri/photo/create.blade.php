@extends('layouts.master')

@section('title', 'Tambah Foto Baru')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Foto ke Album: <strong>{{ $album->album }}</strong></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('utama.galeri.photo.store', $album->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="fupload" class="form-label">Pilih File Foto</label>
                    <input type="file" name="fupload" id="fupload" class="form-control" required>
                    <small class="form-text text-muted">Anda bisa memilih satu atau beberapa file sekaligus.</small>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('utama.galeri.index') }}" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Upload dan Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
