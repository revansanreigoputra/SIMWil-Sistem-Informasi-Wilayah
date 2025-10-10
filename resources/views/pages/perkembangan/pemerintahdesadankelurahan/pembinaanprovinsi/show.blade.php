@extends('layouts.master')

@section('title', 'Detail Pembinaan Pemerintah Provinsi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Detail Pembinaan Pemerintah Provinsi</h5>
        <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card-body">

        <!-- Informasi Umum -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
                <table class="table table-borderless">
                    <tr>
                        <td width="40%"><strong>Tanggal</strong></td>
                        <td width="10%">:</td>
                        <td>{{ \Carbon\Carbon::parse($pembinaan->tanggal)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td width="40%"><strong>Desa</strong></td>
                        <td width="10%">:</td>
                        <td>{{ $pembinaan->desa->nama_desa ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Data Pembinaan Provinsi -->
        <h5 class="fw-bold text-primary mb-3">Data Pembinaan Pemerintah Provinsi</h5>
        <table class="table table-bordered align-middle mb-4">
            <tbody>
                <tr>
                    <th>Pedoman Pelaksanaan</th>
                    <td class="text-center">
                        <span class="badge bg-{{ $pembinaan->pedoman_pelaksanaan_tugas === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaan->pedoman_pelaksanaan_tugas ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Pedoman Bantuan Keuangan</th>
                    <td class="text-center">
                        <span class="badge bg-{{ $pembinaan->pedoman_bantuan_keuangan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaan->pedoman_bantuan_keuangan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Fasilitasi Keberadaan</th>
                    <td class="text-center">
                        <span class="badge bg-{{ $pembinaan->kegiatan_fasilitasi_keberadaan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaan->kegiatan_fasilitasi_keberadaan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Fasilitasi Pelaksanaan</th>
                    <td class="text-center">
                        <span class="badge bg-{{ $pembinaan->fasilitasi_pelaksanaan_pedoman === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaan->fasilitasi_pelaksanaan_pedoman ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Jumlah Kegiatan Pendidikan</th>
                    <td class="text-center">{{ $pembinaan->jumlah_kegiatan_pendidikan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Penanggulangan Kemiskinan</th>
                    <td class="text-center">{{ $pembinaan->kegiatan_penanggulangan_kemiskinan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Penanganan Bencana</th>
                    <td class="text-center">{{ $pembinaan->kegiatan_penanganan_bencana ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Peningkatan Pendapatan</th>
                    <td class="text-center">{{ $pembinaan->kegiatan_peningkatan_pendapatan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Penyediaan Sarana</th>
                    <td class="text-center">{{ $pembinaan->kegiatan_penyediaan_sarana ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Pemanfaatan SDA</th>
                    <td class="text-center">{{ $pembinaan->kegiatan_pemanfaatan_sda ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Pengembangan Sosial</th>
                    <td class="text-center">{{ $pembinaan->kegiatan_pengembangan_sosial ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Pedoman Pendataan</th>
                    <td class="text-center">{{ $pembinaan->pedoman_pendataan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Pemberian Sanksi</th>
                    <td class="text-center">{{ $pembinaan->pemberian_sanksi ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.edit', $pembinaan->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>

            <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.destroy', $pembinaan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
