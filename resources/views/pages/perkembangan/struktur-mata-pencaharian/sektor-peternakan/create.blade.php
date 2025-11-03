@extends('layouts.master')

@section('title', 'Tambah Data - SEKTOR PETERNAKAN')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="peternakan_perorangan" class="form-label">Peternakan Perorangan (Orang)</label>
                <input type="number" name="peternakan_perorangan" class="form-control" min="0">
            </div>

            <div class="mb-3">
                <label for="pemilik_usaha_peternakan" class="form-label">Pemilik Usaha Peternakan (Orang)</label>
                <input type="number" name="pemilik_usaha_peternakan" class="form-control" min="0">
            </div>

            <div class="mb-3">
                <label for="buruh_peternakan" class="form-label">Buruh Peternakan (Orang)</label>
                <input type="number" name="buruh_peternakan" class="form-control" min="0">
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Total (Orang)</label>
                <input type="number" name="jumlah" class="form-control" min="0">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-peternakan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
