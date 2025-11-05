@extends('layouts.master')

@section('title', 'Detail - SEKTOR LISTRIK, GAS DAN AIR MINUM')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="bi bi-info-circle me-2 fs-5"></i>
            <h5 class="mb-0 fw-bold">Detail Sektor Listrik, Gas, dan Air Minum</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th width="30%" class="bg-light">Desa</th>
                            <td>{{ $data->desa->nama_desa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                        </tr>

                        {{-- ==================== Sub-Sektor Listrik ==================== --}}
                        <tr class="table-primary text-center fw-bold">
                            <td colspan="2">Sub-Sektor Listrik</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Jumlah Kegiatan Pembangkitan & Penyaluran Tenaga Listrik</th>
                            <td>{{ number_format($data->jumlah_kegiatan_listrik) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Jumlah Nilai Produksi Listrik</th>
                            <td>{{ number_format($data->nilai_produksi_listrik) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Total Nilai Transaksi Listrik</th>
                            <td>{{ number_format($data->total_nilai_transaksi_listrik) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Biaya Antara yang Dikeluarkan</th>
                            <td>{{ number_format($data->biaya_antara_listrik) }}</td>
                        </tr>

                        {{-- ==================== Sub-Sektor Gas ==================== --}}
                        <tr class="table-primary text-center fw-bold">
                            <td colspan="2">Sub-Sektor Gas</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Jumlah Kegiatan Penyediaan Gas</th>
                            <td>{{ number_format($data->jumlah_kegiatan_gas) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nilai Aset Produksi Gas</th>
                            <td>{{ number_format($data->nilai_aset_produksi_gas) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nilai Transaksi Gas</th>
                            <td>{{ number_format($data->nilai_transaksi_gas) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Biaya Antara yang Dikeluarkan</th>
                            <td>{{ number_format($data->biaya_antara_gas) }}</td>
                        </tr>

                        {{-- ==================== Sub-Sektor Air Minum ==================== --}}
                        <tr class="table-primary text-center fw-bold">
                            <td colspan="2">Sub-Sektor Air Minum</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Jumlah Kegiatan Penyediaan & Penyaluran Air Minum</th>
                            <td>{{ number_format($data->jumlah_kegiatan_air) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nilai Aset Penyediaan Air Minum</th>
                            <td>{{ number_format($data->nilai_aset_air) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nilai Produksi Air Minum</th>
                            <td>{{ number_format($data->nilai_produksi_air) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nilai Transaksi Air Minum</th>
                            <td>{{ number_format($data->nilai_transaksi_air) }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Biaya Antara yang Dikeluarkan</th>
                            <td>{{ number_format($data->biaya_antara_air) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Tombol Kembali --}}
            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('perkembangan.produk-domestik.sektor-listrik-gas-air-minum.index') }}"
                   class="btn btn-outline-secondary px-4">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
