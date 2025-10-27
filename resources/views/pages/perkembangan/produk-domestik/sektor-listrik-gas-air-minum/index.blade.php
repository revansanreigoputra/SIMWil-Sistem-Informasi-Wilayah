@extends('layouts.master')

@section('title', 'Daftar - SEKTOR LISTRIK, GAS DAN AIR MINUM')

@section('action')
    <a href="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="listrik-gas-air-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Jumlah Kegiatan Listrik</th>
                        <th>Nilai Produksi Listrik</th>
                        <th>Jumlah Kegiatan Gas</th>
                        <th>Nilai Produksi Air</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $row->desa->nama_desa ?? '-' }}</td>
                        <td class="text-center">{{ $row->tanggal }}</td>
                        <td class="text-center">{{ $row->jumlah_kegiatan_listrik ?? 0 }}</td>
                        <td class="text-center">{{ $row->nilai_produksi_listrik ?? 0 }}</td>
                        <td class="text-center">{{ $row->jumlah_kegiatan_gas ?? 0 }}</td>
                        <td class="text-center">{{ $row->nilai_produksi_air ?? 0 }}</td>
                        <td>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.destroy', $row->id) }}" method="POST" style="display:inline;">
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
