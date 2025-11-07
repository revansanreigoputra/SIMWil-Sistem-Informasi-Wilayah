@extends('layouts.master')

@section('title', 'Detail - SEKTOR KEHUTANAN')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Detail Data Sektor Kehutanan</h5>
        <table class="table table-bordered">
            <tr><th>Desa</th><td>{{ $data->desa->nama_desa ?? '-' }}</td></tr>
            <tr><th>Tanggal</th><td>{{ $data->tanggal }}</td></tr>
            <tr><th>Pengumpul Hasil Hutan</th><td>{{ $data->pengumpul_hasil_hutan }}</td></tr>
            <tr><th>Pemilik Usaha</th><td>{{ $data->pemilik_usaha_hasil_hutan }}</td></tr>
            <tr><th>Buruh Usaha</th><td>{{ $data->buruh_usaha_hasil_hutan }}</td></tr>
            <tr><th>Jumlah Total</th><td>{{ $data->jumlah }}</td></tr>
        </table>

        <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-kehutanan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
