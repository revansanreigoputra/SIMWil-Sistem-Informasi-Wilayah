@extends('layouts.master')

@section('title', 'Data Hasil Produksi Kebun')

@section('action')
    @can('hasilkebun.create')
        <a href="{{ route('hasilkebun.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus-circle me-2"></i>
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
                <table id="hasilkebun-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Tanggal</th>
                            <th>Nama Komoditas</th>
                            <th>Hasil Swasta/Negara (Ton)</th>
                            <th>Hasil Rakyat (Ton)</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasilProduksiKebuns as $hasilkebun)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hasilkebun->desa->nama_desa }}</td>
                                <td>{{ $hasilkebun->tanggal->format('d-m-Y') }}</td>
                                <td>{{ $hasilkebun->komoditas->nama }}</td>
                                <td>{{ number_format($hasilkebun->hasil_perkebunan_swasta_negara, 2, ',', '.') }}</td>
                                <td>{{ number_format($hasilkebun->hasil_perkebunan_rakyat, 2, ',', '.') }}</td>
                                <td>
                                    @canany(['hasilkebun.view', 'hasilkebun.update', 'hasilkebun.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('hasilkebun.view')
                                                <a href="{{ route('hasilkebun.show', $hasilkebun->id) }}"
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

                                            @can('hasilkebun.update')
                                                <a href="{{ route('hasilkebun.edit', $hasilkebun->id) }}"
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

                                            @can('hasilkebun.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-hasilkebun-{{ $hasilkebun->id }}" title="Hapus">
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
                                        <div class="modal fade" id="delete-hasilkebun-{{ $hasilkebun->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel-{{ $hasilkebun->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $hasilkebun->id }}">
                                                            Hapus Data Hasil Produksi Kebun
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data komoditas
                                                            <strong>{{ $hasilkebun->komoditas->nama }}</strong>
                                                            tanggal
                                                            <strong>{{ $hasilkebun->tanggal->format('d-m-Y') }}</strong>
                                                            akan dihapus dan tidak bisa dikembalikan.
                                                        </p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Batal
                                                        </button>
                                                        <form action="{{ route('hasilkebun.destroy', $hasilkebun->id) }}"
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
            $('#hasilkebun-table').DataTable();
        });
    </script>
@endpush
