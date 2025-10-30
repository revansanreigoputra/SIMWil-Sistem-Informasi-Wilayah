@extends('layouts.master')

@section('title', 'Detail - SUBSEKTOR KERAJINAN')

@section('action')
    <a href="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-4 text-center">Detail Data Subsektor Kerajinan</h5>

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th width="30%">Desa</th>
                            <td>{{ $kerajinan->desa ? $kerajinan->desa->nama_desa : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($kerajinan->tanggal)->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Total Nilai Produksi Tahun Ini (Rp)</th>
                            <td>{{ number_format($kerajinan->total_nilai_produksi_tahun_ini, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Total Nilai Bahan Baku yang Digunakan (Rp)</th>
                            <td>{{ number_format($kerajinan->total_nilai_bahan_baku_digunakan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Total Nilai Bahan Penolong yang Digunakan (Rp)</th>
                            <td>{{ number_format($kerajinan->total_nilai_bahan_penolong_digunakan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Total Biaya Antara yang Dihabiskan (Rp)</th>
                            <td>{{ number_format($kerajinan->total_biaya_antara_dihabiskan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Total Jenis Kerajinan Rumah Tangga (Jenis)</th>
                            <td>{{ $kerajinan->total_jenis_kerajinan_rumah_tangga }}</td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $kerajinan->created_at ? $kerajinan->created_at->format('d F Y H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Diperbarui Terakhir</th>
                            <td>{{ $kerajinan->updated_at ? $kerajinan->updated_at->format('d F Y H:i') : '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.edit', $kerajinan->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square me-1"></i> Edit Data
                </a>

                <form action="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.destroy', $kerajinan->id) }}" method="POST"
                      class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        <i class="bi bi-trash me-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
