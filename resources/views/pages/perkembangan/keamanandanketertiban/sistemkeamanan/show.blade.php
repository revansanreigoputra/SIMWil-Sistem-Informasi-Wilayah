@extends('layouts.master')

@section('title', 'Detail Data Sistem Keamanan')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-info-circle me-2 text-primary"></i>
            Detail Data Sistem Keamanan
        </h5>
    </div>

    <div class="card-body">
        <!-- Informasi Umum -->
        <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Tanggal</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ \Carbon\Carbon::parse($sistemkeamanan->tanggal)->format('d-m-Y') }}
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Desa</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ $sistemkeamanan->desa->nama_desa ?? '-' }}
                </p>
            </div>
        </div>

        <!-- Data Sistem Keamanan -->
        <h5 class="fw-bold text-primary mb-3">Data Sistem Keamanan</h5>
        <div class="row">
            @php
                $fields = [
                    'organisasi_siskamling' => 'Organisasi Siskamling',
                    'organisasi_pertahanan_sipil' => 'Organisasi Pertahanan Sipil',
                    'jumlah_rt_atau_pos_ronda' => 'Jumlah RT / Pos Ronda',
                    'jumlah_anggota_hansip_dan_linmas' => 'Jumlah Anggota Hansip & Linmas',
                    'jadwal_kegiatan_siskamling' => 'Jadwal Kegiatan Siskamling',
                    'buku_anggota_hansip_linmas' => 'Buku Anggota Hansip/Linmas',
                    'jumlah_kelompok_satpam_swasta' => 'Jumlah Kelompok Satpam Swasta',
                    'jumlah_pembinaan_siskamling' => 'Jumlah Pembinaan Siskamling',
                    'jumlah_pos_jaga_induk_desa' => 'Jumlah Pos Jaga Induk Desa',
                ];
            @endphp

            @foreach ($fields as $key => $label)
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">{{ $label }}</label>
                    <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                        {{ $sistemkeamanan->$key ?? '-' }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.edit', $sistemkeamanan->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>

            <form action="{{ route('perkembangan.keamanandanketertiban.sistemkeamanan.destroy', $sistemkeamanan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
