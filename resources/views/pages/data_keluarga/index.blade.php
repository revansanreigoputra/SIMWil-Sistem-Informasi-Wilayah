@extends('layouts.master')

@section('title', 'Data Kepala Keluarga')

@section('action')
    @can('data_keluarga.create')
        <a href="{{ route('data_keluarga.create') }}" class="btn btn-primary mb-3">Tambah KK</a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
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
                                        <a href="{{ route('data_keluarga.edit', $dataKeluarga) }}" class="btn btn-warning btn-sm">Edit</a>
                                    @endcan
                                     @can('data_keluarga.delete')
                                        <button type="button" class="btn btn-danger btn-sm"
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
@endsection
@foreach ($dataKeluargas as $dataKeluarga)
    <x-modal.delete-confirm
        id="delete-confirm-{{ $dataKeluarga->id }}"
        title="Yakin hapus data ini?"
        description="Aksi ini tidak bisa dikembalikan."
        route="{{ route('data_keluarga.destroy', $dataKeluarga) }}"
        item="{{ $dataKeluarga->kepala_keluarga }}"
    />
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
