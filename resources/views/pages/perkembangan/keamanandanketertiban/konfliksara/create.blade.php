@extends('layouts.master')

@section('title', 'Tambah Data Konflik SARA')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Konflik SARA
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.konfliksara.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                           id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kolom Desa -->
                <div class="col-md-6 mb-3">
                    <label for="id_desa" class="form-label fw-semibold">
                        <i class="fas fa-map-marker-alt me-1"></i> Desa <span class="text-danger">*</span>
                    </label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input angka sesuai kolom di migration --}}
            @php
                $numericFields = [
                    'kasus_konflik_tahun_ini' => 'Jumlah kasus konflik tahun ini',
                    'kasus_konflik_sara_tahun_ini' => 'Jumlah kasus konflik SARA tahun ini',
                    'kasus_pertengkaran_tetangga' => 'Jumlah kasus pertengkaran antar tetangga',
                    'kasus_pertengkaran_rt_rw' => 'Jumlah kasus pertengkaran antar RT/RW',
                    'konflik_pendatang_dan_asli' => 'Jumlah konflik antara pendatang dan penduduk asli',
                    'konflik_kelompok_desa_kelurahan_lain' => 'Jumlah konflik dengan kelompok dari desa/kelurahan lain',
                    'konflik_dengan_pemerintah' => 'Jumlah konflik dengan pemerintah',
                    'kerugian_material_dengan_pemerintah' => 'Kerugian material akibat konflik dengan pemerintah',
                    'korban_jiwa_dengan_pemerintah' => 'Korban jiwa akibat konflik dengan pemerintah',
                    'konflik_dengan_perusahaan' => 'Jumlah konflik dengan perusahaan',
                    'korban_jiwa_dengan_perusahaan' => 'Korban jiwa akibat konflik dengan perusahaan',
                    'kerugian_material_dengan_perusahaan' => 'Kerugian material akibat konflik dengan perusahaan',
                    'konflik_dengan_lembaga_politik' => 'Jumlah konflik dengan lembaga politik',
                    'korban_jiwa_dengan_lembaga_politik' => 'Korban jiwa akibat konflik dengan lembaga politik',
                    'kerugian_material_dengan_lembaga_politik' => 'Kerugian material akibat konflik dengan lembaga politik',
                    'prasarana_rusak_konflik_sara' => 'Jumlah prasarana umum yang rusak akibat konflik SARA',
                    'rumah_rusak_konflik_sara' => 'Jumlah rumah rusak akibat konflik SARA',
                    'korban_luka_konflik_sara' => 'Jumlah korban luka akibat konflik SARA',
                    'korban_meninggal_konflik_sara' => 'Jumlah korban meninggal akibat konflik SARA',
                    'anak_janda_konflik_sara' => 'Jumlah anak yang menjadi janda akibat konflik SARA',
                    'anak_yatim_konflik_sara' => 'Jumlah anak yatim akibat konflik SARA',
                    'pelaku_diadili' => 'Jumlah pelaku yang telah diadili',
                ];

                $chunks = array_chunk($numericFields, 2, true);
            @endphp

            @foreach ($chunks as $pair)
                <div class="row mb-3">
                    @foreach ($pair as $name => $label)
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                {{ $label }} <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="{{ $name }}" min="0"
                                   class="form-control @error($name) is-invalid @enderror"
                                   value="{{ old($name) }}" required>
                            @error($name)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>
            @endforeach

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.keamanandanketertiban.konfliksara.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
