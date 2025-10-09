@extends('layouts.master')

@section('title', 'Detail Data Usaha Jasa Pengangkutan')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Usaha Jasa Pengangkutan</h5>
        </div>
        <div class="card-body">

            {{-- Data Umum --}}
            <h6 class="fw-bold mb-3">Data Umum</h6>
            <div class="table-responsive mb-4">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%">Tanggal</th>
                            <td>02-10-2025</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>Angkutan Penumpang</td>
                        </tr>
                        <tr>
                            <th>Jenis Angkutan</th>
                            <td>Bus</td>
                        </tr>
                        <tr>
                            <th>Jumlah (Unit)</th>
                            <td>5</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pemilik (Orang)</th>
                            <td>10</td>
                        </tr>
                        <tr>
                            <th>Kapasitas (Orang/Unit)</th>
                            <td>40</td>
                        </tr>
                        <tr>
                            <th>Tenaga Kerja (Orang)</th>
                            <td>12</td>
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
                <a href="{{ route('potensi.kelembagaan.pengangkutan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
