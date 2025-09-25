@extends('layouts.master')

@section('title', 'Tambah Data Pertanggungjawaban Kepala Desa/Lurah')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Pertanggungjawaban Kepala desa/lurah
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.store') }}" method="POST">
            @csrf

            {{-- Tanggal --}}
            <div class="mb-4">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar-alt me-1"></i> Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                    id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Bagian Laporan & Informasi --}}
            <h5 class="fw-bold text-primary border-bottom pb-2 mb-3">
                <i class="fas fa-file-alt me-1"></i> Laporan & Informasi
            </h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Penyampaian Laporan Kepala Desa ke BPD</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="penyampaian_laporan" value="ada"
                                {{ old('penyampaian_laporan') == 'ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="penyampaian_laporan" value="tidak_ada"
                                {{ old('penyampaian_laporan') == 'tidak_ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="jumlah_informasi" class="form-label fw-semibold">
                        Jumlah Informasi yang Disampaikan
                    </label>
                    <input type="number" class="form-control @error('jumlah_informasi') is-invalid @enderror"
                        name="jumlah_informasi" id="jumlah_informasi" value="{{ old('jumlah_informasi') }}">
                    @error('jumlah_informasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row g-3 mt-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Status Laporan Pertanggungjawaban</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_laporan" value="diterima"
                                {{ old('status_laporan') == 'diterima' ? 'checked' : '' }}>
                            <label class="form-check-label">Diterima</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_laporan" value="ditolak"
                                {{ old('status_laporan') == 'ditolak' ? 'checked' : '' }}>
                            <label class="form-check-label">Ditolak</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Laporan Kinerja Kepala Desa/Lurah</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="laporan_kinerja" value="diterima"
                                {{ old('laporan_kinerja') == 'diterima' ? 'checked' : '' }}>
                            <label class="form-check-label">Diterima</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="laporan_kinerja" value="ditolak"
                                {{ old('laporan_kinerja') == 'ditolak' ? 'checked' : '' }}>
                            <label class="form-check-label">Ditolak</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian Pengaduan & Media --}}
            <h5 class="fw-bold text-primary border-bottom pb-2 mt-4 mb-3">
                <i class="fas fa-bullhorn me-1"></i> Pengaduan & Media
            </h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="jumlah_media_informasi" class="form-label fw-semibold">
                        Jumlah Media Informasi
                    </label>
                    <input type="number" class="form-control @error('jumlah_media_informasi') is-invalid @enderror"
                        name="jumlah_media_informasi" id="jumlah_media_informasi" value="{{ old('jumlah_media_informasi') }}">
                    @error('jumlah_media_informasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="jumlah_pengaduan_diterima" class="form-label fw-semibold">
                        Jumlah Pengaduan Diterima Kepala desa/Lurah
                    </label>
                    <input type="number" class="form-control @error('jumlah_pengaduan_diterima') is-invalid @enderror"
                        name="jumlah_pengaduan_diterima" id="jumlah_pengaduan_diterima" value="{{ old('jumlah_pengaduan_diterima') }}">
                    @error('jumlah_pengaduan_diterima')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="jumlah_pengaduan_selesai" class="form-label fw-semibold">
                        Jumlah Pengaduan Selesai
                    </label>
                    <input type="number" class="form-control @error('jumlah_pengaduan_selesai') is-invalid @enderror"
                        name="jumlah_pengaduan_selesai" id="jumlah_pengaduan_selesai" value="{{ old('jumlah_pengaduan_selesai') }}">
                    @error('jumlah_pengaduan_selesai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index') }}"
                        class="btn btn-outline-secondary rounded">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary rounded">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
