@extends('layouts.master')

@section('title', 'Galeri Foto')

@section('action')
    {{-- Tombol "+ Tambah Album" di pojok kanan atas untuk memunculkan modal --}}
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAlbumModal"> Tambah Album
    </button>
@endsection

@section('content')
    {{-- Card untuk Daftar Album yang Sudah Ada --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Album</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="galeri-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Album</th>
                            <th>Jumlah Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($albums as $album)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $album->album }}</td>
                                <td><span class="badge bg-secondary">{{ $album->photos_count }} Foto</span></td>
                                <td>
                                    <div class="d-flex gap-1 flex-wrap justify-content-center">
                                        <a href="{{ route('utama.galeri.photo.create', $album->id) }}"
                                            class="btn btn-sm btn-success">+ Foto</a>
                                        <a href="{{ route('utama.galeri.show', $album->id) }}"
                                            class="btn btn-sm btn-dark">Detail</a>
                                        {{-- Tombol Edit diubah untuk memanggil modal --}}
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editAlbumModal-{{ $album->id }}">
                                            Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-galeri-{{ $album->id }}">
                                            Hapus
                                        </button>
                                    </div>

                                    {{-- Modal untuk Konfirmasi Hapus --}}
                                    <div class="modal fade" id="delete-galeri-{{ $album->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus Album</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus album
                                                        <strong>"{{ $album->album }}"</strong>? Tindakan ini tidak dapat
                                                        dibatalkan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    {{-- Form untuk mengirim request DELETE --}}
                                                    <form action="{{ route('utama.galeri.destroy', $album->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="editAlbumModal-{{ $album->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Nama Album</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('utama.galeri.update', $album->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="album-{{ $album->id }}" class="form-label">Nama
                                                                Album</label>
                                                            <input type="text" name="album"
                                                                id="album-{{ $album->id }}" class="form-control"
                                                                value="{{ $album->album }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada album galeri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="createAlbumModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Album Galeri Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('utama.galeri.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="album-create" class="form-label">Nama Album</label>
                            <input type="text" name="album" id="album-create" class="form-control"
                                placeholder="Contoh: Kegiatan 17 Agustus" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Album</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#galeri-table').DataTable();
        });
    </script>
@endpush
