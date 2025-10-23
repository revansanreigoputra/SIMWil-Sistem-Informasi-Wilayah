@extends('layouts.master')

@section('title', 'Tambah Batas Wilayah')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Batas Wilayah
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('batas-wilayah.store') }}" method="POST">
                @csrf

                <!-- Data Umum -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-info-circle text-primary me-2"></i>
                            Data Umum
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tahun_pembentukan" class="form-label fw-semibold">
                                        <i class="fas fa-calendar me-1"></i>
                                        Tahun Pembentukan
                                    </label>
                                    <input type="text" class="form-control @error('tahun_pembentukan') is-invalid @enderror"
                                        id="tahun_pembentukan" name="tahun_pembentukan" value="{{ old('tahun_pembentukan') }}"
                                        placeholder="Masukkan tahun pembentukan">
                                    @error('tahun_pembentukan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="luas_desa" class="form-label fw-semibold">
                                        <i class="fas fa-map me-1"></i>
                                        Luas Desa
                                    </label>
                                    <input type="text" class="form-control @error('luas_desa') is-invalid @enderror"
                                        id="luas_desa" name="luas_desa" value="{{ old('luas_desa') }}"
                                        placeholder="Masukkan luas desa">
                                    @error('luas_desa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kepala_desa" class="form-label fw-semibold">
                                        <i class="fas fa-user me-1"></i>
                                        Kepala Desa
                                    </label>
                                    <input type="text" class="form-control @error('kepala_desa') is-invalid @enderror"
                                        id="kepala_desa" name="kepala_desa" value="{{ old('kepala_desa') }}"
                                        placeholder="Masukkan nama kepala desa">
                                    @error('kepala_desa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_pengisi" class="form-label fw-semibold">
                                        <i class="fas fa-user-edit me-1"></i>
                                        Nama Pengisi
                                    </label>
                                    <input type="text" class="form-control @error('nama_pengisi') is-invalid @enderror"
                                        id="nama_pengisi" name="nama_pengisi" value="{{ old('nama_pengisi') }}"
                                        placeholder="Masukkan nama pengisi">
                                    @error('nama_pengisi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label fw-semibold">
                                        <i class="fas fa-briefcase me-1"></i>
                                        Pekerjaan
                                    </label>
                                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                        id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}"
                                        placeholder="Masukkan pekerjaan">
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label fw-semibold">
                                        <i class="fas fa-id-badge me-1"></i>
                                        Jabatan
                                    </label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                        name="jabatan" value="{{ old('jabatan') }}" placeholder="Masukkan jabatan">
                                    @error('jabatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label fw-semibold">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        Tanggal
                                    </label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                        name="tanggal" value="{{ old('tanggal', now()->format('Y-m-d')) }}">
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Batas Wilayah -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-map-signs text-primary me-2"></i>
                            Batas Wilayah
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="desa_utara" class="form-label fw-semibold">
                                        <i class="fas fa-arrow-up me-1"></i>
                                        Desa Utara
                                    </label>
                                    <input type="text" class="form-control @error('desa_utara') is-invalid @enderror"
                                        id="desa_utara" name="desa_utara" value="{{ old('desa_utara') }}"
                                        placeholder="Masukkan desa utara">
                                    @error('desa_utara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="desa_selatan" class="form-label fw-semibold">
                                        <i class="fas fa-arrow-down me-1"></i>
                                        Desa Selatan
                                    </label>
                                    <input type="text" class="form-control @error('desa_selatan') is-invalid @enderror"
                                        id="desa_selatan" name="desa_selatan" value="{{ old('desa_selatan') }}"
                                        placeholder="Masukkan desa selatan">
                                    @error('desa_selatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="desa_timur" class="form-label fw-semibold">
                                        <i class="fas fa-arrow-right me-1"></i>
                                        Desa Timur
                                    </label>
                                    <input type="text" class="form-control @error('desa_timur') is-invalid @enderror"
                                        id="desa_timur" name="desa_timur" value="{{ old('desa_timur') }}"
                                        placeholder="Masukkan desa timur">
                                    @error('desa_timur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="desa_barat" class="form-label fw-semibold">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Desa Barat
                                    </label>
                                    <input type="text" class="form-control @error('desa_barat') is-invalid @enderror"
                                        id="desa_barat" name="desa_barat" value="{{ old('desa_barat') }}"
                                        placeholder="Masukkan desa barat">
                                    @error('desa_barat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kec_utara" class="form-label fw-semibold">
                                        <i class="fas fa-arrow-up me-1"></i>
                                        Kecamatan Utara
                                    </label>
                                    <input type="text" class="form-control @error('kec_utara') is-invalid @enderror"
                                        id="kec_utara" name="kec_utara" value="{{ old('kec_utara') }}"
                                        placeholder="Masukkan kecamatan utara">
                                    @error('kec_utara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kec_selatan" class="form-label fw-semibold">
                                        <i class="fas fa-arrow-down me-1"></i>
                                        Kecamatan Selatan
                                    </label>
                                    <input type="text" class="form-control @error('kec_selatan') is-invalid @enderror"
                                        id="kec_selatan" name="kec_selatan" value="{{ old('kec_selatan') }}"
                                        placeholder="Masukkan kecamatan selatan">
                                    @error('kec_selatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kec_timur" class="form-label fw-semibold">
                                        <i class="fas fa-arrow-right me-1"></i>
                                        Kecamatan Timur
                                    </label>
                                    <input type="text" class="form-control @error('kec_timur') is-invalid @enderror"
                                        id="kec_timur" name="kec_timur" value="{{ old('kec_timur') }}"
                                        placeholder="Masukkan kecamatan timur">
                                    @error('kec_timur')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kec_barat" class="form-label fw-semibold">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Kecamatan Barat
                                    </label>
                                    <input type="text" class="form-control @error('kec_barat') is-invalid @enderror"
                                        id="kec_barat" name="kec_barat" value="{{ old('kec_barat') }}"
                                        placeholder="Masukkan kecamatan barat">
                                    @error('kec_barat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Penetapan & Peta -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-gavel text-primary me-2"></i>
                            Penetapan & Peta
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="penetapan_batas" class="form-label fw-semibold">
                                        <i class="fas fa-check-square me-1"></i>
                                        Penetapan Batas
                                    </label>
                                    <select class="form-select @error('penetapan_batas') is-invalid @enderror"
                                        id="penetapan_batas" name="penetapan_batas">
                                        <option value="">-- Pilih --</option>
                                        <option value="ada" {{ old('penetapan_batas') == 'ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="tidak ada" {{ old('penetapan_batas') == 'tidak ada' ? 'selected' : '' }}>
                                            Tidak Ada</option>
                                    </select>
                                    @error('penetapan_batas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="peta_wilayah" class="form-label fw-semibold">
                                        <i class="fas fa-map-marked-alt me-1"></i>
                                        Peta Wilayah
                                    </label>
                                    <select class="form-select @error('peta_wilayah') is-invalid @enderror" id="peta_wilayah"
                                        name="peta_wilayah">
                                        <option value="">-- Pilih --</option>
                                        <option value="ada" {{ old('peta_wilayah') == 'ada' ? 'selected' : '' }}>Ada</option>
                                        <option value="tidak ada" {{ old('peta_wilayah') == 'tidak ada' ? 'selected' : '' }}>Tidak
                                            Ada</option>
                                    </select>
                                    @error('peta_wilayah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dasar_hukum_perdes" class="form-label fw-semibold">
                                        <i class="fas fa-gavel me-1"></i>
                                        Dasar Hukum Perdes
                                    </label>
                                    <input type="text" class="form-control @error('dasar_hukum_perdes') is-invalid @enderror"
                                        id="dasar_hukum_perdes" name="dasar_hukum_perdes"
                                        value="{{ old('dasar_hukum_perdes') }}" placeholder="Masukkan dasar hukum perdes">
                                    @error('dasar_hukum_perdes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dasar_hukum_perda" class="form-label fw-semibold">
                                        <i class="fas fa-gavel me-1"></i>
                                        Dasar Hukum Perda
                                    </label>
                                    <input type="text" class="form-control @error('dasar_hukum_perda') is-invalid @enderror"
                                        id="dasar_hukum_perda" name="dasar_hukum_perda" value="{{ old('dasar_hukum_perda') }}"
                                        placeholder="Masukkan dasar hukum perda">
                                    @error('dasar_hukum_perda')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Referensi -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-book-open text-primary me-2"></i>
                            Referensi
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="referensi_1" class="form-label fw-semibold">
                                        <i class="fas fa-book me-1"></i>
                                        Referensi 1
                                    </label>
                                    <input type="text" class="form-control @error('referensi_1') is-invalid @enderror"
                                        id="referensi_1" name="referensi_1" value="{{ old('referensi_1') }}"
                                        placeholder="Masukkan referensi 1">
                                    @error('referensi_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="referensi_2" class="form-label fw-semibold">
                                        <i class="fas fa-book me-1"></i>
                                        Referensi 2
                                    </label>
                                    <input type="text" class="form-control @error('referensi_2') is-invalid @enderror"
                                        id="referensi_2" name="referensi_2" value="{{ old('referensi_2') }}"
                                        placeholder="Masukkan referensi 2">
                                    @error('referensi_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="referensi_3" class="form-label fw-semibold">
                                        <i class="fas fa-book me-1"></i>
                                        Referensi 3
                                    </label>
                                    <input type="text" class="form-control @error('referensi_3') is-invalid @enderror"
                                        id="referensi_3" name="referensi_3" value="{{ old('referensi_3') }}"
                                        placeholder="Masukkan referensi 3">
                                    @error('referensi_3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="referensi_4" class="form-label fw-semibold">
                                        <i class="fas fa-book me-1"></i>
                                        Referensi 4
                                    </label>
                                    <input type="text" class="form-control @error('referensi_4') is-invalid @enderror"
                                        id="referensi_4" name="referensi_4" value="{{ old('referensi_4') }}"
                                        placeholder="Masukkan referensi 4">
                                    @error('referensi_4')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
                                <a href="{{ route('batas-wilayah.index') }}" class="btn btn-outline-secondary rounded">
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
