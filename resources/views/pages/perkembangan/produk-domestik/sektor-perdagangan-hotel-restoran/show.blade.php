@extends('layouts.master')

@section('title', 'Detail - SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-info-circle me-2"></i> Detail Sektor Perdagangan, Hotel, dan Restoran
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

                    {{-- ==================== Sub-Sektor Perdagangan Besar ==================== --}}
                    <tr class="table-primary text-center fw-bold">
                        <td colspan="2">Sub-Sektor Perdagangan Besar</td>
                    </tr>
                    <tr>
                        <th>Jumlah Jenis Perdagangan Besar</th>
                        <td>{{ number_format($data->total_jenis_perdagangan_besar) }}</td>
                    </tr>
                    <tr>
                        <th>Total Nilai Transaksi</th>
                        <td>{{ number_format($data->total_nilai_transaksi_besar) }}</td>
                    </tr>
                    <tr>
                        <th>Total Aset</th>
                        <td>{{ number_format($data->total_aset_perdagangan_besar) }}</td>
                    </tr>
                    <tr>
                        <th>Total Biaya Dikeluarkan</th>
                        <td>{{ number_format($data->total_biaya_dikeluarkan_besar) }}</td>
                    </tr>
                    <tr>
                        <th>Total Biaya Antara</th>
                        <td>{{ number_format($data->total_biaya_antara_besar) }}</td>
                    </tr>

                    {{-- ==================== Sub-Sektor Perdagangan Kecil ==================== --}}
                    <tr class="table-primary text-center fw-bold">
                        <td colspan="2">Sub-Sektor Perdagangan Kecil</td>
                    </tr>
                    <tr>
                        <th>Jumlah Jenis Perdagangan Kecil</th>
                        <td>{{ number_format($data->total_jenis_perdagangan_kecil) }}</td>
                    </tr>
                    <tr>
                        <th>Total Nilai Transaksi</th>
                        <td>{{ number_format($data->total_nilai_transaksi_kecil) }}</td>
                    </tr>
                    <tr>
                        <th>Total Biaya Dikeluarkan</th>
                        <td>{{ number_format($data->total_biaya_dikeluarkan_kecil) }}</td>
                    </tr>
                    <tr>
                        <th>Total Aset</th>
                        <td>{{ number_format($data->total_aset_perdagangan_kecil) }}</td>
                    </tr>

                    {{-- ==================== Sub-Sektor Hotel ==================== --}}
                    <tr class="table-primary text-center fw-bold">
                        <td colspan="2">Sub-Sektor Hotel</td>
                    </tr>
                    <tr>
                        <th>Jumlah Penginapan</th>
                        <td>{{ number_format($data->total_penginapan) }}</td>
                    </tr>
                    <tr>
                        <th>Total Pendapatan Hotel</th>
                        <td>{{ number_format($data->total_pendapatan_hotel) }}</td>
                    </tr>
                    <tr>
                        <th>Total Biaya Pemeliharaan Hotel</th>
                        <td>{{ number_format($data->total_biaya_pemeliharaan_hotel) }}</td>
                    </tr>
                    <tr>
                        <th>Total Biaya Antara Hotel</th>
                        <td>{{ number_format($data->total_biaya_antara_hotel) }}</td>
                    </tr>
                    <tr>
                        <th>Total Pendapatan Diperoleh Hotel</th>
                        <td>{{ number_format($data->total_pendapatan_diperoleh_hotel) }}</td>
                    </tr>

                    {{-- ==================== Sub-Sektor Restoran ==================== --}}
                    <tr class="table-primary text-center fw-bold">
                        <td colspan="2">Sub-Sektor Restoran</td>
                    </tr>
                    <tr>
                        <th>Total Tempat Konsumsi</th>
                        <td>{{ number_format($data->total_tempat_konsumsi) }}</td>
                    </tr>
                    <tr>
                        <th>Biaya Konsumsi Dikeluarkan</th>
                        <td>{{ number_format($data->biaya_konsumsi_dikeluarkan) }}</td>
                    </tr>
                    <tr>
                        <th>Biaya Lainnya Restoran</th>
                        <td>{{ number_format($data->biaya_lainnya_restoran) }}</td>
                    </tr>
                    <tr>
                        <th>Total Pendapatan Restoran</th>
                        <td>{{ number_format($data->total_pendapatan_restoran) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('perkembangan.produk-domestik.sektor-perdagangan-hotel-restoran.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
