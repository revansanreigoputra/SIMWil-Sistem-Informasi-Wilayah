@extends('layouts.master')

@section('title', 'Detail - SEKTOR PERTAMBANGAN')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Detail Data Sektor Pertambangan</h5>
        <table class="table table-bordered">
            <tr><th>Desa</th><td>{{ $data->desa->nama_desa ?? '-' }}</td></tr>
            <tr><th>Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th>Penambang Galian C Perorangan (Orang)</th><td>{{ $data->penambang_galian_c }}</td></tr>
            <tr><th>Pemilik Usaha Pertambangan (Orang)</th><td>{{ $data->pemilik_usaha_pertambangan }}</td></tr>
            <tr><th>Buruh Usaha Pertambangan (Orang)</th><td>{{ $data->buruh_usaha_pertambangan }}</td></tr>
            <tr><th>Jumlah Total (Orang)</th><td>{{ $data->jumlah }}</td></tr>
        </table>
        <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-tambang.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
