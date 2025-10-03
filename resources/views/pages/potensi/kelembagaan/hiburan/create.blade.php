@extends('layouts.master')

@section('title', 'Tambah Data Usaha Jasa, Hiburan, dll')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold"> Form Tambah Data Usaha Jasa, Hiburan, dll</h5>
    </div>
    <div class="card-body">
        <form id="form-usaha-jasa-hiburan">

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
                            <option>Usaha Jasa</option>
                            <option>Hiburan</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Usaha *</label>
                        <select class="form-control" required>
                            <option>-- Pilih --</option>
                            <option>Salon / Spa</option>
                            <option>Warnet / Game Center</option>
                            <option>Karaoke</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah (Unit)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dasar Hukum Pembentukan *</label>
                        <select class="form-control" required>
                            <option>-- Pilih --</option>
                            <option>Peraturan Desa</option>
                            <option>Peraturan Bupati</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Data Kegiatan --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Kegiatan</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Tenaga Kerja yang Terserap (Orang)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Jenis Produk yang Diperdagangkan</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Alamat Usaha</label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat usaha">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Ruang Lingkup Usaha</label>
                        <input type="text" class="form-control" placeholder="Contoh: Desa / Kecamatan">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.kelembagaan.hiburan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
