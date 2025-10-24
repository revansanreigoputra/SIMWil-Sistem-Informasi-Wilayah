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
                        <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Keberadaan Hansip & Linmas</th>
                        <td>{{ $data->keberadaan_hansip_linmas }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Anggota Hansip</th>
                        <td>{{ $data->jumlah_hansip }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Anggota Satgas Linmas</th>
                        <td>{{ $data->jumlah_satgas_linmas }}</td>
                    </tr>
                    <tr>
                        <th>Pelaksanaan Siskamling</th>
                        <td>{{ $data->pelaksanaan_siskamling }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pos Kamling</th>
                        <td>{{ $data->jumlah_pos_kamling }}</td>
                    </tr>

                    <!-- Satpam Swakarsa -->
                    <tr>
                        <th>Keberadaan SATPAM SWAKARSA</th>
                        <td>{{ $data->keberadaan_satpam_swakarsa }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Anggota</th>
                        <td>{{ $data->jumlah_anggota_satpam }}</td>
                    </tr>
                    <tr>
                        <th>Nama Organisasi Induk</th>
                        <td>{{ $data->nama_organisasi_induk }}</td>
                    </tr>
                    <tr>
                        <th>Pemilik Organisasi</th>
                        <td>{{ $data->pemilikOrganisasi?->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Keberadaan Organisasi Keamanan Lainnya</th>
                        <td>{{ $data->keberadaan_organisasi_lain }}</td>
                    </tr>

                    <!-- Kerjasama TNI-POLRI -->
                    <tr>
                        <th>Mitra Koramil/TNI</th>
                        <td>{{ $data->mitra_koramil_tni }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Anggota</th>
                        <td>{{ $data->jumlah_anggota_koramil_tni }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Kegiatan</th>
                        <td>{{ $data->jumlah_kegiatan_koramil_tni }}</td>
                    </tr>
                    <tr>
                        <th>Babinkantibmas/POLRI</th>
                        <td>{{ $data->babinkantibmas_polri }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Anggota</th>
                        <td>{{ $data->jumlah_anggota_babinkantibmas }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Kegiatan</th>
                        <td>{{ $data->jumlah_kegiatan_babinkantibmas }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('potensi.potensi-kelembagaan.keamanan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
