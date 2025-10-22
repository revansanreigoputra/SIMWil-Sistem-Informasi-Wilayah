@extends('layouts.master')

@section('title', 'Detail Data Usaha Jasa, Hiburan, dll')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Usaha Jasa, Hiburan, dll</h5>
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
                            <th>Kategori</th>
                            <td>Usaha Jasa</td>
                        </tr>
                        <tr>
                            <th>Jenis Usaha</th>
                            <td>Salon / Spa</td>
                        </tr>
                        <tr>
                            <th>Jumlah (Unit)</th>
                            <td>5</td>
                        </tr>
                        <tr>
                            <th>Dasar Hukum Pembentukan</th>
                            <td>Peraturan Desa No. 1/2020</td>
                        </tr>
                        <tr>
                            <th>Jumlah Tenaga Kerja</th>
                            <td>10</td>
                        </tr>
                        <tr>
                            <th>Jumlah Jenis Produk yang Diperdagangkan</th>
                            <td>2</td>
                        </tr>
                        <tr>
                            <th>Alamat Usaha</th>
                            <td>Jl. Contoh No.1, Desa XYZ</td>
                        </tr>
                        <tr>
                            <th>Ruang Lingkup Usaha</th>
                            <td>Desa / Kecamatan</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('potensi.kelembagaan.hiburan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
