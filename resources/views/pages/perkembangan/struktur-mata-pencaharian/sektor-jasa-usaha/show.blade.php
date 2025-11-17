@extends('layouts.master')

@section('title', 'Detail - SEKTOR JASA USAHA')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Data Sektor Jasa Usaha</h5>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row">Desa</th>
                    {{-- Menggunakan $sektorJasaUsaha dari controller --}}
                    <td>{{ $sektorJasaUsaha->desa->nama_desa ?? '-' }}</td> 
                </tr>
                <tr>
                    <th scope="row">Tanggal</th>
                    <td>{{ $sektorJasaUsaha->tanggal }}</td>
                </tr>
                <tr>
                    <th scope="row">Mata Pencaharian</th>
                    <td>{{ $sektorJasaUsaha->mataPencaharian->mata_pencaharian ?? '-' }}</td>
                </tr>
                <tr>
                    <th scope="row">Jumlah (Orang)</th>
                    <td>{{ $sektorJasaUsaha->jumlah }}</td>
                </tr>
                <tr>
                    <th scope="row">Waktu Dibuat</th>
                    <td>{{ $sektorJasaUsaha->created_at }}</td>
                </tr>
                <tr>
                    <th scope="row">Waktu Diperbarui</th>
                    <td>{{ $sektorJasaUsaha->updated_at }}</td>
                </tr>
            </tbody>
        </table>
        {{-- Mengubah route index --}}
        <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection