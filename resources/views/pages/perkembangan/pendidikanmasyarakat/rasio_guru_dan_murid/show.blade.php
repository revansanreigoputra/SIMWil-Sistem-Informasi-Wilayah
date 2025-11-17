@extends('layouts.master')

@section('title', 'Detail Rasio Guru dan Murid')

@section('content')
<div class="container">
    <h4>Detail Data Rasio Guru dan Murid</h4>
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

                {{-- SLTP --}}
                <tr>
                    <th>Jumlah Guru SLTP (Orang)</th>
                    <td>{{ $item->guru_sltp }}</td>
                </tr>
                <tr>
                    <th>Jumlah Siswa SLTP (Orang)</th>
                    <td>{{ $item->siswa_sltp }}</td>
                </tr>

                {{-- SLTA --}}
                <tr>
                    <th>Jumlah Guru SLTA (Orang)</th>
                    <td>{{ $item->guru_slta }}</td>
                </tr>
                <tr>
                    <th>Jumlah Siswa SLTA (Orang)</th>
                    <td>{{ $item->siswa_slta }}</td>
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
