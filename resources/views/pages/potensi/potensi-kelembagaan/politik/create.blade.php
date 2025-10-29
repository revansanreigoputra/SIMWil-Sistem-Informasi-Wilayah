@extends('layouts.master')

@section('title', 'Tambah Data Partisipasi Politik')

@section('content')
@can('lembaga-politik.create')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-person-lines-fill me-2"></i>Form Tambah Data Partisipasi Politik
        </h5>
    </div>

    <div class="card-body p-4">
    <form action="{{ route('potensi.potensi-kelembagaan.politik.store') }}" method="POST">
        @csrf

        {{-- SECTION 1: Data Umum --}}
        <div class="mb-3 border rounded-3 p-4 bg-light">
            <h6 class="fw-bold mb-3 text-primary">
                <i class="bi bi-info-circle me-1"></i> Data Umum Partisipasi Politik
            </h6>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" class="form-control" 
                        value="{{ old('tanggal', date('Y-m-d')) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jenis Partisipasi Politik <span class="text-danger">*</span></label>
                    <select name="partisipasi_politik_id" class="form-select" required>
                        <option value="">-- Pilih Partisipasi Politik --</option>
                        @foreach ($partisipasi as $item)
                            <option value="{{ $item->id }}" {{ old('partisipasi_politik_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('partisipasi_politik_id') 
                        <small class="text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>
        </div>

        {{-- SECTION 2: Data Pemilih --}}
        {{-- Diubah ke col-md-4 agar jadi 3 kolom sejajar --}}
        <div class="mb-3 border rounded-3 p-4 bg-light">
            <h6 class="fw-bold mb-3 text-primary">
                <i class="bi bi-people-fill me-1"></i> Data Pemilih
            </h6>

            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Jumlah Wanita Hak Pilih</label>
                    <div class="input-group">
                        <input type="number" name="jumlah_wanita_hak_pilih" class="form-control text-end"
                            value="{{ old('jumlah_wanita_hak_pilih', 0) }}" min="0">
                        <span class="input-group-text">Orang</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Jumlah Pria Hak Pilih</label>
                    <div class="input-group">
                        <input type="number" name="jumlah_pria_hak_pilih" class="form-control text-end"
                            value="{{ old('jumlah_pria_hak_pilih', 0) }}" min="0">
                        <span class="input-group-text">Orang</span>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Jumlah Pemilih</label>
                    <div class="input-group">
                        <input type="number" name="jumlah_pemilih" class="form-control text-end"
                            value="{{ old('jumlah_pemilih', 0) }}" min="0">
                        <span class="input-group-text">Orang</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION 3: Penggunaan Hak Pilih --}}
        <div class="mb-3 border rounded-3 p-4 bg-light">
            <h6 class="fw-bold mb-3 text-primary">
                <i class="bi bi-bar-chart-line me-1"></i> Penggunaan Hak Pilih
            </h6>

            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jumlah Wanita Memilih</label>
                    <div class="input-group">
                        <input type="number" name="jumlah_wanita_memilih" class="form-control text-end"
                            value="{{ old('jumlah_wanita_memilih', 0) }}" min="0">
                        <span class="input-group-text">Orang</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jumlah Pria Memilih</label>
                    <div class="input-group">
                        <input type="number" name="jumlah_pria_memilih" class="form-control text-end"
                            value="{{ old('jumlah_pria_memilih', 0) }}" min="0">
                        <span class="input-group-text">Orang</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Jumlah Penggunaan Hak Pilih</label>
                    <div class="input-group">
                        <input type="number" name="jumlah_penggunaan_hak_pilih" class="form-control text-end"
                            value="{{ old('jumlah_penggunaan_hak_pilih', 0) }}" min="0">
                        <span class="input-group-text">Orang</span>
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Persentase</label>
                    <div class="input-group">
                        <input type="number" name="persentase" class="form-control text-end"
                            value="{{ old('persentase', 0) }}" step="0.01" min="0">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('potensi.potensi-kelembagaan.politik.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Simpan Data
            </button>
        </div>
    </form>
</div>
</div>
@else
<div class="alert alert-danger mt-3">
    <i class="bi bi-exclamation-triangle me-2"></i>
    Kamu tidak memiliki izin untuk menambahkan data Partisipasi Politik.
</div>
@endcan
@endsection

