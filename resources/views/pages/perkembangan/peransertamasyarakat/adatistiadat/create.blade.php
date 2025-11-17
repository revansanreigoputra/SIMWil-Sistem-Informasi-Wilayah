@extends('layouts.master')

@section('title', 'Tambah Data Adat Istiadat')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Adat Istiadat
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.peransertamasyarakat.adatistiadat.store') }}" method="POST">
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

            {{-- Radio field adat istiadat --}}
            @php
                $radioFields = [
                    'perkawinan' => 'Adat Istiadat dalam Perkawinan',
                    'kelahiran_anak' => 'Adat Istiadat dalam Kelahiran Anak',
                    'upacara_kematian' => 'Adat Istiadat dalam Upacara Kematian',
                    'pengelolaan_hutan' => 'Adat Istiadat dalam Pengelolaan Hutan',
                    'tanah_pertanian' => 'Adat Istiadat dalam Tanah Pertanian',
                    'pengelolaan_laut' => 'Adat Istiadat dalam Pengelolaan Laut/Pantai',
                    'memecahkan_konflik' => 'Adat Istiadat dalam Memecahkan Konflik Warga',
                    'menjauhkan_bala' => 'Adat Istiadat dalam Menjauhkan Bala Penyakit dan Bencana Alam',
                    'memulihkan_hubungan_alam' => 'Adat Istiadat dalam Memulihkan Hubungan antara Alam Semesta dan Lingkungan',
                    'penanggulangan_kemiskinan' => 'Adat Istiadat dalam Penanggulangan Kemiskinan bagi Keluarga Tidak Mampu/Fakir Miskin/Terlantar',
                ];
            @endphp

            @foreach ($radioFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label">
                        {{ $label }} <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Aktif"
                                   {{ old($name) === 'Aktif' ? 'checked' : '' }} required>
                            <label class="form-check-label">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Aktif"
                                   {{ old($name) === 'Tidak Aktif' ? 'checked' : '' }} required>
                            <label class="form-check-label">Tidak Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Pernah Ada"
                                   {{ old($name) === 'Pernah Ada' ? 'checked' : '' }} required>
                            <label class="form-check-label">Pernah Ada</label>
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
                    <a href="{{ route('perkembangan.peransertamasyarakat.adatistiadat.index') }}" class="btn btn-outline-secondary">
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
