@extends('layouts.master')

@section('title', 'Detail Data Pembinaan Kecamatan')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-eye me-2 text-info"></i>
            Detail Data Pembinaan Kecamatan
        </h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($pembinaankecamatan->tanggal)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Fasilitasi penyusunan peraturan desa</th>
                <td>{{ $pembinaankecamatan->fasilitasi_penyusunan_perdes }}</td>
            </tr>
            <tr>
                <th>Fasilitasi administrasi tata pemerintahan</th>
                <td>{{ $pembinaankecamatan->fasilitasi_administrasi_tata_pemerintahan }}</td>
            </tr>
            <tr>
                <th>Fasilitasi pengelolaan keuangan</th>
                <td>{{ $pembinaankecamatan->fasilitasi_pengelolaan_keuangan }}</td>
            </tr>
            <tr>
                <th>Fasilitasi urusan otonomi</th>
                <td>{{ $pembinaankecamatan->fasilitasi_urusan_otonomi }}</td>
            </tr>
            <tr>
                <th>Fasilitasi penerapan peraturan</th>
                <td>{{ $pembinaankecamatan->fasilitasi_penerapan_peraturan }}</td>
            </tr>
            <tr>
                <th>Fasilitasi penyediaan data</th>
                <td>{{ $pembinaankecamatan->fasilitasi_penyediaan_data }}</td>
            </tr>
            <tr>
                <th>Fasilitasi pelaksanaan tugas</th>
                <td>{{ $pembinaankecamatan->fasilitasi_pelaksanaan_tugas }}</td>
            </tr>
            <tr>
                <th>Fasilitasi ketenteraman</th>
                <td>{{ $pembinaankecamatan->fasilitasi_ketenteraman }}</td>
            </tr>
            <tr>
                <th>Fasilitasi penetapan & penguatan</th>
                <td>{{ $pembinaankecamatan->fasilitasi_penetapan_penguatan }}</td>
            </tr>
            <tr>
                <th>Penanggulangan kemiskinan (APBD)</th>
                <td>{{ $pembinaankecamatan->penanggulangan_kemiskinan_apbd }}</td>
            </tr>
            <tr>
                <th>Fasilitasi partisipasi masyarakat</th>
                <td>{{ $pembinaankecamatan->fasilitasi_partisipasi_masyarakat }}</td>
            </tr>
            <tr>
                <th>Fasilitasi kerjasama desa</th>
                <td>{{ $pembinaankecamatan->fasilitasi_kerjasama_desa }}</td>
            </tr>
            <tr>
                <th>Fasilitasi program pemberdayaan</th>
                <td>{{ $pembinaankecamatan->fasilitasi_program_pemberdayaan }}</td>
            </tr>
            <tr>
                <th>Fasilitasi kerjasama lembaga</th>
                <td>{{ $pembinaankecamatan->fasilitasi_kerjasama_lembaga }}</td>
            </tr>
            <tr>
                <th>Fasilitasi bantuan teknis</th>
                <td>{{ $pembinaankecamatan->fasilitasi_bantuan_teknis }}</td>
            </tr>
            <tr>
                <th>Fasilitasi koordinasi unit kerja</th>
                <td>{{ $pembinaankecamatan->fasilitasi_koordinasi_unit_kerja }}</td>
            </tr>
        </table>

        <div class="d-flex justify-content-end mt-3">
            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankecamatan.index') }}" 
               class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>
@endsection
