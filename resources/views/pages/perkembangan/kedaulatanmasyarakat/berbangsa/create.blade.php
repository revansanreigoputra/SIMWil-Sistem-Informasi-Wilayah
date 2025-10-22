@extends('layouts.master')

@section('title', 'Tambah Data Sikap dan Mental Kebangsaan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Sikap dan Mental Kebangsaan
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.store') }}" method="POST">
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
                            <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka sesuai kolom model --}}
            @php
                $numericFields = [
                    'kegiatan_pemantapan_pancasila' => 'Jenis kegiatan pemantapan nilai Ideologi Pancasila sebagai Dasar Negara',
                    'jumlah_kegiatan_pemantapan_pancasila' => 'Jumlah kegiatan pemantapan nilai Ideologi Pancasila sebagai Dasar Negara',
                    'jenis_kegiatan_bhineka_tunggal_ika' => 'Jenis kegiatan pemantapan nilai Bhinneka Tunggal Ika',
                    'jumlah_kegiatan_bhineka_tunggal_ika' => 'Jumlah kegiatan pemantapan nilai Bhinneka Tunggal Ika',
                    'jenis_kegiatan_pemantapan_kesatuan_bangsa' => 'Jenis kegiatan pemantapan kesatuan bangsa lainnya',
                    'kasus_desa_minta_suaka' => 'Jumlah kasus warga desa/kelurahan yang minta suaka/lari ke luar negeri',
                    'warga_melintas_resmi' => 'Jumlah warga yang melintas perbatasan ke negara tetangga secara resmi',
                    'warga_melintas_tidak_resmi' => 'Jumlah warga yang melintas perbatasan negara tetangga secara tidak resmi',
                    'kasus_pertempuran_antar_kelompok' => 'Jumlah kasus pertempuran atau perlawanan antar kelompok pengacau keamanan di perbatasan',
                    'serangan_terhadap_fasilitas' => 'Jumlah serangan terhadap fasilitas umum dan milik masyarakat oleh kelompok pengacau keamanan di perbatasan',
                    'kasus_merongrong_nkri' => 'Jumlah kasus yang diklasifikasikan merongrong keutuhan NKRI dan Kesatuan Bangsa Indonesia di desa/kelurahan tahun ini',
                    'korban_manusia' => 'Jumlah korban manusia akibat serangan kelompok pengacau keamanan',
                    'masalah_ketenagakerjaan' => 'Jumlah masalah ketenagakerjaan di perbatasan antar negara yang terjadi tahun ini',
                    'kasus_kejahatan_perbatasan' => 'Jumlah kasus kejahatan (pencurian, perampokan, perompakan, intimidasi) di perbatasan',
                    'sengketa_perbatasan_desa' => 'Jumlah sengketa perbatasan antar negara yang terjadi di desa/kelurahan ini',
                    'sengketa_perbatasan_antar_daerah' => 'Jumlah sengketa perbatasan antar desa/kelurahan dan antar kecamatan atau antar daerah',
                    'kasus_diplomatik' => 'Jumlah kasus yang terkait dengan perbatasan antar negara yang dilaporkan ke pemerintah',
                    'kasus_disintegrasi' => 'Jumlah kasus mengarah kepada disintegrasi bangsa dan pengingkaran terhadap NKRI, Pancasila, UUD 1945, dan Bhinneka Tunggal Ika',
                    'kasus_penangkapan' => 'Jumlah kasus penangkapan warga di wilayah perbatasan oleh aparat negara tetangga',
                    'kasus_nelayan_petani' => 'Jumlah kasus nelayan/petani/peternak/pekebun/perambah hutan di wilayah perbatasan atau perairan negara lain',
                ];
            @endphp

            @foreach ($numericFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }} <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="number" name="{{ $name }}" min="0"
                               class="form-control @error($name) is-invalid @enderror"
                               value="{{ old($name) }}" required>
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.index') }}" class="btn btn-outline-secondary">
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
