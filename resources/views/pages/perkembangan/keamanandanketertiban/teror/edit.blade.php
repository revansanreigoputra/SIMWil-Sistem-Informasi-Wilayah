@extends('layouts.master')

@section('title', 'Edit Data Teror')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Teror
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.teror.update', $teror->id) }}" method="POST">
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
                           value="{{ old('tanggal', \Carbon\Carbon::parse($teror->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kolom Desa -->
                <div class="col-md-6 mb-3">
                    <label for="id_desa" class="form-label fw-semibold">
                        <i class="fas fa-map-marker-alt me-1"></i> Desa <span class="text-danger">*</span>
                    </label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('id_desa', $teror->id_desa) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka sesuai migration --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Intimidasi Dalam Desa <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_intimidasi_dalam_desa" min="0"
                           class="form-control @error('jumlah_kasus_intimidasi_dalam_desa') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_intimidasi_dalam_desa', $teror->jumlah_kasus_intimidasi_dalam_desa) }}" required>
                    @error('jumlah_kasus_intimidasi_dalam_desa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Intimidasi Luar Desa <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_intimidasi_luar_desa" min="0"
                           class="form-control @error('jumlah_kasus_intimidasi_luar_desa') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_intimidasi_luar_desa', $teror->jumlah_kasus_intimidasi_luar_desa) }}" required>
                    @error('jumlah_kasus_intimidasi_luar_desa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Selebaran Gelap <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_selebaran_gelap" min="0"
                           class="form-control @error('jumlah_kasus_selebaran_gelap') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_selebaran_gelap', $teror->jumlah_kasus_selebaran_gelap) }}" required>
                    @error('jumlah_kasus_selebaran_gelap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Terorisme <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_terorisme" min="0"
                           class="form-control @error('jumlah_kasus_terorisme') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_terorisme', $teror->jumlah_kasus_terorisme) }}" required>
                    @error('jumlah_kasus_terorisme')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Kasus Hasutan atau Pemaksaan <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_hasutan_pemaksaan" min="0"
                           class="form-control @error('jumlah_kasus_hasutan_pemaksaan') is-invalid @enderror"
                           value="{{ old('jumlah_kasus_hasutan_pemaksaan', $teror->jumlah_kasus_hasutan_pemaksaan) }}" required>
                    @error('jumlah_kasus_hasutan_pemaksaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Jumlah Penyelesaian Kasus <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_penyelesaian_kasus" min="0"
                           class="form-control @error('jumlah_penyelesaian_kasus') is-invalid @enderror"
                           value="{{ old('jumlah_penyelesaian_kasus', $teror->jumlah_penyelesaian_kasus) }}" required>
                    @error('jumlah_penyelesaian_kasus')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.keamanandanketertiban.teror.index') }}" class="btn btn-outline-secondary">
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
