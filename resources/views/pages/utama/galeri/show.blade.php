@extends('layouts.master')

@section('title', 'Detail Foto Album')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Foto: <strong>{{ $album->album }}</strong></h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('utama.galeri.index') }}" class="btn btn-warning">Kembali ke Daftar Album</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%;">No</th>
                            <th>Foto</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($album->photos as $photo)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/foto_foto/' . $photo->foto) }}" class="img-thumbnail" width="250" alt="Foto">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-foto-{{ $photo->id }}">
                                        Hapus
                                    </button>

                                    <div class="modal fade" id="delete-foto-{{ $photo->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Foto Ini?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <p>Yakin ingin menghapus foto ini dari album <strong>{{ $album->album }}</strong>?</p>
                                                    <img src="{{ asset('storage/foto_foto/' . $photo->foto) }}" class="img-thumbnail" alt="Foto">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('utama.galeri.photo.destroy', ['galeri' => $album->id, 'photo' => $photo->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum ada foto di album ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
