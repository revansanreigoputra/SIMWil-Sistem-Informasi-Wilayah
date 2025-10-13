@extends('layouts.master')

@section('title', 'Detail Pembinaan Kecamatan')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">
            <i class="fas fa-eye me-2 text-primary"></i> Detail Pembinaan Kecamatan
        </h4>
        <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="mb-3 text-primary">Informasi Umum</h5>
            <table class="table table-borderless">
                <tr>
                <td width="40%"><strong>Tanggal</strong></td>
                <td width="10%">:</td>
                <td>{{ \Carbon\Carbon::parse($pembinaankecamatan->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td width="40%"><strong>Desa</strong></td>
                <td width="10%">:</td>
                <td>{{ $pembinaankecamatan->desa->nama_desa ?? '-' }}</td>
            </tr>
            </table>

            <hr>

            <h5 class="mb-3 text-primary">Fasilitasi dan Pembinaan</h5>
            <table class="table table-bordered align-middle">
                <tbody>
                    <tr>
                        <th>Fasilitasi Penyusunan Perdes</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_penyusunan_perdes ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Administrasi Tata Pemerintahan</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_administrasi_tata_pemerintahan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Pengelolaan Keuangan</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_pengelolaan_keuangan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Urusan Otonomi</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_urusan_otonomi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Penerapan Peraturan</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_penerapan_peraturan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Penyediaan Data</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_penyediaan_data ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Pelaksanaan Tugas</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_pelaksanaan_tugas ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Ketenteraman</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_ketenteraman ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Penetapan Penguatan</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_penetapan_penguatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Penanggulangan Kemiskinan (APBD)</th>
                        <td>{{ $pembinaankecamatan->penanggulangan_kemiskinan_apbd ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Partisipasi Masyarakat</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_partisipasi_masyarakat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Kerjasama Desa</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_kerjasama_desa ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Program Pemberdayaan</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_program_pemberdayaan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Kerjasama Lembaga</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_kerjasama_lembaga ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Bantuan Teknis</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_bantuan_teknis ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitasi Koordinasi Unit Kerja</th>
                        <td>{{ $pembinaankecamatan->fasilitasi_koordinasi_unit_kerja ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.edit', $pembinaankecamatan->id) }}" class="btn btn-warning me-2">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.destroy', $pembinaankecamatan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
