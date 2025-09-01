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
                            <th>#</th>
                            <th>Kode PUM</th>
                            <th>Kecamatan</th>
                            <th>Nama Desa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($desas as $desa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $desa->kode_pum }}</td>
                                <td>{{ $desa->kecamatan->nama_kecamatan ?? '-' }}</td>
                                <td>{{ $desa->nama_desa }}</td>
                                <td>
                                    <a href="{{ route('desa.show', $desa->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('desa.edit', $desa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('desa.destroy', $desa->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus?')">Hapus</button>
                                    </form>
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
