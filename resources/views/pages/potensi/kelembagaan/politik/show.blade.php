@extends('layouts.master')

@section('title', 'Detail Data Partisipasi Politik')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Partisipasi Politik</h5>
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
                            <th>Jenis Partisipasi Politik</th>
                            <td>Pemilu Desa</td>
                        </tr>
                        <tr>
                            <th>Jumlah Wanita Hak Pilih</th>
                            <td>120</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pria Hak Pilih</th>
                            <td>130</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pemilih</th>
                            <td>250</td>
                        </tr>
                        <tr>
                            <th>Jumlah Wanita Memilih</th>
                            <td>110</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pria Memilih</th>
                            <td>120</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pengguna Hak Pilih</th>
                            <td>230</td>
                        </tr>
                        <tr>
                            <th>Persentase (%)</th>
                            <td>92%</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('potensi.kelembagaan.politik.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
