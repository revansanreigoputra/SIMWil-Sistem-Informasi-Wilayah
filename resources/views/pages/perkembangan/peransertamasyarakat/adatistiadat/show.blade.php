@extends('layouts.master')

@section('title', 'Detail Adat Istiadat Desa dan Kelurahan')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.adatistiadat.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="container">
    <h4 class="mb-4">Detail Data Adat Istiadat Desa dan Kelurahan</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- Seksi 1: Informasi Umum --}}
            <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
            <table class="table table-borderless mb-4">
                <tr>
                    <td width="35%"><strong>Tanggal</strong></td>
                    <td width="5%">:</td>
                    <td>{{ \Carbon\Carbon::parse($adatistiadat->tanggal)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Desa</strong></td>
                    <td>:</td>
                    <td>{{ $adatistiadat->desa->nama_desa ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 2: Jenis Kegiatan Adat dan Pelestarian --}}
            <h5 class="fw-bold text-primary mt-4 mb-3">Jenis Adat & Pelestarian Budaya</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Jenis Kegiatan / Adat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $fields = [
                                'perkawinan' => 'Adat Istiadat dalam Perkawinan',
                                'kelahiran_anak' => 'Adat Istiadat dalam Kelahiran Anak',
                                'upacara_kematian' => 'Adat Istiadat dalam Upacara Kematian',
                                'pengelolaan_hutan' => 'Adat Istiadat dalam Pengelolaan Hutan',
                                'tanah_pertanian' => 'Adat Istiadat dalam Tanah Pertanian',
                                'pengelolaan_laut' => 'Adat Istiadat dalam Pengelolaan Laut/Pantai',
                                'memecahkan_konflik' => 'Adat Istiadat dalam Memecahkan Konflik Warga',
                                'menjauhkan_bala' => 'Adat Istiadat dalam Menjauhkan Bala Penyakit dan Bencana Alam',
                                'memulihkan_hubungan_alam' => 'Adat Istiadat dalam Memulihkan Hubungan antara Alam Semesta dan Lingkungan',
                                'penanggulangan_kemiskinan' => 'Adat Istiadat dalam Penanggulangan Kemiskinan bagi Keluarga Tidak Mampu/Fakir Miskin/Terlantar',
                                        ];
                        @endphp

                        @foreach ($fields as $key => $label)
                            <tr>
                                <td class="text-start">{{ $label }}</td>
                                <td>
                                    @if ($adatistiadat->$key === 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif ($adatistiadat->$key === 'Tidak Aktif')
                                        <span class="badge bg-danger">Tidak Aktif</span>
                                    @elseif ($adatistiadat->$key === 'pernah Ada')
                                        <span class="badge bg-danger">Pernah Ada</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('perkembangan.peransertamasyarakat.adatistiadat.edit', $adatistiadat->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('perkembangan.peransertamasyarakat.adatistiadat.destroy', $adatistiadat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
