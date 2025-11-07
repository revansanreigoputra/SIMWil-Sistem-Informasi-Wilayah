@extends('layouts.master')

@section('title', 'Detail - SEKTOR PERDAGANGAN')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="mb-4">Detail Data Sektor Perdagangan</h5>

        <table class="table table-bordered">
            <tr>
                <th>Tanggal</th>
                <td>{{ $perdagangan->tanggal }}</td>
            </tr>
            <tr>
                <th>Karyawan Perdagangan Hasil Bumi</th>
                <td>{{ $perdagangan->karyawan_perdagangan_hasil_bumi }}</td>
            </tr>
            <tr>
                <th>Pengusaha Perdagangan Hasil Bumi</th>
                <td>{{ $perdagangan->pengusaha_perdagangan_hasil_bumi }}</td>
            </tr>
            <tr>
                <th>Buruh Perdagangan Hasil Bumi</th>
                <td>{{ $perdagangan->buruh_perdagangan_hasil_bumi }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>
                    {{ $perdagangan->jumlah ?? 
                        $perdagangan->karyawan_perdagangan_hasil_bumi + 
                        $perdagangan->pengusaha_perdagangan_hasil_bumi + 
                        $perdagangan->buruh_perdagangan_hasil_bumi }}
                </td>
            </tr>
        </table>

        <div class="text-end">
            <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
