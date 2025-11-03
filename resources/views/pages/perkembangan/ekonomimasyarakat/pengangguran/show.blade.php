@extends('layouts.master')

@section('title', 'Detail Data Pengangguran')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Detail Data Pengangguran</h5>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tr><th>Tanggal</th><td>{{ $pengangguran->tanggal }}</td></tr>
            <tr><th>Desa</th><td>{{ $pengangguran->desa->nama_desa ?? '-' }}</td></tr>
            <tr><th>Angkatan Kerja</th><td>{{ $pengangguran->angkatan_kerja }}</td></tr>
            <tr><th>Masih Sekolah</th><td>{{ $pengangguran->masih_sekolah }}</td></tr>
            <tr><th>Ibu Rumah Tangga</th><td>{{ $pengangguran->ibu_rumah_tangga }}</td></tr>
            <tr><th>Bekerja Penuh</th><td>{{ $pengangguran->bekerja_penuh }}</td></tr>
            <tr><th>Bekerja Tidak Tentu</th><td>{{ $pengangguran->bekerja_tidak_tentu }}</td></tr>
            <tr><th>Tidak Bekerja</th><td>{{ $pengangguran->tidak_bekerja }}</td></tr>
            <tr><th>Bekerja</th><td>{{ $pengangguran->bekerja }}</td></tr>
        </table>
        <div class="mt-3">
            <a href="{{ route('perkembangan.ekonomimasyarakat.pengangguran.index') }}" class="btn btn-secondary">Kembali</a>
            @can('pengangguran.update')
                <a href="{{ route('perkembangan.ekonomimasyarakat.pengangguran.edit', $pengangguran->id) }}" class="btn btn-warning">Edit</a>
            @endcan
        </div>
    </div>
</div>
@endsection
