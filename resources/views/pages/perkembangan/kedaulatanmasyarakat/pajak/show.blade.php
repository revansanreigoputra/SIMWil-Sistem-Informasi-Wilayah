@extends('layouts.master')

@section('title', 'Detail Data Pajak Desa')

@section('action')
    <a href="{{ route('perkembangan.kedaulatanmasyarakat.pajak.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
<div class="container">

    <div class="card shadow-sm">
        <div class="card-body">
            
            <!-- Informasi Umum -->
            <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 30%;">
                    <col style="width: 5%;">
                    <col style="width: 65%;">
                </colgroup>
                <tr>
                    <td><strong>Tanggal</strong></td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($pajak->tanggal)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td><strong>Desa</strong></td>
                    <td>:</td>
                    <td>{{ $pajak->desa->nama_desa ?? '-' }}</td>
                </tr>
            </table>

            <!-- Data Pajak -->
            <h5 class="fw-bold text-primary mt-3 mb-2">Data Pajak</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>
                <tr>
                    <th class="text-start">Jenis Pajak</th>
                    <td class="text-start">{{ $pajak->jenis_pajak ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jumlah Wajib Pajak</th>
                    <td class="text-start">{{ $pajak->jumlah_wajib_pajak ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Target PBB (Rp)</th>
                    <td class="text-start">{{ number_format($pajak->target_pbb ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th class="text-start">Realisasi PBB (Rp)</th>
                    <td class="text-start">{{ number_format($pajak->realisasi_pbb ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jumlah Tindakan Penunggak PBB</th>
                    <td class="text-start">{{ $pajak->jumlah_tindakan_penunggak_pbb ?? '-' }}</td>
                </tr>
            </table>

            <!-- Data Retribusi -->
            <h5 class="fw-bold text-primary mt-3 mb-2">Data Retribusi</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>
                <tr>
                    <th class="text-start">Jenis Retribusi</th>
                    <td class="text-start">{{ $pajak->jenis_retribusi ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jumlah Wajib Retribusi</th>
                    <td class="text-start">{{ $pajak->jumlah_wajib_retribusi ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Target Retribusi (Rp)</th>
                    <td class="text-start">{{ number_format($pajak->target_retribusi ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th class="text-start">Realisasi Retribusi (Rp)</th>
                    <td class="text-start">{{ number_format($pajak->realisasi_retribusi ?? 0, 0, ',', '.') }}</td>
                </tr>
            </table>

            <!-- Data Pungutan Resmi -->
            <h5 class="fw-bold text-primary mt-3 mb-2">Data Pungutan Resmi</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>
                <tr>
                    <th class="text-start">Jenis Pungutan Resmi</th>
                    <td class="text-start">{{ $pajak->jenis_pungutan_resmi ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Target Pungutan Resmi (Rp)</th>
                    <td class="text-start">{{ number_format($pajak->target_pungutan_resmi ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th class="text-start">Realisasi Pungutan Resmi (Rp)</th>
                    <td class="text-start">{{ number_format($pajak->realisasi_pungutan_resmi ?? 0, 0, ',', '.') }}</td>
                </tr>
            </table>

            <!-- Kasus Pungutan Liar -->
            <h5 class="fw-bold text-primary mt-3 mb-2">Kasus Pungutan Liar (Pungli)</h5>
            <table class="table table-borderless mb-4 align-middle">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 50%;">
                </colgroup>
                <tr>
                    <th class="text-start">Jumlah Kasus Pungli</th>
                    <td class="text-start">{{ $pajak->jumlah_kasus_pungli ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-start">Jumlah Penyelesaian Pungli</th>
                    <td class="text-start">{{ $pajak->jumlah_penyelesaian_pungli ?? '-' }}</td>
                </tr>
            </table>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('perkembangan.kedaulatanmasyarakat.pajak.edit', $pajak->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit me-1"></i> Edit
                </a>

                <form action="{{ route('perkembangan.kedaulatanmasyarakat.pajak.destroy', $pajak->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
