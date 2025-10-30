@extends('layouts.master')

@section('title', 'Edit Data - SEKTOR PERTANIAN')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            EDIT DATA SEKTOR PERTANIAN
        </div>
        <div class="card-body">
            <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.update', $sektorPertanian->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ $sektorPertanian->tanggal }}" required>
                </div>

                <div class="mb-3">
                    <label for="petani" class="form-label fw-bold">Jumlah Petani</label>
                    <input type="number" name="petani" class="form-control" value="{{ $sektorPertanian->petani }}" required>
                </div>

                <div class="mb-3">
                    <label for="pemilik_usaha_tani" class="form-label fw-bold">Pemilik Usaha Tani</label>
                    <input type="number" name="pemilik_usaha_tani" class="form-control" value="{{ $sektorPertanian->pemilik_usaha_tani }}" required>
                </div>

                <div class="mb-3">
                    <label for="buruh_tani" class="form-label fw-bold">Buruh Tani</label>
                    <input type="number" name="buruh_tani" class="form-control" value="{{ $sektorPertanian->buruh_tani }}" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label fw-bold">Total Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ $sektorPertanian->jumlah }}" required>
                </div>

                <div class="text-end">
                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning text-dark">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
