@extends('layouts.master')

@section('title', 'Daftar - SEKTOR KEUANGAN JASA PERUSAHAAN')

@section('action')
    @can('sektor-keuangan-jasa-perusahaan.create')
        <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="jasa-keuangan-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Transaksi <rb> Perbankan</th>
                        <th>Jumlah Lembaga <br> Bukan Bank</th>
                        <th>Jumlah Usaha Sewa</th>
                        <th>Jumlah Perusahaan Jasa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $row->tanggal }}</td>
                        <td class="text-center">{{ $row->jumlah_transaksi_perbankan ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_lembaga_bukan_bank ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_usaha_sewa ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_perusahaan_jasa ?? 0 }}</td>
                        <td>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.destroy', $row->id) }}" method="POST" style="display:inline;">
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
        $('#jasa-keuangan-table').DataTable();
    });
</script>
@endpush
