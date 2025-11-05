@extends('layouts.master')

@section('title', 'Tambah - MATA PENCAHARIAN SEKTOR PERKEBUNAN')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        TAMBAH MATA PENCAHARIAN SEKTOR PERKEBUNAN
    </div>
    <div class="card-body">
        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
            </div>

            <div class="mb-3">
                <label for="karyawan_perusahaan_perkebunan" class="form-label">Karyawan Perusahaan Perkebunan (Orang)</label>
                <input type="number" name="karyawan_perusahaan_perkebunan" id="karyawan_perusahaan_perkebunan" class="form-control" value="{{ old('karyawan_perusahaan_perkebunan') }}">
            </div>

            <div class="mb-3">
                <label for="pemilik_usaha_perkebunan" class="form-label">Pemilik Usaha Perkebunan (Orang)</label>
                <input type="number" name="pemilik_usaha_perkebunan" id="pemilik_usaha_perkebunan" class="form-control" value="{{ old('pemilik_usaha_perkebunan') }}">
            </div>

            <div class="mb-3">
                <label for="buruh_perkebunan" class="form-label">Buruh Perkebunan (Orang)</label>
                <input type="number" name="buruh_perkebunan" id="buruh_perkebunan" class="form-control" value="{{ old('buruh_perkebunan') }}">
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah (Orang)</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah') }}">
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perkebunan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
