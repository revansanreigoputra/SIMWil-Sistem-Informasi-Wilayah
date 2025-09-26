@extends('layouts.master')

@section('title', 'Edit Pembinaan Pemerintah Pusat')

@section('action')
    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.index') }}" class="btn btn-warning mb-3">
        Kembali
    </a>
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2"></i>
            Edit Pembinaan Pemerintah Pusat
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanpusat.update', $pembinaan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tanggal *</label>
                <div class="col-sm-9">
                    <input type="date" name="tanggal" class="form-control" value="{{ $pembinaan->tanggal->format('Y-m-d') }}" required>
                </div>
            </div>

            {{-- Radio Button Section --}}
            @php
                $radioFields = [
                    'pedoman_pelaksanaan_urusan' => 'Pedoman dan standar pelaksanaan urusan pemerintahan desa, kelurahan, lembaga kemasyarakatan',
                    'pedoman_bantuan_pembiayaan' => 'Pedoman dan standar bantuan pembiayaan dari pemerintah, pemerintah provinsi dan kabupaten/kota kepada desa dan kelurahan',
                    'pedoman_administrasi' => 'Pedoman umum administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah',
                    'pedoman_tanda_jabatan' => 'Pedoman dan standar tanda jabatan, pakaian dinas dan atribut bagi Kepala Desa, Lurah dan Perangkat Desa/Kelurahan serta BPD',
                    'pedoman_pendidikan_pelatihan' => 'Pedoman pendidikan dan pelatihan bagi pemerintahan desa, kelurahan, lembaga kemasyarakatan dan perangkat masing-masing',
                ];
            @endphp

            @foreach ($radioFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }}</label>
                    <div class="col-sm-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Ada"
                                {{ $pembinaan->$name === 'Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Ada</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak Ada"
                                {{ $pembinaan->$name === 'Tidak Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Input Angka --}}
            @php
                $numericFields = [
                    'jumlah_bimbingan' => 'Jumlah bimbingan, supervisi dan konsultasi pelaksanaan pemerintahan desa dan kelurahan serta pemberdayaan lembaga kemasyarakatan',
                    'jumlah_kegiatan_pendidikan' => 'Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan',
                    'jumlah_penelitian_pengkajian' => 'Penelitian dan pengkajian penyelenggaraan pemerintahan desa dan kelurahan',
                    'jumlah_kegiatan_terkait_apbn' => 'Jumlah kegiatan terkait APBN untuk akselerasi pembangunan desa dan kelurahan',
                    'jumlah_penghargaan' => 'Pemberian penghargaan atas prestasi penyelenggaraan pemerintahan desa dan kelurahan',
                    'jumlah_sanksi' => 'Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat masing-masing',
                ];
            @endphp

            @foreach ($numericFields as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-9 col-form-label">{{ $label }}</label>
                    <div class="col-sm-3">
                        <input type="number" name="{{ $name }}" class="form-control" min="0"
                               value="{{ old($name, $pembinaan->$name) }}">
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
