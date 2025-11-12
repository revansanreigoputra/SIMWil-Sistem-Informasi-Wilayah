@extends('layouts.master')

@section('title', 'Tambah Data Musrenbang Desa')

@section('content')
<div class="card shadow-sm boreder-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Musrenbang Desa
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.peransertamasyarakat.musrenbangdesa.store') }}" method="POST">
            @csrf

            <div class="row">
            <!-- Kolom Tanggal -->
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar me-1"></i>
                    Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    name="tanggal" value="{{ old('tanggal') }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>

            {{-- Daftar Field Radio --}}
            @php
                $radioFields = [
                    'penggunaan_profil_desa' => 'Penggunaan Profil Desa',
                    'penggunaan_data_bps' => 'Penggunaan Data BPS',
                    'pelibatan_masyarakat' => 'Pelibatan Masyarakat',
                    'dokumen_rkpdes' => 'Dokumen RKPDes',
                    'dokumen_rpjmdes' => 'Dokumen RPJMDes',
                    'dokumen_hasil_musrenbang' => 'Dokumen Hasil Musrenbang',
                ];
            @endphp

            @foreach ($radioFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }} <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Ada"
                                   {{ old($name) === 'Ada' ? 'checked' : '' }} required>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Ada"
                                   {{ old($name) === 'Tidak Ada' ? 'checked' : '' }} required>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                        @error($name)
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            {{-- Input angka --}}
            @php
                $numericFields = [
                    'jumlah_musrenbang_desa_kelurahan' => 'Jumlah Musrenbang Desa/Kelurahan',
                    'jumlah_kehadiran_masyarakat' => 'Jumlah Kehadiran Masyarakat',
                    'jumlah_peserta_laki' => 'Jumlah Peserta Laki-laki',
                    'jumlah_peserta_perempuan' => 'Jumlah Peserta Perempuan',
                    'jumlah_musrenbang_antar_desa' => 'Jumlah Musrenbang Antar Desa',
                    'usulan_masyarakat_disetujui' => 'Usulan Masyarakat Disetujui',
                    'usulan_pemerintah_desa_disetujui' => 'Usulan Pemerintah Desa Disetujui',
                    'usulan_rencana_kerja_pemkab' => 'Usulan Rencana Kerja Pemkab',
                    'usulan_rencana_kerja_ditolak' => 'Usulan Rencana Kerja Ditolak',
                    'jumlah_kegiatan_terdanai' => 'Jumlah Kegiatan Terdanai',
                    'jumlah_kegiatan_tidak_sesuai' => 'Jumlah Kegiatan Tidak Sesuai',
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
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.peransertamasyarakat.musrenbangdesa.index') }}" class="btn btn-outline-secondary">
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
