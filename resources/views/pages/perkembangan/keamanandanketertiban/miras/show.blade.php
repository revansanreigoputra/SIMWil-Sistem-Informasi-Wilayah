@extends('layouts.master')

@section('title', 'Detail Data Pemakaian Miras dan Narkoba')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.miras.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-info-circle me-2 text-primary"></i>
            Detail Data Miras dan Narkoba
        </h5>
    </div>

    <div class="card-body">
        <!-- Informasi Umum -->
        <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Tanggal</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ \Carbon\Carbon::parse($miras->tanggal)->format('d-m-Y') }}
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Desa</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ $miras->desa->nama_desa ?? '-' }}
                </p>
            </div>
        </div>

        <!-- Data Miras & Narkoba -->
        <h5 class="fw-bold text-primary mb-3">Data Miras & Narkoba</h5>
        <div class="row">
            @php
                $fields = [
                    'jumlah_warung_miras' => 'Jumlah Warung Miras',
                    'jumlah_penduduk_miras' => 'Jumlah Penduduk Miras',
                    'jumlah_kasus_mabuk_miras' => 'Jumlah Kasus Mabuk Miras',
                    'jumlah_pengedar_narkoba' => 'Jumlah Pengedar Narkoba',
                    'jumlah_penduduk_narkoba' => 'Jumlah Penduduk Narkoba',
                    'jumlah_kasus_teler_narkoba' => 'Jumlah Kasus Teler Narkoba',
                    'jumlah_kasus_kematian_narkoba' => 'Jumlah Kasus Kematian Narkoba',
                    'jumlah_pelaku_miras_diadili' => 'Jumlah Pelaku Miras Diadili',
                    'jumlah_pelaku_narkoba_diadili' => 'Jumlah Pelaku Narkoba Diadili',
                ];
            @endphp

            @foreach ($fields as $key => $label)
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">{{ $label }}</label>
                    <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                        {{ $miras->$key ?? '-' }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.keamanandanketertiban.miras.edit', $miras->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>

            <form action="{{ route('perkembangan.keamanandanketertiban.miras.destroy', $miras->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
