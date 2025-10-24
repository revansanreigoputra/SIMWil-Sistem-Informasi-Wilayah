@extends('layouts.master')

@section('title', 'Edit Data Lembaga Keamanan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Edit Form Data Lembaga Keamanan</h5>
    </div>
    <div class="card-body">
        <form id="form-lembaga-keamanan" action="{{ route('potensi.potensi-kelembagaan.keamanan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Hansip dan Linmas --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Hansip dan Linmas</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Keberadaan Hansip dan Linmas</label>
                        <select class="form-control" name="keberadaan_hansip_linmas">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_hansip_linmas', $data->keberadaan_hansip_linmas) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_hansip_linmas', $data->keberadaan_hansip_linmas) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota Hansip</label>
                        <input type="number" class="form-control" name="jumlah_hansip" value="{{ old('jumlah_hansip', $data->jumlah_hansip) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota Satgas Linmas</label>
                        <input type="number" class="form-control" name="jumlah_satgas_linmas" value="{{ old('jumlah_satgas_linmas', $data->jumlah_satgas_linmas) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pelaksanaan Siskamling</label>
                        <select class="form-control" name="pelaksanaan_siskamling">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('pelaksanaan_siskamling', $data->pelaksanaan_siskamling) == 'Ada' ? 'selected' : '' }}>Ya</option>
                            <option value="Tidak Ada" {{ old('pelaksanaan_siskamling', $data->pelaksanaan_siskamling) == 'Tidak Ada' ? 'selected' : '' }}>Tidak</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pos Kamling</label>
                        <input type="number" class="form-control" name="jumlah_pos_kamling" value="{{ old('jumlah_pos_kamling', $data->jumlah_pos_kamling) }}">
                    </div>
                </div>
            </div>

            {{-- Satpam Swakarsa --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Satpam Swakarsa</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Keberadaan SATPAM SWAKARSA</label>
                        <select class="form-control" name="keberadaan_satpam_swakarsa">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_satpam_swakarsa', $data->keberadaan_satpam_swakarsa) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_satpam_swakarsa', $data->keberadaan_satpam_swakarsa) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota</label>
                        <input type="number" class="form-control" name="jumlah_anggota_satpam" value="{{ old('jumlah_anggota_satpam', $data->jumlah_anggota_satpam) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Organisasi Induk</label>
                        <input type="text" class="form-control" name="nama_organisasi_induk" value="{{ old('nama_organisasi_induk', $data->nama_organisasi_induk) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Pemilik Organisasi</label>
                        <select class="form-control" name="pemilik_organisasi_id">
                            <option value="">-- Pilih --</option>
                            @foreach($pemilik as $p)
                                <option value="{{ $p->id }}" {{ old('pemilik_organisasi_id', $data->pemilik_organisasi_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Keberadaan Organisasi Keamanan Lainnya</label>
                        <select class="form-control" name="keberadaan_organisasi_lain">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('keberadaan_organisasi_lain', $data->keberadaan_organisasi_lain) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('keberadaan_organisasi_lain', $data->keberadaan_organisasi_lain) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
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
                        <select class="form-control" name="mitra_koramil_tni">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('mitra_koramil_tni', $data->mitra_koramil_tni) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('mitra_koramil_tni', $data->mitra_koramil_tni) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota</label>
                        <input type="number" class="form-control" name="jumlah_anggota_koramil_tni" value="{{ old('jumlah_anggota_koramil_tni', $data->jumlah_anggota_koramil_tni) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Kegiatan</label>
                        <input type="number" class="form-control" name="jumlah_kegiatan_koramil_tni" value="{{ old('jumlah_kegiatan_koramil_tni', $data->jumlah_kegiatan_koramil_tni) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Babinkantibmas/POLRI</label>
                        <select class="form-control" name="babinkantibmas_polri">
                            <option value="">-- Pilih --</option>
                            <option value="Ada" {{ old('babinkantibmas_polri', $data->babinkantibmas_polri) == 'Ada' ? 'selected' : '' }}>Ada</option>
                            <option value="Tidak Ada" {{ old('babinkantibmas_polri', $data->babinkantibmas_polri) == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Anggota</label>
                        <input type="number" class="form-control" name="jumlah_anggota_babinkantibmas" value="{{ old('jumlah_anggota_babinkantibmas', $data->jumlah_anggota_babinkantibmas) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Kegiatan</label>
                        <input type="number" class="form-control" name="jumlah_kegiatan_babinkantibmas" value="{{ old('jumlah_kegiatan_babinkantibmas', $data->jumlah_kegiatan_babinkantibmas) }}">
                    </div>
                </div>
            </div>

            <p class="text-muted fst-italic">* Field Yang Wajib Diisi</p>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Update Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.keamanan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
