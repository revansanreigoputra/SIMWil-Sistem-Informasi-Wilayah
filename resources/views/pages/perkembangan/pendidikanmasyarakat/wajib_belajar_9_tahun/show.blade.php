@extends('layouts.master')

@section('title', 'Detail Data Wajib Belajar 9 Tahun')

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Desa</th>
                <td>{{ $item->desa->nama_desa ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $item->tanggal }}</td>
            </tr>
            <tr>
                <th>Jumlah Penduduk Usia 7–15 Tahun (Orang)</th>
                <td>{{ $item->penduduk }}</td>
            </tr>
            <tr>
                <th>Jumlah Masih Sekolah (Orang)</th>
                <td>{{ $item->masih_sekolah }}</td>
            </tr>
            <tr>
                <th>Jumlah Tidak Sekolah (Orang)</th>
                <td>{{ $item->tidak_sekolah }}</td>
            </tr>
        </table>

        <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.edit', $item->id) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection
