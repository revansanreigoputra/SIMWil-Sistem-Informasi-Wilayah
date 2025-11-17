@extends('layouts.master')

@section('title', 'Data Subsektor Kerajinan')

@section('action')
   <a href="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kerajinan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Tanggal</th>
                            <th>Total Nilai Produksi<br>(Rp)</th>
                            <th>Total Nilai Bahan Baku<br>(Rp)</th>
                            <th>Total Nilai Bahan Penolong<br>(Rp)</th>
                            <th>Total Biaya Antara<br>(Rp)</th>
                            <th>Total Jenis Kerajinan Rumah <br>Tangga (Jenis)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kerajinans as $kerajinan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $kerajinan->desa->nama_desa ?? '-' }}</td>
                                <td class="text-center">{{ $kerajinan->tanggal }}</td>
                                <td class="text-center">{{ number_format($kerajinan->total_nilai_produksi_tahun_ini ?? 0, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($kerajinan->total_nilai_bahan_baku_digunakan ?? 0, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($kerajinan->total_nilai_bahan_penolong_digunakan ?? 0, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($kerajinan->total_biaya_antara_dihabiskan ?? 0, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($kerajinan->total_jenis_kerajinan_rumah_tangga ?? 0, 0, ',', '.') }}</td>
                                <td>
                                    @canany(['subsektor-kerajinan.update', 'subsektor-kerajinan.delete'])
                                        <div class="d-flex gap-1 justify-content-center">

                                            {{-- DETAIL --}}
                                            <a href="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.show', $kerajinan->id) }}" 
                                                class="btn btn-sm btn-info text-white">
                                                Detail
                                            </a>

                                            {{-- EDIT --}}
                                            @can('subsektor-kerajinan.update')
                                                <a href="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.edit', $kerajinan->id) }}"
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

                                            {{-- HAPUS --}}
                                            @can('subsektor-kerajinan.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-kerajinan-{{ $kerajinan->id }}">
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

                                        {{-- MODAL HAPUS --}}
                                        <div class="modal fade" id="delete-kerajinan-{{ $kerajinan->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Kerajinan?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data kerajinan pada tanggal 
                                                            <strong>{{ $kerajinan->tanggal }}</strong> akan dihapus secara permanen.
                                                        </p>
                                                        <p>Yakin ingin melanjutkan penghapusan?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.destroy', $kerajinan->id) }}"
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
            $('#kerajinan-table').DataTable();
        });
    </script>
@endpush
