@extends('layouts.master')

@section('title', 'Edit Data Menurut Sektor Usaha')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Menurut Sektor Usaha</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.update', $menurut_sektor_usaha->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $menurut_sektor_usaha->tanggal) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>KK</label>
                    <input type="number" name="kk" class="form-control" value="{{ old('kk', $menurut_sektor_usaha->kk) }}" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4 mb-2">
                    <label>Anggota</label>
                    <input type="number" name="anggota" class="form-control" value="{{ old('anggota', $menurut_sektor_usaha->anggota) }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Buruh</label>
                    <input type="number" name="buruh" class="form-control" value="{{ old('buruh', $menurut_sektor_usaha->buruh) }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Anggota Buruh</label>
                    <input type="number" name="anggota_buruh" class="form-control" value="{{ old('anggota_buruh', $menurut_sektor_usaha->anggota_buruh) }}" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Pendapatan</label>
                    <input type="number" name="pendapatan" class="form-control" value="{{ old('pendapatan', $menurut_sektor_usaha->pendapatan) }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
