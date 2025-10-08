@extends('layouts.master')

@section('title', 'Daftar - KUALITAS IBU HAMIL')

@section('action')
    {{-- TOMBOL +DATA BARU --}}
    @can('kualitas-ibu-hamil.create')
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        + Data Baru
    </button>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kualitas-ibu-hamil-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jumlah Ibu Hamil</th>
                            <th>Total Pemeriksaan</th>
                            <th>Jumlah Melahirkan</th>
                            <th>Kematian Ibu</th>
                            <th>Ibu Nifas Hidup</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kualitas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->jumlah_ibu_hamil }}</td>
                                <td>{{ $item->total_pemeriksaan }}</td>
                                <td>{{ $item->jumlah_melahirkan }}</td>
                                <td>{{ $item->jumlah_kematian_ibu }}</td>
                                <td>{{ $item->jumlah_ibu_nifas_hidup }}</td>
                                <td>
                                    @canany(['kualitas-ibu-hamil.update', 'kualitas-ibu-hamil.delete'])
                                        <div class="d-flex gap-1 justify-content-center">

                                            {{-- Edit Button --}}
                                            @can('kualitas-ibu-hamil.update')
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $item->id }}">Edit</button>
                                            @endcan

                                            {{-- Delete Button (Menggunakan ID yang disamakan dengan Kehutanan) --}}
                                            @can('kualitas-ibu-hamil.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-kualitas-ibu-hamil-{{ $item->id }}">Hapus</button>
                                            @endcan
                                        </div>

                                        {{-- MODAL EDIT --}}
                                        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form
                                                        action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel-{{ $item->id }}">Edit Data Kualitas Ibu Hamil</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="tanggal-{{ $item->id }}">Tanggal</label>
                                                                <input type="date" name="tanggal" class="form-control" id="tanggal-{{ $item->id }}" value="{{ $item->tanggal }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jumlah_ibu_hamil-{{ $item->id }}">Jumlah Ibu Hamil</label>
                                                                <input type="number" name="jumlah_ibu_hamil" class="form-control" id="jumlah_ibu_hamil-{{ $item->id }}" value="{{ $item->jumlah_ibu_hamil }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="total_pemeriksaan-{{ $item->id }}">Total Pemeriksaan</label>
                                                                <input type="number" name="total_pemeriksaan" class="form-control" id="total_pemeriksaan-{{ $item->id }}" value="{{ $item->total_pemeriksaan }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jumlah_melahirkan-{{ $item->id }}">Jumlah Melahirkan</label>
                                                                <input type="number" name="jumlah_melahirkan" class="form-control" id="jumlah_melahirkan-{{ $item->id }}" value="{{ $item->jumlah_melahirkan }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jumlah_kematian_ibu-{{ $item->id }}">Kematian Ibu</label>
                                                                <input type="number" name="jumlah_kematian_ibu" class="form-control" id="jumlah_kematian_ibu-{{ $item->id }}" value="{{ $item->jumlah_kematian_ibu }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jumlah_ibu_nifas_hidup-{{ $item->id }}">Ibu Nifas Hidup</label>
                                                                <input type="number" name="jumlah_ibu_nifas_hidup" class="form-control" id="jumlah_ibu_nifas_hidup-{{ $item->id }}" value="{{ $item->jumlah_ibu_nifas_hidup }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- MODAL DELETE (Disesuaikan seperti contoh Kehutanan) --}}
                                        <div class="modal fade" id="delete-kualitas-ibu-hamil-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $item->id }}">Hapus Data?</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin menghapus data tanggal
                                                        <strong>{{ $item->tanggal }}</strong>?
                                                        <p>Data yang dihapus tidak bisa dikembalikan.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form
                                                            action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
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

    {{-- MODAL TAMBAH DATA BARU (CREATE) --}}
    @can('kualitas-ibu-hamil.create')
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Tambah Data Kualitas Ibu Hamil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jumlah Ibu Hamil</label>
                            <input type="number" name="jumlah_ibu_hamil" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Total Pemeriksaan</label>
                            <input type="number" name="total_pemeriksaan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jumlah Melahirkan</label>
                            <input type="number" name="jumlah_melahirkan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Kematian Ibu</label>
                            <input type="number" name="jumlah_kematian_ibu" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Ibu Nifas Hidup</label>
                            <input type="number" name="jumlah_ibu_nifas_hidup" class="form-control" required>
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
        $(document).ready(function() {
            $('#kualitas-ibu-hamil-table').DataTable();
        });
    </script>
@endpush