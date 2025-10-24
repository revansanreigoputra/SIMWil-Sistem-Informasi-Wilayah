@extends('layouts.master')

@section('title', 'Tambah Data Lembaga Keamanan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Tambah Data Lembaga Keamanan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('potensi.potensi-kelembagaan.keamanan.store') }}" method="POST">
            @csrf

            {{-- Hansip dan Linmas --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Hansip dan Linmas</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Keberadaan Hansip dan Linmas</label>
                        <select name="keberadaan_hansip_linmas" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_hansip_linmas') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_hansip_linmas') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota Hansip</label>
                        <input type="number" name="jumlah_hansip" class="form-control" value="{{ old('jumlah_hansip', 0) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota Satgas Linmas</label>
                        <input type="number" name="jumlah_satgas_linmas" class="form-control" value="{{ old('jumlah_satgas_linmas', 0) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pelaksanaan Siskamling</label>
                        <select name="pelaksanaan_siskamling" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('pelaksanaan_siskamling') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('pelaksanaan_siskamling') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pos Kamling</label>
                        <input type="number" name="jumlah_pos_kamling" class="form-control" value="{{ old('jumlah_pos_kamling', 0) }}">
                    </div>
                </div>
            </div>

            {{-- Satpam Swakarsa --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Satpam Swakarsa</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Keberadaan SATPAM SWAKARSA</label>
                        <select name="keberadaan_satpam_swakarsa" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_satpam_swakarsa') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_satpam_swakarsa') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota</label>
                        <input type="number" name="jumlah_anggota_satpam" class="form-control" value="{{ old('jumlah_anggota_satpam', 0) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Organisasi Induk</label>
                        <input type="text" name="nama_organisasi_induk" class="form-control" value="{{ old('nama_organisasi_induk') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pemilik Organisasi</label>
                        <select name="pemilik_organisasi_id" class="form-control">
                            <option value="">-- Pilih --</option>
                            @foreach($pemilik as $p)
                                <option value="{{ $p->id }}" {{ old('pemilik_organisasi_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Keberadaan Organisasi Keamanan Lainnya</label>
                        <select name="keberadaan_organisasi_lain" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_organisasi_lain') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_organisasi_lain') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
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
                        <select name="mitra_koramil_tni" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('mitra_koramil_tni') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('mitra_koramil_tni') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota</label>
                        <input type="number" name="jumlah_anggota_koramil_tni" class="form-control" value="{{ old('jumlah_anggota_koramil_tni', 0) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Kegiatan</label>
                        <input type="number" name="jumlah_kegiatan_koramil_tni" class="form-control" value="{{ old('jumlah_kegiatan_koramil_tni', 0) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Babinkantibmas/POLRI</label>
                        <select name="babinkantibmas_polri" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('babinkantibmas_polri') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('babinkantibmas_polri') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota</label>
                        <input type="number" name="jumlah_anggota_babinkantibmas" class="form-control" value="{{ old('jumlah_anggota_babinkantibmas', 0) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Kegiatan</label>
                        <input type="number" name="jumlah_kegiatan_babinkantibmas" class="form-control" value="{{ old('jumlah_kegiatan_babinkantibmas', 0) }}">
                    </div>
                </div>
            </div>

            <p class="text-muted fst-italic">* Field Yang Wajib Diisi</p>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.keamanan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection