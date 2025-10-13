@extends('layouts.master')

@section('title', 'Detail Hasil Pembangunan')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="container">
    <h4 class="mb-4">Detail Data Hasil Pembangunan</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Informasi Umum -->
            <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
            <table class="table table-borderless mb-4">
                <tr>
                    <td width="40%"><strong>Tanggal</strong></td>
                    <td width="10%">:</td>
                    <td>{{ \Carbon\Carbon::parse($hasilpembangunan->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td width="40%"><strong>Desa</strong></td>
                    <td width="10%">:</td>
                    <td>{{ $hasilpembangunan->desa->nama_desa ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 1: Partisipasi dan Kegiatan --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Partisipasi dan Kegiatan</h5>
            <table class="table table-bordered mb-4">
                <tr>
                    <th style="width: 50%;">Jumlah Masyarakat Terlibat</th>
                    <td>{{ $hasilpembangunan->jumlah_masyarakat_terlibat ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Penduduk Dilibatkan</th>
                    <td>{{ $hasilpembangunan->jumlah_penduduk_dilibatkan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Kegiatan Masyarakat</th>
                    <td>{{ $hasilpembangunan->jumlah_kegiatan_masyarakat ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Kegiatan Pihak Ketiga</th>
                    <td>{{ $hasilpembangunan->jumlah_kegiatan_pihak_ketiga ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Kegiatan Luar Musrenbang</th>
                    <td>{{ $hasilpembangunan->jumlah_kegiatan_luar_musrenbang ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 2: Usulan dan Rencana --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Usulan dan Rencana Kerja</h5>
            <table class="table table-bordered mb-4">
                <tr>
                    <th style="width: 50%;">Jumlah Masyarakat Disetujui RK</th>
                    <td>{{ $hasilpembangunan->jumlah_masyarakat_disetujui_rk ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Usulan Pemerintah Desa/Kelurahan Disetujui RK</th>
                    <td>{{ $hasilpembangunan->usulan_pemerintah_desa_kelurahan_disetujui_rk ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Usulan Rencana Kerja Program</th>
                    <td>{{ $hasilpembangunan->usulan_rencana_kerja_program ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 3: Pelaksanaan dan Musyawarah --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Pelaksanaan dan Musyawarah</h5>
            <table class="table table-bordered mb-4">
                <tr>
                    <th style="width: 50%;">Penyelenggaraan Musyawarah</th>
                    <td>{{ $hasilpembangunan->penyelenggaraan_musyawarah ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Pelaksanaan Kegiatan Masyarakat</th>
                    <td>{{ $hasilpembangunan->pelaksanaan_kegiatan_masyarakat ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Pelaksanaan Kegiatan Tersisa</th>
                    <td>{{ $hasilpembangunan->pelaksanaan_kegiatan_tersisa ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 4: Kasus dan Evaluasi --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Kasus dan Evaluasi</h5>
            <table class="table table-bordered mb-4">
                <tr>
                    <th style="width: 50%;">Kasus Penyimpangan oleh Kepala Desa</th>
                    <td>{{ $hasilpembangunan->jumlah_kasus_penyimpangan_kepada_kepala_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kasus Penyimpangan Desa/Kelurahan</th>
                    <td>{{ $hasilpembangunan->jumlah_kasus_penyimpangan_desa_kelurahan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kasus Penyimpangan Desa/Kelurahan (Hukum)</th>
                    <td>{{ $hasilpembangunan->jumlah_kasus_penyimpangan_desa_kelurahan_hukum ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 5: Pendanaan dan Pemeliharaan --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Pendanaan dan Pemeliharaan</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Jenis Kegiatan Pemeliharaan</th>
                            <th>Didanai APB Desa</th>
                            <th>Didanai APB Kabupaten</th>
                            <th>Didanai APBD Provinsi</th>
                            <th>Didanai APBN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $hasilpembangunan->jenis_kegiatan_pemeliharaan ?? '-' }}</td>
                            <td>{{ $hasilpembangunan->jumlah_kegiatan_didanai_apb_desa ?? '-' }}</td>
                            <td>{{ $hasilpembangunan->jumlah_kegiatan_didanai_apb_kabupaten ?? '-' }}</td>
                            <td>{{ $hasilpembangunan->jumlah_kegiatan_didanai_apbd_provinsi ?? '-' }}</td>
                            <td>{{ $hasilpembangunan->jumlah_kegiatan_didanai_apbn ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.edit', $hasilpembangunan->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('perkembangan.peransertamasyarakat.hasilpembangunan.destroy', $hasilpembangunan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
