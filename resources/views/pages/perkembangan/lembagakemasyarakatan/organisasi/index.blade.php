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
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Desa</th>
                            <th class="text-center">Jenis Organisasi</th>
                            <th class="text-center">Kepengurusan</th>
                            <th class="text-center">Buku Administrasi</th>
                            <th class="text-center">Jumlah Kegiatan</th>
                            <th class="text-center">Dasar Hukum Pembentukan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                                <td class="text-center">{{ $item->jenis_organisasi }}</td>
                                <td class="text-center">{{ $item->kepengurusan ?? '-' }}</td>
                                <td class="text-center">{{ $item->buku_administrasi ?? '-' }}</td>
                                <td class="text-center">{{ $item->jumlah_kegiatan ?? 0 }}</td>
                                <td class="text-center">{{ $item->dasar_hukum_pembentukan ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <!-- Tombol Detail -->
                                            <a href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.show', $item->id) }}" class="btn btn-sm btn-info">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                    <circle cx="12" cy="12" r="3" />
                                                </svg>
                                                Detail
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                            Edit
                                        </a>


                                        <!-- Tombol Hapus dengan Modal -->
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-organisasi-{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                            Hapus
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
