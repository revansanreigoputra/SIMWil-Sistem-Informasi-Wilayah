@extends('layouts.master')

@section('title', 'Detail Data Berbangsa dan Bernegara')

@section('action')
    <a href="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="container">

    <div class="card shadow-sm">
        <div class="card-body">
            
            <!-- Informasi Umum -->
            <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 30%;">
                    <col style="width: 5%;">
                    <col style="width: 65%;">
                </colgroup>
                <tr>
                    <td><strong>Tanggal</strong></td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($berbangsa->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Desa</strong></td>
                    <td>:</td>
                    <td>{{ $berbangsa->desa->nama_desa ?? '-' }}</td>
                </tr>
            </table>

            <!-- Kegiatan Ideologi dan Kebangsaan -->
            <h5 class="fw-bold text-primary mt-3 mb-2">Kegiatan Ideologi dan Kebangsaan</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>
                <tr>
                    <th class="text-start">Kegiatan Pemantapan Pancasila</th>
                    <td class="text-start">{{ $berbangsa->kegiatan_pemantapan_pancasila ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jumlah Kegiatan Pemantapan Pancasila</th>
                    <td class="text-start">{{ $berbangsa->jumlah_kegiatan_pemantapan_pancasila ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jenis Kegiatan Bhineka Tunggal Ika</th>
                    <td class="text-start">{{ $berbangsa->jenis_kegiatan_bhineka_tunggal_ika ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jumlah Kegiatan Bhineka Tunggal Ika</th>
                    <td class="text-start">{{ $berbangsa->jumlah_kegiatan_bhineka_tunggal_ika ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jenis Kegiatan Pemantapan Kesatuan Bangsa</th>
                    <td class="text-start">{{ $berbangsa->jenis_kegiatan_pemantapan_kesatuan_bangsa ?? '-' }}</td>
                </tr>
            </table>

            <!-- Kasus Perbatasan -->
            <h5 class="fw-bold text-primary mt-4 mb-2">Kasus Perbatasan dan Keamanan</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Kasus Desa Minta Suaka</th>
                            <th>Warga Melintas Resmi</th>
                            <th>Warga Melintas Tidak Resmi</th>
                            <th>Pertempuran Antar Kelompok</th>
                            <th>Serangan terhadap Fasilitas</th>
                            <th>Kasus Merongrong NKRI</th>
                            <th>Korban Manusia</th>
                            <th>Masalah Ketenagakerjaan</th>
                            <th>Kejahatan Perbatasan</th>
                            <th>Sengketa Perbatasan Desa</th>
                            <th>Sengketa Antar Daerah</th>
                            <th>Kasus Diplomatik</th>
                            <th>Kasus Disintegrasi</th>
                            <th>Kasus Penangkapan</th>
                            <th>Kasus Nelayan/Petani</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $berbangsa->kasus_desa_minta_suaka ?? '-' }}</td>
                            <td>{{ $berbangsa->warga_melintas_resmi ?? '-' }}</td>
                            <td>{{ $berbangsa->warga_melintas_tidak_resmi ?? '-' }}</td>
                            <td>{{ $berbangsa->kasus_pertempuran_antar_kelompok ?? '-' }}</td>
                            <td>{{ $berbangsa->serangan_terhadap_fasilitas ?? '-' }}</td>
                            <td>{{ $berbangsa->kasus_merongrong_nkri ?? '-' }}</td>
                            <td>{{ $berbangsa->korban_manusia ?? '-' }}</td>
                            <td>{{ $berbangsa->masalah_ketenagakerjaan ?? '-' }}</td>
                            <td>{{ $berbangsa->kasus_kejahatan_perbatasan ?? '-' }}</td>
                            <td>{{ $berbangsa->sengketa_perbatasan_desa ?? '-' }}</td>
                            <td>{{ $berbangsa->sengketa_perbatasan_antar_daerah ?? '-' }}</td>
                            <td>{{ $berbangsa->kasus_diplomatik ?? '-' }}</td>
                            <td>{{ $berbangsa->kasus_disintegrasi ?? '-' }}</td>
                            <td>{{ $berbangsa->kasus_penangkapan ?? '-' }}</td>
                            <td>{{ $berbangsa->kasus_nelayan_petani ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.edit', $berbangsa->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>

                <form action="{{ route('perkembangan.kedaulatanmasyarakat.berbangsa.destroy', $berbangsa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
