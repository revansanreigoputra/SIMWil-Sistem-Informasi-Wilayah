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
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form>
                        {{-- Nomor Surat --}}
                        <h5 class="mb-3 text-primary">Nomor Surat</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nomor Surat</label>
                                <input type="text" class="form-control" value="001/KHC/I/2017">
                            </div>
                        </div>

                        {{-- Data Pejabat Penandatangan --}}
                        <h5 class="mb-3 text-primary">Data Pejabat Penandatangan</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Pejabat</label>
                                <input type="text" class="form-control" value="Carmadi">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" class="form-control" value="Kepala Desa">
                            </div>
                        </div>

                        {{-- Data Pemohon --}}
                        <h5 class="mb-3 text-primary">Data Pemohon</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" value="DESI MARETA">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat / Tanggal Lahir</label>
                                <input type="text" class="form-control" value="Dabo Singkep / 15 Mei 1984">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select">
                                    <option selected>Perempuan</option>
                                    <option>Laki-laki</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Agama</label>
                                <select class="form-select">
                                    <option selected>Islam</option>
                                    <option>Kristen</option>
                                    <option>Katolik</option>
                                    <option>Hindu</option>
                                    <option>Buddha</option>
                                    <option>Konghucu</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea rows="2" class="form-control">Jalan Lurung Rayan RT.12 RW.12, Desa Dabo Baru, Kecamatan Lingga, Kabupaten Lingga</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" value="2104015505840000">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No KK</label>
                                <input type="text" class="form-control" value="654321">
                            </div>
                        </div>

                        {{-- Data Tanah --}}
                        <h5 class="mb-3 text-primary">Data Tanah</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nomor Sertifikat Tanah</label>
                                <input type="text" class="form-control" value="0123456789">
                            </div>
                        </div>

                        {{-- Tanggal Surat --}}
                        <h5 class="mb-3 text-primary">Tanggal Surat</h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" value="2017-01-26">
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
