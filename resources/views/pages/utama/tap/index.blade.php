@extends('layouts.master')

@section('title', 'TA Pendamping')

@section('action')
    <a href="{{ route('utama.tap.create') }}" class="btn btn-primary">
        Tambah TA Pendamping
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar TA Pendamping</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tap-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Wilayah Kerja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($taps as $tap)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($tap['tgl_tap'])->format('d M Y') }}</td>
                                <td>{{ $tap['nama'] }}</td>
                                <td>{{ $tap['wilayah_kerja'] }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('utama.tap.edit', $tap['id']) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>
                                        {{-- Tombol Hapus --}}
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-tap-{{ $tap['id'] }}">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- MODAL HAPUS --}}
                            <div class="modal fade" id="delete-tap-{{ $tap['id'] }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <b>{{ $tap['nama'] }}</b>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{ route('utama.tap.destroy', $tap['id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data TA Pendamping.</td>
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
            $('#tap-table').DataTable();
        });
    </script>
@endpush
