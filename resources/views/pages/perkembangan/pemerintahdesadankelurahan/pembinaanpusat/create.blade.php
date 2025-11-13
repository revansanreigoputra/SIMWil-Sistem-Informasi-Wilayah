@extends('layouts.master')

@section('title', 'Tambah Pembinaan Pemerintah Pusat')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Pembinaan Pemerintah Pusat
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.store') }}" method="POST">
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

            {{-- Bagian Pedoman --}}
            @php
                $radioFields = [
                    'pedoman_pelaksanaan_urusan' => 'Pedoman & standar pelaksanaan urusan pemerintahan desa, kelurahan, lembaga kemasyarakatan',
                    'pedoman_bantuan_pembiayaan' => 'Pedoman & standar bantuan pembiayaan dari pemerintah, pemerintah provinsi dan kabupaten/kota',
                    'pedoman_administrasi' => 'Pedoman administrasi, tata naskah & pelaporan bagi kepala desa & lurah',
                    'pedoman_tanda_jabatan' => 'Pedoman tanda jabatan, pakaian dinas & atribut bagi Kepala Desa, Lurah & Perangkat Desa/Kelurahan',
                    'pedoman_pendidikan_pelatihan' => 'Pedoman pendidikan & pelatihan bagi pemerintahan desa, kelurahan, lembaga kemasyarakatan',
                ];
            @endphp

            <div class="mb-3">
                <h5 class="fw-bold text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-book me-1"></i> Pedoman & Standar
                </h5>
                @foreach ($radioFields as $name => $label)
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <label class="form-label mb-0 w-75">
                            {{ $label }} <span class="text-danger">*</span>
                        </label>
                        <div class="d-flex gap-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $name }}" value="Ada"
                                    {{ old($name) == 'Ada' ? 'checked' : '' }} required>
                                <label class="form-check-label">Ada</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Ada"
                                    {{ old($name) == 'Tidak Ada' ? 'checked' : '' }} required>
                                <label class="form-check-label">Tidak Ada</label>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Bagian Jumlah Kegiatan --}}
            @php
                $numericFields = [
                    'jumlah_bimbingan' => 'Jumlah bimbingan, supervisi dan konsultasi pelaksanaan pemerintahan desa dan kelurahan serta pemberdayaan lembaga kemasyarakatan',
                    'jumlah_kegiatan_pendidikan' => 'Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan',
                    'jumlah_penelitian_pengkajian' => 'Penelitian dan pengkajian penyelenggaraan pemerintahan desa dan kelurahan',
                    'jumlah_kegiatan_terkait_apbn' => 'Jumlah kegiatan terkait APBN untuk akselerasi pembangunan desa dan kelurahan',
                    'jumlah_penghargaan' => 'Pemberian penghargaan atas prestasi penyelenggaraan pemerintahan desa dan kelurahan',
                    'jumlah_sanksi' => 'Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat masing-masing',
                ];
            @endphp

            <div class="mb-3">
                <h5 class="fw-bold text-primary border-bottom pb-2 mb-3">
                    <i class="fas fa-list-ol me-1"></i> Jumlah Kegiatan
                </h5>
                @foreach ($numericFields as $name => $label)
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <label for="{{ $name }}" class="form-label mb-0 w-75">
                            {{ $label }} <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control w-25 text-end @error($name) is-invalid @enderror"
                            id="{{ $name }}" name="{{ $name }}" min="0" value="{{ old($name) }}" required>
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
                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.index') }}" class="btn btn-outline-secondary">
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
