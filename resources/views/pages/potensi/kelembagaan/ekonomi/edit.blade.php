@extends('layouts.master')

@section('title', 'Edit Data Lembaga Ekonomi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Edit Data Lembaga Ekonomi</h5>
    </div>
    <div class="card-body">
        <form id="form-lembaga-ekonomi">

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" class="form-control" value="2025-10-02" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kategori Lembaga *</label>
                        <select class="form-control" required>
                            <option>-- Pilih --</option>
                            <option selected>Koperasi</option>
                            <option>UMKM</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Lembaga *</label>
                        <select class="form-control" required>
                            <option>-- Pilih --</option>
                            <option selected>Produksi</option>
                            <option>Perdagangan</option>
                            <option>Jasa</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control" value="5">
                    </div>
                </div>
            </div>

            {{-- Data Kegiatan --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Kegiatan</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pengurus (Orang)</label>
                        <input type="number" class="form-control" value="10">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Jenis Kegiatan</label>
                        <input type="number" class="form-control" value="3">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Alamat Kantor</label>
                        <input type="text" class="form-control" value="Jl. Contoh No. 1">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Ruang Lingkup Kegiatan</label>
                        <input type="text" class="form-control" value="Desa Contoh">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
                 <a href="{{ route('potensi.kelembagaan.ekonomi.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
