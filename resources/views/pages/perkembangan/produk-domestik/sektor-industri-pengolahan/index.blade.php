@extends('layouts.master')

@section('title', 'Data Sektor Industri Pengolahan')

@section('action')
   <a href="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="sektor-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Tanggal</th>
                            <th>Jenis Industri</th>
                            <th>Total nilai produksi <br>tahun ini (Rp)</th>
                            <th>Total nilai bahan <br>baku (Rp)</th>
                            <th>Total nilai bahan<br> penolong (Rp)</th>
                            <th>Total biaya antara (Rp)</th>
                            <th>Total jumlah jenis <br> industri (Jenis)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sektors as $sektor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $sektor->desa->nama_desa ?? '-' }}</td> 
                                <td class="text-center">{{ $sektor->tanggal }}</td>
                                <td class="text-center">{{ $sektor->jenis_industri }}</td>
                                <td class="text-center">{{ number_format($sektor->nilai_produksi, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($sektor->nilai_bahan_baku, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($sektor->nilai_bahan_penolong, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($sektor->biaya_antara, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($sektor->jumlah_jenis_industri, 0, ',', '.') }}</td>
                                <td>
                                    @canany(['sektor-industri-pengolahan.update', 'sektor-industri-pengolahan.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            
                                            {{-- TOMBOL EDIT --}}
                                            @can('sektor-industri-pengolahan.update')
                                                <a href="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.edit', $sektor->id) }}"
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

                                            {{-- TOMBOL HAPUS --}}
                                            @can('sektor-industri-pengolahan.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-sektor-{{ $sektor->id }}">
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
                                        <div class="modal fade" id="delete-sektor-{{ $sektor->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Industri?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data industri <strong>{{ $sektor->jenis_industri }}</strong> pada tanggal 
                                                            <strong>{{ $sektor->tanggal }}</strong> yang dihapus tidak bisa dikembalikan.
                                                        </p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('perkembangan.produk-domestik.sektor-industri-pengolahan.destroy', $sektor->id) }}"
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
            $('#sektor-table').DataTable();
        });
    </script>
@endpush
