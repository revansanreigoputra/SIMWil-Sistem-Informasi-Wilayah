@extends('layouts.master')

@section('title', 'Tambah Data - SEKTOR PERTANIAN')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            TAMBAH DATA SEKTOR PERTANIAN
        </div>
        <div class="card-body">
            <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.store') }}" method="POST">
                @csrf

                {{-- Input tanggal --}}
                <div class="mb-3">
                    <label for="tanggal" class="form-label fw-bold">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                {{-- Input jumlah petani --}}
                <div class="mb-3">
                    <label for="petani" class="form-label fw-bold">Jumlah Petani</label>
                    <input type="number" name="petani" id="petani" class="form-control" min="0" value="0" required>
                </div>

                {{-- Input pemilik usaha tani --}}
                <div class="mb-3">
                    <label for="pemilik_usaha_tani" class="form-label fw-bold">Jumlah Pemilik Usaha Tani</label>
                    <input type="number" name="pemilik_usaha_tani" id="pemilik_usaha_tani" class="form-control" min="0" value="0" required>
                </div>

                {{-- Input buruh tani --}}
                <div class="mb-3">
                    <label for="buruh_tani" class="form-label fw-bold">Jumlah Buruh Tani</label>
                    <input type="number" name="buruh_tani" id="buruh_tani" class="form-control" min="0" value="0" required>
                </div>

                {{-- Input total jumlah --}}
                <div class="mb-3">
                    <label for="jumlah" class="form-label fw-bold">Total Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" min="0" value="0" required>
                </div>

                <div class="text-end">
                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-pertanian.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
