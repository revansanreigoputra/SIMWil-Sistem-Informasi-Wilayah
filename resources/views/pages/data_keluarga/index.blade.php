@extends('layouts.master')

@section('title', 'Data Kepala Keluarga')

@section('action')
    <div class="card-header d-flex justify-content-between align-items-center">

        <button type="button" class="btn  btn-outline-info mb-3 me-2" data-bs-toggle="modal" data-bs-target="#importModal">
            <i class="fas fa-file-import"></i> Impor Data
        </button>
        <a href="{{ route('data_keluarga.export') }}" class="btn  btn-outline-success mb-3 me-2">
            <i class="fas fa-file-export"></i> Ekspor Data
        </a>

        @can('data_keluarga.create')
            <a href="{{ route('data_keluarga.create') }}" class="btn btn-primary mb-3">Tambah KK</a>
        @endcan
    @endsection

    @section('content')
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('import_error'))
                    <div class="alert alert-danger">{{ session('import_error') }}</div>
                @endif

                <div class="table-responsive">
                    <table id="keluarga-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No KK</th>
                                <th>Nama Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>Desa</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Kecamatan</th>
                                <th>Nama Pengisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKeluargas as $index => $dataKeluarga)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dataKeluarga->no_kk }}</td>
                                    <td>{{ $dataKeluarga->kepala_keluarga }}</td>
                                    <td>{{ $dataKeluarga->alamat }}</td>
                                    <td>{{ $dataKeluarga->desas->nama_desa }}</td>
                                    <td>{{ $dataKeluarga->rt }}</td>
                                    <td>{{ $dataKeluarga->rw }}</td>
                                    <td>{{ $dataKeluarga->kecamatans->nama_kecamatan }}</td>
                                    <td>{{ $dataKeluarga->perangkatDesas->nama }}</td>
                                    <td>
                                        @can('data_keluarga.edit')
                                            <a href="{{ route('data_keluarga.edit', $dataKeluarga) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        @endcan
                                        @can('data_keluarga.delete')
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-confirm-{{ $dataKeluarga->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="importModalLabel">Impor Data Keluarga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('data_keluarga.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Unduh template impor untuk memastikan format data Anda benar.</p>
                            <a href="{{ route('data_keluarga.template') }}" class="btn btn-warning mb-3">
                                <i class="fas fa-download"></i> Unduh Template Excel
                            </a>

                            <div class="mb-3">
                                <label for="file" class="form-label">Pilih File Excel (.xlsx, .xls, .csv)</label>
                                <input class="form-control" type="file" id="file" name="file" required>
                            </div>
                            <div class="alert alert-warning" role="alert">
                                Pastikan kolom foreign key (e.g., DESA_ID, AGAMA_ID) diisi dengan **ID** yang sesuai dari
                                tabel referensi.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Mulai Impor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @foreach ($dataKeluargas as $dataKeluarga)
        <x-modal.delete-confirm id="delete-confirm-{{ $dataKeluarga->id }}" title="Yakin hapus data ini?"
            description="Aksi ini tidak bisa dikembalikan." route="{{ route('data_keluarga.destroy', $dataKeluarga) }}"
            item="{{ $dataKeluarga->kepala_keluarga }}" />
    @endforeach

    @push('addon-script')
        <script>
            $(document).ready(function() {
                $('#keluarga-table').DataTable({
                    pageLength: 10,
                    responsive: true,
                    autoWidth: false
                });
            });
        </script>
    @endpush
