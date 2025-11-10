@extends('layouts.master')

@section('title', 'Tambah Data Gotong Royong Desa dan Kelurahan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Gotong Royong Desa dan Kelurahan
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.peransertamasyarakat.gotongroyong.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i>
                        Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                        id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka wajib --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jumlah Kelompok Arisan <span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_kelompok_arisan" min="0" class="form-control @error('jumlah_kelompok_arisan') is-invalid @enderror"
                        value="{{ old('jumlah_kelompok_arisan') }}" required>
                    @error('jumlah_kelompok_arisan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Jumlah Penduduk Orang Tua Asuh <span class="text-danger">*</span></label>
                    <input type="number" name="jumlah_penduduk_orang_tua_asuh" min="0" class="form-control @error('jumlah_penduduk_orang_tua_asuh') is-invalid @enderror"
                        value="{{ old('jumlah_penduduk_orang_tua_asuh') }}" required>
                    @error('jumlah_penduduk_orang_tua_asuh')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Radio field kegiatan gotong royong --}}
            @php
                $radioFields = [
                    'dana_sehat' => 'Dana Sehat',
                    'pembangunan_rumah' => 'Pembangunan Rumah',
                    'pengolahan_tanah' => 'Pengolahan Tanah',
                    'pembiayaan_pendidikan' => 'Pembiayaan Pendidikan',
                    'pemeliharaan_fasilitas_umum' => 'Pemeliharaan Fasilitas Umum',
                    'pemberian_modal_usaha' => 'Pemberian Modal Usaha',
                    'pengerjaan_sawah_kebun' => 'Pengerjaan Sawah / Kebun',
                    'penangkapan_ikan_usaha' => 'Penangkapan Ikan / Usaha',
                    'menjaga_ketertiban' => 'Menjaga Ketertiban',
                    'peristiwa_kematian' => 'Peristiwa Kematian',
                    'menjaga_kebersihan_desa' => 'Menjaga Kebersihan Desa',
                    'membangun_jalan_irigasi' => 'Membangun Jalan / Irigasi',
                    'pemberantasan_sarang_nyamuk' => 'Pemberantasan Sarang Nyamuk',
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

            {{-- Tombol aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.peransertamasyarakat.gotongroyong.index') }}" class="btn btn-outline-secondary">
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
