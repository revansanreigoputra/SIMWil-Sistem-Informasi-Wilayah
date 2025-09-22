@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-3 mb-4">
        <i class="fas fa-home text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Form Surat Rekomendasi Ijin Mendirikan Bangunan</h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white fw-bold rounded-top-4">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Surat Rekomendasi Ijin Mendirikan Bangunan
                </div>
                <div class="card-body p-4">

                    <form>
                        {{-- NIK / Nama --}}
                        <div class="mb-4">
                            <label for="nik" class="form-label fw-semibold">NIK / Nama</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" 
                                   id="nik" placeholder="Masukkan NIK/Nama, otomatis tampil jika sudah ada">
                        </div>

                        {{-- No Surat --}}
                        <div class="mb-4">
                            <label for="no_surat" class="form-label fw-semibold">No Surat</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" 
                                   id="no_surat" value="002/KHC/IX/2025">
                        </div>

                        {{-- Tanggal --}}
                        <div class="mb-4">
                            <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                            <input type="date" class="form-control rounded-3 shadow-sm" id="tanggal">
                        </div>

                        {{-- Nomor Tanah --}}
                        <div class="mb-4">
                            <label for="no_tanah" class="form-label fw-semibold">Nomor Tanah</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" 
                                   id="no_tanah" placeholder="Masukkan nomor tanah">
                        </div>

                        {{-- Tanda Tangan --}}
                        <div class="mb-4">
                            <label for="ttd" class="form-label fw-semibold">Tanda Tangan</label>
                            <select class="form-select rounded-3 shadow-sm" id="ttd">
                                <option value="Carmadi :: Kepala Desa">Carmadi :: Kepala Desa</option>
                                <option value="Esti :: Bendahara">Esti :: Bendahara</option>
                                <option value="Asah :: Kepala Desa">Asah :: Kepala Desa</option>
                            </select>
                        </div>

                        {{-- Tombol Aksi --}}
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
