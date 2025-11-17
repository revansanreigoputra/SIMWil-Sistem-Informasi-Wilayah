@extends('layouts.master')

@section('title', 'Tambah Data Pemakaian Miras dan Narkoba')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Miras dan Narkoba
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.miras.store') }}" method="POST">
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
            </div>

            {{-- Input angka sesuai migration --}}
            @php
                $numericFields = [
                    'jumlah_warung_miras' => 'Jumlah Warung Miras',
                    'jumlah_penduduk_miras' => 'Jumlah Penduduk Miras',
                    'jumlah_kasus_mabuk_miras' => 'Jumlah Kasus Mabuk Miras',
                    'jumlah_pengedar_narkoba' => 'Jumlah Pengedar Narkoba',
                    'jumlah_penduduk_narkoba' => 'Jumlah Penduduk Narkoba',
                    'jumlah_kasus_teler_narkoba' => 'Jumlah Kasus Teler Narkoba',
                    'jumlah_kasus_kematian_narkoba' => 'Jumlah Kasus Kematian Narkoba',
                    'jumlah_pelaku_miras_diadili' => 'Jumlah Pelaku Miras Diadili',
                    'jumlah_pelaku_narkoba_diadili' => 'Jumlah Pelaku Narkoba Diadili',
                ];

                $chunks = array_chunk($numericFields, 2, true);
            @endphp

            @foreach ($chunks as $pair)
                <div class="row mb-3">
                    @foreach ($pair as $name => $label)
                        <div class="col-md-6">
                            <label for="{{ $name }}" class="form-label fw-semibold">
                                {{ $label }} <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="{{ $name }}" id="{{ $name }}" min="0" required
                                   class="form-control @error($name) is-invalid @enderror"
                                   value="{{ old($name) }}">
                            @error($name)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>
            @endforeach

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.keamanandanketertiban.miras.index') }}" class="btn btn-outline-secondary">
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
