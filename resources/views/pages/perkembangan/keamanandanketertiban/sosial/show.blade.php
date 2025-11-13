@extends('layouts.master')

@section('title', 'Detail Data Sosial')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.sosial.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-info-circle me-2 text-primary"></i>
            Detail Data Sosial
        </h5>
    </div>

    <div class="card-body">
        <!-- Informasi Umum -->
        <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Tanggal</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ \Carbon\Carbon::parse($sosial->tanggal)->format('d-m-Y') }}
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Desa</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ $sosial->desa->nama_desa ?? '-' }}
                </p>
            </div>
        </div>

        <!-- Data Sosial -->
        <h5 class="fw-bold text-primary mb-3">Data Sosial</h5>
        <div class="row">
            @php
                $fields = [
                    'jumlah_anak_remaja_preman_pengangguran' => 'Jumlah Anak/Remaja Preman/Pengangguran',
                    'jumlah_gelandangan' => 'Jumlah Gelandangan',
                    'jumlah_pengemis_jalanan' => 'Jumlah Pengemis Jalanan',
                    'jumlah_anak_jalanan_terlantar' => 'Jumlah Anak Jalanan/Terlantar',
                    'jumlah_lansia_terlantar' => 'Jumlah Lansia Terlantar',
                    'jumlah_orang_gila_stress_cacat_mental' => 'Jumlah Orang Gila/Stress/Cacat Mental',
                    'jumlah_orang_cacat_fisik' => 'Jumlah Orang Cacat Fisik',
                    'jumlah_orang_kelainan_kulit' => 'Jumlah Orang Kelainan Kulit',
                    'jumlah_tidur_kolong_jembatan' => 'Jumlah Yang Tidur di Kolong Jembatan',
                    'jumlah_rumah_kawasan_kumuh' => 'Jumlah Rumah di Kawasan Kumuh',
                    'jumlah_panti_jompo' => 'Jumlah Panti Jompo',
                    'jumlah_panti_asuhan_anak' => 'Jumlah Panti Asuhan Anak',
                    'jumlah_rumah_singgah_jalanan' => 'Jumlah Rumah Singgah Jalanan',
                    'jumlah_penghuni_jalur_hijau_taman' => 'Jumlah Penghuni Jalur Hijau/Taman',
                    'jumlah_penghuni_bantaran_sungai' => 'Jumlah Penghuni Bantaran Sungai',
                    'jumlah_penghuni_pinggiran_rel' => 'Jumlah Penghuni Pinggiran Rel',
                    'jumlah_penghuni_liar_lahan_fasilitas_umum' => 'Jumlah Penghuni Liar Lahan Fasilitas Umum',
                    'jumlah_kelompok_terasing_terlantar_primitif' => 'Jumlah Kelompok Terasing/Terlantar/Primitif',
                    'jumlah_anak_yatim_0_18' => 'Jumlah Anak Yatim (0-18 Tahun)',
                    'jumlah_anak_piatu_0_18' => 'Jumlah Anak Piatu (0-18 Tahun)',
                    'jumlah_anak_yatim_piatu_0_18' => 'Jumlah Anak Yatim Piatu (0-18 Tahun)',
                    'jumlah_janda' => 'Jumlah Janda',
                    'jumlah_duda' => 'Jumlah Duda',
                    'jumlah_anak_tidak_sekolah_sd' => 'Jumlah Anak Tidak Sekolah (SD)',
                    'jumlah_anak_tidak_sekolah_sltp' => 'Jumlah Anak Tidak Sekolah (SLTP)',
                    'jumlah_anak_tidak_sekolah_slta' => 'Jumlah Anak Tidak Sekolah (SLTA)',
                    'jumlah_anak_bekerja_membantu_keluarga' => 'Jumlah Anak Bekerja Membantu Keluarga',
                    'jumlah_perempuan_kepala_keluarga' => 'Jumlah Perempuan Kepala Keluarga',
                    'jumlah_penduduk_eks_napi' => 'Jumlah Penduduk Eks Napi',
                    'jumlah_rentan_banjir' => 'Jumlah Rentan Banjir',
                    'jumlah_rentan_gunung_berapi' => 'Jumlah Rentan Gunung Berapi',
                    'jumlah_rentan_tsunami' => 'Jumlah Rentan Tsunami',
                    'jumlah_rentan_gempa_bumi' => 'Jumlah Rentan Gempa Bumi',
                    'jumlah_rentan_kebakaran_rumah' => 'Jumlah Rentan Kebakaran Rumah',
                    'jumlah_rentan_kekeringan' => 'Jumlah Rentan Kekeringan',
                    'jumlah_rentan_longsor' => 'Jumlah Rentan Longsor',
                    'jumlah_rentan_kebakaran_hutan' => 'Jumlah Rentan Kebakaran Hutan',
                    'jumlah_rentan_kelaparan' => 'Jumlah Rentan Kelaparan',
                    'jumlah_rentan_air_bersih' => 'Jumlah Rentan Air Bersih',
                    'jumlah_rentan_lahan_kritis' => 'Jumlah Rentan Lahan Kritis',
                    'jumlah_rentan_padat_kumuh' => 'Jumlah Rentan Padat Kumuh',
                    'jumlah_warga_pendatang_tanpa_identitas' => 'Jumlah Warga Pendatang Tanpa Identitas',
                    'jumlah_warga_pendatang_pekerja_musiman' => 'Jumlah Warga Pendatang Pekerja Musiman',
                ];
            @endphp

            @foreach ($fields as $key => $label)
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">{{ $label }}</label>
                    <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                        {{ $sosial->$key ?? '-' }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.keamanandanketertiban.sosial.edit', $sosial->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>

            <form action="{{ route('perkembangan.keamanandanketertiban.sosial.destroy', $sosial->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt me-1"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
