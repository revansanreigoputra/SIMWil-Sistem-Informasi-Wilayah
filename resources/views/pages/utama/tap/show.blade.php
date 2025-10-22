@extends('layouts.master')

@section('title', 'Detail TA Pendamping')

{{-- Fungsi untuk mencari nama dari ID di data dummy (tetap kita gunakan) --}}
@php
    function findNameById($id, $dataArray) {
        foreach ($dataArray as $item) {
            if ($item['id'] == $id) {
                return $item['nama'];
            }
        }
        return 'N/A';
    }
@endphp

@section('action')
    {{-- Menambahkan tombol aksi di header halaman --}}
    <div class="d-flex gap-2">
        <a href="{{ route('utama.tap.index') }}" class="btn btn-secondary">
            <i></i>Kembali
        </a>
        <a href="{{ route('utama.tap.edit', $tap->id) }}" class="btn btn-warning">
            <i></i>Edit Data
        </a>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">

        {{-- CARD UNTUK DATA DIRI & KONTAK --}}
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="bi bi-person-badge-fill me-2"></i>Data Diri & Kontak</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- KOLOM KIRI --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-person-fill me-2"></i>Nama Lengkap</label>
                            <p class="fs-5">{{ $tap->nama }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-gender-ambiguous me-2"></i>Jenis Kelamin</label>
                            <p class="fs-5">{{ $tap->jns_kelamin }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-geo-alt-fill me-2"></i>Alamat</label>
                            <p class="fs-5">{{ $tap->alamat ?? '-' }}</p>
                        </div>
                    </div>
                    {{-- KOLOM KANAN --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-phone-fill me-2"></i>No. HP</label>
                            <p class="fs-5">{{ $tap->kontak }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-envelope-fill me-2"></i>Email</label>
                            <p class="fs-5">{{ $tap->email }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-telephone-fill me-2"></i>Telepon Kantor</label>
                            <p class="fs-5">{{ $tap->tlp ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CARD UNTUK DETAIL PENUGASAN --}}
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="bi bi-briefcase-fill me-2"></i>Detail Penugasan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    {{-- KOLOM KIRI --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-calendar-event-fill me-2"></i>Tanggal Penugasan</label>
                            <p class="fs-5">{{ \Carbon\Carbon::parse($tap->tgl_tap)->format('d F Y') }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-calendar-fill me-2"></i>Tahun Penugasan</label>
                            <p class="fs-5">{{ $tap->tahun }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-pin-map-fill me-2"></i>Wilayah Kerja</label>
                            <p class="fs-5">{{ findNameById($tap->id_wk, $wilayah_kerjas) }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-tags-fill me-2"></i>Kategori Keahlian</label>
                            <p class="fs-5">{{ findNameById($tap->id_ktk, $kategori_keahlians) }}</p>
                        </div>
                    </div>
                    {{-- KOLOM KANAN --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-map-fill me-2"></i>Provinsi</label>
                            <p class="fs-5">{{ findNameById($tap->id_prov, $provinsis) }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-building-fill me-2"></i>Kabupaten/Kota #1</label>
                            <p class="fs-5">{{ findNameById($tap->id_kabkot1, $kabupatens) }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted"><i class="bi bi-building me-2"></i>Kabupaten/Kota #2</label>
                            <p class="fs-5">
                                @if($tap->id_kabkot2)
                                    {{ findNameById($tap->id_kabkot2, $kabupatens) }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
