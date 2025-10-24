@extends('layouts.master')

@section('title', 'Tambah Data Partisipasi Politik')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Partisipasi Politik</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('potensi.potensi-kelembagaan.politik.store') }}" method="POST">
            @csrf

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Partisipasi Politik *</label>
                        <select name="partisipasi_politik_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($partisipasi as $item)
                                <option value="{{ $item->id }}" {{ old('partisipasi_politik_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('partisipasi_politik_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Wanita Yang Memiliki Hak Pilih (Orang)</label>
                        <input type="number" name="jumlah_wanita_hak_pilih" class="form-control" value="{{ old('jumlah_wanita_hak_pilih', 0) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pria Yang Memiliki Hak Pilih (Orang)</label>
                        <input type="number" name="jumlah_pria_hak_pilih" class="form-control" value="{{ old('jumlah_pria_hak_pilih', 0) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pemilih (Orang)</label>
                        <input type="number" name="jumlah_pemilih" class="form-control" value="{{ old('jumlah_pemilih', 0) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Wanita Yang Memilih (Orang)</label>
                        <input type="number" name="jumlah_wanita_memilih" class="form-control" value="{{ old('jumlah_wanita_memilih', 0) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pria Yang Memilih (Orang)</label>
                        <input type="number" name="jumlah_pria_memilih" class="form-control" value="{{ old('jumlah_pria_memilih', 0) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Penggunaan Hak Pilih (Orang)</label>
                        <input type="number" name="jumlah_penggunaan_hak_pilih" class="form-control" value="{{ old('jumlah_penggunaan_hak_pilih', 0) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Persentase</label>
                        <input type="number" name="persentase" class="form-control" value="{{ old('persentase', 0) }}" step="0.01">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.politik.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
