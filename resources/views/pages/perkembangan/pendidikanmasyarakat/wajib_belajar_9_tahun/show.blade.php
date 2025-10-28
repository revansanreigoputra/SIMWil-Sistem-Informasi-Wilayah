@extends('layouts.master')

@section('title', 'Detail Data Wajib Belajar 9 Tahun')

@section('content')
<div class="container">
    <h4>Detail Data Wajib Belajar 9 Tahun</h4>
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="30%">Desa</th>
                    <td>{{ $item->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Penduduk Usia 7–15 Tahun (Orang)</th>
                    <td>{{ number_format($item->penduduk) }}</td>
                </tr>
                <tr>
                    <th>Jumlah Masih Sekolah (Orang)</th>
                    <td>{{ number_format($item->masih_sekolah) }}</td>
                </tr>
                <tr>
                    <th>Jumlah Tidak Sekolah (Orang)</th>
                    <td>{{ number_format($item->tidak_sekolah) }}</td>
                </tr>

                {{-- ✅ Tambahan kolom persentase --}}
                <tr>
                    <th>Persentase Masih Sekolah (%)</th>
                    <td>
                        @if(isset($item->persentase_masih_sekolah))
                            {{ number_format($item->persentase_masih_sekolah, 2) }}%
                        @else
                            {{ $item->penduduk > 0 ? number_format(($item->masih_sekolah / $item->penduduk) * 100, 2) : 0 }}%
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Persentase Tidak Sekolah (%)</th>
                    <td>
                        @if(isset($item->persentase_tidak_sekolah))
                            {{ number_format($item->persentase_tidak_sekolah, 2) }}%
                        @else
                            {{ $item->penduduk > 0 ? number_format(($item->tidak_sekolah / $item->penduduk) * 100, 2) : 0 }}%
                        @endif
                    </td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.edit', $item->id) }}" class="btn btn-warning">
                    Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
