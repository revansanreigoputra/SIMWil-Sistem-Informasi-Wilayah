@extends('layouts.master')

@section('title', 'Detail - Perkembangan Sarana dan Prasarana Kesehatan Masyarakat')

@section('action')
    <a href="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.edit', $data->id) }}" class="btn btn-warning mb-3">
        <i class="fas fa-edit me-2"></i> Edit Data
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        {{-- Header singkat --}}
        <h5 class="mb-3">Tanggal: {{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</h5>

        {{-- 8 kolom utama ringkas --}}
        <div class="row mb-3">
            <div class="col-md-6 mb-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Fasilitas Umum</h6>
                        <p class="card-text">{{ $data->fasilitas_umum ?? '-' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Tenaga Kesehatan Aktif</h6>
                        <p class="card-text">{{ $data->tenaga_kesehatan_aktif ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Kader Keluarga & Lapangan</h6>
                        <p class="card-text">{{ $data->kader_keluarga_lapangan ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Dokumentasi Posyandu</h6>
                        <p class="card-text">{{ $data->dokumentasi_posyandu ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Kegiatan Kesehatan</h6>
                        <p class="card-text">{{ $data->kegiatan_kesehatan ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Kegiatan Lingkungan</h6>
                        <p class="card-text">{{ $data->kegiatan_lingkungan ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Kegiatan Lainnya</h6>
                        <p class="card-text">{{ $data->kegiatan_lainnya ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Detail lengkap (data tambahan) --}}
        <hr>
        <h6 class="fw-bold mb-3">Detail Lengkap</h6>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr><th>Jumlah MCK Umum (unit)</th><td>{{ $data->jumlah_mck_umum ?? '-' }}</td></tr>
                    <tr><th>Jumlah Posyandu (unit)</th><td>{{ $data->jumlah_posyandu ?? '-' }}</td></tr>
                    <tr><th>Jumlah Kader Posyandu Aktif (orang)</th><td>{{ $data->jumlah_kader_posyandu_aktif ?? '-' }}</td></tr>
                    <tr><th>Jumlah Pembina Posyandu (orang)</th><td>{{ $data->jumlah_pembina_posyandu ?? '-' }}</td></tr>
                    <tr><th>Jumlah Pengurus Dasawisma Aktif (orang)</th><td>{{ $data->jumlah_pengurus_dasawisma_aktif ?? '-' }}</td></tr>
                    <tr><th>Jumlah Kader Bina Keluarga Balita Aktif (orang)</th><td>{{ $data->jumlah_kader_bina_keluarga_balita_aktif ?? '-' }}</td></tr>
                    <tr><th>Jumlah Petugas Lapangan KB (orang)</th><td>{{ $data->jumlah_petugas_lapangan_keluarga_berencana ?? '-' }}</td></tr>
                    <tr><th>Buku Rencana Kegiatan Posyandu</th><td>{{ $data->buku_rencana_kegiatan_posyandu ?? '-' }}</td></tr>
                    <tr><th>Buku Data Pengunjung Posyandu</th><td>{{ $data->buku_data_pengunjung_posyandu ?? '-' }}</td></tr>
                    <tr><th>Buku Administrasi Posyandu Lainnya</th><td>{{ $data->buku_administrasi_posyandu_lainnya ?? '-' }}</td></tr>
                    <tr><th>Jumlah Kegiatan Posyandu (jenis)</th><td>{{ $data->jumlah_kegiatan_posyandu ?? '-' }}</td></tr>
                    <tr><th>Jumlah Kader Kesehatan Lainnya (orang)</th><td>{{ $data->jumlah_kader_kesehatan_lainnya ?? '-' }}</td></tr>
                    <tr><th>Jumlah Kegiatan Pengobatan Gratis (jenis)</th><td>{{ $data->jumlah_kegiatan_pengobatan_gratis ?? '-' }}</td></tr>
                    <tr><th>Jumlah Kegiatan Pemberantasan PSN (jenis)</th><td>{{ $data->jumlah_kegiatan_pemberantasan_psn ?? '-' }}</td></tr>
                    <tr><th>Jumlah Kegiatan Pembersihan Lingkungan (jenis)</th><td>{{ $data->jumlah_kegiatan_pembersihan_lingkungan ?? '-' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3 text-end">
            <a href="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.index') }}" class="btn btn-secondary">Kembali</a>
            @can('sarana-prasarana.update')
            <a href="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.edit', $data->id) }}" class="btn btn-warning">Edit</a>
            @endcan
        </div>
    </div>
</div>
@endsection
