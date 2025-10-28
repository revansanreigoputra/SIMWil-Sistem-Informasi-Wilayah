@extends('layouts.master')

@section('title', 'Detail Rumah Menurut Dinding')

@section('content')
<div class="container">
    <h4>Detail Data Rumah Menurut Dinding</h4>

    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Desa</th>
                    <td>{{ $rumahMenurutDinding->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Dinding</th>
                    <td>{{ $rumahMenurutDinding->jenisDinding->nama_dinding ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($rumahMenurutDinding->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $rumahMenurutDinding->jumlah }}</td>
                </tr>
            </table>

            <div class="mt-3 d-flex justify-content-between">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_dinding.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_dinding.edit', $rumahMenurutDinding->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
