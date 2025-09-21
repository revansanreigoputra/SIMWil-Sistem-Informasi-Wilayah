@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-3 mb-4">
        <i class="fas fa-file-contract text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Form Surat Penghibaan Tanah</h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white fw-bold rounded-top-4">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Surat Penghibaan Tanah
                </div>
                <div class="card-body p-4">

                    <form>
                        {{-- PIHAK PERTAMA --}}
                        <h6 class="fw-bold text-primary mb-3">PIHAK PERTAMA</h6>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text" class="form-control rounded-3 shadow-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pekerjaan</label>
                            <input type="text" class="form-control rounded-3 shadow-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tempat, Tanggal Lahir</label>
                            <input type="text" class="form-control rounded-3 shadow-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tempat Lahir</label>
                            <input type="text" class="form-control rounded-3 shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea class="form-control rounded-3 shadow-sm" rows="2"></textarea>
                        </div>

                        {{-- PIHAK KEDUA --}}
                        <h6 class="fw-bold text-primary mb-3">PIHAK KEDUA</h6>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama</label>
                            <input type="text" class="form-control rounded-3 shadow-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pekerjaan</label>
                            <input type="text" class="form-control rounded-3 shadow-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tempat, Tanggal Lahir</label>
                            <input type="text" class="form-control rounded-3 shadow-sm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tempat Lahir</label>
                            <input type="text" class="form-control rounded-3 shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea class="form-control rounded-3 shadow-sm" rows="2"></textarea>
                        </div>

                        {{-- DETAIL HIBAH TANAH --}}
                        <h6 class="fw-bold text-primary mb-3">DETAIL HIBAH TANAH</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Panjang</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Contoh : 30 Meter">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Lebar</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Contoh : 40 Meter">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Luas Tanah (M²)</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" value="1200 M²">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Batas Timur</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Nama Warga Yang Berbatasan Dengan Timur">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Batas Barat</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Nama Warga Yang Berbatasan Dengan Barat">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Batas Utara</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Nama Warga Yang Berbatasan Dengan Utara">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Batas Selatan</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Nama Warga Yang Berbatasan Dengan Selatan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Penggunaan Hibah</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Contoh : Untuk dipergunakan pembangunan TOWER TELKOMSEL">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal Hibah</label>
                            <input type="date" class="form-control rounded-3 shadow-sm">
                        </div>

                        {{-- TANDA TANGAN --}}
                        <h6 class="fw-bold text-primary mb-3">TANDA TANGAN</h6>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tanda Tangan Kades</label>
                            <select class="form-select rounded-3 shadow-sm">
                                <option value="Carmadi :: Kepala Desa">Carmadi :: Kepala Desa</option>
                                <option value="Esti :: Bendahara">Esti :: Bendahara</option>
                                <option value="Asah :: Kepala Desa">Asah :: Kepala Desa</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanda Tangan Camat</label>
                            <select class="form-select rounded-3 shadow-sm">
                                <option value="Carmadi :: Kepala Desa">Carmadi :: Kepala Desa</option>
                                <option value="Esti :: Bendahara">Esti :: Bendahara</option>
                                <option value="Asah :: Kepala Desa">Asah :: Kepala Desa</option>
                            </select>
                        </div>

                        {{-- TOMBOL --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('layanan/permohonan') }}" 
                               class="btn btn-light border rounded-pill px-4 shadow-sm">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
