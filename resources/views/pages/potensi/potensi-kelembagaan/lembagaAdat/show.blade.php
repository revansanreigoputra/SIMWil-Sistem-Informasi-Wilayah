@extends('layouts.master')

@section('title', 'Detail Data Lembaga Adat')

@section('content')
{{-- Memeriksa apakah pengguna memiliki izin untuk melihat halaman ini --}}
@can('adat.view')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Data Lembaga Adat</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th width="30%" class="fw-semibold bg-light">Tanggal</th>
                        <td>{{ \Carbon\Carbon::parse($adat->tanggal)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Pemangku Adat</th>
                        <td>
                            @if($adat->pemangku_adat)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Kepengurusan Adat</th>
                        <td>
                             @if($adat->kepengurusan_adat)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Rumah Adat</th>
                        <td>
                            @if($adat->rumah_adat)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Barang Pusaka</th>
                        <td>
                            @if($adat->barang_pusaka)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Naskah-Naskah</th>
                        <td>
                             @if($adat->naskah_naskah)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Lainnya</th>
                        <td>
                            @if($adat->lainnya)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                     <tr>
                        <th class="fw-semibold bg-light">Musyawarah Adat</th>
                        <td>
                            @if($adat->musyawarah_adat)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Sanksi Adat</th>
                        <td>
                            @if($adat->sanksi_adat)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Upacara Adat Kelahiran</th>
                        <td>
                            @if($adat->upacara_adat_kelahiran)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                     <tr>
                        <th class="fw-semibold bg-light">Upacara Adat Perkawinan</th>
                        <td>
                            @if($adat->upacara_adat_perkawinan)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Upacara Adat Kematian</th>
                        <td>
                            @if($adat->upacara_adat_kematian)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Upacara Adat Bercocok Tanam</th>
                        <td>
                            @if($adat->upacara_adat_bercocok_tanam)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Upacara Adat Perikanan Laut</th>
                        <td>
                            @if($adat->upacara_adat_perikanan_laut)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                     <tr>
                        <th class="fw-semibold bg-light">Upacara Adat Bidang Kehutanan</th>
                        <td>
                            @if($adat->upacara_adat_bidang_kehutanan)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Upacara Adat Pengelolaan SDA</th>
                        <td>
                            @if($adat->upacara_adat_pengelolaan_sda)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Upacara Adat Pembangunan Rumah</th>
                        <td>
                            @if($adat->upacara_adat_pembangunan_rumah)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Upacara Adat Penyelesaian Masalah</th>
                        <td>
                            @if($adat->upacara_adat_penyelesaian_masalah)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Ada</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i> Tidak Ada</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Dibuat Pada</th>
                        <td>{{ $adat->created_at->translatedFormat('d F Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th class="fw-semibold bg-light">Diperbarui Pada</th>
                        <td>{{ $adat->updated_at->translatedFormat('d F Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Tombol Aksi --}}
        <div class="mt-4 d-flex justify-content-end gap-2">
            @can('adat.view')
            <a href="{{ route('potensi.potensi-kelembagaan.lembagaAdat.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            @endcan
        </div>
    </div>
</div>
@else
<div class="alert alert-danger text-center">
    <h4 class="alert-heading">Akses Ditolak!</h4>
    <p>Maaf, Anda tidak memiliki izin untuk melihat detail data ini. Silakan hubungi Administrator.</p>
</div>
@endcan
@endsection