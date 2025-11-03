@extends('layouts.master')

@section('title', 'Detail Rasio Guru & Murid')

@section('content')
<div class="container">
    <h4>Detail Data Rasio Guru & Murid</h4>
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

                {{-- TK --}}
                <tr>
                    <th>Jumlah Guru TK/KB (Orang)</th>
                    <td>{{ $item->guru_tk }}</td>
                </tr>
                <tr>
                    <th>Jumlah Siswa TK/KB (Orang)</th>
                    <td>{{ $item->siswa_tk }}</td>
                </tr>

                {{-- SD --}}
                <tr>
                    <th>Jumlah Guru SD (Orang)</th>
                    <td>{{ $item->guru_sd }}</td>
                </tr>
                <tr>
                    <th>Jumlah Siswa SD (Orang)</th>
                    <td>{{ $item->siswa_sd }}</td>
                </tr>

                {{-- SMP --}}
                <tr>
                    <th>Jumlah Guru SMP (Orang)</th>
                    <td>{{ $item->guru_smp }}</td>
                </tr>
                <tr>
                    <th>Jumlah Siswa SMP (Orang)</th>
                    <td>{{ $item->siswa_smp }}</td>
                </tr>

                {{-- SMA --}}
                <tr>
                    <th>Jumlah Guru SMA (Orang)</th>
                    <td>{{ $item->guru_sma }}</td>
                </tr>
                <tr>
                    <th>Jumlah Siswa SMA (Orang)</th>
                    <td>{{ $item->siswa_sma }}</td>
                </tr>

                {{-- SLB --}}
                <tr>
                    <th>Jumlah Guru SLB (Orang)</th>
                    <td>{{ $item->guru_slb }}</td>
                </tr>
                <tr>
                    <th>Jumlah Siswa SLB (Orang)</th>
                    <td>{{ $item->siswa_slb }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
