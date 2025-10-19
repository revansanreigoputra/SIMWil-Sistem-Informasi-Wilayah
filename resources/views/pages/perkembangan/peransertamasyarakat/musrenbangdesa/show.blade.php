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

            <!-- Informasi Umum -->
            <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 35%;">
                    <col style="width: 5%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr>
                    <td><strong>Tanggal</strong></td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($musrenbangdesa->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Desa</strong></td>
                    <td>:</td>
                    <td>{{ $musrenbangdesa->desa->nama_desa ?? '-' }}</td>
                </tr>
            </table>

            <hr>

            {{-- Seksi 1: Dokumen dan Data --}}
            <h5 class="fw-bold text-primary mt-3 mb-2">Dokumen dan Data Pendukung</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 40%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr>
                    <th class="text-start">Penggunaan Profil Desa</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $musrenbangdesa->penggunaan_profil_desa === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $musrenbangdesa->penggunaan_profil_desa ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Penggunaan Data BPS</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $musrenbangdesa->penggunaan_data_bps === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $musrenbangdesa->penggunaan_data_bps ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Pelibatan Masyarakat</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $musrenbangdesa->pelibatan_masyarakat === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $musrenbangdesa->pelibatan_masyarakat ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Dokumen RKPDes</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $musrenbangdesa->dokumen_rkpdes === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $musrenbangdesa->dokumen_rkpdes ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Dokumen RPJMDes</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $musrenbangdesa->dokumen_rpjmdes === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $musrenbangdesa->dokumen_rpjmdes ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Dokumen Hasil Musrenbang</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $musrenbangdesa->dokumen_hasil_musrenbang === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $musrenbangdesa->dokumen_hasil_musrenbang ?? '-' }}
                        </span>
                    </td>
                </tr>
            </table>

            {{-- Seksi 2: Pelaksanaan Musrenbang --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Pelaksanaan Musrenbang</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 40%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr>
                    <th class="text-start">Jumlah Musrenbang Desa/Kelurahan</th>
                    <td class="text-start">{{ $musrenbangdesa->jumlah_musrenbang_desa_kelurahan ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jumlah Kehadiran Masyarakat</th>
                    <td class="text-start">{{ $musrenbangdesa->jumlah_kehadiran_masyarakat ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Peserta Laki-laki</th>
                    <td class="text-start">{{ $musrenbangdesa->jumlah_peserta_laki ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Peserta Perempuan</th>
                    <td class="text-start">{{ $musrenbangdesa->jumlah_peserta_perempuan ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Musrenbang Antar Desa</th>
                    <td class="text-start">{{ $musrenbangdesa->jumlah_musrenbang_antar_desa ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 3: Usulan dan Hasil --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Usulan dan Hasil Musyawarah</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 40%;">
                    <col style="width: 60%;">
                </colgroup>
                <tr>
                    <th class="text-start">Usulan Masyarakat Disetujui</th>
                    <td class="text-start">{{ $musrenbangdesa->usulan_masyarakat_disetujui ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Usulan Pemerintah Desa Disetujui</th>
                    <td class="text-start">{{ $musrenbangdesa->usulan_pemerintah_desa_disetujui ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Usulan Rencana Kerja Pemkab</th>
                    <td class="text-start">{{ $musrenbangdesa->usulan_rencana_kerja_pemkab ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Usulan Rencana Kerja Ditolak</th>
                    <td class="text-start">{{ $musrenbangdesa->usulan_rencana_kerja_ditolak ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 4: Kegiatan dan Evaluasi --}}
            <h5 class="fw-bold text-primary mt-4 mb-2">Kegiatan dan Evaluasi</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
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
            </div>

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
