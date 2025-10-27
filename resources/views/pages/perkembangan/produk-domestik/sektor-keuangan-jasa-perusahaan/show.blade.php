@extends('layouts.master')

@section('title', 'Detail - SEKTOR KEUANGAN, REAL ESTATE DAN JASA PERUSAHAAN')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-info-circle me-2"></i> Detail Sektor Keuangan, Real Estate, dan Jasa Perusahaan
        </h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th width="30%">Desa</th>
                        <td>{{ $data->desa->nama_desa ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                    </tr>

                    {{-- ==================== Sub-Sektor Perbankan ==================== --}}
                    <tr class="table-primary text-center fw-bold">
                        <td colspan="2">Sub-Sektor Perbankan</td>
                    </tr>
                    <tr>
                        <th>Jumlah Transaksi</th>
                        <td>{{ number_format($data->jumlah_transaksi_perbankan) }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Transaksi</th>
                        <td>{{ number_format($data->nilai_transaksi_perbankan) }}</td>
                    </tr>
                    <tr>
                        <th>Biaya</th>
                        <td>{{ number_format($data->biaya_perbankan) }}</td>
                    </tr>

                    {{-- ==================== Sub-Sektor Lembaga Keuangan Bukan Bank ==================== --}}
                    <tr class="table-primary text-center fw-bold">
                        <td colspan="2">Sub-Sektor Lembaga Keuangan Bukan Bank</td>
                    </tr>
                    <tr>
                        <th>Jumlah Lembaga</th>
                        <td>{{ number_format($data->jumlah_lembaga_bukan_bank) }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Kegiatan</th>
                        <td>{{ number_format($data->jumlah_kegiatan_lembaga_bukan_bank) }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Transaksi</th>
                        <td>{{ number_format($data->nilai_transaksi_bukan_bank) }}</td>
                    </tr>
                    <tr>
                        <th>Biaya</th>
                        <td>{{ number_format($data->biaya_bukan_bank) }}</td>
                    </tr>

                    {{-- ==================== Sub-Sektor Sewa Bangunan ==================== --}}
                    <tr class="table-primary text-center fw-bold">
                        <td colspan="2">Sub-Sektor Sewa Bangunan</td>
                    </tr>
                    <tr>
                        <th>Jumlah Usaha</th>
                        <td>{{ number_format($data->jumlah_usaha_sewa) }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Sewa</th>
                        <td>{{ number_format($data->nilai_sewa) }}</td>
                    </tr>
                    <tr>
                        <th>Biaya Sewa</th>
                        <td>{{ number_format($data->biaya_sewa) }}</td>
                    </tr>
                    <tr>
                        <th>Biaya Lain</th>
                        <td>{{ number_format($data->biaya_lain_sewa) }}</td>
                    </tr>

                    {{-- ==================== Sub-Sektor Jasa Perusahaan ==================== --}}
                    <tr class="table-primary text-center fw-bold">
                        <td colspan="2">Sub-Sektor Jasa Perusahaan</td>
                    </tr>
                    <tr>
                        <th>Jumlah Perusahaan</th>
                        <td>{{ number_format($data->jumlah_perusahaan_jasa) }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Transaksi</th>
                        <td>{{ number_format($data->nilai_transaksi_perusahaan) }}</td>
                    </tr>
                    <tr>
                        <th>Biaya</th>
                        <td>{{ number_format($data->biaya_perusahaan) }}</td>
                    </tr>
                    <tr>
                        <th>Biaya Lain</th>
                        <td>{{ number_format($data->biaya_lain_perusahaan) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('perkembangan.produk-domestik.sektor-keuangan-jasa-perusahaan.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
