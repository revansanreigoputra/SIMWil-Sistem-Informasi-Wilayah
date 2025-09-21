@extends('layouts.master')

@section('title', 'Edit Berita')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Edit Berita</h3>
        </div>
        <div class="card-body">
            {{-- Form mengarah ke route 'update' untuk memperbarui data --}}
            <form action="{{ route('utama.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Method spoofing untuk request UPDATE --}}

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul *</label>
                    <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
                </div>

                <div class="mb-3">
                    <label for="fupload" class="form-label">Gambar</label>
                    <p class="form-text text-muted">Gambar saat ini:</p>
                    <img src="{{ asset('storage/foto_berita/' . $berita->gambar) }}" class="img-thumbnail mb-2" width="300" alt="Gambar {{ $berita->judul }}">
                    <input type="file" name="fupload" id="fupload" class="form-control">
                    <small class="form-text text-danger">Kosongkan jika tidak ingin mengubah gambar.</small>
                </div>

                <div class="mb-3">
                    <label for="isi_berita" class="form-label">Isi Berita *</label>
                    <textarea name="isi_berita" id="loko1" class="form-control" rows="10">{{ old('isi_berita', $berita->isi_berita) }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('utama.berita.index') }}" class="btn btn-warning me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('addon-script')
    {{-- Script tambahan bisa diletakkan di sini --}}
@endpush
