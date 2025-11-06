@extends('layouts.master')

@section('title', 'Detail Data Perkembangan Penduduk')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Detail Data Perkembangan Penduduk</h5>

        <table class="table table-bordered">
            <tr>
                <th width="30%">Desa</th>
                <td>{{ $perkembanganPenduduk->desa->nama_desa ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($perkembanganPenduduk->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Jumlah Laki-laki Tahun Ini</th>
                <td>{{ $perkembanganPenduduk->jumlah_laki_laki_tahun_ini }}</td>
            </tr>
            <tr>
                <th>Jumlah Perempuan Tahun Ini</th>
                <td>{{ $perkembanganPenduduk->jumlah_perempuan_tahun_ini }}</td>
            </tr>
            <tr>
                <th>Jumlah Laki-laki Tahun Lalu</th>
                <td>{{ $perkembanganPenduduk->jumlah_laki_laki_tahun_lalu }}</td>
            </tr>
            <tr>
                <th>Jumlah Perempuan Tahun Lalu</th>
                <td>{{ $perkembanganPenduduk->jumlah_perempuan_tahun_lalu }}</td>
            </tr>
            <tr>
                <th>Jumlah KK Laki-laki Tahun Ini</th>
                <td>{{ $perkembanganPenduduk->jumlah_kepala_keluarga_laki_laki_tahun_ini }}</td>
            </tr>
            <tr>
                <th>Jumlah KK Perempuan Tahun Ini</th>
                <td>{{ $perkembanganPenduduk->jumlah_kepala_keluarga_perempuan_tahun_ini }}</td>
            </tr>
            <tr>
                <th>Jumlah KK Laki-laki Tahun Lalu</th>
                <td>{{ $perkembanganPenduduk->jumlah_kepala_keluarga_laki_laki_tahun_lalu }}</td>
            </tr>
            <tr>
                <th>Jumlah KK Perempuan Tahun Lalu</th>
                <td>{{ $perkembanganPenduduk->jumlah_kepala_keluarga_perempuan_tahun_lalu }}</td>
            </tr>
            <tr>
                <th>Dibuat pada</th>
                <td>{{ $perkembanganPenduduk->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            <tr>
                <th>Diperbarui pada</th>
                <td>{{ $perkembanganPenduduk->updated_at->format('d-m-Y H:i') }}</td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="{{ route('perkembangan-penduduk.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            @can('perkembangan-penduduk.update')
            <a href="{{ route('perkembangan-penduduk.edit', $perkembanganPenduduk->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
            @endcan
        </div>
    </div>
</div>
@endsection
