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
        margin-bottom: 8px;
        font-size: 0.85rem;
        font-weight: 600;
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
        <ul class="nav nav-pills mb-3" id="jenisSuratTab" role="tablist">
            @foreach ($jenisSurats as $index => $format)
            @php $tabId = \Illuminate\Support\Str::slug($format->id); @endphp
            <li class="nav-item" role="presentation">
                <a class="nav-link @if($index === 0) active @endif"
                    id="{{ $tabId }}-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#{{ $tabId }}"
                    type="button"
                    role="tab"
                    aria-controls="{{ $tabId }}"
                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                    data-tab-param="{{ $tabId }}">
                    {{ $format->nama }}
                </a>
            </li>
            @endforeach
        </ul>

        <hr>

        {{-- TAB CONTENT --}}
        <div class="tab-content mt-3" id="jenisSuratTabContent">

            @foreach ($jenisSurats as $index => $format)
            @php
            $paneId = \Illuminate\Support\Str::slug($format->id);
            @endphp

            <div class="tab-pane fade @if($index === 0) show active @endif"
                id="{{ $paneId }}"
                role="tabpanel"
                aria-labelledby="{{ $paneId }}-tab"
                tabindex="0">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($permohonans->where('id_format_nomor_surats', $format->id) as $permohonan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permohonan->nomor_surat }}</td>
                                <td>{{ $permohonan->created_at->format('d-m-Y') }}</td>
                                <td>
                                    {{-- ACTION BUTTONS --}}
                                    @can('permohonan.edit')
                                    <a href="{{ route('layanan.permohonan.edit', $permohonan->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
                                <td colspan="4" class="text-center">Belum ada data permohonan untuk jenis surat ini ({{ $format->nama }}).</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

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
        item="{{ $permohonan->nomor_surat }}"
    />
@endforeach