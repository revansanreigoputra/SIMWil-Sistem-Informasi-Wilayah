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
                                        <form action="{{ route('data_keluarga.destroy', $dataKeluarga) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
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
