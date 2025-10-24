@extends('layouts.master')

@section('title', 'Detail Data Usaha Jasa Pengangkutan')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Usaha Jasa Pengangkutan</h5>
        </div>
        <div class="card-body">

            <h6 class="fw-bold mb-3">Data Umum</h6>
            <div class="table-responsive mb-4">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%">Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $data->kategori }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Angkutan</th>
                            <td>{{ $data->jenis_angkutan }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah (Unit)</th>
                            <td>{{ $data->jumlah_unit }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pemilik (Orang)</th>
                            <td>{{ $data->jumlah_pemilik }}</td>
                        </tr>
                        <tr>
                            <th>Kapasitas (Orang/Unit)</th>
                            <td>{{ $data->kapasitas_per_unit }}</td>
                        </tr>
                        <tr>
                            <th>Tenaga Kerja (Orang)</th>
                            <td>{{ $data->tenaga_kerja }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
