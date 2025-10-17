@extends('layouts.master')

@section('title', 'Data Usia')

@section('action')
    @can('usia.create')
        <a href="{{ route('potensi.potensi-sdm.usia.create') }}" class="btn btn-primary mb-3">Tambah Data Usia</a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="usia-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            @for ($i = 0; $i <= 1; $i++)
                                <th>Laki-laki {{ $i }} tahun</th>
                            @endfor
                            @for ($i = 0; $i <= 1; $i++)
                                <th>Perempuan {{ $i }} tahun</th>
                            @endfor
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usias as $usia)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($usia->tanggal)->format('d/m/Y') }}</td>

                                @for ($i = 0; $i <= 1; $i++)
                                    <td>{{ $usia->{"l{$i}"} ?? 0 }}</td>
                                @endfor
                                @for ($i = 0; $i <= 1; $i++)
                                    <td>{{ $usia->{"p{$i}"} ?? 0 }}</td>
                                @endfor
                                <td>
                                    @canany(['usia.view', 'usia.update', 'usia.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('usia.view')
                                                <a href="{{ route('potensi.potensi-sdm.usia.show', $usia->id) }}" class="btn btn-sm btn-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    Detail
                                                </a>
                                            @endcan
                                            @can('usia.update')
                                                <a href="{{ route('potensi.potensi-sdm.usia.edit', $usia->id) }}"
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
                                            @can('usia.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-usia-{{ $usia->id }}">
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
                                        <div class="modal fade" id="delete-usia-{{ $usia->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Usia?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data usia pada tanggal
                                                            <strong>{{ \Carbon\Carbon::parse($usia->tanggal)->format('d/m/Y') }}</strong> yang dihapus
                                                            tidak bisa dikembalikan.
                                                        </p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('potensi.potensi-sdm.usia.destroy', $usia->id) }}"
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
            $('#usia-table').DataTable({
                "scrollX": true // Enable horizontal scrolling
            });
        });
    </script>
@endpush
