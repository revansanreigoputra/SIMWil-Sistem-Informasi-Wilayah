@extends('layouts.master')

@section('title', 'Data Anggota Keluarga')

@section('action')
    <a href="{{ route('anggota_keluarga.create') }}" class="btn btn-primary mb-3">+ Anggota Keluarga</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table id="anggota-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kepala Keluarga</th>
                            <th>No KK</th>
                            <th>Jumlah Anggota Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataKeluargas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->kepala_keluarga }}</td>
                                <td>{{ $data->no_kk }}</td>
                                <td>{{ $data->anggotaKeluarga->count() ?? 0 }}</td>
                                <td>
                                    @can('anggota_keluarga.view')
                                        <a href="{{ route('anggota_keluarga.show', $data) }}"
                                            class="btn btn-info btn-sm">Detail</a>
                                    @endcan
                                    @can('anggota_keluarga.create')
                                        <a href="{{ route('anggota_keluarga.create', ['data_keluarga_id' => $data->id]) }}"
                                            class="btn btn-primary btn-sm">+ Anggota</a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data anggota keluarga masih kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#anggota-table').DataTable({
                pageLength: 10,
                responsive: true,
                autoWidth: false
            });

        });
    </script>
@endpush
