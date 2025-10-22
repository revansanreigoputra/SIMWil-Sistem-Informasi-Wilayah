@extends('layouts.master')

@section('title', 'Edit Data Lembaga Adat')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Header Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-edit me-2"></i>
                            <h4 class="card-title mb-0">Edit Data Lembaga Adat</h4>
                        </div>
                    </div>
                </div>

                <form action="{{ route('potensi.potensi-kelembagaan.lembagaAdat.update', $adat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Dasar -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-info-circle text-primary me-2"></i>
                                Informasi Dasar
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tanggal" class="form-label fw-semibold">
                                            <i class="fas fa-calendar text-muted me-1"></i>
                                            Tanggal <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                                               id="tanggal" name="tanggal" value="{{ old('tanggal', $adat->tanggal->format('Y-m-d')) }}" required>
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Struktur dan Kelengkapan Adat -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-sitemap text-primary me-2"></i>
                                Struktur dan Kelengkapan Adat
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('pemangku_adat') is-invalid @enderror" 
                                                   type="checkbox" id="pemangku_adat" name="pemangku_adat" value="1" 
                                                   {{ old('pemangku_adat', $adat->pemangku_adat) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="pemangku_adat">
                                                <i class="fas fa-user-tie me-1"></i>
                                                Pemangku Adat
                                            </label>
                                            @error('pemangku_adat')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('kepengurusan_adat') is-invalid @enderror" 
                                                   type="checkbox" id="kepengurusan_adat" name="kepengurusan_adat" value="1" 
                                                   {{ old('kepengurusan_adat', $adat->kepengurusan_adat) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="kepengurusan_adat">
                                                <i class="fas fa-users me-1"></i>
                                                Kepengurusan Adat
                                            </label>
                                            @error('kepengurusan_adat')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('rumah_adat') is-invalid @enderror" 
                                                   type="checkbox" id="rumah_adat" name="rumah_adat" value="1" 
                                                   {{ old('rumah_adat', $adat->rumah_adat) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="rumah_adat">
                                                <i class="fas fa-home me-1"></i>
                                                Rumah Adat
                                            </label>
                                            @error('rumah_adat')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('barang_pusaka') is-invalid @enderror" 
                                                   type="checkbox" id="barang_pusaka" name="barang_pusaka" value="1" 
                                                   {{ old('barang_pusaka', $adat->barang_pusaka) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="barang_pusaka">
                                                <i class="fas fa-gem me-1"></i>
                                                Barang Pusaka
                                            </label>
                                            @error('barang_pusaka')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('naskah_naskah') is-invalid @enderror" 
                                                   type="checkbox" id="naskah_naskah" name="naskah_naskah" value="1" 
                                                   {{ old('naskah_naskah', $adat->naskah_naskah) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="naskah_naskah">
                                                <i class="fas fa-scroll me-1"></i>
                                                Naskah Naskah
                                            </label>
                                            @error('naskah_naskah')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('lainnya') is-invalid @enderror" 
                                                   type="checkbox" id="lainnya" name="lainnya" value="1" 
                                                   {{ old('lainnya', $adat->lainnya) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="lainnya">
                                                <i class="fas fa-ellipsis-h me-1"></i>
                                                Lainnya
                                            </label>
                                            @error('lainnya')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pranata Adat -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-balance-scale text-primary me-2"></i>
                                Pranata Adat
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('musyawarah_adat') is-invalid @enderror" 
                                                   type="checkbox" id="musyawarah_adat" name="musyawarah_adat" value="1" 
                                                   {{ old('musyawarah_adat', $adat->musyawarah_adat) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="musyawarah_adat">
                                                <i class="fas fa-comments me-1"></i>
                                                Musyawarah Adat
                                            </label>
                                            @error('musyawarah_adat')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('sanksi_adat') is-invalid @enderror" 
                                                   type="checkbox" id="sanksi_adat" name="sanksi_adat" value="1" 
                                                   {{ old('sanksi_adat', $adat->sanksi_adat) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="sanksi_adat">
                                                <i class="fas fa-gavel me-1"></i>
                                                Sanksi Adat
                                            </label>
                                            @error('sanksi_adat')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upacara Adat Siklus Kehidupan -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-user-circle text-primary me-2"></i>
                                Upacara Adat Siklus Kehidupan
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('upacara_adat_kelahiran') is-invalid @enderror" 
                                                   type="checkbox" id="upacara_adat_kelahiran" name="upacara_adat_kelahiran" value="1" 
                                                   {{ old('upacara_adat_kelahiran', $adat->upacara_adat_kelahiran) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="upacara_adat_kelahiran">
                                                <i class="fas fa-baby me-1"></i>
                                                Upacara Adat Kelahiran
                                            </label>
                                            @error('upacara_adat_kelahiran')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('upacara_adat_perkawinan') is-invalid @enderror" 
                                                   type="checkbox" id="upacara_adat_perkawinan" name="upacara_adat_perkawinan" value="1" 
                                                   {{ old('upacara_adat_perkawinan', $adat->upacara_adat_perkawinan) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="upacara_adat_perkawinan">
                                                <i class="fas fa-ring me-1"></i>
                                                Upacara Adat Perkawinan
                                            </label>
                                            @error('upacara_adat_perkawinan')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('upacara_adat_kematian') is-invalid @enderror" 
                                                   type="checkbox" id="upacara_adat_kematian" name="upacara_adat_kematian" value="1" 
                                                   {{ old('upacara_adat_kematian', $adat->upacara_adat_kematian) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="upacara_adat_kematian">
                                                <i class="fas fa-cross me-1"></i>
                                                Upacara Adat Kematian
                                            </label>
                                            @error('upacara_adat_kematian')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upacara Adat Pengelolaan Sumber Daya -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-leaf text-primary me-2"></i>
                                Upacara Adat Pengelolaan Sumber Daya
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('upacara_adat_bercocok_tanam') is-invalid @enderror" 
                                                   type="checkbox" id="upacara_adat_bercocok_tanam" name="upacara_adat_bercocok_tanam" value="1" 
                                                   {{ old('upacara_adat_bercocok_tanam', $adat->upacara_adat_bercocok_tanam) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="upacara_adat_bercocok_tanam">
                                                <i class="fas fa-seedling me-1"></i>
                                                Upacara Adat Bercocok Tanam
                                            </label>
                                            @error('upacara_adat_bercocok_tanam')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('upacara_adat_perikanan_laut') is-invalid @enderror" 
                                                   type="checkbox" id="upacara_adat_perikanan_laut" name="upacara_adat_perikanan_laut" value="1" 
                                                   {{ old('upacara_adat_perikanan_laut', $adat->upacara_adat_perikanan_laut) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="upacara_adat_perikanan_laut">
                                                <i class="fas fa-fish me-1"></i>
                                                Upacara Adat Perikanan Laut
                                            </label>
                                            @error('upacara_adat_perikanan_laut')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('upacara_adat_bidang_kehutanan') is-invalid @enderror" 
                                                   type="checkbox" id="upacara_adat_bidang_kehutanan" name="upacara_adat_bidang_kehutanan" value="1" 
                                                   {{ old('upacara_adat_bidang_kehutanan', $adat->upacara_adat_bidang_kehutanan) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="upacara_adat_bidang_kehutanan">
                                                <i class="fas fa-tree me-1"></i>
                                                Upacara Adat Bidang Kehutanan
                                            </label>
                                            @error('upacara_adat_bidang_kehutanan')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('upacara_adat_pengelolaan_sda') is-invalid @enderror" 
                                                   type="checkbox" id="upacara_adat_pengelolaan_sda" name="upacara_adat_pengelolaan_sda" value="1" 
                                                   {{ old('upacara_adat_pengelolaan_sda', $adat->upacara_adat_pengelolaan_sda) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="upacara_adat_pengelolaan_sda">
                                                <i class="fas fa-mountain me-1"></i>
                                                Upacara Adat Pengelolaan SDA
                                            </label>
                                            @error('upacara_adat_pengelolaan_sda')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upacara Adat Lainnya -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-star text-primary me-2"></i>
                                Upacara Adat Lainnya
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('upacara_adat_pembangunan_rumah') is-invalid @enderror" 
                                                   type="checkbox" id="upacara_adat_pembangunan_rumah" name="upacara_adat_pembangunan_rumah" value="1" 
                                                   {{ old('upacara_adat_pembangunan_rumah', $adat->upacara_adat_pembangunan_rumah) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="upacara_adat_pembangunan_rumah">
                                                <i class="fas fa-hammer me-1"></i>
                                                Upacara Adat Pembangunan Rumah
                                            </label>
                                            @error('upacara_adat_pembangunan_rumah')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input @error('upacara_adat_penyelesaian_masalah') is-invalid @enderror" 
                                                   type="checkbox" id="upacara_adat_penyelesaian_masalah" name="upacara_adat_penyelesaian_masalah" value="1" 
                                                   {{ old('upacara_adat_penyelesaian_masalah', $adat->upacara_adat_penyelesaian_masalah) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="upacara_adat_penyelesaian_masalah">
                                                <i class="fas fa-handshake me-1"></i>
                                                Upacara Adat Penyelesaian Masalah
                                            </label>
                                            @error('upacara_adat_penyelesaian_masalah')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                                    <a href="{{ route('potensi.potensi-kelembagaan.lembagaAdat.index') }}" 
                                        class="btn btn-outline-secondary rounded">
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary rounded">
                                        Update Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection