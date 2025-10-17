@extends('layouts.master')

@section('title', 'Edit Data Lembaga Adat')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Edit Data Lembaga Adat</h5>
    </div>
    <div class="card-body">
        <form id="form-lembaga-adat">

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" class="form-control" value="2025-10-02" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pemangku Adat</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Tokoh Adat 1</option>
                            <option>Tokoh Adat 2</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kepengurusan Adat</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Pengurus 1</option>
                            <option>Pengurus 2</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Simbol Adat --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Simbol Adat</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Rumah Adat</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Ya</option>
                            <option>Tidak</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Barang Pusaka</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Ya</option>
                            <option>Tidak</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Naskah-Naskah</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Ya</option>
                            <option>Tidak</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lainnya</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Tidak</option>
                            <option>Ya</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Kegiatan Adat --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Kegiatan Adat</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Musyawarah Adat</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Sanksi Adat</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Ya</option>
                            <option>Tidak</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Upacara Adat Perkawinan</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upacara Adat Kematian</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upacara Adat Kelahiran</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upacara Adat Dalam Bercocok Tanam</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upacara Adat Bidang Perikanan/Laut</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upacara Adat Bidang Kehutanan</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upacara Adat Pengelolaan SDA</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upacara Adat Pembangunan Rumah</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Upacara Adat Penyelesaian Masalah</label>
                        <select class="form-control">
                            <option>-- Pilih --</option>
                            <option selected>Dilaksanakan</option>
                            <option>Tidak Dilaksanakan</option>
                        </select>
                    </div>
                </div>
            </div>

            <p class="text-muted fst-italic">* Field Yang Wajib Diisi</p>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Data
                </button>
                 <a href="{{ route('potensi.kelembagaan.adat.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
            </div>

        </form>
    </div>
</div>
@endsection
