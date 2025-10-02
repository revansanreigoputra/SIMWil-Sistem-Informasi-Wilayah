@extends('layouts.master')

@section('title', 'Data Organisasi Kemasyarakatan')

@section('action')
    <a href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table id="organisasi-table" class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Organisasi</th>
                            <th>Kepengurusan</th>
                            <th>Buku Administrasi</th>
                            <th>Jumlah Kegiatan</th>
                            <th>Dasar Hukum Pembentukan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td >{{ $item->jenis_organisasi }}</td>
                                <td>{{ $item->kepengurusan ?? '-' }}</td>
                                <td class="text-center">{{ $item->buku_administrasi ?? '-' }}</td>
                                <td class="text-center">{{ $item->jumlah_kegiatan ?? 0 }}</td>
                                <td>{{ $item->dasar_hukum_pembentukan ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <!-- Tombol Hapus dengan Modal -->
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-organisasi-{{ $item->id }}">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="delete-organisasi-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data organisasi <strong>{{ $item->jenis_organisasi }}</strong> tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('perkembangan.lembagakemasyarakatan.organisasi.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#organisasi-table').DataTable();
        });
    </script>
@endpush
