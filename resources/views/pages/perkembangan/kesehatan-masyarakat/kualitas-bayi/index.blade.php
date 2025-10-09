@extends('layouts.master')

@section('title', 'Daftar - KUALITAS BAYI')

@section('action')
    @can('kualitas-bayi.create')
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            + Data Baru
        </button>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kualitas-bayi-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keguguran</th>
                            <th>Bayi Lahir</th>
                            <th>Lahir Hidup</th>
                            <th>Lahir Mati</th>
                            <th>Berat < 2.5 kg</th>
                            <th>Cacat 0-5 thn</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kualitas as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->tanggal }}</td>
                                <td class="text-center">{{ $item->jumlah_keguguran }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_lahir }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_lahir_hidup }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_lahir_mati }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_berat_kurang_25 }}</td>
                                <td class="text-center">{{ $item->jumlah_bayi_cacat }}</td>
                                <td>
                                    @canany(['kualitas-bayi.update', 'kualitas-bayi.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('kualitas-bayi.update')
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $item->id }}">Edit</button>
                                            @endcan

                                            @can('kualitas-bayi.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $item->id }}">Hapus</button>
                                            @endcan
                                        </div>

                                        {{-- MODAL EDIT --}}
                                        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Kualitas Bayi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label>Tanggal</label>
                                                                <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Keguguran</label>
                                                                <input type="number" name="jumlah_keguguran" class="form-control" value="{{ $item->jumlah_keguguran }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Bayi Lahir</label>
                                                                <input type="number" name="jumlah_bayi_lahir" class="form-control" value="{{ $item->jumlah_bayi_lahir }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Lahir Hidup</label>
                                                                <input type="number" name="jumlah_bayi_lahir_hidup" class="form-control" value="{{ $item->jumlah_bayi_lahir_hidup }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Lahir Mati</label>
                                                                <input type="number" name="jumlah_bayi_lahir_mati" class="form-control" value="{{ $item->jumlah_bayi_lahir_mati }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Berat &lt; 2.5 kg</label>
                                                                <input type="number" name="jumlah_bayi_berat_kurang_25" class="form-control" value="{{ $item->jumlah_bayi_berat_kurang_25 }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Cacat 0-5 tahun</label>
                                                                <input type="number" name="jumlah_bayi_cacat" class="form-control" value="{{ $item->jumlah_bayi_cacat }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MODAL DELETE --}}
                                        <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin menghapus data tanggal <strong>{{ $item->tanggal }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endcanany
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- MODAL CREATE --}}
    @can('kualitas-bayi.create')
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-bayi.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Kualitas Bayi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Keguguran</label>
                                <input type="number" name="jumlah_keguguran" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Bayi Lahir</label>
                                <input type="number" name="jumlah_bayi_lahir" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Lahir Hidup</label>
                                <input type="number" name="jumlah_bayi_lahir_hidup" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Lahir Mati</label>
                                <input type="number" name="jumlah_bayi_lahir_mati" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Berat &lt; 2.5 kg</label>
                                <input type="number" name="jumlah_bayi_berat_kurang_25" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Cacat 0–5 tahun</label>
                                <input type="number" name="jumlah_bayi_cacat" class="form-control" required>
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
    @endcan
@endsection

@push('addon-script')
    <script>
        $(document).ready(function () {
            $('#kualitas-bayi-table').DataTable();
        });
    </script>
@endpush
