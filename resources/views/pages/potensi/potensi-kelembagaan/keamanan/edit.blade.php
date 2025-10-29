@extends('layouts.master')

@section('title', 'Edit Data Lembaga Keamanan')

@section('content')
{{-- Memeriksa apakah pengguna memiliki izin 'keamanan.edit' --}}
@can('keamanan.edit')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-pencil-square me-2"></i>Edit Form Data Lembaga Keamanan
        </h5>
    </div>
    <div class="card-body p-4">
        <form id="form-lembaga-keamanan" action="{{ route('potensi.potensi-kelembagaan.keamanan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- SECTION 1: Hansip dan Linmas --}}
            <div class="mb-2 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-people me-2"></i>Hansip dan Linmas</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="tanggal" class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}" required>
                        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="keberadaan_hansip_linmas" class="form-label fw-semibold">Keberadaan Hansip & Linmas</label>
                        <select id="keberadaan_hansip_linmas" class="form-select @error('keberadaan_hansip_linmas') is-invalid @enderror" name="keberadaan_hansip_linmas">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_hansip_linmas', $data->keberadaan_hansip_linmas) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_hansip_linmas', $data->keberadaan_hansip_linmas) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                        @error('keberadaan_hansip_linmas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_hansip" class="form-label fw-semibold">Jumlah Anggota Hansip</label>
                        <div class="input-group">
                            <input type="number" id="jumlah_hansip" class="form-control" name="jumlah_hansip" value="{{ old('jumlah_hansip', $data->jumlah_hansip) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_satgas_linmas" class="form-label fw-semibold">Jumlah Anggota Satgas Linmas</label>
                        <div class="input-group">
                            <input type="number" id="jumlah_satgas_linmas" class="form-control" name="jumlah_satgas_linmas" value="{{ old('jumlah_satgas_linmas', $data->jumlah_satgas_linmas) }}" min="0">
                             <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pelaksanaan_siskamling" class="form-label fw-semibold">Pelaksanaan Siskamling</label>
                        <select id="pelaksanaan_siskamling" class="form-control" name="pelaksanaan_siskamling">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('pelaksanaan_siskamling', $data->pelaksanaan_siskamling) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('pelaksanaan_siskamling', $data->pelaksanaan_siskamling) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_pos_kamling" class="form-label fw-semibold">Jumlah Pos Kamling</label>
                        <div class="input-group">
                            <input type="number" id="jumlah_pos_kamling" class="form-control" name="jumlah_pos_kamling" value="{{ old('jumlah_pos_kamling', $data->jumlah_pos_kamling) }}" min="0">
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
                        <select id="keberadaan_satpam_swakarsa" class="form-select" name="keberadaan_satpam_swakarsa">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_satpam_swakarsa', $data->keberadaan_satpam_swakarsa) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_satpam_swakarsa', $data->keberadaan_satpam_swakarsa) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_anggota_satpam" class="form-label fw-semibold">Jumlah Anggota</label>
                        <div class="input-group">
                            <input type="number" id="jumlah_anggota_satpam" class="form-control" name="jumlah_anggota_satpam" value="{{ old('jumlah_anggota_satpam', $data->jumlah_anggota_satpam) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_organisasi_induk" class="form-label fw-semibold">Nama Organisasi Induk</label>
                        <input type="text" id="nama_organisasi_induk" class="form-control" name="nama_organisasi_induk" value="{{ old('nama_organisasi_induk', $data->nama_organisasi_induk) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="pemilik_organisasi_id" class="form-label fw-semibold">Pemilik Organisasi</label>
                        <select id="pemilik_organisasi_id" class="form-select" name="pemilik_organisasi_id">
                            <option value="">-- Pilih --</option>
                            @foreach($pemilik as $p)
                                <option value="{{ $p->id }}" {{ old('pemilik_organisasi_id', $data->pemilik_organisasi_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="keberadaan_organisasi_lain" class="form-label fw-semibold">Keberadaan Organisasi Keamanan Lainnya</label>
                        <select id="keberadaan_organisasi_lain" class="form-select" name="keberadaan_organisasi_lain">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_organisasi_lain', $data->keberadaan_organisasi_lain) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_organisasi_lain', $data->keberadaan_organisasi_lain) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
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
                        <select id="mitra_koramil_tni" class="form-select" name="mitra_koramil_tni">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('mitra_koramil_tni', $data->mitra_koramil_tni) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('mitra_koramil_tni', $data->mitra_koramil_tni) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah_anggota_koramil_tni" class="form-label fw-semibold">Jumlah Anggota</label>
                        <div class="input-group">
                            <input type="number" id="jumlah_anggota_koramil_tni" class="form-control" name="jumlah_anggota_koramil_tni" value="{{ old('jumlah_anggota_koramil_tni', $data->jumlah_anggota_koramil_tni) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah_kegiatan_koramil_tni" class="form-label fw-semibold">Jumlah Kegiatan</label>
                        <div class="input-group">
                            <input type="number" id="jumlah_kegiatan_koramil_tni" class="form-control" name="jumlah_kegiatan_koramil_tni" value="{{ old('jumlah_kegiatan_koramil_tni', $data->jumlah_kegiatan_koramil_tni) }}" min="0">
                            <span class="input-group-text">Kali</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="babinkantibmas_polri" class="form-label fw-semibold">Babinkamtibmas/POLRI</label>
                        <select id="babinkantibmas_polri" class="form-select" name="babinkantibmas_polri">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('babinkantibmas_polri', $data->babinkantibmas_polri) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('babinkantibmas_polri', $data->babinkantibmas_polri) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah_anggota_babinkantibmas" class="form-label fw-semibold">Jumlah Anggota</label>
                        <div class="input-group">
                            <input type="number" id="jumlah_anggota_babinkantibmas" class="form-control" name="jumlah_anggota_babinkantibmas" value="{{ old('jumlah_anggota_babinkantibmas', $data->jumlah_anggota_babinkantibmas) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="jumlah_kegiatan_babinkantibmas" class="form-label fw-semibold">Jumlah Kegiatan</label>
                        <div class="input-group">
                            <input type="number" id="jumlah_kegiatan_babinkantibmas" class="form-control" name="jumlah_kegiatan_babinkantibmas" value="{{ old('jumlah_kegiatan_babinkantibmas', $data->jumlah_kegiatan_babinkantibmas) }}" min="0">
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
                    <i class="fas fa-save me-1"></i> Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@else
    {{-- Jika pengguna tidak punya izin, tampilkan pesan ini --}}
    <div class="alert alert-danger mt-3 text-center">
         <h4 class="alert-heading">Akses Ditolak!</h4>
        <p>Maaf, Anda tidak memiliki izin untuk mengubah data ini.</p>
    </div>
@endcan
@endsection