@extends('layouts.master')

@section('title', 'Detail Mutasi Penduduk')

@section('content')

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-history me-2"></i> {{ Str::title(str_replace('_', ' ', $record->status_kehidupan)) }}
            </h5>
        </div>

        <div class="card-body">

            {{-- 1. INFORMASI PENDUDUK YANG DIMUTASI --}}
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mb-3 pb-2 border-bottom">Data Penduduk</h4>
                    <dl class="row">
                        <dt class="col-sm-4">Nama Lengkap:</dt>
                        <dd class="col-sm-8 fw-bold">{{ $record->nama }}</dd>

                        <dt class="col-sm-4">NIK:</dt>
                        <dd class="col-sm-8">{{ $record->nik ?? 'N/A' }}</dd>

                        <dt class="col-sm-4">Tanggal Lahir:</dt>
                        <dd class="col-sm-8">{{ optional($record->tanggal_lahir)->format('d F Y') ?? 'N/A' }}</dd>

                        <dt class="col-sm-4">Jenis Kelamin:</dt>
                        <dd class="col-sm-8">{{ $record->jenis_kelamin ?? 'N/A' }}</dd>

                        <dt class="col-sm-4">Agama:</dt>
                        {{-- Asumsi ada relasi ke model Agama --}}
                        <dd class="col-sm-8">{{ optional($record->agama)->agama ?? 'N/A' }}</dd>
                        <dt class="col-sm-4">Status Kawin:</dt>
                        <dd class="col-sm-8">{{ $record->status_perkawinan ?? 'N/A' }}</dd>

                        <dt class="col-sm-4">Pendidikan:</dt>
                        {{-- Asumsi ada relasi ke model Pendidikan --}}
                        <dd class="col-sm-8">{{ optional($record->pendidikan)->pendidikan ?? 'N/A' }}</dd>

                        <dt class="col-sm-4">Pekerjaan:</dt>
                        {{-- Asumsi ada relasi ke model MataPencaharian --}}
                        <dd class="col-sm-8">{{ optional($record->mataPencaharian)->mata_pencaharian ?? 'N/A' }}</dd>
                    </dl>
                </div>

                <div class="col-md-6"> 
                    <h4 class=" mb-3 pb-2 border-bottom">Data Kartu Keluarga</h4>
                    <dl class="row">
                        @php
                            $kk = $record->dataKeluarga;
                        @endphp
                        @if ($kk)
                            <dl class="row">
                                <dt class="col-sm-3">Nomor KK:</dt>
                                <dd class="col-sm-9 fw-bold">{{ $kk->no_kk }}</dd>

                                <dt class="col-sm-3">Kepala Keluarga:</dt>
                                <dd class="col-sm-9">{{ $kk->kepala_keluarga }}</dd>

                                <dt class="col-sm-3">Alamat:</dt>
                                <dd class="col-sm-9">{{ $kk->alamat }}, RT {{ $kk->rt }}/RW {{ $kk->rw }}
                                </dd>

                                <dt class="col-sm-3">Wilayah:</dt>
                                {{-- Asumsi relasi Desa/Kecamatan dimuat melalui DataKeluarga --}}
                                <dd class="col-sm-9">{{ optional($kk->desas)->nama_desa ?? 'N/A' }},
                                    {{ optional($kk->kecamatans)->nama_kecamatan ?? 'N/A' }}</dd>
                            </dl>
                        @else
                            <p class="text-muted">Data Kartu Keluarga tidak ditemukan.</p>
                        @endif

                    </dl>
                </div>
            </div> 
            {{-- 3. DETAIL MUTASI --}}
            <h4 class="mt-4 mb-3 pb-2 border-bottom">Detail Mutasi</h4>
            <div class="alert alert-{{ $record->status_kehidupan === 'meninggal' ? 'danger' : 'warning' }}">
                <dl class="row">
                    <dt class="col-sm-3">Status Mutasi:</dt>
                    <dd class="col-sm-9 fw-bold text-uppercase">
                        {{ Str::title(str_replace('_', ' ', $record->status_kehidupan)) }}</dd>

                    <dt class="col-sm-3">Tanggal Kejadian:</dt>
                    <dd class="col-sm-9">{{ optional($record->tanggal_mutasi)->format('d F Y') ?? 'N/A' }}</dd>

                    <dt class="col-sm-3">Catatan Sistem:</dt>
                    <dd class="col-sm-9">{{ $record->catatan_mutasi ?? 'Tidak ada catatan sistem.' }}</dd>
                </dl>
            </div>

            {{-- 4. KEMBALI --}}
            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('mutasi.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Histori Mutasi
                </a>
            </div>
        </div>
    </div>
@endsection
