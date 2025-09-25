@extends('layouts.master')

@section('title', 'Edit Pembinaan Pemerintah Provinsi')

@section('action')
    <a href="{{ route('pembinaanprovinsi.index') }}" class="btn btn-warning mb-3">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2"></i>
            Edit Pembinaan Pemerintah Provinsi
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('pembinaanprovinsi.update', $pembinaanprovinsi->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Tanggal --}}
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label fw-semibold">Tanggal *</label>
                <div class="col-sm-9">
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal', \Carbon\Carbon::parse($pembinaanprovinsi->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Radio Button Section --}}
            @php
                $radioFields = [
                    'pedoman_pelaksanaan_tugas' => 'Pedoman pelaksanaan tugas pembantuan dari provinsi ke desa/kelurahan',
                    'pedoman_bantuan_keuangan' => 'Pedoman bantuan keuangan dari provinsi',
                    'kegiatan_fasilitasi_keberadaan' => 'Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat dan lembaga adat',
                    'fasilitasi_pelaksanaan_pedoman' => 'Fasilitasi pelaksanaan pedoman administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah',
                ];
            @endphp

            @foreach ($radioFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }}</label>
                    <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Ada"
                                {{ old($name, $pembinaanprovinsi->$name) === 'Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Ada"
                                {{ old($name, $pembinaanprovinsi->$name) === 'Tidak Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Input Angka --}}
            @php
                $numericFields = [
                    'jumlah_kegiatan_pendidikan' => 'Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan berskala provinsi',
                    'kegiatan_penanggulangan_kemiskinan' => 'Kegiatan penanggulangan kemiskinan yang dibiayai APBD Provinsi',
                    'kegiatan_penanganan_bencana' => 'Kegiatan penanganan bencana yang dibiayai APBD Provinsi',
                    'kegiatan_peningkatan_pendapatan' => 'Kegiatan peningkatan pendapatan keluarga yang dibiayai APBD Provinsi',
                    'kegiatan_penyediaan_sarana' => 'Kegiatan penyediaan sarana dan prasarana desa dan kelurahan',
                    'kegiatan_pemanfaatan_sda' => 'Kegiatan pemanfaatan sumber daya alam dan teknologi tepat guna',
                    'kegiatan_pengembangan_sosial' => 'Kegiatan pengembangan sosial budaya masyarakat',
                    'pedoman_pendataan' => 'Pedoman pendataan dan pendayagunaan data profil desa dan kelurahan',
                    'pemberian_sanksi' => 'Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat masing-masing',
                ];
            @endphp

            @foreach ($numericFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }}</label>
                    <div class="col-sm-3">
                        <input type="number" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
                               min="0" value="{{ old($name, $pembinaanprovinsi->$name) }}">
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
