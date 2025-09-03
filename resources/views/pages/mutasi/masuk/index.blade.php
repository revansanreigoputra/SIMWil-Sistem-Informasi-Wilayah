@extends('layouts.master')

@section('title', 'Data Penduduk Masuk')

@section('action')
    <a href="{{ route('mutasi.masuk.create') }}" class="btn btn-primary mb-3">
        Tambah Data Masuk
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Filter --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="filter-tujuan" class="form-label mb-1">Filter Mutasi</label>
                    <select id="filter-tujuan" class="form-select form-select-sm">
                        <option value="">-- Semua --</option>
                        <option value="Jakarta">Meninggal</option>
                        <option value="Bandung">Pindah Alamat</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="filter-tanggal" class="form-label mb-1">Filter Tanggal Keluar</label>
                    <input type="date" id="filter-tanggal" class="form-control form-control-sm">
                </div>
            </div>
            <div class="table-responsive">
                <table id="mutasi-keluar-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Mutasi</th>
                            <th>Jenis</th>
                            <th>ID AK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mutasiMasuks as $index => $mutasi)
                            <tr>
                                <td>{{ $mutasiMasuks->firstItem() + $index }}</td>
                                <td>{{ $mutasi->tanggal->format('d M Y') }}</td>
                                <td>{{ $mutasi->jenis }}</td>
                                <td>{{ $mutasi->id_ak }}</td>
                                <!-- ganti dengan nama kolom yang sesuai di tabel mutasi masuk -->
                                <td>
                                    @canany(['mutasi.masuk.view', 'mutasi.masuk.update', 'mutasi.masuk.delete'])
                                        <div class="d-flex gap-1">
                                            @can('mutasi.masuk.view')
                                                <a href="{{ route('mutasi.masuk.show', $mutasi->id) }}"
                                                    class="btn btn-sm btn-info">Detail</a>
                                            @endcan
                                            @can('mutasi.masuk.update')
                                                <a href="{{ route('mutasi.masuk.edit', $mutasi->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                            @endcan
                                            @can('mutasi.masuk.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-mutasi-{{ $mutasi->id }}">Hapus</button>
                                            @endcan
                                        </div>

                                        <!-- Modal Konfirmasi Hapus -->
                                        <div class="modal fade" id="delete-mutasi-{{ $mutasi->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data Mutasi?</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data mutasi <strong>{{ $mutasi->id_ak }}</strong> akan dihapus dan
                                                            tidak bisa dikembalikan.</p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('mutasi.masuk.destroy', $mutasi->id) }}"
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
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data mutasi masuk</td>
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
        $(function() {
            $('#mutasi-keluar-table').DataTable();
        });
    </script>
@endpush
