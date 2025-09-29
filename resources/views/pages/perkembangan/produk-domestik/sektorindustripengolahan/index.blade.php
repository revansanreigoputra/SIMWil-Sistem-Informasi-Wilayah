@extends('layouts.master')

@section('title', 'Sektor Industri Pengolahan')

@section('action')
    @can('sektor_industri.create')
        {{-- Tombol untuk memicu Modal Tambah Data Baru --}}
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            + Data Baru
        </button>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Tambahkan notifikasi success/error di sini --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table id="industri-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Industri</th>
                            <th>Nilai Produksi (Rp)</th>
                            <th>Nilai Bahan Baku (Rp)</th>
                            <th>Nilai Bahan Penolong (Rp)</th>
                            <th>Biaya Antara (Rp)</th>
                            <th>Jml Jenis Industri</th>
                            @canany(['sektor_industri.update', 'sektor_industri.delete'])
                                <th>Aksi</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sektorIndustriPengolahans as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') }}</td>
                                <td>{{ $data->jenis_industri }}</td>
                                <td>{{ number_format($data->nilai_produksi_tahunan, 0, ',', '.') }}</td>
                                <td>{{ number_format($data->nilai_bahan_baku, 0, ',', '.') }}</td>
                                <td>{{ number_format($data->nilai_bahan_penolong, 0, ',', '.') }}</td>
                                <td>{{ number_format($data->biaya_antara, 0, ',', '.') }}</td>
                                <td>{{ $data->jumlah_jenis_industri_tsb }}</td>
                                @canany(['sektor_industri.update', 'sektor_industri.delete'])
                                    <td>
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('sektor_industri.update')
                                                {{-- Tombol Edit: Memicu Modal Edit --}}
                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $data->id }}">
                                                    {{-- Icon Edit --}}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                    Edit
                                                </button>
                                            @endcan
                                            @can('sektor_industri.delete')
                                                {{-- Tombol Hapus: Memicu Modal Hapus --}}
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $data->id }}">
                                                    {{-- Icon Hapus --}}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                    Hapus
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                @endcanany
                            </tr>

                            {{-- Modal Edit (Untuk setiap baris data) --}}
                            @can('sektor_industri.update')
                                @include('sektor_industri_pengolahan.edit_modal', ['data' => $data])
                            @endcan

                            {{-- Modal Hapus (Untuk setiap baris data) --}}
                            @can('sektor_industri.delete')
                                @include('sektor_industri_pengolahan.delete_modal', ['data' => $data])
                            @endcan

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Create (Di luar loop, hanya satu) --}}
    @can('sektor_industri.create')
        @include('sektor_industri_pengolahan.create_modal')
    @endcan
@endsection

@push('addon-script')
    {{-- Inisialisasi DataTable --}}
    <script>
        $(document).ready(function() {
            $('#industri-table').DataTable();
        });
    </script>
@endpush