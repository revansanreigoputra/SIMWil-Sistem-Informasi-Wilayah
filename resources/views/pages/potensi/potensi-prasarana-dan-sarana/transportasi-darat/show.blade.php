@extends('layouts.master')

@section('title', 'Detail Transportasi Darat')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Detail Data Transportasi Darat</h5>
        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index') }}" class="btn btn-secondary btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <!-- Informasi Umum -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h6 class="fw-bold text-primary mb-3">Informasi Umum</h6>
                <table class="table table-borderless">
                    <tr>
                        <td width="40%"><strong>Tanggal</strong></td>
                        <td width="10%">:</td>
                        <td>{{ $transportasiDarat->tanggal->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Kategori</strong></td>
                        <td>:</td>
                        <td>{{ $transportasiDarat->getKategoriOptions()[$transportasiDarat->kategori] ?? $transportasiDarat->kategori }}</td>
                    </tr>
                    <tr>
                        <td><strong>Jenis Sarana Prasarana</strong></td>
                        <td>:</td>
                        <td>{{ $transportasiDarat->getJenisSaranaPrasaranaOptions()[$transportasiDarat->jenis_sarana_prasarana] ?? $transportasiDarat->jenis_sarana_prasarana }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Data Kondisi -->
        <h6 class="fw-bold text-primary mb-3">Data Kondisi</h6>
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">Kondisi Baik</th>
                        <th class="text-center">Kondisi Rusak</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Persentase Baik</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <span class="badge bg-success fs-6 px-3 py-2">
                                {{ number_format($transportasiDarat->kondisi_baik) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-danger fs-6 px-3 py-2">
                                {{ number_format($transportasiDarat->kondisi_rusak) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-primary fs-6 px-3 py-2">
                                {{ number_format($transportasiDarat->kondisi_baik + $transportasiDarat->kondisi_rusak) }}
                            </span>
                        </td>
                        <td class="text-center">
                            @php
                                $total = $transportasiDarat->kondisi_baik + $transportasiDarat->kondisi_rusak;
                                $persentase = $total > 0 ? round(($transportasiDarat->kondisi_baik / $total) * 100, 1) : 0;
                            @endphp
                            <span class="badge bg-info fs-6 px-3 py-2">
                                {{ $persentase }}%
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Action Buttons -->
        <div class="mt-4">
            <div class="d-flex gap-2 justify-content-start">
                <a href="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.edit', $transportasiDarat->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.destroy', $transportasiDarat->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection