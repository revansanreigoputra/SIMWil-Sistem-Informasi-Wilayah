@extends('layouts.master')

@section('title', 'Tambah Data Lahan Pemeliharaan dan Pakan Ternak')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Lahan Pemeliharaan dan Pakan Ternak
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('lahan-pakan-ternak.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="fas fa-calendar me-1"></i>
                                Tanggal <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Kesediaan Hijauan Pakan Ternak</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_tanaman_pakan_ternak" class="form-label">Luas Tanaman Pakan Ternak (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="luas_tanaman_pakan_ternak"
                                name="luas_tanaman_pakan_ternak" value="{{ old('luas_tanaman_pakan_ternak', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="produksi_hijauan_makanan_ternak" class="form-label">Produksi Hijauan Makanan
                                Ternak (Ton/Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="produksi_hijauan_makanan_ternak"
                                name="produksi_hijauan_makanan_ternak"
                                value="{{ old('produksi_hijauan_makanan_ternak', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dipasok_dari_luar_desa_kelurahan" class="form-label">Dipasok Dari Luar
                                Desa/Kelurahan (Ton)</label>
                            <input type="number" step="0.01" class="form-control" id="dipasok_dari_luar_desa_kelurahan"
                                name="dipasok_dari_luar_desa_kelurahan"
                                value="{{ old('dipasok_dari_luar_desa_kelurahan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="disubsidi_dinas" class="form-label">Disubsidi Dinas (Ton)</label>
                            <input type="number" step="0.01" class="form-control" id="disubsidi_dinas"
                                name="disubsidi_dinas" value="{{ old('disubsidi_dinas', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lainnya_pakan_ternak" class="form-label">Lainnya (Ton)</label>
                            <input type="number" step="0.01" class="form-control" id="lainnya_pakan_ternak"
                                name="lainnya_pakan_ternak" value="{{ old('lainnya_pakan_ternak', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Lahan Pemeliharaan Ternak/Padang Penggembalaan</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_masyarakat_umum" class="form-label">Milik Masyarakat Umum (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_masyarakat_umum"
                                name="milik_masyarakat_umum" value="{{ old('milik_masyarakat_umum', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_perusahaan_peternakan_ranch" class="form-label">Milik Perusahaan
                                Peternakan/Ranch (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_perusahaan_peternakan_ranch"
                                name="milik_perusahaan_peternakan_ranch"
                                value="{{ old('milik_perusahaan_peternakan_ranch', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_perorangan" class="form-label">Milik Perorangan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_perorangan"
                                name="milik_perorangan" value="{{ old('milik_perorangan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sewa_pakai" class="form-label">Sewa Pakai (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="sewa_pakai" name="sewa_pakai"
                                value="{{ old('sewa_pakai', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_pemerintah" class="form-label">Milik Pemerintah (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_pemerintah"
                                name="milik_pemerintah" value="{{ old('milik_pemerintah', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="milik_masyarakat_adat" class="form-label">Milik Masyarakat Adat (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="milik_masyarakat_adat"
                                name="milik_masyarakat_adat" value="{{ old('milik_masyarakat_adat', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lainnya_pemeliharaan_ternak" class="form-label">Lainnya (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="lainnya_pemeliharaan_ternak"
                                name="lainnya_pemeliharaan_ternak" value="{{ old('lainnya_pemeliharaan_ternak', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_lahan_gembalaan" class="form-label">Luas Lahan Gembalaan (Ha)</label>
                            <input type="number" step="0.01" class="form-control" id="luas_lahan_gembalaan"
                                name="luas_lahan_gembalaan" value="{{ old('luas_lahan_gembalaan', 0) }}">
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Field dengan tanda <span class="text-danger">*</span> wajib diisi
                            </small>

                            <div class="btn-group gap-2">
                                <a href="{{ route('lahan-pakan-ternak.index') }}"
                                    class="btn btn-outline-secondary rounded">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary rounded">
                                    Simpan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
