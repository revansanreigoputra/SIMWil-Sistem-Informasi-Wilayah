@extends('layouts.master')

@section('title', 'Edit Data Partisipasi Politik')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Partisipasi Politik</h5>
    </div>
    <div class="card-body">
        {{-- Form Edit --}}
        <form action="{{ route('potensi.potensi-kelembagaan.politik.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    {{-- Tanggal --}}
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control"
                               value="{{ old('tanggal', $data->tanggal) }}" required>
                        @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Partisipasi Politik --}}
                    <div class="col-md-6">
                        <label class="form-label">Partisipasi Politik *</label>
                        <select name="partisipasi_politik_id" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach($partisipasi as $p)
                                <option value="{{ $p->id }}"
                                    {{ old('partisipasi_politik_id', $data->partisipasi_politik_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('partisipasi_politik_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Jumlah Wanita Hak Pilih --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Wanita Yang Memiliki Hak Pilih (Orang)</label>
                        <input type="number" name="jumlah_wanita_hak_pilih" class="form-control"
                               value="{{ old('jumlah_wanita_hak_pilih', $data->jumlah_wanita_hak_pilih) }}" min="0">
                        @error('jumlah_wanita_hak_pilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Jumlah Pria Hak Pilih --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pria Yang Memiliki Hak Pilih (Orang)</label>
                        <input type="number" name="jumlah_pria_hak_pilih" class="form-control"
                               value="{{ old('jumlah_pria_hak_pilih', $data->jumlah_pria_hak_pilih) }}" min="0">
                        @error('jumlah_pria_hak_pilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Jumlah Pemilih --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pemilih (Orang)</label>
                        <input type="number" name="jumlah_pemilih" class="form-control"
                               value="{{ old('jumlah_pemilih', $data->jumlah_pemilih) }}" min="0">
                        @error('jumlah_pemilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Jumlah Wanita Memilih --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Wanita Yang Memilih (Orang)</label>
                        <input type="number" name="jumlah_wanita_memilih" class="form-control"
                               value="{{ old('jumlah_wanita_memilih', $data->jumlah_wanita_memilih) }}" min="0">
                        @error('jumlah_wanita_memilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Jumlah Pria Memilih --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pria Yang Memilih (Orang)</label>
                        <input type="number" name="jumlah_pria_memilih" class="form-control"
                               value="{{ old('jumlah_pria_memilih', $data->jumlah_pria_memilih) }}" min="0">
                        @error('jumlah_pria_memilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Jumlah Penggunaan Hak Pilih --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Penggunaan Hak Pilih (Orang)</label>
                        <input type="number" name="jumlah_penggunaan_hak_pilih" class="form-control"
                               value="{{ old('jumlah_penggunaan_hak_pilih', $data->jumlah_penggunaan_hak_pilih) }}" min="0">
                        @error('jumlah_penggunaan_hak_pilih') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Persentase --}}
                    <div class="col-md-6">
                        <label class="form-label">Persentase (%)</label>
                        <input type="number" name="persentase" class="form-control"
                               value="{{ old('persentase', $data->persentase) }}" step="0.01" min="0">
                        @error('persentase') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.politik.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
