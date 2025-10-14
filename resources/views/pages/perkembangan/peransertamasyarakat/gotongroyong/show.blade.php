@extends('layouts.master')

@section('title', 'Detail Gotong Royong Desa dan Kelurahan')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.gotongroyong.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="container">
    <h4 class="mb-4">Detail Data Gotong Royong Desa dan Kelurahan</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- Seksi 1: Informasi Umum --}}
            <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
            <table class="table table-borderless mb-4">
                <tr>
                    <td width="35%"><strong>Tanggal</strong></td>
                    <td width="5%">:</td>
                    <td>{{ \Carbon\Carbon::parse($gotongroyong->tanggal)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Desa</strong></td>
                    <td>:</td>
                    <td>{{ $gotongroyong->desa->nama_desa ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Jumlah Kelompok Arisan</strong></td>
                    <td>:</td>
                    <td>{{ $gotongroyong->jumlah_kelompok_arisan ?? '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Jumlah Penduduk Orang Tua Asuh</strong></td>
                    <td>:</td>
                    <td>{{ $gotongroyong->jumlah_penduduk_orang_tua_asuh ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 2: Jenis Kegiatan Gotong Royong --}}
            <h5 class="fw-bold text-primary mt-4 mb-3">Jenis Kegiatan Gotong Royong</h5>
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Kegiatan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $fields = [
                                'dana_sehat' => 'Dana Sehat',
                                'pembangunan_rumah' => 'Pembangunan Rumah',
                                'pengolahan_tanah' => 'Pengolahan Tanah',
                                'pembiayaan_pendidikan' => 'Pembiayaan Pendidikan',
                                'pemeliharaan_fasilitas_umum' => 'Pemeliharaan Fasilitas Umum',
                                'pemberian_modal_usaha' => 'Pemberian Modal Usaha',
                                'pengerjaan_sawah_kebun' => 'Pengerjaan Sawah / Kebun',
                                'penangkapan_ikan_usaha' => 'Penangkapan Ikan / Usaha',
                                'menjaga_ketertiban' => 'Menjaga Ketertiban',
                                'peristiwa_kematian' => 'Peristiwa Kematian',
                                'menjaga_kebersihan_desa' => 'Menjaga Kebersihan Desa',
                                'membangun_jalan_irigasi' => 'Membangun Jalan / Irigasi',
                                'pemberantasan_sarang_nyamuk' => 'Pemberantasan Sarang Nyamuk',
                            ];
                        @endphp

                        @foreach ($fields as $key => $label)
                            <tr>
                                <td class="text-start">{{ $label }}</td>
                                <td>
                                    @if ($gotongroyong->$key === 'Ada')
                                        <span class="badge bg-success">Ada</span>
                                    @elseif ($gotongroyong->$key === 'Tidak Ada')
                                        <span class="badge bg-danger">Tidak Ada</span>
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
                <a href="{{ route('perkembangan.peransertamasyarakat.gotongroyong.edit', $gotongroyong->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('perkembangan.peransertamasyarakat.gotongroyong.destroy', $gotongroyong->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
