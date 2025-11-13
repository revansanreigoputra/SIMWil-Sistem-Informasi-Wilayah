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
        <form id="formPertanggungjawaban" action="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i>
                        Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                        name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Bagian Laporan & Informasi --}}
            <h5 class="fw-bold text-primary border-bottom pb-2 mb-3">
                <i class="fas fa-file-alt me-1"></i> Laporan & Informasi
            </h5>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Penyampaian Laporan Kepala Desa ke BPD <span class="text-danger">*</span>
                    </label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="penyampaian_laporan" value="ada"
                                {{ old('penyampaian_laporan') == 'ada' ? 'checked' : '' }} required>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="penyampaian_laporan" value="tidak_ada"
                                {{ old('penyampaian_laporan') == 'tidak_ada' ? 'checked' : '' }} required>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="jumlah_informasi" class="form-label fw-semibold">
                        Jumlah Informasi yang Disampaikan <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control @error('jumlah_informasi') is-invalid @enderror"
                        name="jumlah_informasi" id="jumlah_informasi" value="{{ old('jumlah_informasi') }}" required>
                    @error('jumlah_informasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Status Laporan Pertanggungjawaban <span class="text-danger">*</span>
                    </label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_laporan" value="diterima"
                                {{ old('status_laporan') == 'diterima' ? 'checked' : '' }} required>
                            <label class="form-check-label">Diterima</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_laporan" value="ditolak"
                                {{ old('status_laporan') == 'ditolak' ? 'checked' : '' }} required>
                            <label class="form-check-label">Ditolak</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Laporan Kinerja Kepala Desa/Lurah <span class="text-danger">*</span>
                    </label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="laporan_kinerja" value="diterima"
                                {{ old('laporan_kinerja') == 'diterima' ? 'checked' : '' }} required>
                            <label class="form-check-label">Diterima</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="laporan_kinerja" value="ditolak"
                                {{ old('laporan_kinerja') == 'ditolak' ? 'checked' : '' }} required>
                            <label class="form-check-label">Ditolak</label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bagian Pengaduan & Media --}}
            <h5 class="fw-bold text-primary border-bottom pb-2 mt-4 mb-3">
                <i class="fas fa-bullhorn me-1"></i> Pengaduan & Media
            </h5>
            <div class="row">
                <div class="col-md-4">
                    <label for="jumlah_media_informasi" class="form-label fw-semibold">
                        Jumlah Media Informasi <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control @error('jumlah_media_informasi') is-invalid @enderror"
                        name="jumlah_media_informasi" id="jumlah_media_informasi" value="{{ old('jumlah_media_informasi') }}" required>
                    @error('jumlah_media_informasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="jumlah_pengaduan_diterima" class="form-label fw-semibold">
                        Jumlah Pengaduan Diterima Kepala desa/Lurah <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control @error('jumlah_pengaduan_diterima') is-invalid @enderror"
                        name="jumlah_pengaduan_diterima" id="jumlah_pengaduan_diterima" value="{{ old('jumlah_pengaduan_diterima') }}" required>
                    @error('jumlah_pengaduan_diterima')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="jumlah_pengaduan_selesai" class="form-label fw-semibold">
                        Jumlah Pengaduan Selesai <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control @error('jumlah_pengaduan_selesai') is-invalid @enderror"
                        name="jumlah_pengaduan_selesai" id="jumlah_pengaduan_selesai" value="{{ old('jumlah_pengaduan_selesai') }}" required>
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
{{-- ✅ JavaScript Validasi Jumlah Pengaduan --}}
<script>
document.getElementById('formPertanggungjawaban').addEventListener('submit', function(e) {
    const diterima = parseInt(document.getElementById('jumlah_pengaduan_diterima').value) || 0;
    const selesai = parseInt(document.getElementById('jumlah_pengaduan_selesai').value) || 0;

    if (selesai > diterima) {
        e.preventDefault();
        alert('Jumlah pengaduan selesai tidak boleh lebih besar dari jumlah pengaduan yang diterima.');
        document.getElementById('jumlah_pengaduan_selesai').focus();
    }
});
</script>

@endsection
