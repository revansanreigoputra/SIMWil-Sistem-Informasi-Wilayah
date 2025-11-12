@extends('layouts.master')

@section('title', 'Tambah Data Pembunuhan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Pembunuhan
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.pembunuhan.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka sesuai migration --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Pembunuhan Pada Tahun Ini <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_tahun_ini" min="0"
                           class="form-control @error('jumlah_kasus_tahun_ini') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_tahun_ini') }}" required>
                    @error('jumlah_kasus_tahun_ini')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus dengan Korban Penduduk Setempat <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_korban_penduduk" min="0"
                           class="form-control @error('jumlah_kasus_korban_penduduk') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_korban_penduduk') }}" required>
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
                           value="{{ old('jumlah_kasus_pelaku_penduduk') }}" required>
                    @error('jumlah_kasus_pelaku_penduduk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Bunuh Diri <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_bunuh_diri" min="0"
                           class="form-control @error('jumlah_kasus_bunuh_diri') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_bunuh_diri') }}" required>
                    @error('jumlah_kasus_bunuh_diri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus yang Diproses Secara Hukum <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_diproses_hukum" min="0"
                           class="form-control @error('jumlah_kasus_diproses_hukum') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_diproses_hukum') }}" required>
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
                    <a href="{{ route('perkembangan.keamanandanketertiban.pembunuhan.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
