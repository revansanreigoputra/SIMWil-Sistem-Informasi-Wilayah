@extends('layouts.master')

@section('title', 'Data Permohonan Dokumen')


@section('styles')
<style>
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        background-color: #fff;
    }

    .card-header {
        border-bottom: none;
        background-color: #fff;
        padding: 1rem;
    }

    .card-body {
        padding: 1rem;
    }

    .nav-pills .nav-link {
        padding: 8px 12px;
        background-color: #f0f2f5;
        border: none;
        border-radius: 6px;
        color: #6a7f8e;
        transition: all 0.2s ease;
        margin-right: 4px; 
        font-size: 0.85rem;
        font-weight: 600;
    }

    .nav-primary-pills .nav-link {
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: 700;
        margin-right: 8px;

        /* Contoh Style 1: Garis Bawah (Underline) */
        /* Hapus background dan border-radius jika ingin gaya underline */
        background-color: transparent !important;
        border-radius: 0;
        color: #333 !important;
        border-bottom: 3px solid transparent;
        transition: border-color 0.2s ease, color 0.2s ease;
    }

    /* Style Primary Nav: Active State */
    .nav-primary-pills .nav-link.active {
        background-color: transparent !important;
        color: #007bff !important;
        border-bottom: 3px solid #007bff;
        box-shadow: none !important;
        transform: none;
    }

    .nav-primary-pills .nav-link:hover:not(.active) {
        background-color: transparent !important;
        color: #007bff;
        border-bottom: 3px solid #ccc;
    }

  

    .nav-pills .nav-link.active {
        background-color: #4CAF50 !important;
        color: white !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important;
        transform: translateY(-1px);
    }

    .nav-pills .nav-link:hover:not(.active) {
        background-color: #e0e2e5;

    }

    @media (max-width: 768px) {
        .nav-pills {
            flex-direction: column;
        }

        .nav-pills .nav-link {
            margin-right: 0;
            margin-bottom: 8px;
            text-align: center;
            width: 100%;
        }
    }
</style>
@endsection
<!-- FFor id generator -->

@section('action')
<a id="create-permohonan-btn"
    href="{{ route('layanan.permohonan.create')}}"
    class="btn btn-primary">
    Buat Dokumen Baru
</a>


@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Data Permohonan Dokumen</h5>
    </div>
    <div class="card-body">

        {{-- TAB NAVIGATION ( ) --}}
        <ul class="nav nav-pills mb-3 nav-primary-pills " id="kopTemplateTab" role="tablist">
            @foreach ($groupedKopTemplates as $indexKop => $kopTemplate)
            @php $kopId = 'kop-' . $kopTemplate->id; @endphp
            <li class="nav-item" role="presentation" class="">
                <a class="uppercase-input nav-link @if($indexKop === 0) active @endif"
                    id="{{ $kopId }}-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#{{ $kopId }}"
                    type="button"
                    role="tab"
                    aria-controls="{{ $kopId }}"
                    aria-selected="{{ $indexKop === 0 ? 'true' : 'false' }}">
                    {{ $kopTemplate->jenis_kop }}
                </a>
            </li>
            @endforeach
        </ul>

        <hr>

        {{-- TAB CONTENT --}}
        <div class="tab-content mt-3" id="kopTemplateTabContent">

            @foreach ($groupedKopTemplates as $indexKop => $kopTemplate)
            @php $kopId = 'kop-' . $kopTemplate->id; @endphp

            <div class="tab-pane fade @if($indexKop === 0) show active @endif"
                id="{{ $kopId }}"
                role="tabpanel"
                aria-labelledby="{{ $kopId }}-tab"
                tabindex="0">

                {{-- START: SUB-TAB NAVIGATION (JENIS SURAT) --}}
                <ul class="nav nav-pills mb-3" id="jenisSuratSubTab-{{ $kopId }}" role="tablist">
                    @foreach ($kopTemplate->jenisSurats as $indexJenis => $jenisSurat)
                    @php $jenisId = 'jenis-' . $jenisSurat->id; @endphp
                    <li class="nav-item" role="presentation">
                        <a class="nav-link @if($indexJenis === 0) active @endif"
                            id="{{ $jenisId }}-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#{{ $jenisId }}"
                            type="button"
                            role="tab"
                            aria-controls="{{ $jenisId }}"
                            aria-selected="{{ $indexJenis === 0 ? 'true' : 'false' }}">
                            {{ $jenisSurat->nama }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                {{-- END: SUB-TAB NAVIGATION --}}

                {{-- START: SUB-TAB CONTENT (DATA PERMOHONAN) --}}
                <div class="tab-content mt-3" id="jenisSuratSubTabContent-{{ $kopId }}">
                    @foreach ($kopTemplate->jenisSurats as $indexJenis => $jenisSurat)
                    @php $jenisId = 'jenis-' . $jenisSurat->id; @endphp

                    <div class="tab-pane fade @if($indexJenis === 0) show active @endif"
                        id="{{ $jenisId }}"
                        role="tabpanel"
                        aria-labelledby="{{ $jenisId }}-tab"
                        tabindex="0">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                {{-- ... The table header (thead) remains the same ... --}}
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permohonans->where('id_format_nomor_surats', $jenisSurat->id) as $permohonan)
                                    {{-- ... Table row content remains the same ... --}}
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permohonan->nomor_surat }}</td>
                                        <td>{{ $permohonan->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            @php
                                            $statusClass = '';
                                            switch ($permohonan->status) {
                                            case 'belum_diverifikasi':
                                            $statusClass = 'badge bg-secondary';
                                            break;
                                            case 'diverifikasi':
                                            $statusClass = 'badge bg-primary';
                                            break;
                                            case 'ditolak':
                                            $statusClass = 'badge bg-danger';
                                            break;
                                            case 'sudah_diambil':
                                            $statusClass = 'badge bg-success';
                                            break;
                                            default:
                                            $statusClass = 'badge bg-secondary';
                                            }
                                            @endphp
                                            <span class="{{ $statusClass }}">{{ ucfirst($permohonan->status) }}</span>
                                        </td>
                                        <td>
                                            {{-- ACTION BUTTONS --}}
                                            @can('permohonan.edit')
                                            <a href="{{ route('layanan.permohonan.edit', $permohonan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            @endcan
                                            @can('permohonan.delete')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#delete-confirm-{{ $permohonan->id }}">
                                                Hapus
                                            </button>
                                            @endcan
                                            <a href="{{ route('layanan.permohonan.cetak', $permohonan->id) }}" class="btn btn-sm btn-success" target="_blank">Cetak</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Belum ada data permohonan untuk jenis surat ini ({{ $jenisSurat->nama }}).</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                    @endforeach
                </div>
                {{-- END: SUB-TAB CONTENT --}}

            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
@foreach ($permohonans as $permohonan)
<x-modal.delete-confirm
    id="delete-confirm-{{ $permohonan->id }}"
    title="Yakin hapus data ini?"
    description="Aksi ini tidak bisa dikembalikan."
    route="{{ route('layanan.permohonan.destroy', $permohonan) }}"
    item="{{ $permohonan->nomor_surat }}" />
@endforeach