@extends('layouts.master')

@section('title', 'Detail Data Penjarahan dan Penyerobotan Tanah')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.penjarahan.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-info-circle me-2 text-primary"></i>
            Detail Data Penjarahan
        </h5>
    </div>

    <div class="card-body">
        <!-- Informasi Umum -->
        <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Tanggal</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ \Carbon\Carbon::parse($penjarahan->tanggal)->format('d-m-Y') }}
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Desa</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ $penjarahan->desa->nama_desa ?? '-' }}
                </p>
            </div>
        </div>

        <!-- Data Penjarahan -->
        <h5 class="fw-bold text-primary mb-3">Data Kasus Penjarahan</h5>
        <div class="row">
            @php
                $fields = [
                    'korban_dan_pelaku_penduduk_setempat' => 'Korban & Pelaku Penduduk Setempat',
                    'korban_penduduk_setempat_pelaku_bukan_setempat' => 'Korban Penduduk Setempat, Pelaku Bukan Setempat',
                    'korban_bukan_setempat_pelaku_penduduk_setempat' => 'Korban Bukan Setempat, Pelaku Penduduk Setempat',
                    'pelaku_diadili_atau_diproses_hukum' => 'Pelaku Diadili / Diproses Hukum',
                ];
            @endphp

            @foreach ($fields as $key => $label)
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">{{ $label }}</label>
                    <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                        {{ $penjarahan->$key ?? '-' }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.keamanandanketertiban.penjarahan.edit', $penjarahan->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>

            <form action="{{ route('perkembangan.keamanandanketertiban.penjarahan.destroy', $penjarahan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
