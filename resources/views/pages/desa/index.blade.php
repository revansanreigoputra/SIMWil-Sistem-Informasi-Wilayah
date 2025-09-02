@extends('layouts.master')

@section('title', 'Data Desa')

@section('action')
    <a href="{{ route('desa.create') }}" class="btn btn-primary mb-3">Tambah Desa</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="desa-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode PUM</th>
                            <th>Nama Desa</th>
                            <th>Kecamatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($desas as $desa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $desa->kode_pum }}</td>
                                <td>{{ $desa->nama_desa }}</td>
                                <td>{{ $desa->kecamatan->nama_kecamatan ?? '-' }}</td>
                                <td>
                                    @canany(['desa.view', 'desa.update', 'desa.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('desa.view')
                                                <a href="{{ route('desa.show', $desa->id) }}" class="btn btn-sm btn-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    Detail
                                                </a>
                                            @endcan
                                            @can('desa.update')
                                                <a href="{{ route('desa.edit', $desa->id) }}"
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
                                            @can('desa.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-desa-{{ $desa->id }}">
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
                                        <div class="modal fade" id="delete-desa-{{ $desa->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus desa?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data desa
                                                            <strong>{{ $desa->nama_desa }}</strong> yang dihapus
                                                            tidak bisa dikembalikan.
                                                        </p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('desa.destroy', $desa->id) }}"
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
            $('#desa-table').DataTable();
        });
    </script>
@endpush
