@extends('layouts.master')

@section('title', 'Tambah Data Perkelahian')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Perkelahian
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.perkelahian.store') }}" method="POST">
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

            {{-- Input angka sesuai kolom di migration --}}
            @php
                $numericFields = [
                    'kasus_tahun_ini' => 'Jumlah Kasus Tahun Ini',
                    'kasus_korban_jiwa' => 'Jumlah Kasus dengan Korban Jiwa',
                    'kasus_luka_parah' => 'Jumlah Kasus Luka Parah',
                    'kasus_kerugian_material' => 'Jumlah Kasus dengan Kerugian Material',
                    'pelaku_diadili' => 'Jumlah Pelaku yang Diadili',
                ];

                $chunks = array_chunk($numericFields, 2, true);
            @endphp

            @foreach ($chunks as $pair)
                <div class="row mb-3">
                    @foreach ($pair as $name => $label)
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                {{ $label }} <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="{{ $name }}" min="0"
                                   class="form-control @error($name) is-invalid @enderror"
                                   value="{{ old($name) }}" required>
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
                    <a href="{{ route('perkembangan.keamanandanketertiban.perkelahian.index') }}" class="btn btn-outline-secondary">
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
