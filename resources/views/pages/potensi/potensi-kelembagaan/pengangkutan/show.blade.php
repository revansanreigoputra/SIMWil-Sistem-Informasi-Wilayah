@extends('layouts.master')

@section('title', 'Detail Data Usaha Jasa Pengangkutan')

@section('content')
    {{-- Memeriksa apakah pengguna memiliki izin untuk melihat data ini --}}
    @can('view-pengangkutan', $data)
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Usaha Jasa Pengangkutan</h5>
            </div>
            <div class="card-body">

                <h6 class="fw-bold mb-3">Data Rincian</h6>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th width="30%">Tanggal</th>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
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
                                <td>{{ number_format($data->jumlah_unit) }} unit</td>
                            </tr>
                            <tr>
                                <th>Jumlah Pemilik (Orang)</th>
                                <td>{{ number_format($data->jumlah_pemilik) }} orang</td>
                            </tr>
                            <tr>
                                <th>Kapasitas (Orang/Unit)</th>
                                {{-- Menyesuaikan nama field dengan form sebelumnya --}}
                                <td>{{ number_format($data->kapasitas) }} orang/unit</td>
                            </tr>
                            <tr>
                                <th>Tenaga Kerja (Orang)</th>
                                <td>{{ number_format($data->tenaga_kerja) }} orang</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 d-flex justify-content-end gap-2">
                    {{-- (Opsional) Tambahkan tombol Edit jika pengguna punya izin --}}
                    @can('edit-pengangkutan', $data)
                        <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.edit', $data->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit Data
                        </a>
                    @endcan

                    <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    @else
        {{-- Jika pengguna tidak punya izin, tampilkan pesan error yang jelas --}}
        <div class="alert alert-danger text-center">
            <h4 class="alert-heading">Akses Ditolak!</h4>
            <p>Maaf, Anda tidak memiliki izin untuk melihat detail data ini. Silakan hubungi Administrator.</p>
            <hr>
            <a href="{{ route('potensi.potensi-kelembagaan.pengangkutan.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    @endcan
@endsection