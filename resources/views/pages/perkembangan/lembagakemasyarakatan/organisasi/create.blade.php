@extends('layouts.master')

@section('title', 'Tambah Data Organisasi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2"></i>
            Tambah Data Organisasi
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.lembagakemasyarakatan.organisasi.store') }}" method="POST">
            @csrf

            {{-- Tanggal --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                    id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Jenis Organisasi --}}
            <div class="mb-3">
                <label for="jenis_organisasi" class="form-label fw-semibold">Jenis Organisasi <span class="text-danger">*</span></label>
                <select class="form-select @error('jenis_organisasi') is-invalid @enderror" 
                    id="jenis_organisasi" name="jenis_organisasi" required>
                    <option value="">-- Pilih Jenis --</option>
                    @foreach([
                        'Pemberdayaan dan Kesejahteraan Keluarga (PKK)',
                        'Badan Usaha Milik Desa',
                        'Forum Komunikasi Kader Pemberdayaan Masyarakat',
                        'Karang Taruna',
                        'Kelompok Gotong Royong',
                        'Kelompok Tani/Nelayan',
                        'Lembaga Adat',
                        'LKMD/LPM/Sebutan Lain',
                        'Organisasi Bapak',
                        'Organisasi Keagamaan',
                        'Organisasi Pemuda',
                        'Organisasi Perempuan',
                        'Organisasi Profesi',
                        'Posyandu',
                        'Posyantokdes',
                        'Rukun Tetangga',
                        'Rukun Warga'
                    ] as $jenis)
                        <option value="{{ $jenis }}" {{ old('jenis_organisasi') == $jenis ? 'selected' : '' }}>
                            {{ $jenis }}
                        </option>
                    @endforeach
                </select>
                @error('jenis_organisasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Kepengurusan --}}
            <div class="mb-3">
                <label for="kepengurusan" class="form-label fw-semibold">Kepengurusan</label>
                <select class="form-select @error('kepengurusan') is-invalid @enderror" 
                    id="kepengurusan" name="kepengurusan">
                    <option value="">-- Pilih --</option>
                    @foreach(['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada'] as $status)
                        <option value="{{ $status }}" {{ old('kepengurusan') == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
                @error('kepengurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Buku Administrasi --}}
            <div class="mb-3">
                <label for="buku_administrasi" class="form-label fw-semibold">Buku Administrasi</label>
                <input type="text" class="form-control @error('buku_administrasi') is-invalid @enderror" 
                    id="buku_administrasi" name="buku_administrasi" 
                    value="{{ old('buku_administrasi') }}">
                @error('buku_administrasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Jumlah Kegiatan --}}
            <div class="mb-3">
                <label for="jumlah_kegiatan" class="form-label fw-semibold">Jumlah Kegiatan</label>
                <input type="number" class="form-control @error('jumlah_kegiatan') is-invalid @enderror" 
                    id="jumlah_kegiatan" name="jumlah_kegiatan" 
                    value="{{ old('jumlah_kegiatan') }}">
                @error('jumlah_kegiatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Dasar Hukum Pembentukan --}}
            <div class="mb-3">
                <label for="dasar_hukum_pembentukan" class="form-label fw-semibold">Dasar Hukum Pembentukan</label>
                <select class="form-select @error('dasar_hukum_pembentukan') is-invalid @enderror" 
                    id="dasar_hukum_pembentukan" name="dasar_hukum_pembentukan">
                    <option value="">-- Pilih --</option>
                    @foreach(['Peraturan Desa', 'Peraturan Daerah', 'Tidak Ada'] as $hukum)
                        <option value="{{ $hukum }}" {{ old('dasar_hukum_pembentukan') == $hukum ? 'selected' : '' }}>
                            {{ $hukum }}
                        </option>
                    @endforeach
                </select>
                @error('dasar_hukum_pembentukan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Field dengan tanda <span class="text-danger">*</span> wajib diisi
                </small>

                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.index') }}" 
                        class="btn btn-outline-secondary rounded">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary rounded">
                        Simpan Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
