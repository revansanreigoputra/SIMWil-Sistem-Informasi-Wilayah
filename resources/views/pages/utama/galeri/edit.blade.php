@extends('layouts.master')

@section('title', 'Edit Album Galeri')

@section('content')
    <form action="{{ route('utama.galeri.update', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Album: <strong>{{ $album->album }}</strong></h3>
            </div>
            <div class="card-body">
                {{-- Edit Nama Album --}}
                <div class="mb-4">
                    <label for="album" class="form-label fw-bold">Nama Album</label>
                    <input type="text" name="album" id="album" class="form-control"
                        value="{{ old('album', $album->album) }}" required>
                </div>

                <hr>

                {{-- Kelola Foto --}}
                <h4 class="mb-3">Kelola Foto</h4>
                @if ($album->photos->isNotEmpty())
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($album->photos as $photo)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset('asset/uploads/foto_foto/' . $photo->foto) }}" class="card-img-top"
                                        alt="Foto" style="aspect-ratio: 4 / 3; object-fit: cover;">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="photo-{{ $photo->id }}" class="form-label small">Ganti
                                                Foto (Opsional):</label>
                                            <input type="file" name="photos[{{ $photo->id }}]"
                                                id="photo-{{ $photo->id }}" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 text-end pb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="delete_photos[]"
                                                value="{{ $photo->id }}" id="delete-{{ $photo->id }}">
                                            <label class="form-check-label text-danger" for="delete-{{ $photo->id }}">
                                                Hapus Foto Ini
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info text-center">
                        Belum ada foto di album ini untuk dikelola.
                    </div>
                @endif
            </div>
            <div class="card-footer d-flex justify-content-end gap-2">
                <a href="{{ route('utama.galeri.index') }}" class="btn btn-warning">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Semua Perubahan</button>
            </div>
        </div>
    </form>
@endsection
