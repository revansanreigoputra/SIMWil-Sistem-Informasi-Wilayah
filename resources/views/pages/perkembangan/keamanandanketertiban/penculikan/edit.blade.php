@extends('layouts.master')

@section('title', 'Edit Data Penculikan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Penculikan
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.penculikan.update', $penculikan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           id="tanggal" name="tanggal"
                           value="{{ old('tanggal', \Carbon\Carbon::parse($penculikan->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka sesuai kolom di migration --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Penculikan <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_penculikan" min="0"
                           class="form-control @error('jumlah_kasus_penculikan') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_penculikan', $penculikan->jumlah_kasus_penculikan) }}" required>
                    @error('jumlah_kasus_penculikan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus dengan Korban Penduduk Setempat <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_korban_penduduk" min="0"
                           class="form-control @error('jumlah_kasus_korban_penduduk') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_korban_penduduk', $penculikan->jumlah_kasus_korban_penduduk) }}" required>
                    @error('jumlah_kasus_korban_penduduk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus dengan Pelaku Penduduk Setempat <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_pelaku_penduduk" min="0"
                           class="form-control @error('jumlah_kasus_pelaku_penduduk') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_pelaku_penduduk', $penculikan->jumlah_kasus_pelaku_penduduk) }}" required>
                    @error('jumlah_kasus_pelaku_penduduk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus yang Diproses Hukum <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_diproses_hukum" min="0"
                           class="form-control @error('jumlah_kasus_diproses_hukum') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_diproses_hukum', $penculikan->jumlah_kasus_diproses_hukum) }}" required>
                    @error('jumlah_kasus_diproses_hukum')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.keamanandanketertiban.penculikan.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
