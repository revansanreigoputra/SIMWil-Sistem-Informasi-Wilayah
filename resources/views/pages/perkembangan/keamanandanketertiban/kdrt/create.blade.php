@extends('layouts.master')

@section('title', 'Tambah Data Kekerasan Dalam Rumah Tangga')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Kekerasan Dalam Rumah Tangga
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.kdrt.store') }}" method="POST">
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

                <!-- Kolom Desa -->
                <div class="col-md-6 mb-3">
                    <label for="id_desa" class="form-label fw-semibold">
                        <i class="fas fa-map-marker-alt me-1"></i> Desa <span class="text-danger">*</span>
                    </label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('id_desa') == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka sesuai migration --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Suami terhadap Istri <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_suami_terhadap_istri" min="0"
                           class="form-control @error('jumlah_kasus_suami_terhadap_istri') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_suami_terhadap_istri') }}" required>
                    @error('jumlah_kasus_suami_terhadap_istri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Istri terhadap Suami <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_istri_terhadap_suami" min="0"
                           class="form-control @error('jumlah_kasus_istri_terhadap_suami') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_istri_terhadap_suami') }}" required>
                    @error('jumlah_kasus_istri_terhadap_suami')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Orang Tua terhadap Anak <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_orangtua_terhadap_anak" min="0"
                           class="form-control @error('jumlah_kasus_orangtua_terhadap_anak') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_orangtua_terhadap_anak') }}" required>
                    @error('jumlah_kasus_orangtua_terhadap_anak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Anak terhadap Orang Tua <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_anak_terhadap_orangtua" min="0"
                           class="form-control @error('jumlah_kasus_anak_terhadap_orangtua') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_anak_terhadap_orangtua') }}" required>
                    @error('jumlah_kasus_anak_terhadap_orangtua')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Kepala Keluarga terhadap Anggota Keluarga Lainnya <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_kepala_keluarga_terhadap_anggota_lainnya" min="0"
                           class="form-control @error('jumlah_kasus_kepala_keluarga_terhadap_anggota_lainnya') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_kepala_keluarga_terhadap_anggota_lainnya') }}" required>
                    @error('jumlah_kasus_kepala_keluarga_terhadap_anggota_lainnya')
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
                    <a href="{{ route('perkembangan.keamanandanketertiban.kdrt.index') }}" class="btn btn-outline-secondary">
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
