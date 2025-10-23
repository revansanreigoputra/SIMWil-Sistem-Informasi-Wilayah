@extends('layouts.master')

@section('content')
<div class="container">
    <h4>Detail Data Wajib Belajar 9 Tahun</h4>
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Desa</th>
                    <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Penduduk Usia 7–15 Tahun (Orang)</th>
                    <td>{{ $item->penduduk }}</td>
                </tr>
                <tr>
                    <th>Jumlah Penduduk Usia 7–15 Tahun yang Masih Sekolah (Orang)</th>
                    <td>{{ $item->masih_sekolah }}</td>
                </tr>
                <tr>
                    <th>Jumlah Penduduk Usia 7–15 Tahun yang Tidak Sekolah (Orang)</th>
                    <td>{{ $item->tidak_sekolah }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
