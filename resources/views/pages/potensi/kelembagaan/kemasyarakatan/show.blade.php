@extends('layouts.master')

@section('title', 'Detail Data Lembaga Kemasyarakatan')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Lembaga Kemasyarakatan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th width="30%">Tanggal</th>
                        <td>02-10-2025</td>
                    </tr>
                    <tr>
                        <th>Jenis Lembaga</th>
                        <td>Karang Taruna</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>10</td>
                    </tr>
                    <tr>
                        <th>Dasar Hukum</th>
                        <td>Peraturan Desa No. 1/2020</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pengurus</th>
                        <td>5</td>
                    </tr>
                    <tr>
                        <th>Jumlah Jenis Kegiatan</th>
                        <td>2</td>
                    </tr>
                    <tr>
                        <th>Alamat Kantor</th>
                        <td>Jl. Contoh No.1, Desa XYZ</td>
                    </tr>
                    <tr>
                        <th>Ruang Lingkup Kegiatan</th>
                        <td>Desa / Kecamatan</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('potensi.kelembagaan.kemasyarakatan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
        </div>
    </div>
</div>
@endsection
