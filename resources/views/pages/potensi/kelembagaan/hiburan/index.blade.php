@extends('layouts.master')

@section('title', 'Data Lembaga Hiburan')

@section('action')
    <a href="{{ route('potensi.kelembagaan.hiburan.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="hiburan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Jenis Usaha</th>
                            <th>Jumlah</th>
                            <th>Jenis Produk yang Diperdagangkan</th>
                            <th>Jumlah Tenaga Kerja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2025-10-02</td>
                            <td>Usaha Jasa</td>
                            <td>Salon / Spa</td>
                            <td>5</td>
                            <td>2</td>
                            <td>10</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.hiburan.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.hiburan.edit') }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.hiburan.print', 1) }}" target="_blank" class="btn btn-sm btn-secondary">
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
                                                <p>Data usaha hiburan dengan kategori <strong>Usaha Jasa</strong> akan dihapus permanen.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai data -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#hiburan-table').DataTable();
        });
    </script>
@endpush
