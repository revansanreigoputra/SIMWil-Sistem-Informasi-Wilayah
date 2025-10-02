@extends('layouts.master')

@section('title', 'Detail Data Organisasi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-eye me-2"></i>
            Detail Data Organisasi
        </h5>
    </div>

    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-4">Tanggal</dt>
            <dd class="col-sm-8">{{ $organisasi->tanggal ? $organisasi->tanggal->format('d-m-Y') : '-' }}</dd>

            <dt class="col-sm-4">Jenis Organisasi</dt>
            <dd class="col-sm-8">{{ $organisasi->jenis_organisasi ?? '-' }}</dd>

            <dt class="col-sm-4">Kepengurusan</dt>
            <dd class="col-sm-8">
                @if($organisasi->kepengurusan == 'Ada dan Aktif')
                    <span class="badge bg-success">{{ $organisasi->kepengurusan }}</span>
                @elseif($organisasi->kepengurusan == 'Ada dan Tidak Aktif')
                    <span class="badge bg-warning text-dark">{{ $organisasi->kepengurusan }}</span>
                @elseif($organisasi->kepengurusan == 'Tidak Ada')
                    <span class="badge bg-danger">{{ $organisasi->kepengurusan }}</span>
                @else
                    -
                @endif
            </dd>

            <dt class="col-sm-4">Buku Administrasi</dt>
            <dd class="col-sm-8">{{ $organisasi->buku_administrasi ?? '-' }}</dd>

            <dt class="col-sm-4">Jumlah Kegiatan</dt>
            <dd class="col-sm-8">{{ $organisasi->jumlah_kegiatan ?? 0 }}</dd>

            <dt class="col-sm-4">Dasar Hukum Pembentukan</dt>
            <dd class="col-sm-8">{{ $organisasi->dasar_hukum_pembentukan ?? '-' }}</dd>

            <dt class="col-sm-4">Dibuat Pada</dt>
            <dd class="col-sm-8">{{ $organisasi->created_at ? $organisasi->created_at->format('d-m-Y H:i') : '-' }}</dd>

            <dt class="col-sm-4">Diperbarui Pada</dt>
            <dd class="col-sm-8">{{ $organisasi->updated_at ? $organisasi->updated_at->format('d-m-Y H:i') : '-' }}</dd>
        </dl>
    </div>

    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
        <div class="d-flex gap-2">
            <a href="{{ route('perkembangan.lembagakemasyarakatan.organisasi.edit', $organisasi->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <form action="{{ route('perkembangan.lembagakemasyarakatan.organisasi.destroy', $organisasi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash me-1"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
