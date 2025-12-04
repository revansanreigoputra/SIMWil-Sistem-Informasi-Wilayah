@extends('layouts.master')

@section('title', 'Data Kualitas Udara')

@section('action')
    @can('kualitas-udara.create')
        <a href="{{ route('kualitas-udara.create') }}" class="btn btn-primary mb-3">
            Tambah Data Kualitas Udara
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
                <table id="kualitas-udara-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Tanggal</th>
                            <th>Sumber Pencemaran</th>
                            <th>Jenis Polutan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kualitasUdaras as $kualitasUdara)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kualitasUdara->desa->nama_desa }}</td>
                                <td>{{ $kualitasUdara->tanggal->format('d-m-Y') }}</td>
                                <td>{{ $kualitasUdara->sumberPencemaran->nama }}</td>
                                <td>{{ $kualitasUdara->jenis_polutan }}</td>
                                <td>
                                    @canany(['kualitas-udara.view', 'kualitas-udara.update', 'kualitas-udara.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('kualitas-udara.view')
                                                <a href="{{ route('kualitas-udara.show', $kualitasUdara->id) }}"
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

                                            @can('kualitas-udara.update')
                                                <a href="{{ route('kualitas-udara.edit', $kualitasUdara->id) }}"
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

                                            @can('kualitas-udara.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-kualitas-udara-{{ $kualitasUdara->id }}" title="Hapus">
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
                                        <div class="modal fade" id="delete-kualitas-udara-{{ $kualitasUdara->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel-{{ $kualitasUdara->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $kualitasUdara->id }}">
                                                            Hapus Data Kualitas Udara
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data kualitas udara tanggal
                                                            <strong>{{ $kualitasUdara->tanggal->format('d-m-Y') }}</strong>
                                                            akan dihapus dan tidak bisa dikembalikan.
                                                        </p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Batal
                                                        </button>
                                                        <form action="{{ route('kualitas-udara.destroy', $kualitasUdara->id) }}"
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
            $('#kualitas-udara-table').DataTable();
        });
    </script>
@endpush
