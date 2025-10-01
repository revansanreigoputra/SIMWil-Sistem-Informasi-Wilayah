@extends('layouts.master')

@section('title', 'Galeri Foto')

@push('addon-style')
    {{-- Menambahkan style untuk mencegah layout shifting saat modal muncul --}}
    <style>
        body.modal-open {
            padding-right: 0 !important;
            overflow: auto !important;
        }
    </style>
@endpush

@section('action')
    {{-- Tombol "+ Tambah Album" dengan ikon --}}
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAlbumModal">
        <i></i> Tambah Album
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Album</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="galeri-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Album</th>
                            <th>Jumlah Foto</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($albums as $album)
                            {{-- Menambahkan class align-middle agar konten selaras secara vertikal --}}
                            <tr class="align-middle">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $album->album }}</td>
                                <td><span class="badge bg-secondary">{{ $album->photos_count }} Foto</span></td>
                                <td class="text-center">
                                    {{-- Mengubah tombol aksi menjadi ikon dengan tooltip --}}
                                    <div class="d-flex gap-2 justify-content-center">
                                        {{-- <a lass="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Tambah Foto">
                                            <i class="bi bi-plus-square-fill"></i>
                                        </a> --}}
                                        <a href="{{ route('utama.galeri.show', $album->id) }}"
                                            class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#editAlbumModal-{{ $album->id }}" data-bs-toggle="tooltip"
                                            title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-galeri-{{ $album->id }}" data-bs-toggle="tooltip"
                                            title="Hapus">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </div>

                                    {{-- Modal Konfirmasi Hapus (Tidak ada perubahan signifikan) --}}
                                    <div class="modal fade" id="delete-galeri-{{ $album->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus Album</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <p>Apakah Anda yakin ingin menghapus album
                                                        <strong>"{{ $album->album }}"</strong>? Tindakan ini tidak dapat
                                                        dibatalkan.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
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

                                    {{-- Modal Edit (Menambahkan input hidden untuk error handling) --}}
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
                                                    {{-- Input hidden untuk menangkap ID jika validasi gagal --}}
                                                    <input type="hidden" name="edit_album_id" value="{{ $album->id }}">
                                                    <div class="modal-body text-start">
                                                        <div class="mb-3">
                                                            <label for="album-{{ $album->id }}" class="form-label">Nama
                                                                Album</label>
                                                            <input type="text" name="album"
                                                                id="album-{{ $album->id }}"
                                                                class="form-control @error('album', 'updateAlbum') is-invalid @enderror"
                                                                value="{{ old('album', $album->album) }}" required>
                                                            @error('album', 'updateAlbum')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
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


    {{-- Modal Tambah (Menambahkan handling error) --}}
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
                            <input type="text" name="album" id="album-create"
                                class="form-control @error('album', 'storeAlbum') is-invalid @enderror"
                                value="{{ old('album') }}" placeholder="Contoh: Kegiatan 17 Agustus" required>
                            @error('album', 'storeAlbum')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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

            // Inisialisasi Tooltip Bootstrap
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Script untuk menangani error validasi pada modal (asumsi Error Bag: storeAlbum & updateAlbum)
            @if ($errors->any())
                @if ($errors->hasBag('storeAlbum'))
                    var createModal = new bootstrap.Modal(document.getElementById('createAlbumModal'));
                    createModal.show();
                @elseif ($errors->hasBag('updateAlbum'))
                    var failedEditId = '{{ old('edit_album_id') }}';
                    var editModal = new bootstrap.Modal(document.getElementById('editAlbumModal-' + failedEditId));
                    editModal.show();
                @endif
            @endif
        });
    </script>
@endpush
