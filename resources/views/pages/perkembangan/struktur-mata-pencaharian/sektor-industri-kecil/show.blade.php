@extends('layouts.master')

@section('title', 'Detail - SEKTOR INDUSTRI KECIL / KERAJINAN RUMAH TANGGA')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Detail Data Sektor Industri Kecil / Kerajinan Rumah Tangga</h5>
        <table class="table table-bordered">
            <tr>
                <th>Desa</th>
                <td>{{ $data->desa->nama_desa ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $data->tanggal }}</td>
            </tr>
            <tr>
                <th>Mata Pencaharian</th>
                <td>{{ $data->mataPencaharian->mata_pencaharian ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah (Orang)</th>
                <td>{{ $data->jumlah }}</td>
            </tr>
        </table>

        <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-industri-kecil.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
