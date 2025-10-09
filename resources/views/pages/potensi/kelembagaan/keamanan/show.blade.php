@extends('layouts.master')

@section('title', 'Detail Data Lembaga Keamanan')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Lembaga Keamanan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <!-- Hansip dan Linmas -->
                        <tr>
                            <th width="30%">Tanggal</th>
                            <td>02-10-2025</td>
                        </tr>
                        <tr>
                            <th>Keberadaan Hansip & Linmas</th>
                            <td>Ada</td>
                        </tr>
                        <tr>
                            <th>Jumlah Anggota Hansip</th>
                            <td>15</td>
                        </tr>
                        <tr>
                            <th>Jumlah Anggota Satgas Linmas</th>
                            <td>10</td>
                        </tr>
                        <tr>
                            <th>Pelaksanaan Siskamling</th>
                            <td>Ya</td>
                        </tr>
                        <tr>
                            <th>Jumlah Pos Kamling</th>
                            <td>5</td>
                        </tr>

                        <!-- Satpam Swakarsa -->
                        <tr>
                            <th>Keberadaan SATPAM SWAKARSA</th>
                            <td>Ada</td>
                        </tr>
                        <tr>
                            <th>Jumlah Anggota</th>
                            <td>12</td>
                        </tr>
                        <tr>
                            <th>Nama Organisasi Induk</th>
                            <td>Organisasi Contoh</td>
                        </tr>
                        <tr>
                            <th>Pemilik Organisasi</th>
                            <td>Perorangan</td>
                        </tr>
                        <tr>
                            <th>Keberadaan Organisasi Keamanan Lainnya</th>
                            <td>Ada</td>
                        </tr>

                        <!-- Kerjasama TNI-POLRI -->
                        <tr>
                            <th>Mitra Koramil/TNI</th>
                            <td>Ada</td>
                        </tr>
                        <tr>
                            <th>Jumlah Anggota</th>
                            <td>8</td>
                        </tr>
                        <tr>
                            <th>Jumlah Kegiatan</th>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th>Babinkantibmas/POLRI</th>
                            <td>Ada</td>
                        </tr>
                        <tr>
                            <th>Jumlah Anggota</th>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th>Jumlah Kegiatan</th>
                            <td>2</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('potensi.kelembagaan.keamanan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
