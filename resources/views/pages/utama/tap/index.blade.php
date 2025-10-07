@extends('layouts.master')

@section('title', 'TA Pendamping')

@section('action')
    <a href="{{ route('utama.tap.create') }}" class="btn btn-primary">
        Tambah Data Baru
    </a>
@endsection

{{-- FUNGSI BANTUAN SEMENTARA UNTUK MENCARI NAMA DARI ID --}}
@php
    function findTapNameById($id, $dataArray) {
        foreach ($dataArray as $item) {
            if ($item['id'] == $id) {
                return $item['nama'];
            }
        }
        return 'N/A';
    }
@endphp

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar TA Pendamping</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tap-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>Nama & Email</th>
                            <th class="text-nowrap">Wilayah Kerja (ID)</th>
                            <th class="text-nowrap">Terakhir Update</th> {{-- KOLOM BARU --}}
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($taps as $tap)
                            {{-- Menambah class align-middle agar rapi --}}
                            <tr class="align-middle">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($tap->tgl_tap)->format('d M Y') }}</td>
                                <td>
                                    <strong>{{ $tap->nama }}</strong> <small class="d-block text-muted">{{ $tap->email }}</small>
                                </td>
                                <td>
                                    {{-- ==================== PERBAIKAN UTAMA DI SINI ==================== --}}
                                    {{-- Mencari nama wilayah kerja dari data dummy berdasarkan id_wk --}}
                                    {{ findTapNameById($tap->id_wk, $wilayah_kerjas) }}
                                </td>
                                <td class="text-nowrap"> {{-- DATA BARU UNTUK KOLOM UPDATE --}}
                                    {{ \Carbon\Carbon::parse($tap->updated_at)->translatedFormat('d M Y') }}
                                    <small class="d-block text-muted">{{ $tap->updated_at->diffForHumans() }}</small>
                                </td>
                                <td class="text-center">
                                    {{-- ==================== PERUBAHAN UTAMA DI SINI ==================== --}}
                                    <div class="d-flex gap-2 justify-content-center">
                                        {{-- Tombol Detail dengan Ikon --}}
                                        <a href="{{ route('utama.tap.show', $tap->id) }}"
                                            class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        {{-- Tombol Edit dengan Ikon --}}
                                        <a href="{{ route('utama.tap.edit', $tap->id) }}"
                                            class="btn btn-sm btn-outline-warning" data-bs-toggle="tooltip" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        {{-- Tombol Hapus dengan Ikon --}}
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-tap-{{ $tap->id }}" data-bs-toggle="tooltip"
                                            title="Hapus">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- MODAL HAPUS --}}
                            <div class="modal fade" id="delete-tap-{{ $tap->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus TA Pendamping?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Data <strong>{{ $tap->nama }}</strong> akan dihapus.</p>
                                            <p>Yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{ route('utama.tap.destroy', $tap->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data TA Pendamping.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $('#tap-table').DataTable();

            // ==================== SCRIPT BARU UNTUK TOOLTIP ====================
            // Inisialisasi Tooltip Bootstrap agar title pada tombol ikon muncul
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
@endpush
