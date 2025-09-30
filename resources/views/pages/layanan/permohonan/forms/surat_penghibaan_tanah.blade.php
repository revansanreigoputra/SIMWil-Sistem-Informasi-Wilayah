@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-3 mb-4">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Form Surat Penghibahan Tanah</h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form>
                        {{-- Data Pihak Pertama --}}
                        <h5 class="mb-3 text-primary">Data Pihak Pertama (Pemberi Hibah)</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" placeholder="Nama Pemberi">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat/Tgl Lahir</label>
                                <input type="text" class="form-control" placeholder="Yogyakarta, 10 Januari 1965">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" placeholder="Petani">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" placeholder="3401123456789001">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea rows="2" class="form-control" placeholder="Alamat lengkap pemberi hibah"></textarea>
                            </div>
                        </div>

                        {{-- Data Pihak Kedua --}}
                        <h5 class="mb-3 text-primary">Data Pihak Kedua (Penerima Hibah)</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" placeholder="Nama Penerima">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat/Tgl Lahir</label>
                                <input type="text" class="form-control" placeholder="Yogyakarta, 5 Mei 1990">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" placeholder="Wiraswasta">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" placeholder="3401123456789002">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea rows="2" class="form-control" placeholder="Alamat lengkap penerima hibah"></textarea>
                            </div>
                        </div>

                        {{-- Data Tanah --}}
                        <h5 class="mb-3 text-primary">Data Tanah</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi Tanah</label>
                                <input type="text" class="form-control" placeholder="Dusun Karangjati, Desa Dabo Baru">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Luas Tanah</label>
                                <input type="text" class="form-control" placeholder="300 m²">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Status Tanah</label>
                                <input type="text" class="form-control" placeholder="Hak Milik (SHM No...)">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Batas Utara</label>
                                <input type="text" class="form-control" placeholder="Tanah milik Bapak Suroso">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Batas Selatan</label>
                                <input type="text" class="form-control" placeholder="Jalan Desa">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Batas Timur</label>
                                <input type="text" class="form-control" placeholder="Tanah milik Ibu Sulastri">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Batas Barat</label>
                                <input type="text" class="form-control" placeholder="Sungai Kecil">
                            </div>
                        </div>

                        {{-- Saksi & Kepala Desa --}}
                        <h5 class="mb-3 text-primary">Saksi & Kepala Desa</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Saksi 1</label>
                                <input type="text" class="form-control" placeholder="Nama Saksi 1">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Saksi 2</label>
                                <input type="text" class="form-control" placeholder="Nama Saksi 2">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Kepala Desa</label>
                                <input type="text" class="form-control" value="Carmadi">
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="button" class="btn btn-primary">
                                <i class="fas fa-eye me-1"></i> Preview Surat
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection