@extends('layouts.master')

@section('title', 'Detail Data Musrenbang Desa/Kelurahan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-eye me-2"></i>
            Detail Data Musrenbang
        </h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="30%">Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Jumlah Musrenbang Desa/Kelurahan</th>
                <td>{{ $data->jumlah_musrenbang_desa_kelurahan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Kehadiran Masyarakat</th>
                <td>{{ $data->jumlah_kehadiran_masyarakat ?? '-' }}</td>
            </tr>
            <tr>
                <th>Peserta Laki-Laki</th>
                <td>{{ $data->jumlah_peserta_laki ?? '-' }}</td>
            </tr>
            <tr>
                <th>Peserta Perempuan</th>
                <td>{{ $data->jumlah_peserta_perempuan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Musrenbang Antar Desa</th>
                <td>{{ $data->jumlah_musrenbang_antar_desa ?? '-' }}</td>
            </tr>

            {{-- Boolean field tampil pakai badge --}}
            <tr>
                <th>Penggunaan Profil Desa</th>
                <td>
                    <span class="badge bg-{{ $data->penggunaan_profil_desa ? 'success' : 'secondary' }}">
                        {{ $data->penggunaan_profil_desa ? 'Ada' : 'Tidak Ada' }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Penggunaan Data BPS</th>
                <td>
                    <span class="badge bg-{{ $data->penggunaan_data_bps ? 'success' : 'secondary' }}">
                        {{ $data->penggunaan_data_bps ? 'Ada' : 'Tidak Ada' }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Pelibatan Masyarakat</th>
                <td>
                    <span class="badge bg-{{ $data->pelibatan_masyarakat ? 'success' : 'secondary' }}">
                        {{ $data->pelibatan_masyarakat ? 'Ada' : 'Tidak Ada' }}
                    </span>
                </td>
            </tr>

            {{-- Usulan --}}
            <tr>
                <th>Usulan Masyarakat Disetujui</th>
                <td>{{ $data->usulan_masyarakat_disetujui ?? '-' }}</td>
            </tr>
            <tr>
                <th>Usulan Pemerintah Desa Disetujui</th>
                <td>{{ $data->usulan_pemerintah_desa_disetujui ?? '-' }}</td>
            </tr>
            <tr>
                <th>Usulan Rencana Kerja Pemkab</th>
                <td>{{ $data->usulan_rencana_kerja_pemkab ?? '-' }}</td>
            </tr>
            <tr>
                <th>Usulan Rencana Kerja Ditolak</th>
                <td>{{ $data->usulan_rencana_kerja_ditolak ?? '-' }}</td>
            </tr>

            {{-- Dokumen --}}
            <tr>
                <th>Dokumen RKPDes</th>
                <td>
                    <span class="badge bg-{{ $data->dokumen_rkpdes ? 'success' : 'secondary' }}">
                        {{ $data->dokumen_rkpdes ? 'Ada' : 'Tidak Ada' }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Dokumen RPJMDes</th>
                <td>
                    <span class="badge bg-{{ $data->dokumen_rpjmdes ? 'success' : 'secondary' }}">
                        {{ $data->dokumen_rpjmdes ? 'Ada' : 'Tidak Ada' }}
                    </span>
                </td>
            </tr>
            <tr>
                <th>Dokumen Hasil Musrenbang</th>
                <td>
                    <span class="badge bg-{{ $data->dokumen_hasil_musrenbang ? 'success' : 'secondary' }}">
                        {{ $data->dokumen_hasil_musrenbang ? 'Ada' : 'Tidak Ada' }}
                    </span>
                </td>
            </tr>

            <tr>
                <th>Jumlah Kegiatan Terdanai</th>
                <td>{{ $data->jumlah_kegiatan_terdanai ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah Kegiatan Tidak Sesuai</th>
                <td>{{ $data->jumlah_kegiatan_tidak_sesuai ?? '-' }}</td>
            </tr>
        </table>

        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.musrenbang.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.musrenbang.edit', $data->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
</div>
@endsection
