@extends('layouts.master')

@section('title', 'Detail Pembinaan Pemerintah Pusat')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Detail Pembinaan Pemerintah Pusat</h5>
        <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card-body">

        <!-- Informasi Umum -->
        <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
        <table class="table table-borderless mb-4">
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

        <!-- Data Pembinaan Pemerintah Pusat -->
        <h5 class="fw-bold text-primary mb-3">Data Pembinaan</h5>
        <table class="table table-bordered align-middle mb-4">
            <tbody>
                <tr>
                    <th>Pedoman Pelaksanaan Urusan</th>
                    <td class="text-center">
                        <span class="badge bg-{{ $pembinaan->pedoman_pelaksanaan_urusan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaan->pedoman_pelaksanaan_urusan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Pedoman Bantuan Pembiayaan</th>
                    <td class="text-center">
                        <span class="badge bg-{{ $pembinaan->pedoman_bantuan_pembiayaan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaan->pedoman_bantuan_pembiayaan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Pedoman Administrasi</th>
                    <td class="text-center">
                        <span class="badge bg-{{ $pembinaan->pedoman_administrasi === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaan->pedoman_administrasi ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Pedoman Tanda Jabatan</th>
                    <td class="text-center">
                        <span class="badge bg-{{ $pembinaan->pedoman_tanda_jabatan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaan->pedoman_tanda_jabatan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Pedoman Pendidikan dan Pelatihan</th>
                    <td class="text-center">
                        <span class="badge bg-{{ $pembinaan->pedoman_pendidikan_pelatihan === 'Ada' ? 'success' : 'secondary' }}">
                            {{ $pembinaan->pedoman_pendidikan_pelatihan ?? '-' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Jumlah Bimbingan</th>
                    <td class="text-center">{{ $pembinaan->jumlah_bimbingan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Kegiatan Pendidikan</th>
                    <td class="text-center">{{ $pembinaan->jumlah_kegiatan_pendidikan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Penelitian / Pengkajian</th>
                    <td class="text-center">{{ $pembinaan->jumlah_penelitian_pengkajian ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Kegiatan Terkait APBN</th>
                    <td class="text-center">{{ $pembinaan->jumlah_kegiatan_terkait_apbn ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Penghargaan</th>
                    <td class="text-center">{{ $pembinaan->jumlah_penghargaan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Jumlah Sanksi</th>
                    <td class="text-center">{{ $pembinaan->jumlah_sanksi ?? '-' }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.edit', $pembinaan->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.destroy', $pembinaan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
