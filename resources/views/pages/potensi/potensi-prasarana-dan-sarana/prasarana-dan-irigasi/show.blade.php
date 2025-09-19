@extends('layouts.master')

@section('title', 'Detail Data Prasarana dan Irigasi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Detail Data Prasarana dan Irigasi</h5>
        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.index') }}" class="btn btn-secondary btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <!-- Tanggal -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h6 class="fw-bold text-primary">Tanggal</h6>
                <p class="mb-0">{{ $irigasi->tanggal->format('d-m-Y') }}</p>
            </div>
        </div>

        <!-- Data Saluran -->
        <h6 class="fw-bold text-primary mb-3">Data Saluran</h6>
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Jenis Saluran</th>
                        <th class="text-center">Total (m)</th>
                        <th class="text-center">Rusak (m)</th>
                        <th class="text-center">Kondisi Baik (m)</th>
                        <th class="text-center">Persentase Baik</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Saluran Primer</strong></td>
                        <td class="text-center">{{ number_format($irigasi->saluran_primer) }}</td>
                        <td class="text-center">{{ number_format($irigasi->saluran_primer_rusak) }}</td>
                        <td class="text-center">{{ number_format($irigasi->saluran_primer - $irigasi->saluran_primer_rusak) }}</td>
                        <td class="text-center">
                            @php
                                $primer_persen = $irigasi->saluran_primer > 0 ? round((($irigasi->saluran_primer - $irigasi->saluran_primer_rusak) / $irigasi->saluran_primer) * 100, 1) : 0;
                            @endphp
                            {{ $primer_persen }}%
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Saluran Sekunder</strong></td>
                        <td class="text-center">{{ number_format($irigasi->saluran_sekunder) }}</td>
                        <td class="text-center">{{ number_format($irigasi->saluran_sekunder_rusak) }}</td>
                        <td class="text-center">{{ number_format($irigasi->saluran_sekunder - $irigasi->saluran_sekunder_rusak) }}</td>
                        <td class="text-center">
                            @php
                                $sekunder_persen = $irigasi->saluran_sekunder > 0 ? round((($irigasi->saluran_sekunder - $irigasi->saluran_sekunder_rusak) / $irigasi->saluran_sekunder) * 100, 1) : 0;
                            @endphp
                            {{ $sekunder_persen }}%
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Saluran Tersier</strong></td>
                        <td class="text-center">{{ number_format($irigasi->saluran_tersier) }}</td>
                        <td class="text-center">{{ number_format($irigasi->saluran_tersier_rusak) }}</td>
                        <td class="text-center">{{ number_format($irigasi->saluran_tersier - $irigasi->saluran_tersier_rusak) }}</td>
                        <td class="text-center">
                            @php
                                $tersier_persen = $irigasi->saluran_tersier > 0 ? round((($irigasi->saluran_tersier - $irigasi->saluran_tersier_rusak) / $irigasi->saluran_tersier) * 100, 1) : 0;
                            @endphp
                            {{ $tersier_persen }}%
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Data Pintu -->
        <h6 class="fw-bold text-primary mb-3">Data Pintu</h6>
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Jenis Pintu</th>
                        <th class="text-center">Total (unit)</th>
                        <th class="text-center">Rusak (unit)</th>
                        <th class="text-center">Kondisi Baik (unit)</th>
                        <th class="text-center">Persentase Baik</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Pintu Sadap</strong></td>
                        <td class="text-center">{{ number_format($irigasi->pintu_sadap) }}</td>
                        <td class="text-center">{{ number_format($irigasi->pintu_sadap_rusak) }}</td>
                        <td class="text-center">{{ number_format($irigasi->pintu_sadap - $irigasi->pintu_sadap_rusak) }}</td>
                        <td class="text-center">
                            @php
                                $sadap_persen = $irigasi->pintu_sadap > 0 ? round((($irigasi->pintu_sadap - $irigasi->pintu_sadap_rusak) / $irigasi->pintu_sadap) * 100, 1) : 0;
                            @endphp
                            {{ $sadap_persen }}%
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Pintu Pembagi Air</strong></td>
                        <td class="text-center">{{ number_format($irigasi->pintu_pembagi_air) }}</td>
                        <td class="text-center">{{ number_format($irigasi->pintu_pembagi_air_rusak) }}</td>
                        <td class="text-center">{{ number_format($irigasi->pintu_pembagi_air - $irigasi->pintu_pembagi_air_rusak) }}</td>
                        <td class="text-center">
                            @php
                                $pembagi_persen = $irigasi->pintu_pembagi_air > 0 ? round((($irigasi->pintu_pembagi_air - $irigasi->pintu_pembagi_air_rusak) / $irigasi->pintu_pembagi_air) * 100, 1) : 0;
                            @endphp
                            {{ $pembagi_persen }}%
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Action Buttons -->
        <div class="mt-4">
            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.edit', $irigasi->id) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.destroy', $irigasi->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection