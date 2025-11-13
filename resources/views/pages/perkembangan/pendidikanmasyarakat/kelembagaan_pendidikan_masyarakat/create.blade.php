@extends('layouts.master')

@section('title', 'Tambah Data Kelembagaan Pendidikan Masyarakat')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">🧾 Form Tambah Data Kelembagaan Pendidikan Masyarakat</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.store') }}" method="POST">
            @csrf

            {{-- Baris 1: Tanggal --}}
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                    @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            {{-- Baris 2: Perpustakaan & Taman Bacaan --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Perpustakaan Desa/Kelurahan (Unit)</label>
                    <input type="number" name="perpustakaan_desa" class="form-control" min="0" value="{{ old('perpustakaan_desa', 0) }}" required>
                    @error('perpustakaan_desa') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-2">
                    <label>Jumlah Taman Bacaan Desa/Kelurahan (Unit)</label>
                    <input type="number" name="taman_bacaan" class="form-control" min="0" value="{{ old('taman_bacaan', 0) }}" required>
                    @error('taman_bacaan') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-2">
                    <label>Jumlah Perpustakaan Keliling (Unit)</label>
                    <input type="number" name="perpustakaan_keliling" class="form-control" min="0" value="{{ old('perpustakaan_keliling', 0) }}" required>
                    @error('perpustakaan_keliling') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-2">
                    <label>Jumlah Sanggar Belajar (Unit)</label>
                    <input type="number" name="sanggar_belajar" class="form-control" min="0" value="{{ old('sanggar_belajar', 0) }}" required>
                    @error('sanggar_belajar') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-6 mb-2">
                    <label>Jumlah Kegiatan Lembaga Pendidikan Luar Sekolah (Kegiatan)</label>
                    <input type="number" name="kegiatan_lps" class="form-control" min="0" value="{{ old('kegiatan_lps', 0) }}" required>
                    @error('kegiatan_lps') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            {{-- Paket A --}}
            <h6 class="mt-3">Paket A</h6>
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Kelompok Belajar Paket A (Kelompok)</label>
                    <input type="number" name="kelompok_a" class="form-control" min="0" value="{{ old('kelompok_a', 0) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Peserta Ujian Paket A (Orang)</label>
                    <input type="number" name="peserta_a" class="form-control" min="0" value="{{ old('peserta_a', 0) }}" required>
                </div>
            </div>

            {{-- Paket B --}}
            <h6 class="mt-3">Paket B</h6>
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Kelompok Belajar Paket B (Kelompok)</label>
                    <input type="number" name="kelompok_b" class="form-control" min="0" value="{{ old('kelompok_b', 0) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Peserta Ujian Paket B (Orang)</label>
                    <input type="number" name="peserta_b" class="form-control" min="0" value="{{ old('peserta_b', 0) }}" required>
                </div>
            </div>

            {{-- Paket C --}}
            <h6 class="mt-3">Paket C</h6>
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Kelompok Belajar Paket C (Kelompok)</label>
                    <input type="number" name="kelompok_c" class="form-control" min="0" value="{{ old('kelompok_c', 0) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Peserta Ujian Paket C (Orang)</label>
                    <input type="number" name="peserta_c" class="form-control" min="0" value="{{ old('peserta_c', 0) }}" required>
                </div>
            </div>

            {{-- Lembaga Kursus Keterampilan --}}
            <h6 class="mt-3">Lembaga Kursus Keterampilan</h6>
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Lembaga Kursus Keterampilan (Unit)</label>
                    <input type="number" name="kursus_unit" class="form-control" min="0" value="{{ old('kursus_unit', 0) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Peserta Kursus Keterampilan (Orang)</label>
                    <input type="number" name="peserta_kursus" class="form-control" min="0" value="{{ old('peserta_kursus', 0) }}" required>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
