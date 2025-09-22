@extends('layouts.master')

@section('title', 'Agenda Kegiatan')

@section('action')
    <a href="{{ route('utama.agenda.create') }}" class="btn btn-primary mb-3">Tambah Agenda</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="agenda-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dari Tanggal</th>
                            <th>Sampai Tanggal</th>
                            <th>Lokasi</th>
                            <th>Kegiatan</th>
                            <th>Peserta</th>
                            <th>Diupload / Diupdate</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($agenda as $no => $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a['tgl_dari'] }}</td>
                                <td>{{ $a['tgl_sampai'] }}</td>
                                <td>{{ $a['lokasi'] }}</td>
                                <td>{{ $a['kegiatan'] }}</td>
                                <td>{{ $a['peserta'] }}</td>
                                <td>{{ $a['diupload'] }} ({{ $a['tanggal'] }})</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Edit --}}
                                        <a href="{{ route('utama.agenda.edit', $a['id']) }}"
                                           class="btn btn-sm btn-warning">Edit</a>
                                        {{-- Hapus --}}
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-agenda-{{ $a['id'] }}">
                                            Hapus
                                        </button>
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-agenda-{{ $a['id'] }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Agenda?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Agenda <strong>{{ $a['kegiatan'] }}</strong> akan dihapus.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('utama.agenda.index', $a['id']) }}"
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
                                <td colspan="8" class="text-center">Belum ada agenda kegiatan.</td>
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
            $('#agenda-table').DataTable();
        });
    </script>
@endpush
