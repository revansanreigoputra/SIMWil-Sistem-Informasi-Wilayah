@extends('layouts.master')

@section('title', 'Daftar - SUBSEKTOR KEHUTANAN')

@section('action')
    {{-- TOMBOL +DATA BARU --}}
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        + Data Baru
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kehutanan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Total nilai produksi tahun ini (Rp)</th>
                            <th>Total nilai bahan baku <br> yang digunakan (Rp)</th>
                            <th>Total nilai bahan penolong <br> yang digunakan (Rp)</th>
                            <th>Total biaya antara <br> yang dihabiskan (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kehutanan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->tanggal }}</td>
                                <td class="text-center">{{ number_format($item->total_nilai_produksi_tahun_ini, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->total_nilai_bahan_baku_digunakan, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->total_nilai_bahan_penolong_digunakan, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->total_biaya_antara_dihabiskan, 0, ',', '.') }}</td>
                                <td>
                                    @canany(['subsektor-kehutanan.update', 'subsektor-kehutanan.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            {{-- TOMBOL EDIT --}}
                                            @can('subsektor-kehutanan.update')
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $item->id }}">
                                                    Edit
                                                </button>
                                            @endcan

                                            {{-- TOMBOL HAPUS --}}
                                            @can('subsektor-kehutanan.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-kehutanan-{{ $item->id }}">
                                                    Hapus
                                                </button>
                                            @endcan
                                        </div>

                                        {{-- MODAL EDIT --}}
                                        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('perkembangan.produk-domestik.subsektor-kehutanan.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Kehutanan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label>Tanggal</label>
                                                                <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Total nilai produksi tahun ini</label>
                                                                <input type="number" name="total_nilai_produksi_tahun_ini" class="form-control" value="{{ $item->total_nilai_produksi_tahun_ini }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Total nilai bahan baku digunakan</label>
                                                                <input type="number" name="total_nilai_bahan_baku_digunakan" class="form-control" value="{{ $item->total_nilai_bahan_baku_digunakan }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Total nilai bahan penolong digunakan</label>
                                                                <input type="number" name="total_nilai_bahan_penolong_digunakan" class="form-control" value="{{ $item->total_nilai_bahan_penolong_digunakan }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Total biaya antara dihabiskan</label>
                                                                <input type="number" name="total_biaya_antara_dihabiskan" class="form-control" value="{{ $item->total_biaya_antara_dihabiskan }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MODAL DELETE --}}
                                        <div class="modal fade" id="delete-kehutanan-{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data Kehutanan?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data subsektor kehutanan tanggal <strong>{{ $item->tanggal }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('perkembangan.produk-domestik.subsektor-kehutanan.destroy', $item->id) }}" method="POST">
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

    {{-- MODAL TAMBAH DATA --}}
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('perkembangan.produk-domestik.subsektor-kehutanan.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Kehutanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Total nilai produksi tahun ini</label>
                            <input type="number" name="total_nilai_produksi_tahun_ini" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Total nilai bahan baku digunakan</label>
                            <input type="number" name="total_nilai_bahan_baku_digunakan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Total nilai bahan penolong digunakan</label>
                            <input type="number" name="total_nilai_bahan_penolong_digunakan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Total biaya antara dihabiskan</label>
                            <input type="number" name="total_biaya_antara_dihabiskan" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#kehutanan-table').DataTable();
        });
    </script>
@endpush
