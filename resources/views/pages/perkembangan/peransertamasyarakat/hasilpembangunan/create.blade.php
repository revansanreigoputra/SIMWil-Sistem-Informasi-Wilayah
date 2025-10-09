@extends('layouts.master')

@section('title', 'Tambah Data Hasil Pembangunan Desa dan Kelurahan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Hasil Pembangunan Desa dan Kelurahan
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.store') }}" method="POST">
            @csrf

            {{-- Input tanggal --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar-alt me-1"></i> Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                       id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input angka --}}
            @php
                $numericFields = [
                    'jumlah_masyarakat_terlibat' => 'Jumlah masyarakat yang terlibat dalam pelaksanaan pembangunan fisik di desa dan kelurahan sesuai hasil Musrenbang',
                    'jumlah_penduduk_dilibatkan' => 'Jumlah penduduk yang dilibatkan dalam pelaksanaan proyek padat karya oleh pengelola proyek yang ditunjuk pemerintah desa/kelurahan atau kabupaten/kota',
                    'jumlah_kegiatan_masyarakat' => 'Jumlah kegiatan yang dilaksanakan oleh masyarakat dan lembaga kemasyarakatan desa/kelurahan yang sudah ada sesuai ketetapan dalam APB-Desa',
                    'jumlah_kegiatan_pihak_ketiga' => 'Jumlah kegiatan yang dilaksanakan oleh pihak ketiga tanpa melibatkan masyarakat sesuai ketentuan dalam APB-Daerah',
                    'jumlah_kegiatan_luar_musrenbang' => 'Jumlah kegiatan yang masuk desa/kelurahan di luar yang telah direncanakan dan disepakati masyarakat saat Musrenbang',
                    'jumlah_masyarakat_disetujui_rk' => 'Jumlah masyarakat yang disetujui menjadi Rencana Kerja Desa dan Kelurahan',
                    'usulan_pemerintah_desa_kelurahan_disetujui_rk' => 'Usulan Pemerintah Desa dan Kelurahan yang disetujui menjadi Rencana Kerja Desa/Kelurahan',
                    'usulan_rencana_kerja_program' => 'Usulan rencana kerja program dan kegiatan dari pemerintah kabupaten/kota/provinsi dan pusat yang dibahas saat Musrenbang dan disetujui untuk dilaksanakan di desa dan kelurahan oleh masyarakat',
                    'pelaksanaan_kegiatan_masyarakat' => 'Jumlah kegiatan yang dilaksanakan oleh masyarakat dalam pelaksanaan pembangunan desa/kelurahan',
                    'jumlah_kasus_penyimpangan_kepada_kepala_desa' => 'Jumlah kasus penyimpangan pelaksanaan kegiatan pembangunan yang dilaporkan masyarakat atau lembaga kemasyarakatan desa/kelurahan kepada Kepala Desa/Lurah',
                    'jumlah_kasus_penyimpangan_desa_kelurahan' => 'Jumlah kasus penyimpangan pelaksanaan pembangunan yang diselesaikan di tingkat desa/kelurahan',
                    'jumlah_kasus_penyimpangan_desa_kelurahan_hukum' => 'Jumlah kasus penyimpangan pelaksanaan kegiatan pembangunan desa/kelurahan yang diselesaikan secara hukum',
                    'jumlah_kegiatan_didanai_apb_desa' => 'Jumlah kegiatan yang didanai dari APB-Desa dan swadaya masyarakat di kelurahan',
                    'jumlah_kegiatan_didanai_apb_kabupaten' => 'Jumlah kegiatan di desa dan kelurahan yang didanai dari APB Daerah Kabupaten/Kota',
                    'jumlah_kegiatan_didanai_apbd_provinsi' => 'Jumlah kegiatan di desa dan kelurahan yang didanai dari APBD Provinsi',
                    'jumlah_kegiatan_didanai_apbn' => 'Jumlah kegiatan di desa dan kelurahan yang didanai APBN',
                ];
            @endphp

            @foreach ($numericFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }}</label>
                    <div class="col-sm-3">
                        <input type="number" name="{{ $name }}" min="0"
                               class="form-control @error($name) is-invalid @enderror"
                               value="{{ old($name) }}">
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            {{-- Field teks --}}
            <div class="row mb-3">
                <label class="col-sm-9 col-form-label">Jenis kegiatan masyarakat untuk melestarikan hasil pembangunan yang didinaskan pemerintah desa/kelurahan</label>
                <div class="col-sm-3">
                    <input type="text" name="jenis_kegiatan_pemeliharaan"
                           class="form-control @error('jenis_kegiatan_pemeliharaan') is-invalid @enderror"
                           value="{{ old('jenis_kegiatan_pemeliharaan') }}">
                    @error('jenis_kegiatan_pemeliharaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Radio Field --}}
            @php
                $radioFields = [
                    'penyelenggaraan_musyawarah' => 'Penyelenggaraan musyawarah masyarakat dalam pelaksanaan pembangunan',
                    'pelaksanaan_kegiatan_tersisa' => 'Status kegiatan masyarakat yang tersisa atau belum selesai (Ada/Tidak Ada)',
                ];
            @endphp

            @foreach ($radioFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }}</label>
                    <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Ada"
                                   {{ old($name) === 'Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Ada"
                                   {{ old($name) === 'Tidak Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                        @error($name)
                            <div class="text-danger small">{{ $message }}</div>
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
                    <a href="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.index') }}" class="btn btn-outline-secondary">
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
