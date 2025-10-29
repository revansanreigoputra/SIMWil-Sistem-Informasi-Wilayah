@extends('layouts.master')

@section('title', 'Daftar - SEKTOR ANGKUTAN & KOMUNIKASI')

@section('action')
    @can('sektor-angkutan.create')
        <a href="{{ route('perkembangan.produk-domestik.sektor-angkutan.create') }}" class="btn btn-primary mb-3">+ Data Baru</a>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="angkutan-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Kegiatan <br>Pengangkutan</th>
                        <th>Total Kendaraan <br> Angkutan</th>
                        <th>Nilai Transaksi <br>Pengangkutan (Rp)</th>
                        <th>Jumlah Kegiatan Komunikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                        <td class="text-center">{{ $row->jml_kegiatan_pengangkutan ?? 0 }}</td>
                        <td class="text-center">{{ $row->jml_total_kendaraan_angkutan ?? 0 }}</td>
                        <td class="text-center">{{ number_format($row->nilai_total_transaksi_pengangkutan ?? 0, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $row->jml_kegiatan_informasi_telekomunikasi ?? 0 }}</td>
                        <td class="text-center">
                            <a href="{{ route('perkembangan.produk-domestik.sektor-angkutan.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-angkutan.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('perkembangan.produk-domestik.sektor-angkutan.destroy', $row->id) }}" method="POST" style="display:inline;">
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
        $('#angkutan-table').DataTable();
    });
</script>
@endpush
