@extends('layouts.master')

@section('title', 'Data Partisipasi Politik')

@section('action')
    <a href="{{ route('potensi.kelembagaan.politik.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="politik-table" class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Partisipasi Politik</th>
                            <th>Jumlah Wanita Hak Pilih</th>
                            <th>Jumlah Pria Hak Pilih</th>
                            <th>Jumlah Pemilih</th>
                            <th>Jumlah Wanita Memilih</th>
                            <th>Jumlah Pria Memilih</th>
                            <th>Jumlah Pengguna Hak Pilih</th>
                            <th>Persentase</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2025-10-02</td>
                            <td>Pemilu Desa</td>
                            <td>120</td>
                            <td>130</td>
                            <td>250</td>
                            <td>110</td>
                            <td>120</td>
                            <td>230</td>
                            <td>92%</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.politik.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.politik.edit') }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.politik.print', 1) }}" target="_blank" class="btn btn-sm btn-secondary">
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
                            <td>Pemilihan RT/RW</td>
                            <td>90</td>
                            <td>95</td>
                            <td>185</td>
                            <td>80</td>
                            <td>85</td>
                            <td>165</td>
                            <td>89%</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.politik.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.politik.edit') }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.politik.print', 1) }}" target="_blank" class="btn btn-sm btn-secondary">
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
            $('#politik-table').DataTable();
        });
    </script>
@endpush
