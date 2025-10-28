@extends('layouts.master')

@section('title', 'Detail Rumah Menurut Lantai')

@section('content')
<div class="container">
    <h4>Detail Data Rumah Menurut Lantai</h4>

    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Desa</th>
                    <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Lantai</th>
                    <td>{{ $item->jenisLantai->nama_lantai ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $item->jumlah }}</td>
                </tr>
            </table>

            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_lantai.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_lantai.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
