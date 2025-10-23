@extends('layouts.master')

@section('title', 'Detail Pembinaan Kabupaten')

@section('action')
    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.index') }}" class="btn btn-secondary">
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
                    <td>{{ \Carbon\Carbon::parse($pembinaankabupaten->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Desa</strong></td>
                    <td>:</td>
                    <td>{{ $pembinaankabupaten->desa->nama_desa ?? '-' }}</td>
                </tr>
            </table>

            <!-- Pedoman dan Pengaturan -->
            <h5 class="fw-bold text-primary mt-3 mb-2">Pedoman dan Pengaturan</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>
                <tr>
                    <th class="text-start">Pelimpahan Tugas</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->pelimpahan_tugas === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->pelimpahan_tugas ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Pengaturan Kewenangan</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->pengaturan_kewenangan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->pengaturan_kewenangan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Pedoman Pelaksanaan Tugas</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->pedoman_pelaksanaan_tugas === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->pedoman_pelaksanaan_tugas ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Pedoman Penyusunan Peraturan</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->pedoman_penyusunan_peraturan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->pedoman_penyusunan_peraturan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Pedoman Penyusunan Perencanaan</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->pedoman_penyusunan_perencanaan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->pedoman_penyusunan_perencanaan ?? '-' }}
                        </span>
                    </td>
                </tr>
            </table>

            <!-- Fasilitasi dan Kegiatan -->
            <h5 class="fw-bold text-primary mt-4 mb-2">Fasilitasi dan Kegiatan</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>
                <tr>
                    <th class="text-start">Kegiatan Fasilitasi Keberadaan</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->kegiatan_fasilitasi_keberadaan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->kegiatan_fasilitasi_keberadaan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Penetapan Pembiayaan</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->penetapan_pembiayaan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->penetapan_pembiayaan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Fasilitasi Pelaksanaan Pedoman</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->fasilitasi_pelaksanaan_pedoman === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->fasilitasi_pelaksanaan_pedoman ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Fasilitasi Penetapan Pedoman</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->fasilitasi_penetapan_pedoman === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->fasilitasi_penetapan_pedoman ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Kegiatan Fasilitasi Lanjutan</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->kegiatan_fasilitasi_lanjutan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->kegiatan_fasilitasi_lanjutan ?? '-' }}
                        </span>
                    </td>
                </tr>
            </table>

            <!-- Program dan Evaluasi -->
            <h5 class="fw-bold text-primary mt-4 mb-2">Program dan Evaluasi</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>
                <tr>
                    <th class="text-start">Pedoman Pendataan</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->pedoman_pendataan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->pedoman_pendataan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Program Pemeliharaan Motivasi</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->program_pemeliharaan_motivasi === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->program_pemeliharaan_motivasi ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Pemberian Penghargaan</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->pemberian_penghargaan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->pemberian_penghargaan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Pemberian Sanksi</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->pemberian_sanksi === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->pemberian_sanksi ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th class="text-start">Pengawasan Keuangan</th>
                    <td class="text-start">
                        <span class="badge bg-{{ $pembinaankabupaten->pengawasan_keuangan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaankabupaten->pengawasan_keuangan ?? '-' }}
                        </span>
                    </td>
                </tr>
            </table>

            <!-- Data Kegiatan Numerik -->
            <h5 class="fw-bold text-primary mt-4 mb-2">Data Kegiatan (Numerik)</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Jumlah Kegiatan Pendidikan</th>
                            <th>Kegiatan Penanggulangan Kemiskinan</th>
                            <th>Kegiatan Penanganan Bencana</th>
                            <th>Kegiatan Peningkatan Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $pembinaankabupaten->jumlah_kegiatan_pendidikan ?? '-' }}</td>
                            <td>{{ $pembinaankabupaten->kegiatan_penanggulangan_kemiskinan ?? '-' }}</td>
                            <td>{{ $pembinaankabupaten->kegiatan_penanganan_bencana ?? '-' }}</td>
                            <td>{{ $pembinaankabupaten->kegiatan_peningkatan_pendapatan ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.edit', $pembinaankabupaten->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>

                <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.destroy', $pembinaankabupaten->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
