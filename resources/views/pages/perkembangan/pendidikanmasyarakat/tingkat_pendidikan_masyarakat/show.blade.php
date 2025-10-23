@extends('layouts.master')

@section('title', 'Detail Tingkat Pendidikan Masyarakat')

@section('content')
<div class="container">
    <h4>Detail Data Tingkat Pendidikan Masyarakat</h4>

    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Desa</th>
                    <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tahun</th>
                    <td>{{ $item->tahun ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tidak Tamat SD</th>
                    <td>{{ $item->tidak_tamat_sd ?? '-' }}</td>
                </tr>
                <tr>
                    <th>SD</th>
                    <td>{{ $item->sd ?? '-' }}</td>
                </tr>
                <tr>
                    <th>SLTP</th>
                    <td>{{ $item->sltp ?? '-' }}</td>
                </tr>
                <tr>
                    <th>SLTA</th>
                    <td>{{ $item->slta ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Diploma</th>
                    <td>{{ $item->diploma ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Sarjana</th>
                    <td>{{ $item->sarjana ?? '-' }}</td>
                </tr>
                <tr>
                    <th>% Buta Huruf</th>
                    <td>{{ $item->p_buta ?? '-' }}</td>
                </tr>
                <tr>
                    <th>% Tamat Sekolah</th>
                    <td>{{ $item->p_tamat ?? '-' }}</td>
                </tr>
                <tr>
                    <th>% Penyandang Cacat</th>
                    <td>{{ $item->p_cacat ?? '-' }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
