@extends('layouts.master')

@section('title', 'Detail Pertanggungjawaban Kepala Desa/Lurah')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Detail Pertanggungjawaban Kepala Desa/Lurah</h5>
        <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card-body">

        <!-- Informasi Umum -->
        <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
        <table class="table table-borderless mb-4">
            <tr>
                <td width="40%"><strong>Tanggal</strong></td>
                <td width="10%">:</td>
                <td>{{ \Carbon\Carbon::parse($pertanggungjawaban->tanggal)->format('d-m-Y') }}</td>
            </tr>
        </table>

        <!-- Detail Data Pertanggungjawaban -->
        <h5 class="fw-bold text-primary mb-3">Data Pertanggungjawaban</h5>
        <table class="table table-bordered align-middle mb-4">
            <tbody>
                <tr>
                    <th>Penyampaian Laporan Kepala Desa ke BPD</th>
                    <td class="text-center">
                        @if($pertanggungjawaban->penyampaian_laporan === 'ada')
                            <span class="badge bg-success">Ada</span>
                        @elseif($pertanggungjawaban->penyampaian_laporan === 'tidak_ada')
                            <span class="badge bg-danger">Tidak Ada</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Jumlah Informasi yang Disampaikan</th>
                    <td class="text-center">{{ $pertanggungjawaban->jumlah_informasi ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status Laporan Pertanggungjawaban</th>
                    <td class="text-center">
                        @if($pertanggungjawaban->status_laporan === 'diterima')
                            <span class="badge bg-success">Diterima</span>
                        @elseif($pertanggungjawaban->status_laporan === 'ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Laporan Kinerja Kepala Desa/Lurah</th>
                    <td class="text-center">
                        @if($pertanggungjawaban->laporan_kinerja === 'diterima')
                            <span class="badge bg-success">Diterima</span>
                        @elseif($pertanggungjawaban->laporan_kinerja === 'ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Jumlah Media Informasi</th>
                    <td class="text-center">{{ $pertanggungjawaban->jumlah_media_informasi ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Pengaduan (Selesai / Diterima)</th>
                    <td class="text-center">
                        {{ $pertanggungjawaban->jumlah_pengaduan_selesai ?? 0 }} / {{ $pertanggungjawaban->jumlah_pengaduan_diterima ?? 0 }}
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.edit', $pertanggungjawaban->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.destroy', $pertanggungjawaban->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt me-1"></i> Hapus
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
