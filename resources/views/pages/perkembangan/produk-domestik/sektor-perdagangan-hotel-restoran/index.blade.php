@extends('layouts.master')

@section('title', 'Daftar - SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN')

@section('action')
    @can('sektor-perdagangan-hotel-restoran.create')
    <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="perdagangan-hotel-restoran-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Perdagangan Besar (Jenis)</th>
                        <th>Perdagangan Kecil (Jenis)</th>
                        <th>Hotel (Unit)</th>
                        <th>Restoran (Unit)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td>{{ $row->tanggal }}</td>
                        <td>{{ $row->total_jenis_perdagangan_besar ?? 0 }}</td>
                        <td>{{ $row->total_jenis_perdagangan_kecil ?? 0 }}</td>
                        <td>{{ $row->total_penginapan ?? 0 }}</td>
                        <td>{{ $row->total_tempat_konsumsi ?? 0 }}</td>
                        <td>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.destroy', $row->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#perdagangan-hotel-restoran-table').DataTable();
    });
</script>
@endpush
