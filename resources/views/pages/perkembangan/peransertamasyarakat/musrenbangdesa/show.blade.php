@extends('layouts.master')

@section('title', 'Detail Musrenbang Desa')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.musrenbangdesa.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="container">
    <h4 class="mb-4">Detail Data Musrenbang Desa</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- Informasi Umum --}}
            <dl class="row mb-0">
                <dt class="col-sm-3">Tanggal</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($musrenbangdesa->tanggal)->format('d-m-Y') }}</dd>
            </dl>

            <hr>

            {{-- Seksi 1: Dokumen dan Data --}}
            <h5 class="fw-bold text-primary mt-3 mb-2">Dokumen dan Data Pendukung</h5>
            <table class="table table-borderless mb-4">
                <tr>
                    <th class="w-50">Penggunaan Profil Desa</th>
                    <td><span class="badge bg-{{ $musrenbangdesa->penggunaan_profil_desa === 'Ada' ? 'success' : 'secondary' }}">{{ $musrenbangdesa->penggunaan_profil_desa ?? '-' }}</span></td>
                </tr>
                <tr>
                    <th>Penggunaan Data BPS</th>
                    <td><span class="badge bg-{{ $musrenbangdesa->penggunaan_data_bps === 'Ada' ? 'success' : 'secondary' }}">{{ $musrenbangdesa->penggunaan_data_bps ?? '-' }}</span></td>
                </tr>
                <tr>
                    <th>Pelibatan Masyarakat</th>
                    <td><span class="badge bg-{{ $musrenbangdesa->pelibatan_masyarakat === 'Ada' ? 'success' : 'secondary' }}">{{ $musrenbangdesa->pelibatan_masyarakat ?? '-' }}</span></td>
                </tr>
                <tr>
                    <th>Dokumen RKPDes</th>
                    <td><span class="badge bg-{{ $musrenbangdesa->dokumen_rkpdes === 'Ada' ? 'success' : 'secondary' }}">{{ $musrenbangdesa->dokumen_rkpdes ?? '-' }}</span></td>
                </tr>
                <tr>
                    <th>Dokumen RPJMDes</th>
                    <td><span class="badge bg-{{ $musrenbangdesa->dokumen_rpjmdes === 'Ada' ? 'success' : 'secondary' }}">{{ $musrenbangdesa->dokumen_rpjmdes ?? '-' }}</span></td>
                </tr>
                <tr>
                    <th>Dokumen Hasil Musrenbang</th>
                    <td><span class="badge bg-{{ $musrenbangdesa->dokumen_hasil_musrenbang === 'Ada' ? 'success' : 'secondary' }}">{{ $musrenbangdesa->dokumen_hasil_musrenbang ?? '-' }}</span></td>
                </tr>
            </table>

            {{-- Seksi 2: Pelaksanaan Musrenbang --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Pelaksanaan Musrenbang</h5>
            <table class="table table-borderless mb-4">
                <tr>
                    <th>Jumlah Musrenbang Desa/Kelurahan</th>
                    <td>{{ $musrenbangdesa->jumlah_musrenbang_desa_kelurahan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Kehadiran Masyarakat</th>
                    <td>{{ $musrenbangdesa->jumlah_kehadiran_masyarakat ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Peserta Laki-laki</th>
                    <td>{{ $musrenbangdesa->jumlah_peserta_laki ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Peserta Perempuan</th>
                    <td>{{ $musrenbangdesa->jumlah_peserta_perempuan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Musrenbang Antar Desa</th>
                    <td>{{ $musrenbangdesa->jumlah_musrenbang_antar_desa ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 3: Usulan dan Hasil --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Usulan dan Hasil Musyawarah</h5>
            <table class="table table-borderless mb-4">
                <tr>
                    <th>Usulan Masyarakat Disetujui</th>
                    <td>{{ $musrenbangdesa->usulan_masyarakat_disetujui ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Usulan Pemerintah Desa Disetujui</th>
                    <td>{{ $musrenbangdesa->usulan_pemerintah_desa_disetujui ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Usulan Rencana Kerja Pemkab</th>
                    <td>{{ $musrenbangdesa->usulan_rencana_kerja_pemkab ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Usulan Rencana Kerja Ditolak</th>
                    <td>{{ $musrenbangdesa->usulan_rencana_kerja_ditolak ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 4: Kegiatan dan Evaluasi --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Kegiatan dan Evaluasi</h5>
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>Jumlah Kegiatan Terdanai</th>
                        <th>Jumlah Kegiatan Tidak Sesuai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $musrenbangdesa->jumlah_kegiatan_terdanai ?? '-' }}</td>
                        <td>{{ $musrenbangdesa->jumlah_kegiatan_tidak_sesuai ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('perkembangan.peransertamasyarakat.musrenbangdesa.edit', $musrenbangdesa->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('perkembangan.peransertamasyarakat.musrenbangdesa.destroy', $musrenbangdesa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
