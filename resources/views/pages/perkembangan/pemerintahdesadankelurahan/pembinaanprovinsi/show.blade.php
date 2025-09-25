@extends('layouts.master')

@section('title', 'Detail Data Pembinaan Provinsi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0">
            <i class="fas fa-eye me-2"></i> Detail Pembinaan Provinsi
        </h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="30%">Tanggal</th>
                <td>{{ $pembinaanprovinsi->tanggal->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Pedoman Pelaksanaan Urusan</th>
                <td>{{ $pembinaanprovinsi->pedoman_pelaksanaan_urusan }}</td>
            </tr>
            <tr>
                <th>Pedoman Bantuan Pembiayaan</th>
                <td>{{ $pembinaanprovinsi->pedoman_bantuan_pembiayaan }}</td>
            </tr>
            <tr>
                <th>Pedoman Administrasi</th>
                <td>{{ $pembinaanprovinsi->pedoman_administrasi }}</td>
            </tr>
            <tr>
                <th>Pedoman Tanda Jabatan</th>
                <td>{{ $pembinaanprovinsi->pedoman_tanda_jabatan }}</td>
            </tr>
            <tr>
                <th>Pedoman Pendidikan & Pelatihan</th>
                <td>{{ $pembinaanprovinsi->pedoman_pendidikan_pelatihan }}</td>
            </tr>
            <tr>
                <th>Jumlah Bimbingan</th>
                <td>{{ $pembinaanprovinsi->jumlah_bimbingan }}</td>
            </tr>
            <tr>
                <th>Jumlah Kegiatan Pendidikan</th>
                <td>{{ $pembinaanprovinsi->jumlah_kegiatan_pendidikan }}</td>
            </tr>
            <tr>
                <th>Jumlah Penelitian / Pengkajian</th>
                <td>{{ $pembinaanprovinsi->jumlah_penelitian_pengkajian }}</td>
            </tr>
            <tr>
                <th>Jumlah Kegiatan Terkait APBN</th>
                <td>{{ $pembinaanprovinsi->jumlah_kegiatan_terkait_apbn }}</td>
            </tr>
            <tr>
                <th>Jumlah Penghargaan</th>
                <td>{{ $pembinaanprovinsi->jumlah_penghargaan }}</td>
            </tr>
            <tr>
                <th>Jumlah Sanksi</th>
                <td>{{ $pembinaanprovinsi->jumlah_sanksi }}</td>
            </tr>
        </table>

        <div class="mt-3 d-flex justify-content-between">
            <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>

            <div>
                <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.edit', $pembinaanprovinsi->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>

                <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.destroy', $pembinaanprovinsi->id) }}" 
                      method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
