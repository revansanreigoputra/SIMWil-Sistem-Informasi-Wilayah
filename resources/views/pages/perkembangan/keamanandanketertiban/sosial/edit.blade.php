@extends('layouts.master')

@section('title', 'Edit Data Sosial')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Sosial
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.sosial.update', $sosial->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           id="tanggal" name="tanggal"
                           value="{{ old('tanggal', \Carbon\Carbon::parse($sosial->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input Angka sesuai kolom migration --}}
            <div class="row">
                @foreach ([
                    'jumlah_anak_remaja_preman_pengangguran' => 'Jumlah Anak / Remaja Preman / Pengangguran',
                    'jumlah_gelandangan' => 'Jumlah Gelandangan',
                    'jumlah_pengemis_jalanan' => 'Jumlah Pengemis Jalanan',
                    'jumlah_anak_jalanan_terlantar' => 'Jumlah Anak Jalanan / Terlantar',
                    'jumlah_lansia_terlantar' => 'Jumlah Lansia Terlantar',
                    'jumlah_orang_gila_stress_cacat_mental' => 'Jumlah Orang Gila / Stres / Cacat Mental',
                    'jumlah_orang_cacat_fisik' => 'Jumlah Orang Cacat Fisik',
                    'jumlah_orang_kelainan_kulit' => 'Jumlah Orang dengan Kelainan Kulit',
                    'jumlah_tidur_kolong_jembatan' => 'Jumlah Warga Tidur di Kolong Jembatan',
                    'jumlah_rumah_kawasan_kumuh' => 'Jumlah Rumah di Kawasan Kumuh',
                    'jumlah_panti_jompo' => 'Jumlah Panti Jompo',
                    'jumlah_panti_asuhan_anak' => 'Jumlah Panti Asuhan Anak',
                    'jumlah_rumah_singgah_jalanan' => 'Jumlah Rumah Singgah Jalanan',
                    'jumlah_penghuni_jalur_hijau_taman' => 'Jumlah Penghuni Jalur Hijau / Taman',
                    'jumlah_penghuni_bantaran_sungai' => 'Jumlah Penghuni Bantaran Sungai',
                    'jumlah_penghuni_pinggiran_rel' => 'Jumlah Penghuni Pinggiran Rel',
                    'jumlah_penghuni_liar_lahan_fasilitas_umum' => 'Jumlah Penghuni Liar di Lahan Fasilitas Umum',
                    'jumlah_kelompok_terasing_terlantar_primitif' => 'Jumlah Kelompok Terasing / Terlantar / Primitif',
                    'jumlah_anak_yatim_0_18' => 'Jumlah Anak Yatim (0–18 tahun)',
                    'jumlah_anak_piatu_0_18' => 'Jumlah Anak Piatu (0–18 tahun)',
                    'jumlah_anak_yatim_piatu_0_18' => 'Jumlah Anak Yatim Piatu (0–18 tahun)',
                    'jumlah_janda' => 'Jumlah Janda',
                    'jumlah_duda' => 'Jumlah Duda',
                    'jumlah_anak_tidak_sekolah_sd' => 'Jumlah Anak Tidak Sekolah SD',
                    'jumlah_anak_tidak_sekolah_sltp' => 'Jumlah Anak Tidak Sekolah SLTP',
                    'jumlah_anak_tidak_sekolah_slta' => 'Jumlah Anak Tidak Sekolah SLTA',
                    'jumlah_anak_bekerja_membantu_keluarga' => 'Jumlah Anak Bekerja / Membantu Keluarga',
                    'jumlah_perempuan_kepala_keluarga' => 'Jumlah Perempuan Kepala Keluarga',
                    'jumlah_penduduk_eks_napi' => 'Jumlah Penduduk Eks Napi',
                    'jumlah_rentan_banjir' => 'Jumlah Warga Rentan Banjir',
                    'jumlah_rentan_gunung_berapi' => 'Jumlah Warga Rentan Gunung Berapi',
                    'jumlah_rentan_tsunami' => 'Jumlah Warga Rentan Tsunami',
                    'jumlah_rentan_gempa_bumi' => 'Jumlah Warga Rentan Gempa Bumi',
                    'jumlah_rentan_kebakaran_rumah' => 'Jumlah Warga Rentan Kebakaran Rumah',
                    'jumlah_rentan_kekeringan' => 'Jumlah Warga Rentan Kekeringan',
                    'jumlah_rentan_longsor' => 'Jumlah Warga Rentan Longsor',
                    'jumlah_rentan_kebakaran_hutan' => 'Jumlah Warga Rentan Kebakaran Hutan',
                    'jumlah_rentan_kelaparan' => 'Jumlah Warga Rentan Kelaparan',
                    'jumlah_rentan_air_bersih' => 'Jumlah Warga Rentan Kekurangan Air Bersih',
                    'jumlah_rentan_lahan_kritis' => 'Jumlah Warga di Lahan Kritis',
                    'jumlah_rentan_padat_kumuh' => 'Jumlah Warga di Kawasan Padat / Kumuh',
                    'jumlah_warga_pendatang_tanpa_identitas' => 'Jumlah Warga Pendatang Tanpa Identitas',
                    'jumlah_warga_pendatang_pekerja_musiman' => 'Jumlah Warga Pendatang Pekerja Musiman',
                ] as $field => $label)
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">
                        {{ $label }} <span class="text-danger">*</span>
                    </label>
                    <input type="number" min="0" name="{{ $field }}"
                           class="form-control @error($field) is-invalid @enderror"
                           value="{{ old($field, $sosial->$field) }}" required>
                    @error($field)
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
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
