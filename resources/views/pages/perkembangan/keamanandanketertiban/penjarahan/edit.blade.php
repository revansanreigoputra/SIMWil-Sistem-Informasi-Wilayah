@extends('layouts.master')

@section('title', 'Edit Data Penjarahan dan Penyerobotan Tanah')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Penjarahan dan Penyerobotan Tanah
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.penjarahan.update', $penjarahan->id) }}" method="POST">
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
                           value="{{ old('tanggal', \Carbon\Carbon::parse($penjarahan->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka sesuai migration --}}
            @php
                $numericFields = [
                    'korban_dan_pelaku_penduduk_setempat' => 'Jumlah kasus yang korban dan pelakunya penduduk setempat',
                    'korban_penduduk_setempat_pelaku_bukan_setempat' => 'Jumlah kasus korban penduduk setempat tetapi pelaku bukan penduduk setempat',
                    'korban_bukan_setempat_pelaku_penduduk_setempat' => 'Jumlah kasus korban bukan penduduk setempat tetapi pelaku penduduk setempat',
                    'pelaku_diadili_atau_diproses_hukum' => 'Jumlah pelaku yang diadili atau diproses hukum (orang)',
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
                            <input type="number" name="{{ $name }}" id="{{ $name }}" min="0"
                                   class="form-control @error($name) is-invalid @enderror"
                                   value="{{ old($name, $penjarahan->$name) }}" required>
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
                    <a href="{{ route('perkembangan.keamanandanketertiban.penjarahan.index') }}" class="btn btn-outline-secondary">
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
