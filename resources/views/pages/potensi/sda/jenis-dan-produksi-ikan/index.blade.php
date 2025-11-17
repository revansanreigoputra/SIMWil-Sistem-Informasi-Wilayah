@extends('layouts.master')

@section('title', 'Data Jenis dan Produksi Ikan')

@section('action')
    @can('p-nama-ikan.create')
        <a href="{{ route('p-nama-ikan.create') }}" class="btn btn-primary mb-3">
            Tambah Data
        </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table id="p-nama-ikan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Ikan</th>
                            <th>Hasil Produksi</th>
                            <th>Harga Jual</th>
                            <th>Nilai Produksi</th>
                            <th>Nilai Bahan Baku</th>
                            <th>Nilai Bahan Penolong</th>
                            <th>Biaya Antara Yang Dihabiskan</th>
                            <th>Saldo Produksi</th>
                            <th>Jumlah Jenis Usaha Perikanan</th>
                            <th>Dijual Langsung Ke Konsumen</th>
                            <th>Dijual Langsung Ke Pasar</th>
                            <th>Dijual Melalui KUD</th>
                            <th>Dijual Melalui Tengkulak</th>
                            <th>Dijual Melalui Pengecer</th>
                            <th>Dijual Ke Lumbung Desa/Kelurahan</th>
                            <th>Tidak Dijual</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pNamaIkans as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->tanggal->format('d-m-Y') }}</td>
                                <td>{{ $data->namaIkan->nama }}</td>
                                <td>{{ $data->hasil_produksi }}</td>
                                <td>{{ $data->harga_jual }}</td>
                                <td>{{ $data->nilai_produksi }}</td>
                                <td>{{ $data->nilai_bahan_baku }}</td>
                                <td>{{ $data->nilai_bahan_penolong }}</td>
                                <td>{{ $data->biaya_antara_yang_dihabiskan }}</td>
                                <td>{{ $data->saldo_produksi }}</td>
                                <td>{{ $data->jumlah_jenis_usaha_perikanan }}</td>
                                <td>{{ $data->dijual_langsung_ke_konsumen }}</td>
                                <td>{{ $data->dijual_langsung_ke_pasar }}</td>
                                <td>{{ $data->dijual_melalui_kud }}</td>
                                <td>{{ $data->dijual_melalui_tengkulak }}</td>
                                <td>{{ $data->dijual_melalui_pengecer }}</td>
                                <td>{{ $data->dijual_ke_lumbung_desa_kelurahan }}</td>
                                <td>{{ $data->tidak_dijual }}</td>
                                <td>
                                    @canany(['p-nama-ikan.view', 'p-nama-ikan.update', 'p-nama-ikan.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('p-nama-ikan.view')
                                                <a href="{{ route('p-nama-ikan.show', $data->id) }}"
                                                    class="btn btn-sm btn-info" title="Detail">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    Detail
                                                </a>
                                            @endcan

                                            @can('p-nama-ikan.update')
                                                <a href="{{ route('p-nama-ikan.edit', $data->id) }}"
                                                    class="btn btn-sm btn-warning" title="Edit">
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

                                            @can('p-nama-ikan.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-p-nama-ikan-{{ $data->id }}" title="Hapus">
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

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="delete-p-nama-ikan-{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel-{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $data->id }}">
                                                            Hapus Data Jenis dan Produksi Ikan
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data jenis dan produksi ikan tanggal
                                                            <strong>{{ $data->tanggal->format('d-m-Y') }}</strong>
                                                            akan dihapus dan tidak bisa dikembalikan.
                                                        </p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Batal
                                                        </button>
                                                        <form action="{{ route('p-nama-ikan.destroy', $data->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                Hapus
                                                            </button>
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
            $('#p-nama-ikan-table').DataTable();
        });
    </script>
@endpush
