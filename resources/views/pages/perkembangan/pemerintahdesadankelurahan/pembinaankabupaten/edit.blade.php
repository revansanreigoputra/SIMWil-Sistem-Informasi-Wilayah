@extends('layouts.master')

@section('title', 'Edit Data Pembinaan Pemerintah Kabupaten')

@section('content')
<div class="card shadow-sm boreder-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Pembinaan Kabupaten
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaankabupaten.update', $pembinaankabupaten->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Input tanggal --}}
            <div class="mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar-alt me-1"></i> Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                       id="tanggal" name="tanggal" 
                       value="{{ old('tanggal', $pembinaankabupaten->tanggal) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Daftar Field Radio --}}
            @php
                $radioFields = [
                    'pelimpahan_tugas' => 'Pelimpahan tugas Bupati/Walikota kepada Lurah dan Kepala Desa',
                    'pengaturan_kewenangan' => 'Penetapan pengaturan kewenangan kabupaten/kota yang diserahkan kepada desa',
                    'pedoman_pelaksanaan_tugas' => 'Pedoman pelaksanaan tugas pembantuan dari kabupaten/kota kepada desa',
                    'pedoman_penyusunan_peraturan' => 'Pedoman teknis penyusunan peraturan desa/kelurahan',
                    'pedoman_penyusunan_perencanaan' => 'Pedoman teknis penyusunan perencanaan pembangunan partisipatif',
                    'kegiatan_fasilitasi_keberadaan' => 'Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat',
                    'penetapan_pembiayaan' => 'Penetapan pembiayaan alokasi dana perimbangan untuk desa',
                    'fasilitasi_pelaksanaan_pedoman' => 'Fasilitasi pelaksanaan pedoman administrasi & tata naskah',
                    'fasilitasi_penetapan_pedoman' => 'Fasilitasi penetapan pedoman dan standar tanda jabatan',
                    'kegiatan_fasilitasi_lanjutan' => 'Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat (lanjutan)',
                    'pedoman_pendataan' => 'Pedoman pendataan dan pendayagunaan profil desa dan kelurahan',
                    'program_pemeliharaan_motivasi' => 'Program dan kegiatan pemeliharaan motivasi desa/kelurahan berprestasi',
                    'pemberian_penghargaan' => 'Pemberian penghargaan atas prestasi yang dicapai pemerintahan desa/kelurahan',
                    'pemberian_sanksi' => 'Pemberian sanksi atas penyimpangan yang dilakukan kepala desa/lurah',
                    'pengawasan_keuangan' => 'Mengawasi pengelolaan keuangan desa dan pendayagunaan aset desa',
                ];
            @endphp

            @foreach ($radioFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }} *</label>
                    <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Ada"
                                   {{ old($name, $pembinaankabupaten->$name) === 'Ada' ? 'checked' : '' }} required>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Ada"
                                   {{ old($name, $pembinaankabupaten->$name) === 'Tidak Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                        @error($name)
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            {{-- Input angka --}}
            @php
                $numericFields = [
                    'jumlah_kegiatan_pendidikan' => 'Jumlah kegiatan pendidikan dan pelatihan penyelenggaraan pemerintahan',
                    'kegiatan_penanggulangan_kemiskinan' => 'Kegiatan penanggulangan kemiskinan yang dibiayai APBD',
                    'kegiatan_penanganan_bencana' => 'Kegiatan penanganan bencana yang dibiayai APBD',
                    'kegiatan_peningkatan_pendapatan' => 'Kegiatan peningkatan pendapatan keluarga yang dibiayai APBD',
                ];
            @endphp

            @foreach ($numericFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }}</label>
                    <div class="col-sm-3">
                        <input type="number" name="{{ $name }}" min="0"
                               class="form-control @error($name) is-invalid @enderror"
                               value="{{ old($name, $pembinaankabupaten->$name) }}">
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach

            {{-- Tombol Aksi --}}
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
