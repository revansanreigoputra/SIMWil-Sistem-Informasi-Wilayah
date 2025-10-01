@extends('layouts.master')

@section('title', 'Daftar - SEKTOR BANGUNAN/KONSTRUKSI')

@section('action')
    @can('sektor-bangunan.create')
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">+ Data Baru</button>
    @endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="bangunan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jumlah bangunan tahun ini (Unit)</th>
                        <th>Biaya pemeliharaan (Rp)</th>
                        <th>Total nilai bangunan (Rp)</th>
                        <th>Biaya antara lainnya (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bangunans as $bangunan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bangunan->tanggal }}</td>
                            <td>{{ $bangunan->jumlah_bangunan_tahun_ini }}</td>
                            <td>{{ number_format($bangunan->biaya_pemeliharaan, 0, ',', '.') }}</td>
                            <td>{{ number_format($bangunan->total_nilai_bangunan, 0, ',', '.') }}</td>
                            <td>{{ number_format($bangunan->biaya_antara_lainnya, 0, ',', '.') }}</td>
                            <td>
                                @canany(['sektor-bangunan.update','sektor-bangunan.delete'])
                                    <div class="d-flex gap-1">
                                        {{-- Edit --}}
                                        @can('sektor-bangunan.update')
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-{{ $bangunan->id }}">
                                                Edit
                                            </button>
                                        @endcan

                                       {{-- MODAL DELETE --}}
                                        <div class="modal fade" id="delete-bangunan-{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data Kehutanan?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data subsektor bangunan tanggal <strong>{{ $item->tanggal }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('perkembangan.produk-domestik.sektor-bangunan.destroy', $item->id) }}" method="POST">
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

                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editModal-{{ $bangunan->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <form action="{{ route('perkembangan.produk-domestik.sektor-bangunan.update', $bangunan->id) }}" method="POST" class="modal-content">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Bangunan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Tanggal</label>
                                            <input type="date" name="tanggal" value="{{ $bangunan->tanggal }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Jumlah Bangunan</label>
                                            <input type="number" name="jumlah_bangunan_tahun_ini" value="{{ $bangunan->jumlah_bangunan_tahun_ini }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Biaya Pemeliharaan</label>
                                            <input type="number" name="biaya_pemeliharaan" value="{{ $bangunan->biaya_pemeliharaan }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Total Nilai Bangunan</label>
                                            <input type="number" name="total_nilai_bangunan" value="{{ $bangunan->total_nilai_bangunan }}" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Biaya Antara Lainnya</label>
                                            <input type="number" name="biaya_antara_lainnya" value="{{ $bangunan->biaya_antara_lainnya }}" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Create Modal --}}
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('perkembangan.produk-domestik.sektor-bangunan.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Bangunan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jumlah Bangunan</label>
                    <input type="number" name="jumlah_bangunan_tahun_ini" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Biaya Pemeliharaan</label>
                    <input type="number" name="biaya_pemeliharaan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Total Nilai Bangunan</label>
                    <input type="number" name="total_nilai_bangunan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Biaya Antara Lainnya</label>
                    <input type="number" name="biaya_antara_lainnya" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#bangunan-table').DataTable();
    });
</script>
@endpush
