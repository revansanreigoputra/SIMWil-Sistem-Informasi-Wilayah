@extends('layouts.master')

@section('title', 'Tambah Data Topografi')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Topografi
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('topografi.store') }}" method="POST">
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

                <h6 class="fw-bold text-primary mt-4 mb-3">Bentangan Wilayah (Ha)</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dataran_rendah" class="form-label">Dataran Rendah</label>
                            <input type="number" step="0.01" class="form-control" id="dataran_rendah" name="dataran_rendah" value="{{ old('dataran_rendah', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="berbukit_bukit" class="form-label">Berbukit-bukit</label>
                            <input type="number" step="0.01" class="form-control" id="berbukit_bukit" name="berbukit_bukit" value="{{ old('berbukit_bukit', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="dataran" class="form-label">Dataran</label>
                            <input type="number" step="0.01" class="form-control" id="dataran" name="dataran" value="{{ old('dataran', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lereng_gunung" class="form-label">Lereng Gunung</label>
                            <input type="number" step="0.01" class="form-control" id="lereng_gunung" name="lereng_gunung" value="{{ old('lereng_gunung', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tepi_pantai_pesisir" class="form-label">Tepi Pantai/Pesisir</label>
                            <input type="number" step="0.01" class="form-control" id="tepi_pantai_pesisir" name="tepi_pantai_pesisir" value="{{ old('tepi_pantai_pesisir', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kawasan_rawa" class="form-label">Kawasan Rawa</label>
                            <input type="number" step="0.01" class="form-control" id="kawasan_rawa" name="kawasan_rawa" value="{{ old('kawasan_rawa', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kawasan_gambut" class="form-label">Kawasan Gambut</label>
                            <input type="number" step="0.01" class="form-control" id="kawasan_gambut" name="kawasan_gambut" value="{{ old('kawasan_gambut', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="aliran_sungai" class="form-label">Aliran Sungai</label>
                            <input type="number" step="0.01" class="form-control" id="aliran_sungai" name="aliran_sungai" value="{{ old('aliran_sungai', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="bantaran_sungai" class="form-label">Bantaran Sungai</label>
                            <input type="number" step="0.01" class="form-control" id="bantaran_sungai" name="bantaran_sungai" value="{{ old('bantaran_sungai', 0) }}">
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lain_lain" class="form-label">Lain-lain</label>
                            <input type="number" step="0.01" class="form-control" id="lain_lain" name="lain_lain" value="{{ old('lain_lain', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Letak Wilayah (Ha)</h6>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kawasan_perkantoran" class="form-label">Kawasan Perkantoran</label>
                            <input type="number" step="0.01" class="form-control" id="kawasan_perkantoran" name="kawasan_perkantoran" value="{{ old('kawasan_perkantoran', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kawasan_pertokoan" class="form-label">Kawasan Pertokoan</label>
                            <input type="number" step="0.01" class="form-control" id="kawasan_pertokoan" name="kawasan_pertokoan" value="{{ old('kawasan_pertokoan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kawasan_campuran" class="form-label">Kawasan Campuran</label>
                            <input type="number" step="0.01" class="form-control" id="kawasan_campuran" name="kawasan_campuran" value="{{ old('kawasan_campuran', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kawasan_industri" class="form-label">Kawasan Industri</label>
                            <input type="number" step="0.01" class="form-control" id="kawasan_industri" name="kawasan_industri" value="{{ old('kawasan_industri', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kepulauan" class="form-label">Kepulauan</label>
                            <input type="number" step="0.01" class="form-control" id="kepulauan" name="kepulauan" value="{{ old('kepulauan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="pantai_pesisir" class="form-label">Pantai/Pesisir</label>
                            <input type="number" step="0.01" class="form-control" id="pantai_pesisir" name="pantai_pesisir" value="{{ old('pantai_pesisir', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kawasan_hutan" class="form-label">Kawasan Hutan</label>
                            <input type="number" step="0.01" class="form-control" id="kawasan_hutan" name="kawasan_hutan" value="{{ old('kawasan_hutan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="taman_suaka" class="form-label">Taman Suaka</label>
                            <input type="number" step="0.01" class="form-control" id="taman_suaka" name="taman_suaka" value="{{ old('taman_suaka', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="kawasan_wisata" class="form-label">Kawasan Wisata</label>
                            <input type="number" step="0.01" class="form-control" id="kawasan_wisata" name="kawasan_wisata" value="{{ old('kawasan_wisata', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="perbatasan_negara" class="form-label">Perbatasan Negara</label>
                            <input type="number" step="0.01" class="form-control" id="perbatasan_negara" name="perbatasan_negara" value="{{ old('perbatasan_negara', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="perbatasan_provinsi" class="form-label">Perbatasan Provinsi</label>
                            <input type="number" step="0.01" class="form-control" id="perbatasan_provinsi" name="perbatasan_provinsi" value="{{ old('perbatasan_provinsi', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="perbatasan_kabupaten" class="form-label">Perbatasan Kabupaten</label>
                            <input type="number" step="0.01" class="form-control" id="perbatasan_kabupaten" name="perbatasan_kabupaten" value="{{ old('perbatasan_kabupaten', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="perbatasan_kecamatan" class="form-label">Perbatasan Kecamatan</label>
                            <input type="number" step="0.01" class="form-control" id="perbatasan_kecamatan" name="perbatasan_kecamatan" value="{{ old('perbatasan_kecamatan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="das_bantaran_sungai" class="form-label">DAS/Bantaran Sungai</label>
                            <input type="number" step="0.01" class="form-control" id="das_bantaran_sungai" name="das_bantaran_sungai" value="{{ old('das_bantaran_sungai', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="rawan_banjir" class="form-label">Rawan Banjir</label>
                            <input type="number" step="0.01" class="form-control" id="rawan_banjir" name="rawan_banjir" value="{{ old('rawan_banjir', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="bebas_banjir" class="form-label">Bebas Banjir</label>
                            <input type="number" step="0.01" class="form-control" id="bebas_banjir" name="bebas_banjir" value="{{ old('bebas_banjir', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="potensial_tsunami" class="form-label">Potensial Tsunami</label>
                            <input type="number" step="0.01" class="form-control" id="potensial_tsunami" name="potensial_tsunami" value="{{ old('potensial_tsunami', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="rawan_gempa" class="form-label">Rawan Gempa</label>
                            <input type="number" step="0.01" class="form-control" id="rawan_gempa" name="rawan_gempa" value="{{ old('rawan_gempa', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Orbitasi</h6>
                <div class="row">
                    <div class="col-md-12">
                        <p class="fw-semibold">Ke Kecamatan</p>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="jarak_ke_kecamatan" class="form-label">Jarak (km)</label>
                                <input type="number" step="0.01" class="form-control" id="jarak_ke_kecamatan" name="jarak_ke_kecamatan" value="{{ old('jarak_ke_kecamatan', 0) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="lama_bermotor_kecamatan" class="form-label">Waktu Tempuh Motor (jam)</label>
                                <input type="number" step="0.01" class="form-control" id="lama_bermotor_kecamatan" name="lama_bermotor_kecamatan" value="{{ old('lama_bermotor_kecamatan', 0) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="lama_non_bermotor_kecamatan" class="form-label">Waktu Tempuh Non Motor (jam)</label>
                                <input type="number" step="0.01" class="form-control" id="lama_non_bermotor_kecamatan" name="lama_non_bermotor_kecamatan" value="{{ old('lama_non_bermotor_kecamatan', 0) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="kendaraan_umum_kecamatan" class="form-label">Jml. Kendaraan Umum</label>
                                <input type="number" class="form-control" id="kendaraan_umum_kecamatan" name="kendaraan_umum_kecamatan" value="{{ old('kendaraan_umum_kecamatan', 0) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <p class="fw-semibold">Ke Kabupaten</p>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="jarak_ke_kabupaten" class="form-label">Jarak (km)</label>
                                <input type="number" step="0.01" class="form-control" id="jarak_ke_kabupaten" name="jarak_ke_kabupaten" value="{{ old('jarak_ke_kabupaten', 0) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="lama_bermotor_kabupaten" class="form-label">Waktu Tempuh Motor (jam)</label>
                                <input type="number" step="0.01" class="form-control" id="lama_bermotor_kabupaten" name="lama_bermotor_kabupaten" value="{{ old('lama_bermotor_kabupaten', 0) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="lama_non_bermotor_kabupaten" class="form-label">Waktu Tempuh Non Motor (jam)</label>
                                <input type="number" step="0.01" class="form-control" id="lama_non_bermotor_kabupaten" name="lama_non_bermotor_kabupaten" value="{{ old('lama_non_bermotor_kabupaten', 0) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="kendaraan_umum_kabupaten" class="form-label">Jml. Kendaraan Umum</label>
                                <input type="number" class="form-control" id="kendaraan_umum_kabupaten" name="kendaraan_umum_kabupaten" value="{{ old('kendaraan_umum_kabupaten', 0) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <p class="fw-semibold">Ke Provinsi</p>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="jarak_ke_provinsi" class="form-label">Jarak (km)</label>
                                <input type="number" step="0.01" class="form-control" id="jarak_ke_provinsi" name="jarak_ke_provinsi" value="{{ old('jarak_ke_provinsi', 0) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="lama_bermotor_provinsi" class="form-label">Waktu Tempuh Motor (jam)</label>
                                <input type="number" step="0.01" class="form-control" id="lama_bermotor_provinsi" name="lama_bermotor_provinsi" value="{{ old('lama_bermotor_provinsi', 0) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="lama_non_bermotor_provinsi" class="form-label">Waktu Tempuh Non Motor (jam)</label>
                                <input type="number" step="0.01" class="form-control" id="lama_non_bermotor_provinsi" name="lama_non_bermotor_provinsi" value="{{ old('lama_non_bermotor_provinsi', 0) }}">
                            </div>
                            <div class="col-md-3">
                                <label for="kendaraan_umum_provinsi" class="form-label">Jml. Kendaraan Umum</label>
                                <input type="number" class="form-control" id="kendaraan_umum_provinsi" name="kendaraan_umum_provinsi" value="{{ old('kendaraan_umum_provinsi', 0) }}">
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
                                <a href="{{ route('topografi.index') }}"
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