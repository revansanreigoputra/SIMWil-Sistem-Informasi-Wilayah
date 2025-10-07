@extends('layouts.master')

@section('title', 'Tambah Data Lembaga Keamanan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 fw-bold"></i>Form Tambah Data Lembaga Keamanan</h5>
        </div>
        <div class="card-body">
            <form id="form-lembaga-keamanan">

                {{-- Hansip dan Linmas --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Hansip dan Linmas</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal *</label>
                            <input type="date" class="form-control" value="2025-10-02" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Keberadaan Hansip dan Linmas</label>
                            <select class="form-control">
                                <option>-- Pilih --</option>
                                <option>Ada</option>
                                <option>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Anggota Hansip</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Anggota Satgas Linmas</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pelaksanaan Siskamling</label>
                            <select class="form-control">
                                <option>-- Pilih --</option>
                                <option>Ya</option>
                                <option>Tidak</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Pos Kamling</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                    </div>
                </div>

                {{-- Satpam Swakarsa --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Satpam Swakarsa</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Keberadaan SATPAM SWAKARSA</label>
                            <select class="form-control">
                                <option>-- Pilih --</option>
                                <option>Ada</option>
                                <option>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Anggota</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nama Organisasi Induk</label>
                            <input type="text" class="form-control" placeholder="Nama Organisasi">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pemilik Organisasi</label>
                            <select class="form-control">
                                <option>-- Pilih --</option>
                                <option>Perorangan</option>
                                <option>Kelompok</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Keberadaan Organisasi Keamanan Lainnya</label>
                            <select class="form-control">
                                <option>-- Pilih --</option>
                                <option>Ada</option>
                                <option>Tidak Ada</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Kerjasama dengan TNI - POLRI --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Kerjasama dengan TNI - POLRI</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Mitra Koramil/TNI</label>
                            <select class="form-control">
                                <option>-- Pilih --</option>
                                <option>Ada</option>
                                <option>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Anggota</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Kegiatan</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Babinkantibmas/POLRI</label>
                            <select class="form-control">
                                <option>-- Pilih --</option>
                                <option>Ada</option>
                                <option>Tidak Ada</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Anggota</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Kegiatan</label>
                            <input type="number" class="form-control" value="0">
                        </div>
                    </div>
                </div>

                <p class="text-muted fst-italic">* Field Yang Wajib Diisi</p>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                    <a href="{{ route('potensi.kelembagaan.keamanan.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
