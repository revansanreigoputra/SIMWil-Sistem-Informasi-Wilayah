@extends('layouts.master')

@section('title', 'Detail - SEKTOR JASA-JASA')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Detail Data Sektor Jasa-Jasa</h5>

        <table class="table table-bordered">
            <tr><th>Desa</th><td>{{ $data->desa->nama_desa ?? '-' }}</td></tr>
            <tr><th>Tanggal</th><td>{{ $data->tanggal }}</td></tr>

            <tr class="bg-warning text-white"><th colspan="2">Subsektor Jasa Pemerintahan Umum</th></tr>
            <tr><th>Jumlah jenis pelayanan (Jenis)</th><td>{{ $data->jumlah_pelayanan_pemerintah }}</td></tr>
            <tr><th>Nilai transaksi (Rp)</th><td>{{ number_format($data->nilai_transaksi_pemerintah, 0, ',', '.') }}</td></tr>
            <tr><th>Biaya dikeluarkan (Rp)</th><td>{{ number_format($data->biaya_pelayanan_pemerintah, 0, ',', '.') }}</td></tr>

            <tr class="bg-warning text-white"><th colspan="2">Subsektor Jasa Swasta</th></tr>
            <tr><th>Jumlah usaha jasa sosial (Jenis)</th><td>{{ $data->jumlah_usaha_swasta }}</td></tr>
            <tr><th>Nilai aset produksi (Rp)</th><td>{{ number_format($data->nilai_aset_swasta, 0, ',', '.') }}</td></tr>
            <tr><th>Biaya dikeluarkan (Rp)</th><td>{{ number_format($data->biaya_swasta, 0, ',', '.') }}</td></tr>

            <tr class="bg-warning text-white"><th colspan="2">Subsektor Jasa Hiburan dan Rekreasi</th></tr>
            <tr><th>Jumlah usaha hiburan (Jenis)</th><td>{{ $data->jumlah_usaha_hiburan }}</td></tr>
            <tr><th>Nilai transaksi (Rp)</th><td>{{ number_format($data->nilai_transaksi_hiburan, 0, ',', '.') }}</td></tr>
            <tr><th>Biaya dikeluarkan (Rp)</th><td>{{ number_format($data->biaya_hiburan, 0, ',', '.') }}</td></tr>

            <tr class="bg-warning text-white"><th colspan="2">Subsektor Jasa Perorangan dan Rumah Tangga</th></tr>
            <tr><th>Jumlah jenis kegiatan (Jenis)</th><td>{{ $data->jumlah_jasa_perorangan }}</td></tr>
            <tr><th>Nilai aset (Rp)</th><td>{{ number_format($data->nilai_aset_perorangan, 0, ',', '.') }}</td></tr>
            <tr><th>Nilai transaksi (Rp)</th><td>{{ number_format($data->nilai_transaksi_perorangan, 0, ',', '.') }}</td></tr>
            <tr><th>Biaya dikeluarkan (Rp)</th><td>{{ number_format($data->biaya_perorangan, 0, ',', '.') }}</td></tr>
        </table>

        <a href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
