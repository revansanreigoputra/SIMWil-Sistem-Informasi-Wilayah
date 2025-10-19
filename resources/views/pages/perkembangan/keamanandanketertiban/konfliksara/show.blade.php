@extends('layouts.master')

@section('title', 'Detail Data Konflik SARA')

@section('action')
    <a href="{{ route('perkembangan.keamanandanketertiban.konfliksara.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-info-circle me-2 text-primary"></i>
            Detail Data Konflik SARA
        </h5>
    </div>

    <div class="card-body">
        <!-- Informasi Umum -->
        <h6 class="fw-bold text-primary mb-3">Informasi Umum</h6>
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Tanggal</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ \Carbon\Carbon::parse($konfliksara->tanggal)->format('d-m-Y') }}
                </p>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-semibold">Desa</label>
                <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                    {{ $konfliksara->desa->nama_desa ?? '-' }}
                </p>
            </div>
        </div>

        <!-- Data Konflik -->
        <h6 class="fw-bold text-primary mb-3">Data Konflik dan Kerugian</h6>
        <div class="row">
            @php
                $fields = [
                    'kasus_konflik_tahun_ini' => 'Kasus Konflik Tahun Ini',
                    'kasus_konflik_sara_tahun_ini' => 'Kasus Konflik SARA Tahun Ini',
                    'kasus_pertengkaran_tetangga' => 'Pertengkaran Antar Tetangga',
                    'kasus_pertengkaran_rt_rw' => 'Pertengkaran Antar RT/RW',
                    'konflik_pendatang_dan_asli' => 'Konflik Pendatang & Asli',
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

            @foreach ($fields as $key => $label)
                <div class="col-md-6 mb-3">
                    <label class="fw-semibold">{{ $label }}</label>
                    <p class="form-control-plaintext border rounded px-3 py-2 bg-light">
                        {{ $konfliksara->$key ?? '-' }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('perkembangan.keamanandanketertiban.konfliksara.edit', $konfliksara->id) }}" class="btn btn-warning">
                <i class="fas fa-edit me-1"></i> Edit
            </a>

            <form action="{{ route('perkembangan.keamanandanketertiban.konfliksara.destroy', $konfliksara->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
