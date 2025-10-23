@extends('layouts.master')

@section('title', 'Detail Organisasi Kemasyarakatan')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Detail Data Organisasi Kemasyarakatan</h5>
        <a href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.index') }}" class="btn btn-secondary">
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
                        <td>{{ \Carbon\Carbon::parse($organisasi->tanggal)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td width="40%"><strong>Desa</strong></td>
                        <td width="10%">:</td>
                        <td>{{ $organisasi->desa->nama_desa ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Organisasi</strong></td>
                        <td>:</td>
                        <td>{{ $organisasi->jenis_organisasi }}</td>
                    </tr>
                    <tr>
                        <td><strong>Kepengurusan</strong></td>
                        <td>:</td>
                        <td>{{ $organisasi->kepengurusan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Buku Administrasi</strong></td>
                        <td>:</td>
                        <td>{{ $organisasi->buku_administrasi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Dasar Hukum Pembentukan</strong></td>
                        <td>:</td>
                        <td>{{ $organisasi->dasar_hukum_pembentukan ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Data Kegiatan -->
        <h5 class="fw-bold text-primary mb-3">Data Kegiatan</h5>
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light text-center">
                    <tr>
                        <th>Jumlah Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>{{ $organisasi->jumlah_kegiatan ?? 0 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Action Buttons -->
        <div class="mt-4">
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.edit', $organisasi->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('perkembangan.lembagakemasyarakatan.organisasi.destroy', $organisasi->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
