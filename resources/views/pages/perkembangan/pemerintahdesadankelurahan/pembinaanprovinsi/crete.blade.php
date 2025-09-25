@extends('layouts.master')

@section('title', 'Tambah Pembinaan Pemerintah Provinsi')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Pembinaan Pemerintah Provinsi
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('pembinaanprovinsi.store') }}" method="POST">
            @csrf

            {{-- Tanggal --}}
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

            {{-- Bagian Pedoman (Radio Button) --}}
            @php
                $radioFields = [
                    'pedoman_pelaksanaan_tugas' => 'Pedoman pelaksanaan tugas pembantuan dari provinsi ke desa/kelurahan',
                    'pedoman_bantuan_keuangan' => 'Pedoman bantuan keuangan dari provinsi',
                    'kegiatan_fasilitasi_keberadaan' => 'Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat dan lembaga adat',
                    'fasilitasi_pelaksanaan_pedoman' => 'Fasilitasi pelaksanaan pedoman administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah',
                ];
            @endphp

            <div class="mb-3">
                <h5 class="fw-bold text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-book me-1"></i> Pedoman & Fasilitasi
                </h5>
                @foreach ($radioFields as $name => $label)
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <label class="form-label mb-0 w-75">{{ $label }} <span class="text-danger">*</span></label>
                        <div class="d-flex gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $name }}" value="Ada"
                                    {{ old($name) == 'Ada' ? 'checked' : '' }} required>
                                <label class="form-check-label">Ada</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Ada"
                                    {{ old($name) == 'Tidak Ada' ? 'checked' : '' }}>
                                <label class="form-check-label">Tidak Ada</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Bagian Jumlah Kegiatan (Input Number) --}}
            @php
                $numericFields = [
                    'jumlah_kegiatan_pendidikan' => 'Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan berskala provinsi',
                    'kegiatan_penanggulangan_kemiskinan' => 'Kegiatan penanggulangan kemiskinan yang dibiayai APBD Provinsi yang masuk desa dan kelurahan',
                    'kegiatan_penanganan_bencana' => 'Kegiatan penanganan bencana yang dibiayai APBD Provinsi untuk desa dan kelurahan',
                    'kegiatan_peningkatan_pendapatan' => 'Kegiatan peningkatan pendapatan keluarga yang dibiayai APBD Provinsi di desa dan kelurahan',
                    'kegiatan_penyediaan_sarana' => 'Kegiatan penyediaan sarana dan prasarana desa dan kelurahan yang dibiayai APBD Provinsi',
                    'kegiatan_pemanfaatan_sda' => 'Kegiatan pemanfaatan sumber daya alam dan pengembangan teknologi tepat guna yang dibiayai APBD Provinsi',
                    'kegiatan_pengembangan_sosial' => 'Kegiatan pengembangan sosial budaya masyarakat',
                    'pedoman_pendataan' => 'Pedoman pendataan dan pendayagunaan data profil desa dan kelurahan',
                    'pemberian_sanksi' => 'Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat masing-masing',
                ];
            @endphp

            <div class="mb-3">
                <h5 class="fw-bold text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-list-ol me-1"></i> Jumlah Kegiatan / Data
                </h5>
                @foreach ($numericFields as $name => $label)
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <label for="{{ $name }}" class="form-label mb-0 w-75">{{ $label }}</label>
                        <input type="number" class="form-control w-25 text-end @error($name) is-invalid @enderror"
                               id="{{ $name }}" name="{{ $name }}" min="0" value="{{ old($name) }}">
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>

            <hr class="my-3">

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('pembinaanprovinsi.index') }}" class="btn btn-outline-secondary">
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
