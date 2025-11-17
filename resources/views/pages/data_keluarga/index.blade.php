@extends('layouts.master')

@section('title', 'Data Kepala Keluarga')

@section('action')
    <div class="card-header d-flex justify-content-between align-items-center">
        @can('data_keluarga.import')
            <button type="button" class="btn  btn-outline-primary mb-3 me-2" data-bs-toggle="modal" data-bs-target="#importModal">
                <i class="bi bi-file-arrow-down me-2"></i> Impor Data
            </button>
        @endcan
        @can('data_keluarga.export')
            <a href="{{ route('data_keluarga.export') }}" class="btn  btn-outline-primary mb-3 me-2">
                <i class="bi bi-file-arrow-up me-2"></i> Ekspor Data
            </a>
        @endcan
        @can('data_keluarga.create')
            <a href="{{ route('data_keluarga.create') }}" class="btn btn-primary mb-3 ">
                <i class="bi bi-plus-circle me-2"></i>Tambah KK</a>
        @endcan
    @endsection

    @section('content')
        <div class="card">
            <div class="card-body">

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
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('data_keluarga.show', $dataKeluarga) }}"
                                            class="btn btn-sm btn-info bi bi-search me-2">Detail</a>
                                        @can('data_keluarga.edit')
                                            <a href="{{ route('data_keluarga.edit', $dataKeluarga) }}"
                                                class="btn btn-warning btn-sm bi bi-pencil me-2">Edit</a>
                                        @endcan
                                        @can('data_keluarga.delete')
                                            <button type="button" class="btn btn-danger btn-sm bi bi-trash me-2"
                                                data-bs-toggle="modal"
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
        {{-- IMPORT MODAL --}}
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="importModalLabel">Impor Data Keluarga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('data_keluarga.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Unduh template impor untuk memastikan format data Anda benar.</p>
                            <a href="{{ route('data_keluarga.template') }}" class="btn btn-outline-primary mb-3">
                                <i class="bi bi-download me-2"></i> Unduh Template Excel
                            </a>

                            <div class="mb-3">
                                <label for="file" class="form-label">Pilih File Excel (.xlsx, .xls, .csv)</label>
                                <input class="form-control" type="file" id="file" name="file" required>
                            </div>
                            <div class="alert alert-warning" role="alert">
                                Pastikan kolom yang terdapat tanda * wajib diisi.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
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
