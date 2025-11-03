@extends('layouts.master')

@section('title', 'Detail - MATA PENCAHARIAN SEKTOR PERIKANAN')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Detail Data Sektor Perikanan</h5>
        <table class="table table-bordered">
            <tr><th>Desa</th><td>{{ $data->desa->nama_desa ?? '-' }}</td></tr>
            <tr><th>Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th>Nelayan (Orang)</th><td>{{ $data->nelayan }}</td></tr>
            <tr><th>Pemilik Usaha Perikanan (Orang)</th><td>{{ $data->pemilik_usaha_perikanan }}</td></tr>
            <tr><th>Buruh Perikanan (Orang)</th><td>{{ $data->buruh_perikanan }}</td></tr>
            <tr><th>Jumlah (Orang)</th><td>{{ $data->jumlah }}</td></tr>
        </table>

        <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perikanan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
