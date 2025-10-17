@extends('layouts.master')

@section('title', 'Data Lembaga Adat')

@section('action')
    <a href="{{ route('potensi.kelembagaan.adat.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="adat-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pemangku Adat</th>
                            <th>Kepengurusan Adat</th>
                            <th>Rumah Adat</th>
                            <th>Barang Pusaka</th>
                            <th>Naskah-Naskah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2025-10-02</td>
                            <td>Tokoh Adat 1</td>
                            <td>Pengurus 1</td>
                            <td>Ya</td>
                            <td>Ya</td>
                            <td>Ya</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.adat.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.adat.edit') }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.adat.print', 1) }}" target="_blank"
                                        class="btn btn-sm btn-secondary">
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
                                                <p>Data Lembaga Adat tanggal <strong>2025-10-02</strong> akan dihapus
                                                    permanen.</p>
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
                            <td>Tokoh Adat 2</td>
                            <td>Pengurus 2</td>
                            <td>Tidak</td>
                            <td>Ya</td>
                            <td>Tidak</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.adat.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.adat.edit') }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.adat.print', 1) }}" target="_blank"
                                        class="btn btn-sm btn-secondary">
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
                                                <p>Data Lembaga Adat tanggal <strong>2025-09-15</strong> akan dihapus
                                                    permanen.</p>
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
            $('#adat-table').DataTable();
        });
    </script>
@endpush
