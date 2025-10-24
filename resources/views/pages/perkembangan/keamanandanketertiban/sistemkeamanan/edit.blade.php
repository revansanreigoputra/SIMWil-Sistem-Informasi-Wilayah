@extends('layouts.master')

@section('title', 'Edit Data Sistem Keamanan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Sistem Keamanan
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.update', $sistemkeamanan->id) }}" method="POST">
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
                           value="{{ old('tanggal', \Carbon\Carbon::parse($sistemkeamanan->tanggal)->format('Y-m-d')) }}" required>
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
                            <option value="{{ $desa->id }}" {{ old('id_desa', $sistemkeamanan->id_desa) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- ENUM PERTAMA --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold d-block">
                        Organisasi Siskamling <span class="text-danger">*</span>
                    </label>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="siskamling_ada" name="organisasi_siskamling" value="Ada"
                            class="form-check-input" {{ old('organisasi_siskamling', $sistemkeamanan->organisasi_siskamling) == 'Ada' ? 'checked' : '' }} required>
                        <label for="siskamling_ada" class="form-check-label">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="siskamling_tidak" name="organisasi_siskamling" value="Tidak Ada"
                            class="form-check-input" {{ old('organisasi_siskamling', $sistemkeamanan->organisasi_siskamling) == 'Tidak Ada' ? 'checked' : '' }}>
                        <label for="siskamling_tidak" class="form-check-label">Tidak Ada</label>
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
                        <input type="radio" id="pertahanan_ada" name="organisasi_pertahanan_sipil" value="Ada"
                            class="form-check-input" {{ old('organisasi_pertahanan_sipil', $sistemkeamanan->organisasi_pertahanan_sipil) == 'Ada' ? 'checked' : '' }} required>
                        <label for="pertahanan_ada" class="form-check-label">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="pertahanan_tidak" name="organisasi_pertahanan_sipil" value="Tidak Ada"
                            class="form-check-input" {{ old('organisasi_pertahanan_sipil', $sistemkeamanan->organisasi_pertahanan_sipil) == 'Tidak Ada' ? 'checked' : '' }}>
                        <label for="pertahanan_tidak" class="form-check-label">Tidak Ada</label>
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
                           value="{{ old('jumlah_rt_atau_pos_ronda', $sistemkeamanan->jumlah_rt_atau_pos_ronda) }}" required>
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
                           value="{{ old('jumlah_anggota_hansip_dan_linmas', $sistemkeamanan->jumlah_anggota_hansip_dan_linmas) }}" required>
                    @error('jumlah_anggota_hansip_dan_linmas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- ENUM LANJUTAN --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold d-block">
                        Jadwal Kegiatan Siskamling <span class="text-danger">*</span>
                    </label>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="jadwal_ada" name="jadwal_kegiatan_siskamling" value="Ada"
                            class="form-check-input" {{ old('jadwal_kegiatan_siskamling', $sistemkeamanan->jadwal_kegiatan_siskamling) == 'Ada' ? 'checked' : '' }} required>
                        <label for="jadwal_ada" class="form-check-label">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="jadwal_tidak" name="jadwal_kegiatan_siskamling" value="Tidak Ada"
                            class="form-check-input" {{ old('jadwal_kegiatan_siskamling', $sistemkeamanan->jadwal_kegiatan_siskamling) == 'Tidak Ada' ? 'checked' : '' }}>
                        <label for="jadwal_tidak" class="form-check-label">Tidak Ada</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold d-block">
                        Buku Anggota Hansip dan Linmas <span class="text-danger">*</span>
                    </label>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="buku_ada" name="buku_anggota_hansip_linmas" value="Ada"
                            class="form-check-input" {{ old('buku_anggota_hansip_linmas', $sistemkeamanan->buku_anggota_hansip_linmas) == 'Ada' ? 'checked' : '' }} required>
                        <label for="buku_ada" class="form-check-label">Ada</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="buku_tidak" name="buku_anggota_hansip_linmas" value="Tidak Ada"
                            class="form-check-input" {{ old('buku_anggota_hansip_linmas', $sistemkeamanan->buku_anggota_hansip_linmas) == 'Tidak Ada' ? 'checked' : '' }}>
                        <label for="buku_tidak" class="form-check-label">Tidak Ada</label>
                    </div>
                </div>
            </div>

            {{-- Input Angka Lanjutan --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">
                        Jumlah Kelompok Satpam Swasta <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kelompok_satpam_swasta" min="0"
                           class="form-control"
                           value="{{ old('jumlah_kelompok_satpam_swasta', $sistemkeamanan->jumlah_kelompok_satpam_swasta) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">
                        Jumlah Pembinaan Siskamling <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_pembinaan_siskamling" min="0"
                           class="form-control"
                           value="{{ old('jumlah_pembinaan_siskamling', $sistemkeamanan->jumlah_pembinaan_siskamling) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">
                        Jumlah Pos Jaga Induk Desa <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_pos_jaga_induk_desa" min="0"
                           class="form-control"
                           value="{{ old('jumlah_pos_jaga_induk_desa', $sistemkeamanan->jumlah_pos_jaga_induk_desa) }}" required>
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
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
