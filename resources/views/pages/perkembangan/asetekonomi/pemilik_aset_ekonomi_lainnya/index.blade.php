@extends('layouts.master')

@section('title', 'Data Pemilik Aset Ekonomi Lainnya')

@section('content')
<div class="container">
    <h4>Data Pemilik Aset Ekonomi Lainnya</h4>

    <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Jenis Aset</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td>{{ $item->jenisAsetLainnya->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>
                                <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
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
