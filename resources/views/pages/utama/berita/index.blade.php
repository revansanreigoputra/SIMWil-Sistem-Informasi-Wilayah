@extends('layouts.master')

@section('title', 'Berita Penting')

@section('action')
    {{-- Tombol untuk mengarahkan ke halaman tambah berita --}}
    <a href="{{ route('utama.berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="berita-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Isi Berita</th>
                            <th>Gambar</th>
                            <th>Diupload / Diupdate</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beritas as $berita)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $berita->judul }}</td>
                                {{-- Menampilkan 100 karakter pertama dari isi berita --}}
                                <td>{!! Str::limit($berita->isi_berita, 100) !!}</td>
                                <td>
                                    <img src="{{ asset('storage/foto_berita/' . $berita->gambar) }}" width="150" alt="Gambar {{ $berita->judul }}">
                                </td>
                                {{-- Menggunakan Carbon untuk format tanggal yang lebih rapi --}}
                                <td>{{ $berita->diupload }} ({{ \Carbon\Carbon::parse($berita->tanggal2)->translatedFormat('d F Y') }})</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('utama.berita.edit', $berita->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        {{-- Tombol Hapus dengan Modal Konfirmasi --}}
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-berita-{{ $berita->id }}">
                                            Hapus
                                        </button>
                                    </div>

                                    <div class="modal fade" id="delete-berita-{{ $berita->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Berita?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Berita dengan judul "<strong>{{ $berita->judul }}</strong>" akan dihapus.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    {{-- Form untuk proses hapus --}}
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
    {{-- Inisialisasi DataTables untuk tabel berita --}}
    <script>
        $(document).ready(function() {
            $('#berita-table').DataTable();
        });
    </script>
@endpush
