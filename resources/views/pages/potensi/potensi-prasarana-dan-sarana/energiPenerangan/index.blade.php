@extends('layouts.master')

@section('title', 'Data Energi Penerangan')

@section('action')
    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus-circle me-2"></i>
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="energi-penerangan-table" class="table table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Desa</th>
                                        <th>Tanggal</th>
                                        <th>Listrik PLN</th>
                                        <th>Diesel Umum</th>
                                        <th>Genset Pribadi</th>
                                        <th>Lampu Minyak</th>
                                        <th>Kayu Bakar</th>
                                        <th>Batu Bara</th>
                                        <th>Tanpa Penerangan</th>
                                        <th width="200" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($energiPenerangans as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->desa->nama_desa }}</td>
                                            <td class="text-center">{{ $item->tanggal->format('d-m-Y') }}</td>
                                            <td class="text-center">{{ number_format($item->listrik_pln) }} unit</td>
                                            <td class="text-center">{{ number_format($item->diesel_umum) }} unit</td>
                                            <td class="text-center">{{ number_format($item->genset_pribadi) }} unit</td>
                                            <td class="text-center">{{ number_format($item->lampu_minyak) }} unit</td>
                                            <td class="text-center">{{ number_format($item->kayu_bakar) }} unit</td>
                                            <td class="text-center">{{ number_format($item->batu_bara) }} unit</td>
                                            <td class="text-center">{{ number_format($item->tanpa_penerangan) }} unit</td>
                                            <td class="text-center">
                                                @canany(['energiPenerangan.view', 'energiPenerangan.update', 'energiPenerangan.delete'])
                                                    <div class="d-flex gap-2 justify-content-center">
                                                        @can('energiPenerangan.view')
                                                            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.show', $item->id) }}"
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

                                                        @can('energiPenerangan.update')
                                                            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.edit', $item->id) }}"
                                                               class="btn btn-sm btn-warning" title="Edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                                     stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                                    <path d="M16 5l3 3" />
                                                                </svg>
                                                                Edit
                                                            </a>
                                                        @endcan

                                                        @can('energiPenerangan.delete')
                                                            <button class="btn btn-sm btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete-energi-penerangan-{{ $item->id }}"
                                                                    title="Hapus">
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
                                                    <div class="modal fade"
                                                         id="delete-energi-penerangan-{{ $item->id }}"
                                                         tabindex="-1"
                                                         aria-labelledby="deleteModalLabel-{{ $item->id }}"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $item->id }}">
                                                                        <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                                                                        Konfirmasi Hapus Data
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Data energi penerangan tanggal <strong>{{ $item->tanggal->format('d-m-Y') }}</strong> akan dihapus secara permanen.</p>
                                                                    <p class="text-danger mb-0">
                                                                        <i class="fas fa-info-circle me-1"></i>
                                                                        Tindakan ini tidak dapat dibatalkan.
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                        <i class="fas fa-times me-1"></i> Batal
                                                                    </button>
                                                                    <form action="{{ route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.destroy', $item->id) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">
                                                                            <i class="fas fa-trash me-1"></i> Hapus
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

                        @if ($energiPenerangans->hasPages())
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="text-muted">
                                    Menampilkan {{ $energiPenerangans->firstItem() }} hingga {{ $energiPenerangans->lastItem() }} dari {{ $energiPenerangans->total() }} entri
                                </div>
                                <nav>
                                    {{ $energiPenerangans->links() }}
                                </nav>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#energi-penerangan-table').DataTable();
        });
    </script>
@endpush
