@extends('layouts.master')

@section('title', 'Data Lembaga Pemerintahan')

@section('action')
    <a href="{{ route('potensi.kelembagaan.pemerintah.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="pemerintah-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Dasar Hukum Pembentukan</th>
                            <th>Dasar Hukum BPD</th>
                            <th>Jumlah Aparat</th>
                            <th>Jumlah Perangkat Desa</th>
                            <th>Kepala Desa</th>
                            <th>Sekretaris Desa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2025-10-02</td>
                            <td>Peraturan Desa No. 1/2020</td>
                            <td>Peraturan BPD No. 2/2020</td>
                            <td>10</td>
                            <td>5</td>
                            <td>Ahmad</td>
                            <td>Siti</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.pemerintah.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pemerintah.edit') }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pemerintah.print', 1) }}" target="_blank" class="btn btn-sm btn-secondary">
                                        <i class="bi bi-printer"></i> Print
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal2">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal1" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Data dengan tanggal <strong>2025-10-02</strong> akan dihapus permanen.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2025-09-15</td>
                            <td>Peraturan Desa No. 3/2019</td>
                            <td>Peraturan BPD No. 4/2019</td>
                            <td>12</td>
                            <td>6</td>
                            <td>Budi</td>
                            <td>Ayu</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.pemerintah.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pemerintah.edit') }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pemerintah.print', 1) }}" target="_blank" class="btn btn-sm btn-secondary">
                                        <i class="bi bi-printer"></i> Print
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal2">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>

                                <div class="modal fade" id="deleteModal2" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Data dengan tanggal <strong>2025-09-15</strong> akan dihapus permanen.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#pemerintah-table').DataTable();
        });
    </script>
@endpush
