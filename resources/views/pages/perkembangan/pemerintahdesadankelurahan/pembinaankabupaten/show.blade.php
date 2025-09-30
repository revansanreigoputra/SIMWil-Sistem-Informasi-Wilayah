@extends('layouts.master')

@section('title', 'Detail Pembinaan Kabupaten')

@section('action')
    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.index') }}" class="btn btn-warning mb-3">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Detail Pembinaan Kabupaten</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th width="40%">Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($pembinaankabupaten->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Pelimpahan Tugas</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->pelimpahan_tugas === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->pelimpahan_tugas }}</span></td>
                </tr>
                <tr>
                    <th>Pengaturan Kewenangan</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->pengaturan_kewenangan === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->pengaturan_kewenangan }}</span></td>
                </tr>
                <tr>
                    <th>Pedoman Pelaksanaan Tugas</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->pedoman_pelaksanaan_tugas === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->pedoman_pelaksanaan_tugas }}</span></td>
                </tr>
                <tr>
                    <th>Pedoman Penyusunan Peraturan</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->pedoman_penyusunan_peraturan === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->pedoman_penyusunan_peraturan }}</span></td>
                </tr>
                <tr>
                    <th>Pedoman Penyusunan Perencanaan</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->pedoman_penyusunan_perencanaan === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->pedoman_penyusunan_perencanaan }}</span></td>
                </tr>
                <tr>
                    <th>Kegiatan Fasilitasi Keberadaan</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->kegiatan_fasilitasi_keberadaan === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->kegiatan_fasilitasi_keberadaan }}</span></td>
                </tr>
                <tr>
                    <th>Penetapan Pembiayaan</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->penetapan_pembiayaan === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->penetapan_pembiayaan }}</span></td>
                </tr>
                <tr>
                    <th>Fasilitasi Pelaksanaan Pedoman</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->fasilitasi_pelaksanaan_pedoman === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->fasilitasi_pelaksanaan_pedoman }}</span></td>
                </tr>
                <tr>
                    <th>Jumlah Kegiatan Pendidikan</th>
                    <td>{{ $pembinaankabupaten->jumlah_kegiatan_pendidikan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kegiatan Penanggulangan Kemiskinan</th>
                    <td>{{ $pembinaankabupaten->kegiatan_penanggulangan_kemiskinan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kegiatan Penanganan Bencana</th>
                    <td>{{ $pembinaankabupaten->kegiatan_penanganan_bencana ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kegiatan Peningkatan Pendapatan</th>
                    <td>{{ $pembinaankabupaten->kegiatan_peningkatan_pendapatan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Fasilitasi Penetapan Pedoman</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->fasilitasi_penetapan_pedoman === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->fasilitasi_penetapan_pedoman }}</span></td>
                </tr>
                <tr>
                    <th>Kegiatan Fasilitasi Lanjutan</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->kegiatan_fasilitasi_lanjutan === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->kegiatan_fasilitasi_lanjutan }}</span></td>
                </tr>
                <tr>
                    <th>Pedoman Pendataan</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->pedoman_pendataan === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->pedoman_pendataan }}</span></td>
                </tr>
                <tr>
                    <th>Program Pemeliharaan Motivasi</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->program_pemeliharaan_motivasi === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->program_pemeliharaan_motivasi }}</span></td>
                </tr>
                <tr>
                    <th>Pemberian Penghargaan</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->pemberian_penghargaan === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->pemberian_penghargaan }}</span></td>
                </tr>
                <tr>
                    <th>Pemberian Sanksi</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->pemberian_sanksi === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->pemberian_sanksi }}</span></td>
                </tr>
                <tr>
                    <th>Pengawasan Keuangan</th>
                    <td><span class="badge bg-{{ $pembinaankabupaten->pengawasan_keuangan === 'Ada' ? 'success' : 'secondary' }}">{{ $pembinaankabupaten->pengawasan_keuangan }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
