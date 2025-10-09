@extends('layouts.master')

@section('title', 'Tambah Data Partisipasi Politik')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Partisipasi Politik</h5>
    </div>
    <div class="card-body">
        <form id="form-partisipasi-politik">

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" class="form-control" value="2025-10-02" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Partisipasi Politik *</label>
                        <select class="form-control" required>
                            <option>-- Pilih --</option>
                            <option>Pemilu Desa</option>
                            <option>Pemilihan RT/RW</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Wanita Yang Memiliki Hak Pilih (Orang)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pria Yang Memiliki Hak Pilih (Orang)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pemilih (Orang)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Wanita Yang Memilih (Orang)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pria Yang Memilih (Orang)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Penggunaan Hak Pilih (Orang)</label>
                        <input type="number" class="form-control" value="0">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Persentase</label>
                        <input type="number" class="form-control" value="0" step="0.01">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.kelembagaan.politik.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
