@extends('layouts.master')

@section('title', 'Detail - SEKTOR PERTANIAN')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white fw-bold">
            DETAIL SEKTOR PERTANIAN
        </div>
        <div class="card-body">
            <div class="mb-3"><strong>Desa:</strong> {{ $sektorPertanian->desa->nama_desa ?? '-' }}</div>
            <div class="mb-3"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($sektorPertanian->tanggal)->format('d-m-Y') }}</div>
            <div class="mb-3"><strong>Petani:</strong> {{ $sektorPertanian->petani }}</div>
            <div class="mb-3"><strong>Pemilik Usaha Tani:</strong> {{ $sektorPertanian->pemilik_usaha_tani }}</div>
            <div class="mb-3"><strong>Buruh Tani:</strong> {{ $sektorPertanian->buruh_tani }}</div>
            <div class="mb-3"><strong>Total Jumlah:</strong> {{ $sektorPertanian->jumlah }}</div>

            <div class="text-end">
                <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
