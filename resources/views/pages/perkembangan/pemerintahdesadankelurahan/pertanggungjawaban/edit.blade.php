@extends('layouts.master')

@section('title', 'Edit Data Pertanggungjawaban Kepala Desa/Lurah')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2"></i>
            Edit Data Pertanggungjawaban
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.update', $pertanggungjawaban->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
            <!-- Kolom Tanggal -->
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar me-1"></i>
                    Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                    id="tanggal" name="tanggal"
                    value="{{ old('tanggal', \Carbon\Carbon::parse($pertanggungjawaban->tanggal)->format('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kolom Desa -->
            <div class="col-md-6 mb-3">
                <label for="id_desa" class="form-label fw-semibold">
                    <i class="fas fa-map-marker-alt me-1"></i>
                    Desa <span class="text-danger">*</span>
                </label>
                <select name="id_desa" id="id_desa" class="form-control" required>
                    <option value="">-- Pilih Desa --</option>
                    @foreach ($desas as $item)
                        <option value="{{ $item->id }}" {{ old('id_desa', $pertanggungjawaban->id_desa) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_desa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <h5 class="fw-bold text-primary mb-3">Laporan & Informasi</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Penyampaian Laporan Kepala Desa ke BPD</label>
                    <div class="d-flex gap-3">
                        <div>
                            <input type="radio" name="penyampaian_laporan" value="ada"
                                {{ old('penyampaian_laporan', $pertanggungjawaban->penyampaian_laporan) == 'ada' ? 'checked' : '' }}>
                            <label class="ms-1">Ada</label>
                        </div>
                        <div>
                            <input type="radio" name="penyampaian_laporan" value="tidak_ada"
                                {{ old('penyampaian_laporan', $pertanggungjawaban->penyampaian_laporan) == 'tidak_ada' ? 'checked' : '' }}>
                            <label class="ms-1">Tidak Ada</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_informasi" class="form-label fw-semibold">Jumlah Informasi yang Disampaikan</label>
                    <input type="number" class="form-control @error('jumlah_informasi') is-invalid @enderror"
                        name="jumlah_informasi" id="jumlah_informasi"
                        value="{{ old('jumlah_informasi', $pertanggungjawaban->jumlah_informasi) }}">
                    @error('jumlah_informasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status Laporan Pertanggungjawaban</label>
                    <div class="d-flex gap-3">
                        <div>
                            <input type="radio" name="status_laporan" value="diterima"
                                {{ old('status_laporan', $pertanggungjawaban->status_laporan) == 'diterima' ? 'checked' : '' }}>
                            <label class="ms-1">Diterima</label>
                        </div>
                        <div>
                            <input type="radio" name="status_laporan" value="ditolak"
                                {{ old('status_laporan', $pertanggungjawaban->status_laporan) == 'ditolak' ? 'checked' : '' }}>
                            <label class="ms-1">Ditolak</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Laporan Kinerja Kepala Desa/Lurah</label>
                    <div class="d-flex gap-3">
                        <div>
                            <input type="radio" name="laporan_kinerja" value="diterima"
                                {{ old('laporan_kinerja', $pertanggungjawaban->laporan_kinerja) == 'diterima' ? 'checked' : '' }}>
                            <label class="ms-1">Diterima</label>
                        </div>
                        <div>
                            <input type="radio" name="laporan_kinerja" value="ditolak"
                                {{ old('laporan_kinerja', $pertanggungjawaban->laporan_kinerja) == 'ditolak' ? 'checked' : '' }}>
                            <label class="ms-1">Ditolak</label>
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="fw-bold text-primary mb-3">Pengaduan & Media</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="jumlah_media_informasi" class="form-label fw-semibold">Jumlah Media Informasi</label>
                    <input type="number" class="form-control @error('jumlah_media_informasi') is-invalid @enderror"
                        name="jumlah_media_informasi" id="jumlah_media_informasi"
                        value="{{ old('jumlah_media_informasi', $pertanggungjawaban->jumlah_media_informasi) }}">
                    @error('jumlah_media_informasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_pengaduan_diterima" class="form-label fw-semibold">Jumlah Pengaduan Diterima</label>
                    <input type="number" class="form-control @error('jumlah_pengaduan_diterima') is-invalid @enderror"
                        name="jumlah_pengaduan_diterima" id="jumlah_pengaduan_diterima"
                        value="{{ old('jumlah_pengaduan_diterima', $pertanggungjawaban->jumlah_pengaduan_diterima) }}">
                    @error('jumlah_pengaduan_diterima')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_pengaduan_selesai" class="form-label fw-semibold">Jumlah Pengaduan Selesai</label>
                    <input type="number" class="form-control @error('jumlah_pengaduan_selesai') is-invalid @enderror"
                        name="jumlah_pengaduan_selesai" id="jumlah_pengaduan_selesai"
                        value="{{ old('jumlah_pengaduan_selesai', $pertanggungjawaban->jumlah_pengaduan_selesai) }}">
                    @error('jumlah_pengaduan_selesai')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Field dengan tanda <span class="text-danger">*</span> wajib diisi
                </small>

                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index') }}"
                        class="btn btn-outline-secondary rounded">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary rounded">
                        Perbarui Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
