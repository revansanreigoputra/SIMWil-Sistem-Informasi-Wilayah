@extends('layouts.master')

@section('title', 'Detail Data Lembaga Keamanan')

@section('content')
@can('keamanan.show')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold"><i class="bi bi-shield-check me-2"></i> Detail Lembaga Keamanan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th width="40%" class="fw-semibold bg-light">Tanggal Entri</th>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}</td>
                    </tr>
                    
                    <tr>
                        <th colspan="2" class="table-primary">Hansip dan Linmas</th>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Keberadaan Hansip & Linmas</th>
                        <td>{{ $data->keberadaan_hansip_linmas ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Anggota Hansip</th>
                        <td>{{ $data->jumlah_hansip ?? '0' }} Orang</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Anggota Satgas Linmas</th>
                        <td>{{ $data->jumlah_satgas_linmas ?? '0' }} Orang</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Pelaksanaan Siskamling</th>
                        <td>{{ $data->pelaksanaan_siskamling ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Pos Kamling</th>
                        <td>{{ $data->jumlah_pos_kamling ?? '0' }} Pos</td>
                    </tr>

                    <tr>
                        <th colspan="2" class="table-primary">Satpam Swakarsa</th>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Keberadaan SATPAM SWAKARSA</th>
                        <td>{{ $data->keberadaan_satpam_swakarsa ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Anggota Satpam</th>
                        <td>{{ $data->jumlah_anggota_satpam ?? '0' }} Orang</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Nama Organisasi Induk</th>
                        <td>{{ $data->nama_organisasi_induk ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Pemilik Organisasi</th>
                        <td>{{ $data->pemilikOrganisasi?->nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Keberadaan Organisasi Keamanan Lainnya</th>
                        <td>{{ $data->keberadaan_organisasi_lain ?? '-' }}</td>
                    </tr>

                    <tr>
                        <th colspan="2" class="table-primary">Kerjasama TNI-POLRI</th>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Mitra Koramil/TNI</th>
                        <td>{{ $data->mitra_koramil_tni ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Anggota Kemitraan TNI</th>
                        <td>{{ $data->jumlah_anggota_koramil_tni ?? '0' }} Orang</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Kegiatan Kemitraan TNI</th>
                        <td>{{ $data->jumlah_kegiatan_koramil_tni ?? '0' }} Kali</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Babinkamtibmas/POLRI</th>
                        <td>{{ $data->babinkantibmas_polri ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Anggota Kemitraan POLRI</th>
                        <td>{{ $data->jumlah_anggota_babinkantibmas ?? '0' }} Orang</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Jumlah Kegiatan Kemitraan POLRI</th>
                        <td>{{ $data->jumlah_kegiatan_babinkantibmas ?? '0' }} Kali</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-end gap-2">
            @can('keamanan.index')
            <a href="{{ route('potensi.potensi-kelembagaan.keamanan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            @endcan
        </div>
    </div>
</div>
@else
    {{-- Jika pengguna tidak punya izin, tampilkan pesan ini --}}
    <div class="alert alert-danger text-center">
        <h4 class="alert-heading">Akses Ditolak!</h4>
        <p>Maaf, Anda tidak memiliki izin untuk melihat detail data ini. Silakan hubungi Administrator.</p>
    </div>
@endcan
@endsection