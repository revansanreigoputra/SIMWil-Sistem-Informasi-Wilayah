@extends('layouts.master')

@section('title', 'Daftar - SUBSEKTOR KERAJINAN')

@section('action')
    {{-- PASTIKAN NAMA ROUTE INI SESUAI DENGAN DEFNISI ANDA --}}
    <a href="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.create') }}" class="btn btn-primary mb-3">+Data Baru</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kerajinan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Total nilai produksi tahun ini (Rp)</th>
                            <th>Total nilai bahan baku yang digunakan (Rp)</th>
                            <th>Total nilai bahan penolong yang digunakan (Rp)</th>
                            <th>Total biaya antara yang dihabiskan (Rp)</th>
                            <th>Total jenis kerajinan rumah tangga (Jenis)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Menggunakan variabel $kerajinans yang dilempar dari controller --}}
                        @foreach ($kerajinans as $kerajinan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $kerajinan->tanggal }}</td>
                                {{-- Menampilkan data sesuai kolom Model Kerajinan --}}
                                <td class="text-center">{{ number_format($kerajinan->total_nilai_produksi_tahun_ini, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($kerajinan->total_nilai_bahan_baku_digunakan, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($kerajinan->total_nilai_bahan_penolong_digunakan, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($kerajinan->total_biaya_antara_dihabiskan, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $kerajinan->total_jenis_kerajinan_rumah_tangga }}</td>
                                <td>
                                    {{-- Sesuaikan Permission (Hak Akses) jika Anda menggunakan Spatie/Laravel Permission --}}
                                   @canany(['subsektor-kerajinan.view', 'subsektor-kerajinan.update', 'subsektor-kerajinan.delete'])

                                        <div class="d-flex gap-1 justify-content-center">
                                            
                                            {{-- TOMBOL EDIT --}}
                                            @can('subsektor-kerajinan.update')
                                                <a href="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.edit', $kerajinan->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    {{-- Icon Edit --}}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                    Edit
                                                </a>
                                            @endcan
                                            
                                            {{-- TOMBOL HAPUS --}}
                                            @can('subsektor-kerajinan.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-kerajinan-{{ $kerajinan->id }}">
                                                    {{-- Icon Hapus --}}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            @endcan
                                        </div>

                                        <div class="modal fade" id="delete-kerajinan-{{ $kerajinan->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Kerajinan?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data kerajinan tanggal
                                                            <strong>{{ $kerajinan->tanggal }}</strong> yang dihapus
                                                            tidak bisa dikembalikan.
                                                        </p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        {{-- FORM DELETE DENGAN NAMA ROUTE BARU --}}
                                                        <form action="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.destroy', $kerajinan->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-muted">Tidak ada aksi</span>
                                    @endcanany
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#kerajinan-table').DataTable();
        });
    </script>
@endpush