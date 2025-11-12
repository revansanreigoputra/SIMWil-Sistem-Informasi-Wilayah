@extends('layouts.master')

@section('title', 'Detail Data Perjudian, Penipuan, dan Penggelapan')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.perjudian.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-info-circle me-2 text-primary"></i>
            Detail Data Perjudian
        </h5>
    </div>

    <div class="card-body">
        <!-- Informasi Umum -->
        <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Tanggal</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ \Carbon\Carbon::parse($perjudian->tanggal)->format('d-m-Y') }}
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Desa</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ $perjudian->desa->nama_desa ?? '-' }}
                </p>
            </div>
        </div>

        <!-- Data Perjudian -->
        <h5 class="fw-bold text-primary mb-3">Data Kasus Perjudian</h5>
        <div class="row">
            @php
                $fields = [
                    'jumlah_penduduk_berjudi' => 'Jumlah Penduduk Berjudi',
                    'jenis_perjudian' => 'Jenis Perjudian',
                    'jumlah_kasus_penipuan_penggelapan' => 'Jumlah Kasus Penipuan / Penggelapan',
                    'jumlah_kasus_sengketa_warisan_jualbeli_utangpiutang' => 'Jumlah Kasus Sengketa Warisan / Jual Beli / Utang Piutang',
                ];
            @endphp

            @foreach ($fields as $key => $label)
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">{{ $label }}</label>
                    <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                        {{ $perjudian->$key ?? '-' }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.keamanandanketertiban.perjudian.edit', $perjudian->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>

            <form action="{{ route('perkembangan.keamanandanketertiban.perjudian.destroy', $perjudian->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
