@extends('layouts.master')

@section('title', 'Detail Kelembagaan Pendidikan Masyarakat')

@section('content')
<div class="container">
    <h4>Detail Data Kelembagaan Pendidikan Masyarakat</h4>
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Desa/Kelurahan</th>
                    <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>

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
                    <tr>
                        <th>{{ $label }}</th>
                        <td>{{ $item->$field ?? 0 }}</td>
                    </tr>
                @endforeach
            </table>

            <div class="mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <a href="{{ route('perkembangan.pendidikanmasyarakat.kelembagaan.edit', $item->id) }}" class="btn btn-warning">
                    Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
