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

        /* Gaya untuk Navigasi 'Bagian' (Tingkat 1) */
        .nav-tabs {
            border-bottom: 1px solid #dee2e6;
        }

        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            color: #6c757d;
        }

        .nav-tabs .nav-link.active {
            color: #495057;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
            font-weight: 600;
        }

        .nav-tabs .nav-link:hover:not(.active) {
            border-color: #e9ecef #e9ecef #dee2e6;
            isolation: isolate;
        }

        /* Gaya untuk Navigasi Sub-menu (Tingkat 2) */
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
            color: white !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important;
            transform: translateY(-1px);
        }

        .nav-pills .nav-link:hover:not(.active) {
            background-color: #e0e2e5;
        }
    </style>
@endsection

@section('action')
    @if ($activeTab)
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-modal">
            <i class="fas fa-plus-circle me-2"></i>Tambah Data Baru
        </button>
    @endif
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Data Master Perkembangan Desa</h5>
        </div>
        <div class="card-body">

            {{-- NAVIGASI TINGKAT 1: BAGIAN (DIUBAH MENJADI NAV-TABS) --}}
            <ul class="nav nav-tabs mb-3" role="tablist">
                @foreach (array_keys($menu) as $bagian_num)
                    @if (!empty($menu[$bagian_num]))
                        <li class="nav-item" role="presentation">
                            <a class="nav-link {{ $activeBagian == $bagian_num ? 'active' : '' }}"
                                href="{{ route('master.perkembangan.index', ['bagian' => $bagian_num]) }}">
                                Bagian {{ $bagian_num }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>

            {{-- NAVIGASI TINGKAT 2: SUB-MENU (TETAP NAV-PILLS) --}}
            <ul class="nav nav-pills mb-4" role="tablist">
                @foreach ($menu[$activeBagian] as $tab)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ $activeTab == $tab ? 'active' : '' }}"
                            href="{{ route('master.perkembangan.index', ['bagian' => $activeBagian, 'tab' => $tab]) }}">
                            {{ Str::headline($tab) }}
                        </a>
                    </li>
                @endforeach
            </ul>

            {{-- TABEL DATA --}}
            <div class="table-responsive">
                @if ($activeTab)
                    {{-- ... sisa kode tabel dan modal tidak berubah ... --}}
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Nama {{ Str::headline($activeTab) }}</th>
                                <th style="width: 20%;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-warning edit-btn"
                                            data-bs-toggle="modal" data-bs-target="#edit-modal"
                                            data-id="{{ $item->id }}" data-nama="{{ $item->nama }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal-{{ $item->id }}">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete-modal-{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5><button type="button"
                                                    class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda yakin ingin menghapus data:
                                                    <strong>{{ $item->nama }}</strong>?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="#" method="POST" class="d-inline"> @csrf
                                                    @method('DELETE') <button type="submit" class="btn btn-danger">Ya,
                                                        Hapus</button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">Data tidak ditemukan.</td>
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

    {{-- MODAL TAMBAH & EDIT --}}
    {{-- ================================================= --}}
    {{-- MODAL TAMBAH & EDIT (TAMPILAN BARU) --}}
    {{-- ================================================= --}}
    @if ($activeTab)
        {{-- MODAL UNTUK TAMBAH DATA --}}
        <div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">
                            <i class="fas fa-plus-circle me-2 text-primary"></i>
                            Form Tambah {{ Str::headline($activeTab) }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="add_nama" class="form-label">Nama {{ Str::headline($activeTab) }}</label>
                                <input type="text" name="nama" id="add_nama" class="form-control"
                                    placeholder="Masukkan data baru..." required>
                            </div>

                            <div class="mt-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-2"></i>Batal
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL UNTUK EDIT DATA --}}
        <div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-modal-title">
                            <i class="fas fa-pencil-alt me-2 text-warning"></i>
                            Form Edit
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="edit-id">

                            <div class="mb-3">
                                <label for="edit-nama" class="form-label" id="edit-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="edit-nama" required>
                            </div>

                            <div class="mt-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-2"></i>Batal
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check me-2"></i>Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('addon-script')
    @if ($activeTab)
        <script>
            $('#edit-modal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var nama = button.data('nama');
                var activeTab = "{{ Str::headline($activeTab) }}";
                var modal = $(this);
                modal.find('#edit-modal-title').text('Form Edit ' + activeTab);
                modal.find('#edit-label').text('Nama ' + activeTab);
                modal.find('#edit-id').val(id);
                modal.find('#edit-nama').val(nama);
            });
        </script>
    @endif
@endpush
