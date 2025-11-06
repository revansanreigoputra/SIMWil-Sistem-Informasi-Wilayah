@extends('layouts.master')

@section('title', 'Edit Pembinaan Pemerintah Provinsi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2"></i>
            Edit Pembinaan Pemerintah Provinsi
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.update', $pembinaan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
            <!-- Kolom Tanggal -->
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar me-1"></i>
                    Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                    id="tanggal" name="tanggal"
                    value="{{ old('tanggal', \Carbon\Carbon::parse($pembinaan->tanggal)->format('Y-m-d')) }}" required>
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
                                {{ old($name, $pembinaan->$name) === 'Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Ada"
                                {{ old($name, $pembinaan->$name) === 'Tidak Ada' ? 'checked' : '' }}>
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
                               min="0" value="{{ old($name, $pembinaan->$name) }}">
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            <hr class="my-4">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Field dengan tanda <span class="text-danger">*</span> wajib diisi
                </small>

                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index') }}"
                        class="btn btn-outline-secondary rounded">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary rounded">
                        Perbarui Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
