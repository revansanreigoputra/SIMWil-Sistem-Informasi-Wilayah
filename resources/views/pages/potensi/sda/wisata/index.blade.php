@extends('layouts.master')

@section('title', 'Data Wisata')

@section('action')
    @can('wisata.create')
        <a href="{{ route('wisata.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus-circle me-2"></i>
            Tambah Data Wisata
        </a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table id="wisata-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Tanggal</th>
                            <th>Area Wisata</th>
                            <th>Keberadaan</th>
                            <th>Luas (m²)</th>
                            <th>Tingkat Pemanfaatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wisatas as $wisata)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $wisata->desa->nama_desa }}</td>
                                <td>{{ $wisata->tanggal->format('d-m-Y') }}</td>
                                <td>{{ $wisata->areaWisata->nama }}</td>
                                <td>
                                    <span class="badge bg-{{ $wisata->keberadaan == 'ada' ? 'success' : 'danger' }}">
                                        {{ $wisata->keberadaan }}
                                    </span>
                                </td>
                                <td>{{ number_format($wisata->luas_m2, 2, ',', '.') }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $wisata->tingkat_pemanfaatan == 'aktif' ? 'info' : 'warning' }}">
                                        {{ $wisata->tingkat_pemanfaatan }}
                                    </span>
                                </td>
                                <td>
                                    @canany(['wisata.view', 'wisata.update', 'wisata.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('wisata.view')
                                                <a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-sm btn-info"
                                                    title="Detail">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    Detail
                                                </a>
                                            @endcan

                                            @can('wisata.update')
                                                <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-sm btn-warning"
                                                    title="Edit">
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

                                            @can('wisata.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-wisata-{{ $wisata->id }}" title="Hapus">
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

                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="delete-wisata-{{ $wisata->id }}" tabindex="-1"
                                                    aria-labelledby="deleteLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="deleteLabel">Konfirmasi Hapus</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data wisata ini?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ route('wisata.destroy', $wisata->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                    @endcanany
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="fas fa-inbox me-2"></i>
                                    Belum ada data wisata
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new DataTable('#wisata-table', {
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
@endpush
