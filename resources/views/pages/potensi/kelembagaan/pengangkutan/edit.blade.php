@extends('layouts.master')

@section('title', 'Edit Data Usaha Jasa Pengangkutan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Edit Data Usaha Jasa Pengangkutan</h5>
    </div>
    <div class="card-body">
        <form id="form-usaha-jasa-edit">

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" class="form-control" value="2025-10-02" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kategori *</label>
                        <select class="form-control" required>
                            <option>-- Pilih --</option>
                            <option selected>Angkutan Penumpang</option>
                            <option>Angkutan Barang</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Angkutan *</label>
                        <select class="form-control" required>
                            <option>-- Pilih --</option>
                            <option selected>Bus</option>
                            <option>Mobil Travel</option>
                            <option>Ojek</option>
                            <option>Truk</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah (Unit)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                </div>
            </div>

            {{-- Data Kegiatan --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Kegiatan</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pemilik (Orang)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kapasitas (Orang/Unit)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tenaga Kerja (Orang)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Alamat Kantor</label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat kantor" value="Jl. Contoh No.1">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Ruang Lingkup Kegiatan</label>
                        <input type="text" class="form-control" placeholder="Contoh: Desa / Kecamatan" value="Desa XYZ">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
                <a href="{{ route('potensi.kelembagaan.pengangkutan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
