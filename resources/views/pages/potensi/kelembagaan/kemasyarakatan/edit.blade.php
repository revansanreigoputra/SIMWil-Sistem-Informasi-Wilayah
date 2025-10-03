@extends('layouts.master')

@section('title', 'Edit Data Lembaga Kemasyarakatan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Edit Data Lembaga Kemasyarakatan</h5>
    </div>
    <div class="card-body">
        <form id="form-lembaga-kemasyarakatan">

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" class="form-control" value="2025-10-02" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Lembaga *</label>
                        <select class="form-control" required>
                            <option>-- Pilih --</option>
                            <option selected>Karang Taruna</option>
                            <option>PKK</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah</label>
                        <input type="number" class="form-control" value="10">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Dasar Hukum Pembentukan *</label>
                        <select class="form-control" required>
                            <option>-- Pilih --</option>
                            <option selected>Peraturan Desa</option>
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
                        <label class="form-label">Jumlah Pengurus (Orang)</label>
                        <input type="number" class="form-control" value="5">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Jenis Kegiatan</label>
                        <input type="number" class="form-control" value="2">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Alamat Kantor</label>
                        <input type="text" class="form-control" value="Jl. Contoh No.1, Desa XYZ">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Ruang Lingkup Kegiatan</label>
                        <input type="text" class="form-control" value="Desa / Kecamatan">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Data
                </button>
                <a href="{{ route('potensi.kelembagaan.kemasyarakatan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
