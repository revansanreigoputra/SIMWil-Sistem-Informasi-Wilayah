@extends('layouts.master')

@section('title', 'Detail Tingkat Pendidikan Masyarakat')

@section('content')
<div class="container">
    <h4 class="fw-bold mb-3">Detail Data Tingkat Pendidikan Masyarakat</h4>

    <a href="{{ route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <tr>
                    <th width="30%">Desa</th>
                    <td>{{ $item->desa->nama_desa ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>Tahun</th>
                    <td>{{ $item->tahun ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>Tidak Tamat SD</th>
                    <td>{{ $item->tidak_tamat_sd ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>SD</th>
                    <td>{{ $item->sd ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>SLTP</th>
                    <td>{{ $item->sltp ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>SLTA</th>
                    <td>{{ $item->slta ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>Diploma</th>
                    <td>{{ $item->diploma ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>Sarjana</th>
                    <td>{{ $item->sarjana ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>% Buta Huruf</th>
                    <td>{{ $item->p_buta ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>% Tamat Sekolah</th>
                    <td>{{ $item->p_tamat ?? 'Tidak Ada Data' }}</td>
                </tr>
                <tr>
                    <th>% Penyandang Cacat</th>
                    <td>{{ $item->p_cacat ?? 'Tidak Ada Data' }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
