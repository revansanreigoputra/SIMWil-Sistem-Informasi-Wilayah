@extends('layouts.master')

@section('title', 'Edit - SEKTOR PERDAGANGAN')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-4">Edit Data Sektor Perdagangan</h5>

        <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tanggal -->
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" 
                       value="{{ old('tanggal', $data->tanggal) }}" required>
            </div>

            <!-- Karyawan Perdagangan Hasil Bumi -->
            <div class="mb-3">
                <label class="form-label">Karyawan Perdagangan Hasil Bumi</label>
                <input type="number" name="karyawan_perdagangan_hasil_bumi" class="form-control" min="0"
                       value="{{ old('karyawan_perdagangan_hasil_bumi', $data->karyawan_perdagangan_hasil_bumi) }}">
            </div>

            <!-- Pengusaha Perdagangan Hasil Bumi -->
            <div class="mb-3">
                <label class="form-label">Pengusaha Perdagangan Hasil Bumi</label>
                <input type="number" name="pengusaha_perdagangan_hasil_bumi" class="form-control" min="0"
                       value="{{ old('pengusaha_perdagangan_hasil_bumi', $data->pengusaha_perdagangan_hasil_bumi) }}">
            </div>

            <!-- Buruh Perdagangan Hasil Bumi -->
            <div class="mb-3">
                <label class="form-label">Buruh Perdagangan Hasil Bumi</label>
                <input type="number" name="buruh_perdagangan_hasil_bumi" class="form-control" min="0"
                       value="{{ old('buruh_perdagangan_hasil_bumi', $data->buruh_perdagangan_hasil_bumi) }}">
            </div>

            <!-- Jumlah Total -->
            <div class="mb-3">
                <label class="form-label">Jumlah Total</label>
                <input type="number" name="jumlah" class="form-control" min="0"
                       value="{{ old('jumlah', $data->jumlah) }}">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
