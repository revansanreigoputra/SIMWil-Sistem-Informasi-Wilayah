@extends('layouts.master')

@section('title', 'Detail - SEKTOR ANGKUTAN & KOMUNIKASI')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Detail Data Sektor Angkutan & Komunikasi</h5>
        <table class="table table-bordered">
            <tr><th>Desa</th><td>{{ $angkutan->desa->nama_desa ?? '-' }}</td></tr>
            <tr><th>Tanggal</th><td>{{ $angkutan->tanggal }}</td></tr>

            <tr class="table-secondary"><th colspan="2">Sub Sektor Angkutan</th></tr>
            <tr><th>Jumlah Kegiatan Pengangkutan</th><td>{{ $angkutan->jml_kegiatan_pengangkutan }}</td></tr>
            <tr><th>Total Kendaraan Angkutan</th><td>{{ $angkutan->jml_total_kendaraan_angkutan }}</td></tr>
            <tr><th>Nilai Total Transaksi Pengangkutan</th><td>{{ number_format($angkutan->nilai_total_transaksi_pengangkutan,0,',','.') }}</td></tr>
            <tr><th>Nilai Total Biaya Dikeluarkan</th><td>{{ number_format($angkutan->nilai_total_biaya_dikeluarkan,0,',','.') }}</td></tr>

            {{-- Total Sub Sektor Angkutan --}}
            <tr class="table-info">
                <th>Total Sub Sektor Angkutan</th>
                <td>
                    {{ 
                        ($angkutan->jml_kegiatan_pengangkutan ?? 0) +
                        ($angkutan->jml_total_kendaraan_angkutan ?? 0) +
                        ($angkutan->nilai_total_transaksi_pengangkutan ?? 0) +
                        ($angkutan->nilai_total_biaya_dikeluarkan ?? 0)
                    }}
                </td>
            </tr>

            <tr class="table-secondary"><th colspan="2">Sub Sektor Jasa Penunjang Angkutan</th></tr>
            <tr><th>Jumlah Kegiatan Pelabuhan/Terminal</th><td>{{ $angkutan->jml_kegiatan_pelabuhan_terminal }}</td></tr>
            <tr><th>Total Nilai Transaksi Penunjang</th><td>{{ number_format($angkutan->total_nilai_transaksi_penunjang,0,',','.') }}</td></tr>
            <tr><th>Nilai Biaya Antara Dikeluarkan</th><td>{{ number_format($angkutan->nilai_biaya_antara_dikeluarkan,0,',','.') }}</td></tr>

            {{-- Total Sub Sektor Penunjang --}}
            <tr class="table-info">
                <th>Total Sub Sektor Penunjang</th>
                <td>
                    {{
                        ($angkutan->jml_kegiatan_pelabuhan_terminal ?? 0) +
                        ($angkutan->total_nilai_transaksi_penunjang ?? 0) +
                        ($angkutan->nilai_biaya_antara_dikeluarkan ?? 0)
                    }}
                </td>
            </tr>

            <tr class="table-secondary"><th colspan="2">Sub Sektor Komunikasi</th></tr>
            <tr><th>Jumlah Kegiatan Informasi & Telekomunikasi</th><td>{{ $angkutan->jml_kegiatan_informasi_telekomunikasi }}</td></tr>
            <tr><th>Nilai Aset Telekomunikasi</th><td>{{ number_format($angkutan->jml_nilai_aset_telekomunikasi,0,',','.') }}</td></tr>
            <tr><th>Nilai Transaksi Informasi</th><td>{{ number_format($angkutan->nilai_transaksi_informasi,0,',','.') }}</td></tr>
            <tr><th>Biaya Dikeluarkan</th><td>{{ number_format($angkutan->biaya_dikeluarkan,0,',','.') }}</td></tr>

            {{-- Total Sub Sektor Komunikasi --}}
            <tr class="table-info">
                <th>Total Sub Sektor Komunikasi</th>
                <td>
                    {{
                        ($angkutan->jml_kegiatan_informasi_telekomunikasi ?? 0) +
                        ($angkutan->jml_nilai_aset_telekomunikasi ?? 0) +
                        ($angkutan->nilai_transaksi_informasi ?? 0) +
                        ($angkutan->biaya_dikeluarkan ?? 0)
                    }}
                </td>
            </tr>

            {{-- Total Keseluruhan --}}
            <tr class="table-warning">
                <th>Total Keseluruhan</th>
                <td>
                    {{
                        ($angkutan->jml_kegiatan_pengangkutan ?? 0) +
                        ($angkutan->jml_total_kendaraan_angkutan ?? 0) +
                        ($angkutan->nilai_total_transaksi_pengangkutan ?? 0) +
                        ($angkutan->nilai_total_biaya_dikeluarkan ?? 0) +
                        ($angkutan->jml_kegiatan_pelabuhan_terminal ?? 0) +
                        ($angkutan->total_nilai_transaksi_penunjang ?? 0) +
                        ($angkutan->nilai_biaya_antara_dikeluarkan ?? 0) +
                        ($angkutan->jml_kegiatan_informasi_telekomunikasi ?? 0) +
                        ($angkutan->jml_nilai_aset_telekomunikasi ?? 0) +
                        ($angkutan->nilai_transaksi_informasi ?? 0) +
                        ($angkutan->biaya_dikeluarkan ?? 0)
                    }}
                </td>
            </tr>
        </table>
        <a href="{{ route('perkembangan.produk-domestik.sektor-angkutan.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </div>
</div>
@endsection
