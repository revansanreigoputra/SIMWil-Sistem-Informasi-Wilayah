@extends('layouts.master')

@section('title', 'Agenda Kegiatan')

@section('action')
    {{-- Grup Tombol Aksi --}}
    <div class="d-flex gap-2">
        {{-- Tombol Tambah --}}
        <a href="{{ route('utama.agenda.create') }}" class="btn btn-primary">
            <i></i> Tambah Agenda
        </a>

        {{-- Tombol Cetak Laporan BARU --}}
        <a href="{{ route('utama.agenda.cetak') }}" target="_blank" class="btn btn-success">
            <i></i> Cetak
        </a>
    </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="agenda-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-nowrap">Dari Tanggal</th>
                            <th class="text-nowrap">Sampai Tanggal</th>
                            <th>Lokasi</th>
                            <th>Kegiatan</th>
                            <th>Peserta</th>
                            <th class="text-nowrap">Terakhir Update</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($agenda as $a)
                            <tr class="align-middle">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                {{-- Mengubah format tanggal menjadi lebih singkat --}}
                                <td>{{ \Carbon\Carbon::parse($a->tgl_dari)->translatedFormat('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($a->tgl_sampai)->translatedFormat('d M Y') }}</td>
                                <td>{{ $a->lokasi }}</td>
                                <td>{{ $a->kegiatan }}</td>
                                <td>{{ $a->peserta }}</td>
                                <td class="text-nowrap">
                                    {{-- Mengubah format tanggal menjadi lebih singkat --}}
                                    {{ \Carbon\Carbon::parse($a->updated_at)->translatedFormat('d M Y') }}
                                    <small class="d-block text-muted">{{ $a->updated_at->diffForHumans() }}</small>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-2 justify-content-center">
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('utama.agenda.edit', $a->id) }}"
                                            class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        {{-- Tombol Hapus --}}
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-agenda-{{ $a->id }}" data-bs-toggle="tooltip" title="Hapus">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </div>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-agenda-{{ $a->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Agenda?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <p>Agenda <strong>{{ $a->kegiatan }}</strong> akan dihapus.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('utama.agenda.destroy', $a->id) }}"
                                                          method="POST" class="d-inline">
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
            // Inisialisasi DataTables
            $('#agenda-table').DataTable();

            // Inisialisasi Tooltip Bootstrap
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
@endpush
