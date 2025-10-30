@extends('layouts.master')

@section('title', 'Tambah Data Lembaga Keamanan')

@section('content')
@can('keamanan.create')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-shield-plus me-2"></i>Form Tambah Data Lembaga Keamanan
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('potensi.potensi-kelembagaan.keamanan.store') }}" method="POST">
            @csrf

            {{-- SECTION 1: Hansip dan Linmas --}}
            <div class="mb-2 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-people me-2"></i>Hansip dan Linmas</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="tanggal" class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="keberadaan_hansip_linmas" class="form-label fw-semibold">Keberadaan Hansip & Linmas</label>
                        <select name="keberadaan_hansip_linmas" id="keberadaan_hansip_linmas" class="form-select @error('keberadaan_hansip_linmas') is-invalid @enderror">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_hansip_linmas') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_hansip_linmas') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                         @error('keberadaan_hansip_linmas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_hansip" class="form-label fw-semibold">Jumlah Anggota Hansip</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_hansip" id="jumlah_hansip" class="form-control" value="{{ old('jumlah_hansip', 0) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_satgas_linmas" class="form-label fw-semibold">Jumlah Anggota Satgas Linmas</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_satgas_linmas" id="jumlah_satgas_linmas" class="form-control" value="{{ old('jumlah_satgas_linmas', 0) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pelaksanaan_siskamling" class="form-label fw-semibold">Pelaksanaan Siskamling</label>
                        <select name="pelaksanaan_siskamling" id="pelaksanaan_siskamling" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('pelaksanaan_siskamling') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('pelaksanaan_siskamling') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_pos_kamling" class="form-label fw-semibold">Jumlah Pos Kamling</label>
                         <div class="input-group">
                            <input type="number" name="jumlah_pos_kamling" id="jumlah_pos_kamling" class="form-control" value="{{ old('jumlah_pos_kamling', 0) }}" min="0">
                            <span class="input-group-text">Pos</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Satpam Swakarsa --}}
            <div class="mb-2 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-building me-2"></i>Satpam Swakarsa</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="keberadaan_satpam_swakarsa" class="form-label fw-semibold">Keberadaan SATPAM SWAKARSA</label>
                        <select name="keberadaan_satpam_swakarsa" id="keberadaan_satpam_swakarsa" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_satpam_swakarsa') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_satpam_swakarsa') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_anggota_satpam" class="form-label fw-semibold">Jumlah Anggota</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_anggota_satpam" id="jumlah_anggota_satpam" class="form-control" value="{{ old('jumlah_anggota_satpam', 0) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_organisasi_induk" class="form-label fw-semibold">Nama Organisasi Induk</label>
                        <input type="text" name="nama_organisasi_induk" id="nama_organisasi_induk" class="form-control" value="{{ old('nama_organisasi_induk') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="pemilik_organisasi_id" class="form-label fw-semibold">Pemilik Organisasi</label>
                        <select name="pemilik_organisasi_id" id="pemilik_organisasi_id" class="form-select">
                            <option value="">-- Pilih --</option>
                            @foreach($pemilik as $p)
                                <option value="{{ $p->id }}" {{ old('pemilik_organisasi_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="keberadaan_organisasi_lain" class="form-label fw-semibold">Keberadaan Organisasi Keamanan Lainnya</label>
                        <select name="keberadaan_organisasi_lain" id="keberadaan_organisasi_lain" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_organisasi_lain') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_organisasi_lain') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- SECTION 3: Kerjasama dengan TNI - POLRI --}}
            <div class="mb-2 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-flag me-2"></i>Kerjasama dengan TNI - POLRI</h6>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="mitra_koramil_tni" class="form-label fw-semibold">Mitra Koramil/TNI</label>
                        <select name="mitra_koramil_tni" id="mitra_koramil_tni" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('mitra_koramil_tni') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('mitra_koramil_tni') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah_anggota_koramil_tni" class="form-label fw-semibold">Jumlah Anggota</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_anggota_koramil_tni" id="jumlah_anggota_koramil_tni" class="form-control" value="{{ old('jumlah_anggota_koramil_tni', 0) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah_kegiatan_koramil_tni" class="form-label fw-semibold">Jumlah Kegiatan</label>
                         <div class="input-group">
                            <input type="number" name="jumlah_kegiatan_koramil_tni" id="jumlah_kegiatan_koramil_tni" class="form-control" value="{{ old('jumlah_kegiatan_koramil_tni', 0) }}" min="0">
                            <span class="input-group-text">Kali</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="babinkantibmas_polri" class="form-label fw-semibold">Babinkamtibmas/POLRI</label>
                        <select name="babinkantibmas_polri" id="babinkantibmas_polri" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('babinkantibmas_polri') == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('babinkantibmas_polri') == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah_anggota_babinkantibmas" class="form-label fw-semibold">Jumlah Anggota</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_anggota_babinkantibmas" id="jumlah_anggota_babinkantibmas" class="form-control" value="{{ old('jumlah_anggota_babinkantibmas', 0) }}" min="0">
                             <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah_kegiatan_babinkantibmas" class="form-label fw-semibold">Jumlah Kegiatan</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_kegiatan_babinkantibmas" id="jumlah_kegiatan_babinkantibmas" class="form-control" value="{{ old('jumlah_kegiatan_babinkantibmas', 0) }}" min="0">
                            <span class="input-group-text">Kali</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                @can('keamanan.index')
                <a href="{{ route('potensi.potensi-kelembagaan.keamanan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                @endcan
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@else
    {{-- Jika pengguna tidak punya izin, tampilkan pesan ini --}}
    <div class="alert alert-danger mt-3 text-center">
         <h4 class="alert-heading">Akses Ditolak!</h4>
        <p>Maaf, Anda tidak memiliki izin untuk membuat data Lembaga Keamanan baru.</p>
    </div>
@endcan
@endsection