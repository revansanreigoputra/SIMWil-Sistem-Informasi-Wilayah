@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-3 mb-4">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Form Surat Rekomendasi RT</h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form>
                        <h5 class="mb-3 text-primary">Data Pemohon</h5>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap">
                        </div>

                        <div class="mb-3">
                            <label for="ttl" class="form-label">Tempat / Tanggal Lahir</label>
                            <input type="text" class="form-control" id="ttl" placeholder="Contoh: Bandung, 12 Maret 1995">
                        </div>

                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                            <select id="jk" class="form-select">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select id="agama" class="form-select">
                                <option value="">-- Pilih Agama --</option>
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Katolik</option>
                                <option>Hindu</option>
                                <option>Buddha</option>
                                <option>Konghucu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" placeholder="Masukkan NIK">
                        </div>

                        <div class="mb-3">
                            <label for="keperluan" class="form-label">Keperluan Rekomendasi</label>
                            <textarea id="keperluan" class="form-control" rows="3" placeholder="Tuliskan keperluan surat"></textarea>
                        </div>

                        <div class="text-end">
                            <button type="reset" class="btn btn-secondary">Batal</button>
                            <button type="submit" class="btn btn-primary">Cetak Surat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection