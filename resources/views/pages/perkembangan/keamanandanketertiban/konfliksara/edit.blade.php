@extends('layouts.master')

@section('title', 'Edit Data Konflik SARA')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Konflik SARA
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.keamanandanketertiban.konfliksara.update', $konfliksara->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                        id="tanggal" name="tanggal"
                        value="{{ old('tanggal', \Carbon\Carbon::parse($konfliksara->tanggal)->format('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="id_desa" class="form-label fw-semibold">
                        <i class="fas fa-map-marker-alt me-1"></i> Desa <span class="text-danger">*</span>
                    </label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('id_desa', $konfliksara->id_desa) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                @php
                    $fields = [
                        'kasus_konflik_tahun_ini' => 'Kasus Konflik Tahun Ini',
                        'kasus_konflik_sara_tahun_ini' => 'Kasus Konflik SARA Tahun Ini',
                        'kasus_pertengkaran_tetangga' => 'Pertengkaran Antar Tetangga',
                        'kasus_pertengkaran_rt_rw' => 'Pertengkaran Antar RT/RW',
                        'konflik_pendatang_dan_asli' => 'Konflik Pendatang dan Asli',
                        'konflik_kelompok_desa_kelurahan_lain' => 'Konflik Desa/Kelurahan Lain',
                        'konflik_dengan_pemerintah' => 'Konflik dengan Pemerintah',
                        'kerugian_material_dengan_pemerintah' => 'Kerugian Material (Pemerintah)',
                        'korban_jiwa_dengan_pemerintah' => 'Korban Jiwa (Pemerintah)',
                        'konflik_dengan_perusahaan' => 'Konflik dengan Perusahaan',
                        'korban_jiwa_dengan_perusahaan' => 'Korban Jiwa (Perusahaan)',
                        'kerugian_material_dengan_perusahaan' => 'Kerugian Material (Perusahaan)',
                        'konflik_dengan_lembaga_politik' => 'Konflik dengan Lembaga Politik',
                        'korban_jiwa_dengan_lembaga_politik' => 'Korban Jiwa (Lembaga Politik)',
                        'kerugian_material_dengan_lembaga_politik' => 'Kerugian Material (Lembaga Politik)',
                        'prasarana_rusak_konflik_sara' => 'Prasarana Rusak (SARA)',
                        'rumah_rusak_konflik_sara' => 'Rumah Rusak (SARA)',
                        'korban_luka_konflik_sara' => 'Korban Luka (SARA)',
                        'korban_meninggal_konflik_sara' => 'Korban Meninggal (SARA)',
                        'anak_janda_konflik_sara' => 'Anak/Janda (SARA)',
                        'anak_yatim_konflik_sara' => 'Anak Yatim (SARA)',
                        'pelaku_diadili' => 'Pelaku Diadili',
                    ];
                @endphp

                @foreach ($fields as $name => $label)
                    @if ($loop->index % 2 == 0)
                        <div class="w-100"></div>
                    @endif
                    <div class="col-md-6 mb-3">
                        <label for="{{ $name }}" class="form-label fw-semibold">{{ $label }} <span class="text-danger">*</span></label>
                        <input type="number" min="0" id="{{ $name }}" name="{{ $name }}"
                            value="{{ old($name, $konfliksara->$name) }}"
                            class="form-control @error($name) is-invalid @enderror" required>
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.keamanandanketertiban.konfliksara.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
