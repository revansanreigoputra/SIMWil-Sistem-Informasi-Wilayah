@extends('layouts.master')

@section('title', 'Daftar - SUBSEKTOR Harapan')

@section('action')
@can('subsektor-harapan.create')
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        + Data Baru
    </button>
@endcan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="subsektor-harapan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Angka Harapan Hidup <br> Desa/Kelurahan</th>
                        <th>Angka Harapan Hidup<br> Kabupaten/Kota</th>
                        <th>Angka Harapan Hidup <br> Provinsi</th>
                        <th>Angka Harapan Hidup <br> Nasional</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                            <td>{{ $item->angka_harapan_hidup_desa }}</td>
                            <td>{{ $item->angka_harapan_hidup_kabupaten }}</td>
                            <td>{{ $item->angka_harapan_hidup_provinsi }}</td>
                            <td>{{ $item->angka_harapan_hidup_nasional }}</td>
                            <td>
                                @canany(['subsektor-harapan.show', 'subsektor-harapan.edit', 'subsektor-harapan.delete'])
                                <div class="d-flex gap-1">
                                    @can('subsektor-harapan.show')
                                        <a href="{{ route('perkembangan.kesehatan-masyarakat.subsektor-harapan.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    @endcan

                                    @can('subsektor-harapan.edit')
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->id }}">Edit</button>
                                    @endcan

                                    @can('subsektor-harapan.delete')
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item->id }}">Hapus</button>
                                    @endcan
                                </div>
                                @endcanany
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('perkembangan.kesehatan-masyarakat.subsektor-harapan.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Data Subsektor Harapan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Tanggal *</label>
                                                <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal->format('Y-m-d') }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Angka Harapan Hidup Desa/Kelurahan *</label>
                                                <input type="number" name="angka_harapan_hidup_desa" class="form-control" value="{{ $item->angka_harapan_hidup_desa }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Angka Harapan Hidup Kabupaten/Kota *</label>
                                                <input type="number" name="angka_harapan_hidup_kabupaten" class="form-control" value="{{ $item->angka_harapan_hidup_kabupaten }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Angka Harapan Hidup Provinsi *</label>
                                                <input type="number" name="angka_harapan_hidup_provinsi" class="form-control" value="{{ $item->angka_harapan_hidup_provinsi }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Angka Harapan Hidup Nasional *</label>
                                                <input type="number" name="angka_harapan_hidup_nasional" class="form-control" value="{{ $item->angka_harapan_hidup_nasional }}" required>
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
                        <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('perkembangan.kesehatan-masyarakat.subsektor-harapan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Data?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus data tanggal <strong>{{ $item->tanggal->format('d-m-Y') }}</strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('perkembangan.kesehatan-masyarakat.subsektor-harapan.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Subsektor Harapan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Angka Harapan Hidup Desa/Kelurahan *</label>
                        <input type="number" name="angka_harapan_hidup_desa" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Angka Harapan Hidup Kabupaten/Kota *</label>
                        <input type="number" name="angka_harapan_hidup_kabupaten" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Angka Harapan Hidup Provinsi *</label>
                        <input type="number" name="angka_harapan_hidup_provinsi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Angka Harapan Hidup Nasional *</label>
                        <input type="number" name="angka_harapan_hidup_nasional" class="form-control" required>
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
    $(document).ready(() => $('#subsektor-harapan-table').DataTable());
</script>
@endpush
