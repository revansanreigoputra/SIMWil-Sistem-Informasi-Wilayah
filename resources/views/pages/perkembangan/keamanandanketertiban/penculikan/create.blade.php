@extends('layouts.master')

@section('title', 'Tambah Data Penculikan')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.penculikan.index') }}" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Penculikan
        </h5>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('perkembangan.keamanandanketertiban.penculikan.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <!-- Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>
            </div>

            <!-- Data Penculikan -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jumlah_kasus_penculikan" class="form-label fw-semibold">Jumlah Kasus Penculikan <span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_kasus_penculikan" id="jumlah_kasus_penculikan" class="form-control" value="{{ old('jumlah_kasus_penculikan') }}" min="0"required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_kasus_korban_penduduk" class="form-label fw-semibold">Jumlah Kasus dengan Korban Penduduk Setempat<span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_kasus_korban_penduduk" id="jumlah_kasus_korban_penduduk" class="form-control" value="{{ old('jumlah_kasus_korban_penduduk') }}" min="0"required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_kasus_pelaku_penduduk" class="form-label fw-semibold">Jumlah Kasus dengan Pelaku Penduduk Setempat<span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_kasus_pelaku_penduduk" id="jumlah_kasus_pelaku_penduduk" class="form-control" value="{{ old('jumlah_kasus_pelaku_penduduk') }}" min="0"required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_kasus_diproses_hukum" class="form-label fw-semibold">Jumlah Kasus Diselesaikan Secara Hukum<span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_kasus_diproses_hukum" id="jumlah_kasus_diproses_hukum" class="form-control" value="{{ old('jumlah_kasus_diproses_hukum') }}" min="0"required>
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
