@extends('layouts.master')

@section('title', 'Perangkat Desa')

@section('action')
    @can('perangkat_desa.create')
        <a href="{{ route('perangkat_desa.create') }}" class="btn btn-primary">Tambah Perangkat Desa</a>
    @endcan
@endsection

@section('content')
    {{-- <div class="container-fluid"> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h3 class="card-title">Daftar Perangkat Desa</h3>
                    <div class="card-tools">
                        @can('perangkat_desa.store')
                            <a href="{{ route('perangkat_desa.create') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Perangkat Desa
                            </a>
                        @endcan
                    </div>
                </div> --}}
                {{-- <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="perangkat-desa-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Desa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kontak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($perangkatDesas as $index => $perangkatDesa)
                                    <tr>
                                        <td>{{ $perangkatDesas->firstItem() + $index }}</td>
                                        <td>{{ $perangkatDesa->nama }}</td>
                                        <td>{{ $perangkatDesa->nama_jabatan }}</td>
                                        <td>{{ $perangkatDesa->nama_desa }}</td>
                                        <td>{{ $perangkatDesa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td>{{ $perangkatDesa->kontak }}</td>
                                        <td>
                                            @canany(['perangkat_desa.view', 'perangkat_desa.update', 'perangkat_desa.delete'])
                                            <div class="d-flex gap-1">
                                                @can('perangkat_desa.view')
                                                    <a href="{{ route('perangkat_desa.show', $perangkatDesa->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                            <circle cx="12" cy="12" r="3" />
                                                        </svg>
                                                        Detail
                                                    </a>
                                                @endcan
                                                @can('perangkat_desa.update')
                                                    <a href="{{ route('perangkat_desa.edit', $perangkatDesa->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path
                                                                d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path
                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                        Edit
                                                    </a>
                                                @endcan
                                                @can('perangkat_desa.delete')
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete-perangkat-desa-{{ $perangkatDesa->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                                            <div class="modal fade" id="delete-perangkat-desa-{{ $perangkatDesa->id }}"
                                                tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Hapus Perangkat
                                                                Desa?
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Data perangkat desa
                                                                <strong>{{ $perangkatDesa->nama }}</strong> yang
                                                                dihapus
                                                                tidak bisa dikembalikan.
                                                            </p>
                                                            <p>Yakin ingin menghapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form
                                                                action="{{ route('perangkat_desa.destroy', $perangkatDesa->id) }}"
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
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data perangkat desa</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $perangkatDesas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#perangkat-desa-table').DataTable();
        });
    </script>
@endpush
