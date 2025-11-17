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

            {{-- ID Desa otomatis dari session --}}
            <input type="hidden" name="id_desa" value="{{ session('desa_id') }}">

            {{-- Tanggal --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal *</label>
                <input 
                    type="date" 
                    name="tanggal" 
                    id="tanggal" 
                    class="form-control" 
                    value="{{ old('tanggal', $menurut_sektor_usaha->tanggal) }}" 
                    required>
            </div>

            {{-- Jenis Sektor Usaha --}}
            <div class="mb-3">
                <label for="sektor_id" class="form-label">Jenis Sektor Usaha *</label>
                <select name="sektor_id" id="sektor_id" class="form-control" required>
                    <option value="">-- Pilih Sektor Usaha --</option>

                    @foreach ($masterSektor as $s)
                        <option value="{{ $s->id }}"
                            {{ old('sektor_id', $menurut_sektor_usaha->sektor_id) == $s->id ? 'selected' : '' }}>
                            {{ $s->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- KK --}}
            <div class="mb-3">
                <label for="kk" class="form-label">Jumlah Keluarga (KK)</label>
                <input 
                    type="number" 
                    name="kk" 
                    id="kk" 
                    class="form-control" 
                    value="{{ old('kk', $menurut_sektor_usaha->kk) }}" 
                    required>
            </div>

            {{-- Anggota --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="anggota" class="form-label">Total Anggota</label>
                    <input 
                        type="number" 
                        name="anggota" 
                        id="anggota" 
                        class="form-control" 
                        value="{{ old('anggota', $menurut_sektor_usaha->anggota) }}" 
                        required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="buruh" class="form-label">Buruh (KK)</label>
                    <input 
                        type="number" 
                        name="buruh" 
                        id="buruh" 
                        class="form-control" 
                        value="{{ old('buruh', $menurut_sektor_usaha->buruh) }}" 
                        required>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="anggota_buruh" class="form-label">Total Anggota Buruh</label>
                    <input 
                        type="number" 
                        name="anggota_buruh" 
                        id="anggota_buruh" 
                        class="form-control" 
                        value="{{ old('anggota_buruh', $menurut_sektor_usaha->anggota_buruh) }}" 
                        required>
                </div>
            </div>

            {{-- Pendapatan --}}
            <div class="mb-3">
                <label for="pendapatan" class="form-label">Pendapatan Perkapita (Rp)</label>
                <input 
                    type="number" 
                    name="pendapatan" 
                    id="pendapatan" 
                    class="form-control" 
                    value="{{ old('pendapatan', $menurut_sektor_usaha->pendapatan) }}" 
                    required>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index') }}" class="btn btn-warning">
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
