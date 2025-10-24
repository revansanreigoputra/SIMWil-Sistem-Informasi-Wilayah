@extends('layouts.master')

@section('title', 'Tambah Data Sistem Keamanan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Sistem Keamanan
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.store') }}" method="POST">
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

            {{-- Kolom ENUM (Radio Button) --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold d-block">
                        Organisasi Siskamling <span class="text-danger">*</span>
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="organisasi_siskamling" id="siskamling_ada" value="Ada" 
                            {{ old('organisasi_siskamling') == 'Ada' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="siskamling_ada">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="organisasi_siskamling" id="siskamling_tidak" value="Tidak Ada" 
                            {{ old('organisasi_siskamling') == 'Tidak Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="siskamling_tidak">Tidak Ada</label>
                    </div>
                    @error('organisasi_siskamling')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold d-block">
                        Organisasi Pertahanan Sipil <span class="text-danger">*</span>
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="organisasi_pertahanan_sipil" id="sipil_ada" value="Ada" 
                            {{ old('organisasi_pertahanan_sipil') == 'Ada' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="sipil_ada">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="organisasi_pertahanan_sipil" id="sipil_tidak" value="Tidak Ada" 
                            {{ old('organisasi_pertahanan_sipil') == 'Tidak Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="sipil_tidak">Tidak Ada</label>
                    </div>
                    @error('organisasi_pertahanan_sipil')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input Angka --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah RT atau Pos Ronda <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_rt_atau_pos_ronda" min="0"
                           class="form-control @error('jumlah_rt_atau_pos_ronda') is-invalid @enderror"
                           value="{{ old('jumlah_rt_atau_pos_ronda') }}" required>
                    @error('jumlah_rt_atau_pos_ronda')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Anggota Hansip dan Linmas <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_anggota_hansip_dan_linmas" min="0"
                           class="form-control @error('jumlah_anggota_hansip_dan_linmas') is-invalid @enderror"
                           value="{{ old('jumlah_anggota_hansip_dan_linmas') }}" required>
                    @error('jumlah_anggota_hansip_dan_linmas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- ENUM Lanjutan (Radio Button) --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold d-block">
                        Jadwal Kegiatan Siskamling <span class="text-danger">*</span>
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jadwal_kegiatan_siskamling" id="jadwal_ada" value="Ada" 
                            {{ old('jadwal_kegiatan_siskamling') == 'Ada' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="jadwal_ada">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jadwal_kegiatan_siskamling" id="jadwal_tidak" value="Tidak Ada" 
                            {{ old('jadwal_kegiatan_siskamling') == 'Tidak Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jadwal_tidak">Tidak Ada</label>
                    </div>
                    @error('jadwal_kegiatan_siskamling')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold d-block">
                        Buku Anggota Hansip dan Linmas <span class="text-danger">*</span>
                    </label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="buku_anggota_hansip_linmas" id="buku_ada" value="Ada" 
                            {{ old('buku_anggota_hansip_linmas') == 'Ada' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="buku_ada">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="buku_anggota_hansip_linmas" id="buku_tidak" value="Tidak Ada" 
                            {{ old('buku_anggota_hansip_linmas') == 'Tidak Ada' ? 'checked' : '' }}>
                        <label class="form-check-label" for="buku_tidak">Tidak Ada</label>
                    </div>
                    @error('buku_anggota_hansip_linmas')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input Angka Lanjutan --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">
                        Jumlah Kelompok Satpam Swasta <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kelompok_satpam_swasta" min="0"
                           class="form-control @error('jumlah_kelompok_satpam_swasta') is-invalid @enderror"
                           value="{{ old('jumlah_kelompok_satpam_swasta') }}" required>
                    @error('jumlah_kelompok_satpam_swasta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">
                        Jumlah Pembinaan Siskamling <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_pembinaan_siskamling" min="0"
                           class="form-control @error('jumlah_pembinaan_siskamling') is-invalid @enderror"
                           value="{{ old('jumlah_pembinaan_siskamling') }}" required>
                    @error('jumlah_pembinaan_siskamling')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">
                        Jumlah Pos Jaga Induk Desa <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_pos_jaga_induk_desa" min="0"
                           class="form-control @error('jumlah_pos_jaga_induk_desa') is-invalid @enderror"
                           value="{{ old('jumlah_pos_jaga_induk_desa') }}" required>
                    @error('jumlah_pos_jaga_induk_desa')
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
                    <a href="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.index') }}" class="btn btn-outline-secondary">
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
