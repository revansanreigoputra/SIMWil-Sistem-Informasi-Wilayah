@extends('layouts.master')

@section('title', 'Detail Pertanggungjawaban')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0">
            <i class="fas fa-file-alt me-2"></i> Detail Pertanggungjawaban
        </h5>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Tanggal:</strong>
                <p>{{ \Carbon\Carbon::parse($pertanggungjawaban->tanggal)->format('d-m-Y') }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Penyampaian Laporan:</strong>
                <p>
                    @if($pertanggungjawaban->penyampaian_laporan == 'ada')
                        <span class="badge bg-success">Ada</span>
                    @elseif($pertanggungjawaban->penyampaian_laporan == 'tidak_ada')
                        <span class="badge bg-danger">Tidak Ada</span>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Jumlah Informasi:</strong>
                <p>{{ $pertanggungjawaban->jumlah_informasi ?? '-' }}</p>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Status Laporan:</strong>
                <p>
                    @if($pertanggungjawaban->status_laporan == 'diterima')
                        <span class="badge bg-success">Diterima</span>
                    @elseif($pertanggungjawaban->status_laporan == 'ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Laporan Kinerja:</strong>
                <p>
                    @if($pertanggungjawaban->laporan_kinerja == 'diterima')
                        <span class="badge bg-success">Diterima</span>
                    @elseif($pertanggungjawaban->laporan_kinerja == 'ditolak')
                        <span class="badge bg-danger">Ditolak</span>
                    @else
                        <span class="badge bg-secondary">-</span>
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Jumlah Media Informasi:</strong>
                <p>{{ $pertanggungjawaban->jumlah_media_informasi ?? '-' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Jumlah Pengaduan Diterima:</strong>
                <p>{{ $pertanggungjawaban->jumlah_pengaduan_diterima ?? '-' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Jumlah Pengaduan Selesai:</strong>
                <p>{{ $pertanggungjawaban->jumlah_pengaduan_selesai ?? '-' }}</p>
            </div>
        </div>

        <hr class="my-4">

        <div class="d-flex justify-content-between">
            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index') }}"
               class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
            <div class="btn-group">
                <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.edit', $pertanggungjawaban->id) }}"
                   class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.destroy', $pertanggungjawaban->id) }}"
                      method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
