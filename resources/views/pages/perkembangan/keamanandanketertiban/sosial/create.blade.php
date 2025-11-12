@extends('layouts.master')

@section('title', 'Tambah Data Masalah Kesejahteraan Sosial')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Masalah Kesejahteraan Sosial
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.sosial.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kolom Desa -->
                <div class="col-md-6 mb-3">
                    <label for="id_desa" class="form-label fw-semibold">
                        <i class="fas fa-map-marker-alt me-1"></i> Desa <span class="text-danger">*</span>
                    </label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('id_desa') == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input berdasarkan migration --}}
            <div class="row">
                @php
                    $fields = [
                        'jumlah_anak_remaja_preman_pengangguran' => 'Jumlah anak, remaja, preman dan pengangguran',
                        'jumlah_gelandangan' => 'Jumlah gelandangan',
                        'jumlah_pengemis_jalanan' => 'Jumlah pengemis jalanan',
                        'jumlah_anak_jalanan_terlantar' => 'Jumlah anak jalanan dan terlantar',
                        'jumlah_lansia_terlantar' => 'Jumlah lansia terlantar',
                        'jumlah_orang_gila_stress_cacat_mental' => 'Jumlah orang gila/stress/cacat mental',
                        'jumlah_orang_cacat_fisik' => 'Jumlah orang cacat fisik',
                        'jumlah_orang_kelainan_kulit' => 'Jumlah orang kelainan kulit',
                        'jumlah_tidur_kolong_jembatan' => 'Jumlah orang tidur di kolong jembatan/emperan',
                        'jumlah_rumah_kawasan_kumuh' => 'Jumlah rumah dan kawasan kumuh (unit)',
                        'jumlah_panti_jompo' => 'Jumlah panti jompo (unit)',
                        'jumlah_panti_asuhan_anak' => 'Jumlah panti asuhan anak (unit)',
                        'jumlah_rumah_singgah_jalanan' => 'Jumlah rumah singgah anak jalanan (unit)',
                        'jumlah_penghuni_jalur_hijau_taman' => 'Jumlah penghuni jalur hijau dan taman kota',
                        'jumlah_penghuni_bantaran_sungai' => 'Jumlah penghuni bantaran sungai',
                        'jumlah_penghuni_pinggiran_rel' => 'Jumlah penghuni pinggiran rel kereta api',
                        'jumlah_penghuni_liar_lahan_fasilitas_umum' => 'Jumlah penghuni liar di lahan dan fasilitas umum',
                        'jumlah_kelompok_terasing_terlantar_primitif' => 'Jumlah kelompok masyarakat/suku/keluarga terasing, terisolir, terlantar dan primitif',
                        'jumlah_anak_yatim_0_18' => 'Jumlah anak yatim usia 0-18 tahun',
                        'jumlah_anak_piatu_0_18' => 'Jumlah anak piatu usia 0-18 tahun',
                        'jumlah_anak_yatim_piatu_0_18' => 'Jumlah anak yatim piatu usia 0-18 tahun',
                        'jumlah_janda' => 'Jumlah janda',
                        'jumlah_duda' => 'Jumlah duda',
                        'jumlah_anak_tidak_sekolah_sd' => 'Jumlah anak usia 7-12 tahun yang tidak sekolah di SD/sederajat',
                        'jumlah_anak_tidak_sekolah_sltp' => 'Jumlah anak usia 13-15 tahun yang tidak sekolah di SLTP/sederajat',
                        'jumlah_anak_tidak_sekolah_slta' => 'Jumlah anak usia 15-18 tahun yang tidak sekolah di SLTA/sederajat',
                        'jumlah_anak_bekerja_membantu_keluarga' => 'Jumlah anak bekerja membantu keluarga menghasilkan uang',
                        'jumlah_perempuan_kepala_keluarga' => 'Jumlah perempuan yang menjadi kepala keluarga',
                        'jumlah_penduduk_eks_napi' => 'Jumlah penduduk eks NAPI',
                        'jumlah_rentan_banjir' => 'Jumlah penduduk di daerah rawan banjir',
                        'jumlah_rentan_gunung_berapi' => 'Jumlah penduduk di daerah rawan gunung berapi',
                        'jumlah_rentan_tsunami' => 'Jumlah penduduk di daerah rawan tsunami',
                        'jumlah_rentan_gempa_bumi' => 'Jumlah penduduk di daerah rawan gempa bumi',
                        'jumlah_rentan_kebakaran_rumah' => 'Jumlah penduduk di daerah rawan kebakaran rumah',
                        'jumlah_rentan_kekeringan' => 'Jumlah penduduk di daerah rawan kekeringan',
                        'jumlah_rentan_longsor' => 'Jumlah penduduk di daerah rawan tanah longsor',
                        'jumlah_rentan_kebakaran_hutan' => 'Jumlah penduduk di daerah rawan kebakaran hutan',
                        'jumlah_rentan_kelaparan' => 'Jumlah penduduk rawan kelaparan',
                        'jumlah_rentan_air_bersih' => 'Jumlah penduduk di daerah rawan air bersih',
                        'jumlah_rentan_lahan_kritis' => 'Jumlah penduduk di daerah lahan kritis dan tandus',
                        'jumlah_rentan_padat_kumuh' => 'Jumlah penduduk di kawasan padat penduduk dan kumuh',
                        'jumlah_warga_pendatang_tanpa_identitas' => 'Jumlah warga pendatang tanpa identitas',
                        'jumlah_warga_pendatang_pekerja_musiman' => 'Jumlah warga pendatang dan/atau pekerja musiman',
                    ];
                @endphp

                @foreach ($fields as $name => $label)
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            {{ $label }} <span class="text-danger">*</span>
                        </label>
                        <input type="number" name="{{ $name }}" min="0"
                               class="form-control @error($name) is-invalid @enderror"
                               value="{{ old($name) }}" required>
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.keamanandanketertiban.sosial.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
