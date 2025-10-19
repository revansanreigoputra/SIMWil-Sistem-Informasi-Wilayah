@extends('layouts.master')

@section('title', 'Edit Data Gotong Royong')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Gotong Royong
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.peransertamasyarakat.gotongroyong.update', $gotongroyong->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
            <!-- Kolom Tanggal -->
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar me-1"></i>
                    Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                    id="tanggal" name="tanggal"
                    value="{{ old('tanggal', \Carbon\Carbon::parse($gotongroyong->tanggal)->format('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kolom Desa -->
            <div class="col-md-6 mb-3">
                <label for="id_desa" class="form-label fw-semibold">
                    <i class="fas fa-map-marker-alt me-1"></i>
                    Desa <span class="text-danger">*</span>
                </label>
                <select name="id_desa" id="id_desa" class="form-control" required>
                    <option value="">-- Pilih Desa --</option>
                    @foreach ($desas as $item)
                        <option value="{{ $item->id }}" {{ old('id_desa', $gotongroyong->id_desa) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_desa }}
                        </option>
                    @endforeach
                </select>
            </div>
            </div>

            {{-- Input Angka --}}
            @php
                $numericFields = [
                    'jumlah_kelompok_arisan' => 'Jumlah Kelompok Arisan',
                    'jumlah_penduduk_orang_tua_asuh' => 'Jumlah Penduduk yang menjadi Orang Tua Asuh',
                ];
            @endphp

            @foreach ($numericFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }}</label>
                    <div class="col-sm-3">
                        <input type="number" name="{{ $name }}" min="0"
                               class="form-control @error($name) is-invalid @enderror"
                               value="{{ old($name, $gotongroyong->$name) }}">
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            {{-- Radio Field (Ya/Tidak) --}}
            @php
                $radioFields = [
                    'dana_sehat' => 'Dana Sehat',
                    'pembangunan_rumah' => 'Pembangunan Rumah',
                    'pengolahan_tanah' => 'Pengolahan Tanah',
                    'pembiayaan_pendidikan' => 'Pembiayaan Pendidikan',
                    'pemeliharaan_fasilitas_umum' => 'Pemeliharaan Fasilitas Umum',
                    'pemberian_modal_usaha' => 'Pemberian Modal Usaha',
                    'pengerjaan_sawah_kebun' => 'Pengerjaan Sawah atau Kebun',
                    'penangkapan_ikan_usaha' => 'Penangkapan Ikan untuk Usaha',
                    'menjaga_ketertiban' => 'Menjaga Ketertiban Desa',
                    'peristiwa_kematian' => 'Gotong Royong Saat Peristiwa Kematian',
                    'menjaga_kebersihan_desa' => 'Menjaga Kebersihan Desa',
                    'membangun_jalan_irigasi' => 'Membangun Jalan atau Irigasi',
                    'pemberantasan_sarang_nyamuk' => 'Pemberantasan Sarang Nyamuk',
                ];
            @endphp

            @foreach ($radioFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }} *</label>
                    <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Ada"
                                   {{ old($name, $gotongroyong->$name) === 'Ada' ? 'checked' : '' }} required>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Ada"
                                   {{ old($name, $gotongroyong->$name) === 'Tidak Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                        @error($name)
                            <div class="text-danger small">{{ $message }}</div>
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
                    <a href="{{ route('perkembangan.peransertamasyarakat.gotongroyong.index') }}" class="btn btn-outline-secondary">
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
