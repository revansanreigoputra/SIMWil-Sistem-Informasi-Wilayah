@extends('layouts.master')

@section('title', 'Master Perkembangan')

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
            <h5 class="card-title mb-0">Data Master Perkembangan Desa</h5>
        </div>

        <div class="card-body">

            {{-- NAV BAGIAN --}}
            <ul class="nav nav-tabs mb-3" role="tablist">
                @foreach (array_keys($menu) as $bagian)
                    @if (!empty($menu[$bagian]))
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $activeBagian == $bagian ? 'active' : '' }}"
                                href="{{ route('master-perkembangan.index', ['bagian' => $bagian]) }}">
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
                            href="{{ route('master-perkembangan.index', ['bagian' => $activeBagian, 'tab' => $tab]) }}">
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

                                {{-- Kolom Khusus untuk Kabupaten/Kota --}}
                                @if ($activeTab === 'kabupaten_kota')
                                    <th>Provinsi</th>
                                @endif

                                {{-- Nama Kolom Dinamis --}}
                                <th>Nama {{ Str::headline($activeTab) }}</th>
                                <th style="width:20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    @if ($activeTab === 'kabupaten_kota')
                                        <td>{{ $item->provinsi }}</td>
                                    @endif

                                    <td>{{ $item->nama }}</td>

                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-warning btn-edit"
                                            data-bs-toggle="modal" data-bs-target="#edit-modal"
                                            data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"
                                            data-provinsi-id="{{ $item->provinsi_id ?? '' }}"
                                            data-url="{{ route('master-perkembangan.update', $item->id) }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('master-perkembangan.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
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
                                    <td colspan="{{ $activeTab === 'kabupaten_kota' ? 4 : 3 }}"
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
        @include('pages.master-perkembangan.create')
        @include('pages.master-perkembangan.edit')
    @endif
@endsection

@push('addon-script')
    @if ($activeTab)
        <script>
            $('#edit-modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var nama = button.data('nama');
                var modal = $(this);

                modal.find('#edit-nama').val(nama);
                modal.find('#edit-form').attr('action', "{{ url('master-perkembangan') }}/" + id);
            });
        </script>
    @endif
@endpush
