@extends('layouts.master')

@section('title', 'Detail Data Perkelahian')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.perkelahian.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-info-circle me-2 text-primary"></i>
            Detail Data Perkelahian
        </h5>
    </div>

    <div class="card-body">
        <!-- Informasi Umum -->
        <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Tanggal</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ \Carbon\Carbon::parse($perkelahian->tanggal)->format('d-m-Y') }}
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Desa</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ $perkelahian->desa->nama_desa ?? '-' }}
                </p>
            </div>
        </div>

        <!-- Data Perkelahian -->
        <h5 class="fw-bold text-primary mb-3">Data Perkelahian dan Kerugian</h5>
        <div class="row">
            @php
                $fields = [
                    'kasus_tahun_ini' => 'Kasus Tahun Ini',
                    'kasus_korban_jiwa' => 'Kasus Korban Jiwa',
                    'kasus_luka_parah' => 'Kasus Luka Parah',
                    'kasus_kerugian_material' => 'Kasus Kerugian Material',
                    'pelaku_diadili' => 'Pelaku Diadili',
                ];
            @endphp

            @foreach ($fields as $key => $label)
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">{{ $label }}</label>
                    <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                        {{ $perkelahian->$key ?? '-' }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.keamanandanketertiban.perkelahian.edit', $perkelahian->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>

            <form action="{{ route('perkembangan.keamanandanketertiban.perkelahian.destroy', $perkelahian->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
