@extends('layouts.master')

@section('title', 'Tambah Pendapatan Perkapita Menurut Sektor Usaha')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Pendapatan Perkapita Menurut Sektor Usaha</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.store') }}" method="POST">
            @csrf

            {{-- Row Tanggal --}}
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Tanggal *</label>
                    <input type="date" name="tanggal" class="form-control"
                        value="{{ old('tanggal') }}" required>
                </div>
            </div>

            {{-- Row Dropdown Sektor --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jenis Sektor Usaha *</label>
                    <select name="sektor_id" class="form-control" required>
                        <option value="">-- Pilih Jenis Sektor Usaha --</option>
                        @foreach ($masterSektor as $s)
                            <option value="{{ $s->id }}"
                                {{ old('sektor_id') == $s->id ? 'selected' : '' }}>
                                {{ $s->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Row KK & Anggota --}}
            <div class="row mt-2">
                <div class="col-md-4 mb-2">
                    <label>Jumlah Rumah Tangga (KK)</label>
                    <input type="number" name="kk" class="form-control"
                        value="{{ old('kk') }}" required>
                </div>

                <div class="col-md-4 mb-2">
                    <label>Jumlah Anggota Rumah Tangga (Orang)</label>
                    <input type="number" name="anggota" class="form-control"
                        value="{{ old('anggota') }}" required>
                </div>

                <div class="col-md-4 mb-2">
                    <label>Jumlah Rumah Tangga Buruh (KK)</label>
                    <input type="number" name="buruh" class="form-control"
                        value="{{ old('buruh') }}" required>
                </div>
            </div>

            {{-- Row Anggota buruh & Pendapatan --}}
            <div class="row mt-2">
                <div class="col-md-4 mb-2">
                    <label>Jumlah Anggota Rumah Tangga Buruh (Orang)</label>
                    <input type="number" name="anggota_buruh" class="form-control"
                        value="{{ old('anggota_buruh') }}" required>
                </div>

                <div class="col-md-4 mb-2">
                    <label>Pendapatan Perkapita (Rp)</label>
                    <input type="number" name="pendapatan" class="form-control"
                        value="{{ old('pendapatan') }}" required>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index') }}"
                    class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
