@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-3 mb-4">
        <i class="fas fa-building text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Form Surat Rekomendasi Ijin Tempat</h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form>
                        {{-- Data Pemohon --}}
                        <h5 class="mb-3 text-primary">Data Pemohon</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">NIK / Nama</label>
                                <input type="text" class="form-control" placeholder="Masukkan NIK/Nama penduduk">
                            </div>
                        </div>

                        {{-- Data Surat --}}
                        <h5 class="mb-3 text-primary">Data Surat</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No Surat</label>
                                <input type="text" class="form-control" value="003/DS-DB/IX/2025">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>

                        {{-- Detail Keperluan --}}
                        <h5 class="mb-3 text-primary">Detail Keperluan</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Keperluan</label>
                                <input type="text" class="form-control" placeholder="Contoh: Pembukaan Usaha Toko Sembako">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Lokasi</label>
                                <input type="text" class="form-control" placeholder="Contoh: Jl. Merdeka No. 45, Desa Dabo Baru">
                            </div>
                        </div>

                        {{-- Pejabat Penandatangan --}}
                        <h5 class="mb-3 text-primary">Pejabat Penandatangan</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Tanda Tangan</label>
                                <select class="form-select">
                                    <option value="Carmadi :: Kepala Desa">Carmadi :: Kepala Desa</option>
                                    <option value="Esti :: Bendahara">Esti :: Bendahara</option>
                                    <option value="Asah :: Sekretaris Desa">Asah :: Sekretaris Desa</option>
                                </select>
                            </div>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="mt-4 text-end">
                            <a href="{{ url('layanan/permohonan') }}" class="btn btn-light border shadow-sm">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-eye me-1"></i> Preview Surat
                            </button>
                            <button type="submit" class="btn btn-success">
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