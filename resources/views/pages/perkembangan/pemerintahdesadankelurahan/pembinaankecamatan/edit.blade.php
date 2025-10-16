@extends('layouts.master')

@section('title', 'Edit Data Pembinaan Kecamatan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Pembinaan Kecamatan
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.update', $pembinaankecamatan->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Input tanggal --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar-alt me-1"></i> Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                       id="tanggal" name="tanggal" 
                       value="{{ old('tanggal', $pembinaankecamatan->tanggal) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input angka sesuai field di controller --}}
            @php
                $numericFields = [
                    'fasilitasi_penyusunan_perdes' => 'Fasilitasi penyusunan peraturan desa',
                    'fasilitasi_administrasi_tata_pemerintahan' => 'Fasilitasi administrasi tata pemerintahan',
                    'fasilitasi_pengelolaan_keuangan' => 'Fasilitasi pengelolaan keuangan',
                    'fasilitasi_urusan_otonomi' => 'Fasilitasi urusan otonomi',
                    'fasilitasi_penerapan_peraturan' => 'Fasilitasi penerapan peraturan',
                    'fasilitasi_penyediaan_data' => 'Fasilitasi penyediaan data',
                    'fasilitasi_pelaksanaan_tugas' => 'Fasilitasi pelaksanaan tugas',
                    'fasilitasi_ketenteraman' => 'Fasilitasi ketenteraman',
                    'fasilitasi_penetapan_penguatan' => 'Fasilitasi penetapan & penguatan',
                    'penanggulangan_kemiskinan_apbd' => 'Penanggulangan kemiskinan (APBD)',
                    'fasilitasi_partisipasi_masyarakat' => 'Fasilitasi partisipasi masyarakat',
                    'fasilitasi_kerjasama_desa' => 'Fasilitasi kerjasama desa',
                    'fasilitasi_program_pemberdayaan' => 'Fasilitasi program pemberdayaan',
                    'fasilitasi_kerjasama_lembaga' => 'Fasilitasi kerjasama lembaga',
                    'fasilitasi_bantuan_teknis' => 'Fasilitasi bantuan teknis',
                    'fasilitasi_koordinasi_unit_kerja' => 'Fasilitasi koordinasi unit kerja',
                ];
            @endphp

            @foreach ($numericFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }}</label>
                    <div class="col-sm-3">
                        <input type="number" name="{{ $name }}" min="0"
                               class="form-control @error($name) is-invalid @enderror"
                               value="{{ old($name, $pembinaankecamatan->$name) }}">
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
                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.index') }}"
                       class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Perbarui Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
