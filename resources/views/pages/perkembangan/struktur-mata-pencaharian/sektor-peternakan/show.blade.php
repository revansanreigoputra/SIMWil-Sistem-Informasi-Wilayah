@extends('layouts.master')

@section('title', 'Detail - SEKTOR PETERNAKAN')

@section('content')
<div class="card">
    <div class="card-body">
        <h5><strong>Desa:</strong> {{ $data->desa->nama_desa ?? '-' }}</h5>
        <h5><strong>Tanggal:</strong> {{ $data->tanggal }}</h5>

        <table class="table table-bordered mt-3">
            <tr><th>Peternakan Perorangan (Orang)</th><td>{{ $data->peternakan_perorangan }}</td></tr>
            <tr><th>Pemilik Usaha Peternakan (Orang)</th><td>{{ $data->pemilik_usaha_peternakan }}</td></tr>
            <tr><th>Buruh Peternakan (Orang)</th><td>{{ $data->buruh_peternakan }}</td></tr>
            <tr><th>Jumlah Total (Orang)</th><td>{{ $data->jumlah }}</td></tr>
        </table>

        <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
