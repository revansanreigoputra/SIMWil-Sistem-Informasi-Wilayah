@extends('layouts.master')

@section('title', 'Data Lembaga Pendidikan Formal')

@section('action')
    <a href="{{ route('potensi.kelembagaan.pendidikan.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="pendidikan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Jenis Sekolah</th>
                            <th>Jumlah</th>
                            <th>Jumlah Siswa</th>
                            <th>Jumlah Pengajar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2025-10-02</td>
                            <td>Formal</td>
                            <td>SD</td>
                            <td>10</td>
                            <td>200</td>
                            <td>15</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.pendidikan.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pendidikan.edit') }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pendidikan.print', 1) }}" target="_blank" class="btn btn-sm btn-secondary">
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
                                                <p>Data dengan kategori <strong>Formal</strong> (Tanggal:
                                                    <strong>2025-10-02</strong>) akan dihapus permanen.</p>
                                                <p>Yakin ingin menghapus data ini?</p>
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
                            <td>Formal</td>
                            <td>SMP</td>
                            <td>8</td>
                            <td>150</td>
                            <td>12</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.pendidikan.show') }}"
                                        class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pendidikan.edit') }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pendidikan.print', 1) }}" target="_blank" class="btn btn-sm btn-secondary">
                                        <i class="bi bi-printer"></i> Print
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal2">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="deleteModal2" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Data dengan kategori <strong>Formal</strong> (Tanggal:
                                                    <strong>2025-09-15</strong>) akan dihapus permanen.</p>
                                                <p>Yakin ingin menghapus data ini?</p>
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
            $('#pendidikan-table').DataTable();
        });
    </script>
@endpush
