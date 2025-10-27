@extends('layouts.master')

@section('title', 'Daftar - SEKTOR JASA-JASA')

@section('action')
    @can('sektor-jasa-jasa.create')
        <a href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="jasa-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Pelayanan Pemerintah</th>
                        <th>Jumlah Usaha Swasta</th>
                        <th>Jumlah Usaha Hiburan</th>
                        <th>Jumlah Jasa Perorangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $row->tanggal }}</td>
                        <td class="text-center">{{ $row->jumlah_pelayanan_pemerintah ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_usaha_swasta ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_usaha_hiburan ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_jasa_perorangan ?? 0 }}</td>
                        <td>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.destroy', $row->id) }}" method="POST" style="display:inline;">
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
        $('#jasa-table').DataTable();
    });
</script>
@endpush
