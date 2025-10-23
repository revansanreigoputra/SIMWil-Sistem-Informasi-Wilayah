@extends('layouts.master')

@section('title', 'Edit Data Kejahatan Seksual')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Kejahatan Seksual
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.seksual.update', $seksual->id) }}" method="POST">
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
                           value="{{ old('tanggal', \Carbon\Carbon::parse($seksual->tanggal)->format('Y-m-d')) }}" required>
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
                            <option value="{{ $desa->id }}" {{ old('id_desa', $seksual->id_desa) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka sesuai kolom di migration --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Perkosaan Pada Tahun Ini <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_perkosaan" min="0"
                           class="form-control @error('jumlah_kasus_perkosaan') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_perkosaan', $seksual->jumlah_kasus_perkosaan) }}" required>
                    @error('jumlah_kasus_perkosaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Perkosaan Anak Pada Tahun Ini <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_perkosaan_anak" min="0"
                           class="form-control @error('jumlah_kasus_perkosaan_anak') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_perkosaan_anak', $seksual->jumlah_kasus_perkosaan_anak) }}" required>
                    @error('jumlah_kasus_perkosaan_anak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Kehamilan di Luar Nikah Menurut Hukum Negara <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_hamil_luar_nikah_hukum_negara" min="0"
                           class="form-control @error('jumlah_kasus_hamil_luar_nikah_hukum_negara') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_hamil_luar_nikah_hukum_negara', $seksual->jumlah_kasus_hamil_luar_nikah_hukum_negara) }}" required>
                    @error('jumlah_kasus_hamil_luar_nikah_hukum_negara')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Kehamilan di Luar Nikah Menurut Hukum Adat <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_hamil_luar_nikah_hukum_adat" min="0"
                           class="form-control @error('jumlah_kasus_hamil_luar_nikah_hukum_adat') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_hamil_luar_nikah_hukum_adat', $seksual->jumlah_kasus_hamil_luar_nikah_hukum_adat) }}" required>
                    @error('jumlah_kasus_hamil_luar_nikah_hukum_adat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Tempat Penampungan / Persewaan Kamar Bagi Pekerja Seks <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_tempat_penampungan_pekerja_seks" min="0"
                           class="form-control @error('jumlah_tempat_penampungan_pekerja_seks') is-invalid @enderror"
                           value="{{ old('jumlah_tempat_penampungan_pekerja_seks', $seksual->jumlah_tempat_penampungan_pekerja_seks) }}" required>
                    @error('jumlah_tempat_penampungan_pekerja_seks')
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
                    <a href="{{ route('perkembangan.keamanandanketertiban.seksual.index') }}" class="btn btn-outline-secondary">
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
