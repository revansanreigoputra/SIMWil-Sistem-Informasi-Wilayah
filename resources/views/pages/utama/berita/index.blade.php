@extends('layouts.master')

@section('title', 'Berita Penting')

@push('addon-style')
    <style>
        .table-image {
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }

        .btn-aksi {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.375rem;
            background-color: #f8f9fa;
            color: #6c757d;
            transition: all 0.2s ease-in-out;
            border: 1px solid #dee2e6;
        }

        .btn-aksi:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
        }

        .btn-aksi.btn-info:hover {
            background-color: #0dcaf0;
            border-color: #0dcaf0;
            color: white;
        }

        .btn-aksi.btn-warning:hover {
            background-color: #ffc107;
            border-color: #ffc107;
            color: white;
        }

        .btn-aksi.btn-danger:hover {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
        }
    </style>
@endpush

@section('action')
    <a href="{{ route('utama.berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="berita-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Isi Berita</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center text-nowrap">Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beritas as $berita)
                            <tr class="align-middle">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $berita->judul }}</td>

                                <td>{{ Str::limit(strip_tags($berita->isi_berita), 65) }}</td>

                                <td class="text-center">
                                    <img src="{{ asset('storage/foto_berita/' . $berita->gambar) }}" class="table-image"
                                        alt="Gambar {{ $berita->judul }}">
                                </td>

                                <td class="text-nowrap">
                                    {{ \Carbon\Carbon::parse($berita->tanggal2)->translatedFormat('d M Y') }}
                                    <small class="d-block text-muted">{{ $berita->created_at->diffForHumans() }}</small>
                                </td>

                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        {{-- Tombol Detail --}}
                                        <a href="{{ route('utama.berita.show', $berita->id) }}"
                                            class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('utama.berita.edit', $berita->id) }}"
                                            class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        {{-- Tombol Hapus --}}
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-berita-{{ $berita->id }}" data-bs-toggle="tooltip"
                                            title="Hapus">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </div>

                                    {{-- MODAL UNTUK KONFIRMASI HAPUS --}}
                                    <div class="modal fade" id="delete-berita-{{ $berita->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Berita?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <p>Berita dengan judul "<strong>{{ $berita->judul }}</strong>" akan
                                                        dihapus.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('utama.berita.destroy', $berita->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data berita.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables untuk tabel berita
            $('#berita-table').DataTable();

            // Inisialisasi semua tooltip di halaman
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
@endpush
