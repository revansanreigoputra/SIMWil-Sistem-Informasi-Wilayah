@extends('layouts.master')

@section('title', 'Edit Data Perjudian, Penipuan, dan Penggelapan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Perjudian
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.perjudian.update', $perjudian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           id="tanggal" name="tanggal"
                           value="{{ old('tanggal', \Carbon\Carbon::parse($perjudian->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input sesuai migration --}}
            @php
                $fields = [
                    'jumlah_penduduk_berjudi' => 'Jumlah Penduduk Berjudi',
                    'jenis_perjudian' => 'Jenis Perjudian',
                    'jumlah_kasus_penipuan_penggelapan' => 'Jumlah Kasus Penipuan / Penggelapan',
                    'jumlah_kasus_sengketa_warisan_jualbeli_utangpiutang' => 'Jumlah Kasus Sengketa Warisan / Jual Beli / Utang Piutang',
                ];
                $chunks = array_chunk($fields, 2, true);
            @endphp

            @foreach ($chunks as $pair)
                <div class="row mb-3">
                    @foreach ($pair as $name => $label)
                        <div class="col-md-6">
                            <label for="{{ $name }}" class="form-label fw-semibold">
                                {{ $label }} <span class="text-danger">*</span>
                            </label>
                            @if ($name === 'jenis_perjudian')
                                <input type="text" name="{{ $name }}" id="{{ $name }}"
                                       class="form-control @error($name) is-invalid @enderror"
                                       value="{{ old($name, $perjudian->$name) }}"
                                       placeholder="Contoh: Judi Online, Togel, Sabung Ayam">
                            @else
                                <input type="number" name="{{ $name }}" id="{{ $name }}" min="0"
                                       class="form-control @error($name) is-invalid @enderror"
                                       value="{{ old($name, $perjudian->$name) }}">
                            @endif
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
                    <a href="{{ route('perkembangan.keamanandanketertiban.perjudian.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
