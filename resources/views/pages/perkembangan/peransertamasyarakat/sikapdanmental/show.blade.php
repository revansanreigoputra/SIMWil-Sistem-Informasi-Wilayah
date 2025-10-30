@extends('layouts.master')

@section('title', 'Detail Sikap dan Mental Desa dan Kelurahan')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="container">
    <h4 class="mb-4">Detail Data Sikap dan Mental Desa dan Kelurahan</h4>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- Seksi 1: Informasi Umum --}}
            <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
            <table class="table table-borderless mb-4">
                <tr>
                    <td width="35%"><strong>Tanggal</strong></td>
                    <td width="5%">:</td>
                    <td>{{ \Carbon\Carbon::parse($sikapdanmental->tanggal)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Desa</strong></td>
                    <td>:</td>
                    <td>{{ $sikapdanmental->desa->nama_desa ?? '-' }}</td>
                </tr>
            </table>

            {{-- Seksi 2: Pungutan dan Permintaan Sumbangan --}}
            <h5 class="fw-bold text-primary mt-4 mb-3">Pungutan dan Permintaan Sumbangan</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Kegiatan</th>
                            <th>Jumlah / Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">Pungutan Gelandangan</td>
                            <td>{{ $sikapdanmental->jumlah_pungutan_gelandangan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Pungutan Terminal, Pelabuhan, Pasar</td>
                            <td>{{ $sikapdanmental->jumlah_pungutan_terminal_pelabuhan_pasar ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Permintaan Sumbangan (Perorangan)</td>
                            <td>
                                @if ($sikapdanmental->permintaan_sumbangan_perorangan === 'Ada')
                                    <span class="badge bg-success">Ada</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Ada</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">Permintaan Sumbangan (Terorganisir)</td>
                            <td>
                                @if ($sikapdanmental->permintaan_sumbangan_terorganisir === 'Ada')
                                    <span class="badge bg-success">Ada</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Ada</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Seksi 3: Pelayanan dan Etika Aparat --}}
            <h5 class="fw-bold text-primary mt-4 mb-3">Pelayanan dan Etika Aparat</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Aspek</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">Praktik Jalan Pintas / Suap</td>
                            <td>
                                @if ($sikapdanmental->praktik_jalan_pintas === 'Ya')
                                    <span class="badge bg-warning">Ya</span>
                                @else
                                    <span class="badge bg-secondary">Tidak</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">Pelayanan Gratis dari Aparat</td>
                            <td>
                                @if ($sikapdanmental->pelayanan_gratis_aparat === 'Ya')
                                    <span class="badge bg-success">Ya</span>
                                @else
                                    <span class="badge bg-secondary">Tidak</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">Keluhan terhadap Pelayanan</td>
                            <td>
                                @if ($sikapdanmental->keluhan_pelayanan === 'Ya')
                                    <span class="badge bg-warning text-dark">Ada</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Ada</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Seksi 4: Kondisi Kegiatan Ekonomi --}}
            <h5 class="fw-bold text-primary mt-4 mb-3">Kegiatan Ekonomi Masyarakat</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Kegiatan Ekonomi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">Petani Gagal Panen</td>
                            <td>{{ $sikapdanmental->petani_gagal_panen ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Nelayan Tidak Melaut</td>
                            <td>{{ $sikapdanmental->nelayan_tidak_melayat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Mencari Pekerjaan di Luar Desa</td>
                            <td>{{ $sikapdanmental->cari_pekerjaan_luar_desa ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Seksi 5: Kebiasaan dan Sosial Masyarakat --}}
            <h5 class="fw-bold text-primary mt-4 mb-3">Kebiasaan dan Perilaku Sosial</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Perilaku</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">Merayakan Pesta Besar</td>
                            <td>{{ $sikapdanmental->rayakan_pesta ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Bermusyawarah dalam Menghadapi Masalah</td>
                            <td>{{ $sikapdanmental->bermusyawarah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-start">Terprovokasi oleh Isu</td>
                            <td>{{ $sikapdanmental->terprovokasi_isu ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.edit', $sikapdanmental->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>
                <form action="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.destroy', $sikapdanmental->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
