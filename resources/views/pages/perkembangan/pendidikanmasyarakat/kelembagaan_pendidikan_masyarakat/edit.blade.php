@extends('layouts.master')

@section('title', 'Edit Data Kelembagaan Pendidikan Masyarakat')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">🧾 Form Edit Data Kelembagaan Pendidikan Masyarakat</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Baris 1: Tanggal --}}
            <div class="row mb-2">
                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" 
                        value="{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}" required>
                </div>
            </div>

            {{-- Baris 2+: Input numerik --}}
            @php
                $fields = [
                    'perpustakaan_desa' => 'Jumlah Perpustakaan Desa/Kelurahan (Unit)',
                    'taman_bacaan' => 'Jumlah Taman Bacaan Desa/Kelurahan (Unit)',
                    'perpustakaan_keliling' => 'Jumlah Perpustakaan Keliling (Unit)',
                    'sanggar_belajar' => 'Jumlah Sanggar Belajar (Unit)',
                    'kegiatan_lps' => 'Jumlah Kegiatan Lembaga Pendidikan Luar Sekolah (Kegiatan)',
                    'kelompok_a' => 'Jumlah Kelompok Belajar Paket A (Kelompok)',
                    'peserta_a' => 'Jumlah Peserta Ujian Paket A (Orang)',
                    'kelompok_b' => 'Jumlah Kelompok Belajar Paket B (Kelompok)',
                    'peserta_b' => 'Jumlah Peserta Ujian Paket B (Orang)',
                    'kelompok_c' => 'Jumlah Kelompok Belajar Paket C (Kelompok)',
                    'peserta_c' => 'Jumlah Peserta Ujian Paket C (Orang)',
                    'kursus_unit' => 'Jumlah Lembaga Kursus Keterampilan (Unit)',
                    'peserta_kursus' => 'Jumlah Peserta Kursus Keterampilan (Orang)',
                ];
            @endphp

            @foreach($fields as $field => $label)
                <div class="row mb-2">
                    <div class="col-md-6 mb-2">
                        <label>{{ $label }}</label>
                        <input type="number" name="{{ $field }}" class="form-control" 
                            value="{{ $item->$field }}" min="0" required>
                    </div>
                </div>
            @endforeach

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
