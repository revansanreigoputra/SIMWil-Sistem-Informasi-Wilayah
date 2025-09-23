
@extends('layouts.master')

@section('title', 'SEKTOR PERTAMBANGAN DAN GALIAN')

@section('action')
    <a href="{{ route('tambang-galian.create') }}" class="btn btn-primary mb-3">Data Baru</a>
    <button class="btn btn-success mb-3">XLS</button>
    <button class="btn btn-info mb-3">Getak</button>
@endsection

@section('content')    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tambang-galian-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Total Nilai Produksi (Rp)</th>
                            <th>Total Nilai Bahan Baku (Rp)</th>
                            <th>Total Nilai Bahan Penolong (Rp)</th>
                            <th>Total Biaya Antara (Rp)</th>
                            <th>Jumlah Jenis Bahan Tambang (Buah)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tambangGalian as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal->format('Y-m-d') }}</td>
                                <td>{{ number_format($item->total_nilai_produksi, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->total_nilai_bahan_baku, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->total_nilai_bahan_penolong, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->total_biaya_antara, 0, ',', '.') }}</td>
                                <td>{{ $item->jumlah_jenis_bahan_tambang }}</td>
                                <td>
                                    @canany(['tambang-galian.view', 'tambang-galian.update', 'tambang-galian.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('tambang-galian.view')
                                                <a href="{{ route('tambang-galian.show', $item->id) }}" class="btn btn-sm btn-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    Detail
                                                </a>
                                            @endcan
                                            @can('tambang-galian.update')
                                                <a href="{{ route('tambang-galian.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning">
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
                                            @endcan
                                            @can('tambang-galian.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-tambang-galian-{{ $item->id }}">
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
                                            @endcan
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete-tambang-galian-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data tanggal
                                                            <strong>{{ $item->tanggal->format('d F Y') }}</strong> yang dihapus
                                                            tidak bisa dikembalikan.
                                                        </p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('tambang-galian.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-muted">Tidak ada aksi</span>
                                    @endcanany
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
            $('#tambang-galian-table').DataTable();
        });
    </script>
@endpush