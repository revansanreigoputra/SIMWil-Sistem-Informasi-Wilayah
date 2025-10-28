@extends('layouts.master')

@section('title', 'Tambah Data Jenis Lahan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-plus-circle me-2"></i>
                Tambah Data Jenis Lahan
            </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('jlahan.store') }}" method="POST">
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

                <h6 class="fw-bold text-primary mt-4 mb-3">Tanah Sawah</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sawah_irigasi_teknis" class="form-label">Sawah Irigasi Teknis</label>
                            <input type="number" step="0.01" class="form-control" id="sawah_irigasi_teknis"
                                name="sawah_irigasi_teknis" value="{{ old('sawah_irigasi_teknis', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sawah_irigasi_setengah_teknis" class="form-label">Sawah Irigasi Setengah
                                Teknis</label>
                            <input type="number" step="0.01" class="form-control" id="sawah_irigasi_setengah_teknis"
                                name="sawah_irigasi_setengah_teknis" value="{{ old('sawah_irigasi_setengah_teknis', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sawah_tadah_hujan" class="form-label">Sawah Tadah Hujan</label>
                            <input type="number" step="0.01" class="form-control" id="sawah_tadah_hujan"
                                name="sawah_tadah_hujan" value="{{ old('sawah_tadah_hujan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sawah_pasang_surut" class="form-label">Sawah Pasang Surut</label>
                            <input type="number" step="0.01" class="form-control" id="sawah_pasang_surut"
                                name="sawah_pasang_surut" value="{{ old('sawah_pasang_surut', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_tanah_sawah" class="form-label">Luas Tanah Sawah</label>
                            <input type="number" step="0.01" class="form-control" id="luas_tanah_sawah"
                                name="luas_tanah_sawah" value="{{ old('luas_tanah_sawah', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Tanah Basah</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tanah_rawa" class="form-label">Tanah Rawa</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_rawa" name="tanah_rawa"
                                value="{{ old('tanah_rawa', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pasang_surut" class="form-label">Pasang Surut</label>
                            <input type="number" step="0.01" class="form-control" id="pasang_surut" name="pasang_surut"
                                value="{{ old('pasang_surut', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lahan_gambut" class="form-label">Lahan Gambut</label>
                            <input type="number" step="0.01" class="form-control" id="lahan_gambut"
                                name="lahan_gambut" value="{{ old('lahan_gambut', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="situ_waduk_danau" class="form-label">Situ/Waduk/Danau</label>
                            <input type="number" step="0.01" class="form-control" id="situ_waduk_danau"
                                name="situ_waduk_danau" value="{{ old('situ_waduk_danau', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_tanah_basah" class="form-label">Luas Tanah Basah</label>
                            <input type="number" step="0.01" class="form-control" id="luas_tanah_basah"
                                name="luas_tanah_basah" value="{{ old('luas_tanah_basah', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Tanah Kering</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tanah_ladang" class="form-label">Tanah Ladang</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_ladang"
                                name="tanah_ladang" value="{{ old('tanah_ladang', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pemukiman" class="form-label">Pemukiman</label>
                            <input type="number" step="0.01" class="form-control" id="pemukiman" name="pemukiman"
                                value="{{ old('pemukiman', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pekarangan" class="form-label">Pekarangan</label>
                            <input type="number" step="0.01" class="form-control" id="pekarangan" name="pekarangan"
                                value="{{ old('pekarangan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_tanah_kering" class="form-label">Luas Tanah Kering</label>
                            <input type="number" step="0.01" class="form-control" id="luas_tanah_kering"
                                name="luas_tanah_kering" value="{{ old('luas_tanah_kering', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Tanah Perkebunan</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="perkebunan_rakyat" class="form-label">Perkebunan Rakyat</label>
                            <input type="number" step="0.01" class="form-control" id="perkebunan_rakyat"
                                name="perkebunan_rakyat" value="{{ old('perkebunan_rakyat', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="perkebunan_negara" class="form-label">Perkebunan Negara</label>
                            <input type="number" step="0.01" class="form-control" id="perkebunan_negara"
                                name="perkebunan_negara" value="{{ old('perkebunan_negara', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="perkebunan_swasta" class="form-label">Perkebunan Swasta</label>
                            <input type="number" step="0.01" class="form-control" id="perkebunan_swasta"
                                name="perkebunan_swasta" value="{{ old('perkebunan_swasta', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="perkebunan_perseorangan" class="form-label">Perkebunan Perseorangan</label>
                            <input type="number" step="0.01" class="form-control" id="perkebunan_perseorangan"
                                name="perkebunan_perseorangan" value="{{ old('perkebunan_perseorangan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_tanah_perkebunan" class="form-label">Luas Tanah Perkebunan</label>
                            <input type="number" step="0.01" class="form-control" id="luas_tanah_perkebunan"
                                name="luas_tanah_perkebunan" value="{{ old('luas_tanah_perkebunan', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Tanah Fasilitas Umum</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tanah_bengkok" class="form-label">Tanah Bengkok</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_bengkok"
                                name="tanah_bengkok" value="{{ old('tanah_bengkok', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tanah_titi_sara" class="form-label">Tanah Titi Sara</label>
                            <input type="number" step="0.01" class="form-control" id="tanah_titi_sara"
                                name="tanah_titi_sara" value="{{ old('tanah_titi_sara', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kebun_desa" class="form-label">Kebun Desa</label>
                            <input type="number" step="0.01" class="form-control" id="kebun_desa" name="kebun_desa"
                                value="{{ old('kebun_desa', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="sawah_desa" class="form-label">Sawah Desa</label>
                            <input type="number" step="0.01" class="form-control" id="sawah_desa" name="sawah_desa"
                                value="{{ old('sawah_desa', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="kas_desa" class="form-label">Kas Desa</label>
                            <input type="number" step="0.01" class="form-control" id="kas_desa" name="kas_desa"
                                value="{{ old('kas_desa', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lokasi_tanah_kas_desa" class="form-label">Lokasi Tanah Kas Desa</label>
                            <select class="form-control" id="lokasi_tanah_kas_desa" name="lokasi_tanah_kas_desa">
                                <option value="">Pilih Lokasi</option>
                                <option value="Di dalam desa"
                                    {{ old('lokasi_tanah_kas_desa') == 'Di dalam desa' ? 'selected' : '' }}>Di dalam desa
                                </option>
                                <option value="Di luar desa"
                                    {{ old('lokasi_tanah_kas_desa') == 'Di luar desa' ? 'selected' : '' }}>Di luar desa
                                </option>
                                <option value="Sebagian di luar"
                                    {{ old('lokasi_tanah_kas_desa') == 'Sebagian di luar' ? 'selected' : '' }}>Sebagian di
                                    luar</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="lapangan_olahraga" class="form-label">Lapangan Olahraga</label>
                            <input type="number" step="0.01" class="form-control" id="lapangan_olahraga"
                                name="lapangan_olahraga" value="{{ old('lapangan_olahraga', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="perkantoran_pemerintahan" class="form-label">Perkantoran Pemerintahan</label>
                            <input type="number" step="0.01" class="form-control" id="perkantoran_pemerintahan"
                                name="perkantoran_pemerintahan" value="{{ old('perkantoran_pemerintahan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="ruang_publik_taman" class="form-label">Ruang Publik/Taman</label>
                            <input type="number" step="0.01" class="form-control" id="ruang_publik_taman"
                                name="ruang_publik_taman" value="{{ old('ruang_publik_taman', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tpu" class="form-label">TPU</label>
                            <input type="number" step="0.01" class="form-control" id="tpu" name="tpu"
                                value="{{ old('tpu', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="tps" class="form-label">TPS</label>
                            <input type="number" step="0.01" class="form-control" id="tps" name="tps"
                                value="{{ old('tps', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="bangunan_pendidikan" class="form-label">Bangunan Pendidikan</label>
                            <input type="number" step="0.01" class="form-control" id="bangunan_pendidikan"
                                name="bangunan_pendidikan" value="{{ old('bangunan_pendidikan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="pertokoan" class="form-label">Pertokoan</label>
                            <input type="number" step="0.01" class="form-control" id="pertokoan" name="pertokoan"
                                value="{{ old('pertokoan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="fasilitas_pasar" class="form-label">Fasilitas Pasar</label>
                            <input type="number" step="0.01" class="form-control" id="fasilitas_pasar"
                                name="fasilitas_pasar" value="{{ old('fasilitas_pasar', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="terminal" class="form-label">Terminal</label>
                            <input type="number" step="0.01" class="form-control" id="terminal" name="terminal"
                                value="{{ old('terminal', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jalan" class="form-label">Jalan</label>
                            <input type="number" step="0.01" class="form-control" id="jalan" name="jalan"
                                value="{{ old('jalan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="daerah_tangkapan_air" class="form-label">Daerah Tangkapan Air</label>
                            <input type="number" step="0.01" class="form-control" id="daerah_tangkapan_air"
                                name="daerah_tangkapan_air" value="{{ old('daerah_tangkapan_air', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="usaha_perikanan" class="form-label">Usaha Perikanan</label>
                            <input type="number" step="0.01" class="form-control" id="usaha_perikanan"
                                name="usaha_perikanan" value="{{ old('usaha_perikanan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="aliran_stutet" class="form-label">Aliran Sutet</label>
                            <input type="number" step="0.01" class="form-control" id="aliran_stutet"
                                name="aliran_stutet" value="{{ old('aliran_stutet', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_tanah_fasilitas_umum" class="form-label">Luas Tanah Fasilitas Umum</label>
                            <input type="number" step="0.01" class="form-control" id="luas_tanah_fasilitas_umum"
                                name="luas_tanah_fasilitas_umum" value="{{ old('luas_tanah_fasilitas_umum', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Tanah Hutan</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_lindung" class="form-label">Hutan Lindung</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_lindung"
                                name="hutan_lindung" value="{{ old('hutan_lindung', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_produksi_tetap" class="form-label">Hutan Produksi Tetap</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_produksi_tetap"
                                name="hutan_produksi_tetap" value="{{ old('hutan_produksi_tetap', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_produksi_terbatas" class="form-label">Hutan Produksi Terbatas</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_produksi_terbatas"
                                name="hutan_produksi_terbatas" value="{{ old('hutan_produksi_terbatas', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_produksi" class="form-label">Hutan Produksi</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_produksi"
                                name="hutan_produksi" value="{{ old('hutan_produksi', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_konservasi" class="form-label">Hutan Konservasi</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_konservasi"
                                name="hutan_konservasi" value="{{ old('hutan_konservasi', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_adat" class="form-label">Hutan Adat</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_adat" name="hutan_adat"
                                value="{{ old('hutan_adat', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_asli" class="form-label">Hutan Asli</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_asli" name="hutan_asli"
                                value="{{ old('hutan_asli', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_sekunder" class="form-label">Hutan Sekunder</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_sekunder"
                                name="hutan_sekunder" value="{{ old('hutan_sekunder', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_buatan" class="form-label">Hutan Buatan</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_buatan"
                                name="hutan_buatan" value="{{ old('hutan_buatan', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_mangrove" class="form-label">Hutan Mangrove</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_mangrove"
                                name="hutan_mangrove" value="{{ old('hutan_mangrove', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="suaka_alam" class="form-label">Suaka Alam</label>
                            <input type="number" step="0.01" class="form-control" id="suaka_alam" name="suaka_alam"
                                value="{{ old('suaka_alam', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="suaka_margasatwa" class="form-label">Suaka Margasatwa</label>
                            <input type="number" step="0.01" class="form-control" id="suaka_margasatwa"
                                name="suaka_margasatwa" value="{{ old('suaka_margasatwa', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_suaka" class="form-label">Hutan Suaka</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_suaka"
                                name="hutan_suaka" value="{{ old('hutan_suaka', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="hutan_rakyat" class="form-label">Hutan Rakyat</label>
                            <input type="number" step="0.01" class="form-control" id="hutan_rakyat"
                                name="hutan_rakyat" value="{{ old('hutan_rakyat', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_tanah_hutan" class="form-label">Luas Tanah Hutan</label>
                            <input type="number" step="0.01" class="form-control" id="luas_tanah_hutan"
                                name="luas_tanah_hutan" value="{{ old('luas_tanah_hutan', 0) }}">
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-primary mt-4 mb-3">Ringkasan</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="luas_desa" class="form-label">Luas Desa</label>
                            <input type="number" step="0.01" class="form-control" id="luas_desa" name="luas_desa"
                                value="{{ old('luas_desa', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="total_luas_entri_data" class="form-label">Total Luas Entri Data</label>
                            <input type="number" step="0.01" class="form-control" id="total_luas_entri_data"
                                name="total_luas_entri_data" value="{{ old('total_luas_entri_data', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="selisih_luas" class="form-label">Selisih Luas</label>
                            <input type="number" step="0.01" class="form-control" id="selisih_luas"
                                name="selisih_luas" value="{{ old('selisih_luas', 0) }}">
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
                                <a href="{{ route('jlahan.index') }}" class="btn btn-outline-secondary rounded">
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
