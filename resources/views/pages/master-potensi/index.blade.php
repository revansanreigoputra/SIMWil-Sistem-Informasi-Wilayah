@extends('layouts.master')

@section('title', 'Master Potensi')

@section('styles')
<style>
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .card-header {
        border-bottom: 1px solid #eee;
        background-color: #fff;
        padding: 1rem;
    }

    /* NAV TABS (BAGIAN) */
    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
    }

    .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-radius: .25rem .25rem 0 0;
        color: #6c757d;
        font-weight: 500;
    }

    .nav-tabs .nav-link.active {
        color: #495057;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
        font-weight: 600;
    }

    /* NAV PILLS (SUB MENU) */
    .nav-pills .nav-link {
        padding: 8px 12px;
        background-color: #f0f2f5;
        border: none;
        border-radius: 6px;
        color: #6a7f8e;
        font-weight: 500;
        transition: all 0.2s ease;
        margin-right: 4px;
        margin-bottom: 8px;
        font-size: 0.85rem;
    }

    .nav-pills .nav-link.active {
        background-color: #007bff !important;
        color: #fff !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transform: translateY(-1px);
    }

    .nav-pills .nav-link:hover:not(.active) {
        background-color: #e0e2e5;
    }
</style>
@endsection

@section('action')
   @if ($activeTab)
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-modal">
                <i class="fas fa-plus me-1"></i> Tambah Data Baru
            </button>
        @endif
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Data Master Potensi Desa</h5>
    </div>

    <div class="card-body">

        {{-- NAV BAGIAN --}}
        <ul class="nav nav-tabs mb-3" role="tablist">
            @foreach (array_keys($menu) as $bagian)
                @if (!empty($menu[$bagian]))
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $activeBagian == $bagian ? 'active' : '' }}"
                           href="{{ route('master-potensi.index', ['bagian' => $bagian]) }}">
                            Bagian {{ $bagian }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>

        {{-- NAV SUB MENU --}}
        <ul class="nav nav-pills mb-4" role="tablist">
            @foreach ($menu[$activeBagian] as $tab)
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $activeTab == $tab ? 'active' : '' }}"
                       href="{{ route('master-potensi.index', ['bagian' => $activeBagian, 'tab' => $tab]) }}">
                       {{ Str::headline($tab) }}
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- TABEL DATA --}}
        <div class="table-responsive">
            @if ($activeTab)
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width:5%">No</th>

                            {{-- Kolom relasi khusus --}}
                            @if ($activeTab === 'jenis_lembaga_ekonomi')
                                <th>Kategori Lembaga Ekonomi</th>
                            @elseif ($activeTab === 'jenis_prasarana_transportasi_darat')
                                <th>Kategori Prasarana Transportasi Darat</th>
                            @elseif ($activeTab === 'jenis_prasarana_komunikasi_informasi')
                                <th>Kategori Prasarana Komunikasi Informasi</th>
                            @endif

                            <th>Nama {{ Str::headline($activeTab) }}</th>
                            <th style="width:20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                {{-- Relasi dinamis --}}
                                @if ($activeTab === 'jenis_lembaga_ekonomi')
                                    <td>{{ $item->kategoriLembagaEkonomi->nama ?? '-' }}</td>
                                @elseif ($activeTab === 'jenis_prasarana_transportasi_darat')
                                    <td>{{ $item->kategoriPrasaranaTransportasiDarat->nama ?? '-' }}</td>
                                @elseif ($activeTab === 'jenis_prasarana_komunikasi_informasi')
                                    <td>{{ $item->kategoriPrasaranaKomunikasiInformasi->nama ?? '-' }}</td>
                                @endif

                                <td>{{ $item->nama }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-warning edit-btn"
                                        data-bs-toggle="modal" data-bs-target="#edit-modal"
                                        data-id="{{ $item->id }}"
                                        data-nama="{{ $item->nama }}"
                                        data-tab="{{ $activeTab }}"
                                        data-bagian="{{ $activeBagian }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <form action="{{ route('master-potensi.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="tab" value="{{ $activeTab }}">
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ in_array($activeTab, ['jenis_lembaga_ekonomi','jenis_prasarana_transportasi_darat','jenis_prasarana_komunikasi_informasi']) ? 4 : 3 }}"
                                    class="text-center text-muted py-4">
                                    Data tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            @else
                <div class="alert alert-info">Pilih bagian dan sub-menu untuk menampilkan data.</div>
            @endif
        </div>
    </div>
</div>

{{-- Modal Tambah & Edit --}}
@if ($activeTab)
    @include('pages.master-potensi.create')
    @include('pages.master-potensi.edit')
@endif

{{-- Script Modal Edit --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const tab = this.dataset.tab;
                const bagian = this.dataset.bagian;

                const form = document.querySelector('#edit-form');
                form.action = `/master-potensi/${id}`;
                form.querySelector('#edit-nama').value = nama;
                form.querySelector('input[name="tab"]').value = tab;
                form.querySelector('input[name="bagian"]').value = bagian;
            });
        });
    });
</script>
@endsection

@push('addon-script')
@if ($activeTab)
<script>
    $('#edit-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var nama = button.data('nama')
        var modal = $(this)
        modal.find('#edit-nama').val(nama)
        modal.find('#edit-form').attr('action', "{{ url('master-potensi') }}/" + id)
    })
</script>
@endif
@endpush
