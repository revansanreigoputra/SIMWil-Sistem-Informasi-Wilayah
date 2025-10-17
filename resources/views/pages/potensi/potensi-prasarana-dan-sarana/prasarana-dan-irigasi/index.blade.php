@extends('layouts.master')

@section('title', 'Data Prasarana dan Irigasi')

@section('action')
    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table id="irigasi-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Tanggal</th>
                            <th>Saluran Primer</th>
                            <th>Saluran Sekunder</th>
                            <th>Saluran Tersier</th>
                            <th>Pintu Sadap</th>
                            <th>Pintu Pembagi Air</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($irigasis as $irigasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $irigasi->desa->nama_desa }}</td>
                                <td>{{ $irigasi->tanggal->format('d-m-Y') }}</td>
                                <td>
                                    <small class="text-muted">Baik: {{ $irigasi->saluran_primer }} m</small><br>
                                    <small class="text-danger">Rusak: {{ $irigasi->saluran_primer_rusak }} m</small>
                                </td>
                                <td>
                                    <small class="text-muted">Baik: {{ $irigasi->saluran_sekunder }} m</small><br>
                                    <small class="text-danger">Rusak: {{ $irigasi->saluran_sekunder_rusak }} m</small>
                                </td>
                                <td>
                                    <small class="text-muted">Baik: {{ $irigasi->saluran_tersier }} m</small><br>
                                    <small class="text-danger">Rusak: {{ $irigasi->saluran_tersier_rusak }} m</small>
                                </td>
                                <td>
                                    <small class="text-muted">Baik: {{ $irigasi->pintu_sadap }} unit</small><br>
                                    <small class="text-danger">Rusak: {{ $irigasi->pintu_sadap_rusak }} unit</small>
                                </td>
                                <td>
                                    <small class="text-muted">Baik: {{ $irigasi->pintu_pembagi_air }} unit</small><br>
                                    <small class="text-danger">Rusak: {{ $irigasi->pintu_pembagi_air_rusak }} unit</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.show', $irigasi->id) }}"
                                            class="btn btn-sm btn-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                <circle cx="12" cy="12" r="3" />
                                            </svg>
                                            Detail
                                        </a>
                                        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.edit', $irigasi->id) }}"
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
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-irigasi-{{ $irigasi->id }}">
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
                                    </div>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete-irigasi-{{ $irigasi->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data prasarana dan irigasi tanggal
                                                        <strong>{{ $irigasi->tanggal->format('d-m-Y') }}</strong> akan
                                                        dihapus
                                                        dan tidak bisa dikembalikan.
                                                    </p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form
                                                        action="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.destroy', $irigasi->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
            $('#irigasi-table').DataTable();
        });
    </script>
@endpush
