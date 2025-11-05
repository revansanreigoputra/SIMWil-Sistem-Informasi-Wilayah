@extends('layouts.master')

@section('title', 'Detail - MATA PENCAHARIAN SEKTOR PERKEBUNAN')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-info text-white fw-bold">
            DETAIL MATA PENCAHARIAN SEKTOR PERKEBUNAN
        </div>
        <div class="card-body">
            <div class="mb-3"><strong>Desa:</strong> {{ $data->desa->nama_desa ?? '-' }}</div>
            <div class="mb-3"><strong>Tanggal:</strong> {{ $data->tanggal }}</div>
            <div class="mb-3"><strong>Karyawan Perusahaan Perkebunan (Orang):</strong> {{ $data->karyawan_perusahaan_perkebunan }}</div>
            <div class="mb-3"><strong>Pemilik Usaha Perkebunan (Orang):</strong> {{ $data->pemilik_usaha_perkebunan }}</div>
            <div class="mb-3"><strong>Buruh Perkebunan (Orang):</strong> {{ $data->buruh_perkebunan }}</div>
            <div class="mb-3"><strong>Jumlah (Orang):</strong> {{ $data->jumlah }}</div>

            <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
