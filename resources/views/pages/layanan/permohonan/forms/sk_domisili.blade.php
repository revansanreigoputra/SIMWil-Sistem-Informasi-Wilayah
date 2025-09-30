@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-3 mb-4">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Form Surat Keterangan Domisili</h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form>
                        <h5 class="mb-3 text-primary">Data Penduduk</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" value="Rizal">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat / Tanggal Lahir</label>
                                <input type="text" class="form-control" value="Indramayu / 13 Agustus 2025">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="Perempuan">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Agama</label>
                                <input type="text" class="form-control" value="Islam">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea rows="2" class="form-control">Jatibarang RT.21 RW.6 , Desa DABO BARU</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" value="LINGGA">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kabupaten</label>
                                <input type="text" class="form-control" value="LINGGA">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" value="32121">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No KK</label>
                                <input type="text" class="form-control" value="1234567">
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <a href="{{ url('layanan/surat') }}" class="btn btn-light border">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan (Dummy)
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
