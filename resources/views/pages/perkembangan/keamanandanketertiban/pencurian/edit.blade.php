@extends('layouts.master')

@section('title', 'Edit Data Pencurian')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Pencurian
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.pencurian.update', $pencurian->id) }}" method="POST">
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
                        value="{{ old('tanggal', \Carbon\Carbon::parse($pencurian->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka berdasarkan migration --}}
            <div class="row">
                @php
                    $fields = [
                        'kasus_tahun_ini' => 'Jumlah Kasus Pencurian Tahun Ini',
                        'korban_penduduk_setempat' => 'Korban Penduduk Setempat',
                        'pelaku_penduduk_setempat' => 'Pelaku Penduduk Setempat',
                        'pencurian_bersenjata_api' => 'Pencurian dengan Senjata Api',
                        'pelaku_diadili' => 'Pelaku yang Diadili',
                    ];
                @endphp

                @foreach ($fields as $name => $label)
                    <div class="col-md-6 mb-3">
                        <label for="{{ $name }}" class="form-label fw-semibold">
                            {{ $label }} <span class="text-danger">*</span>
                        </label>
                        <input type="number" min="0" id="{{ $name }}" name="{{ $name }}"
                            value="{{ old($name, $pencurian->$name) }}"
                            class="form-control @error($name) is-invalid @enderror" required>
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.keamanandanketertiban.pencurian.index') }}" class="btn btn-outline-secondary">
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
