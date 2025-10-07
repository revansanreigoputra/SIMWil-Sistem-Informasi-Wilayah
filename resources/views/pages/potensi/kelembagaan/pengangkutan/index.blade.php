@extends('layouts.master')

@section('title', 'Data Usaha Jasa Pengangkutan')

@section('action')
    <a href="{{ route('potensi.kelembagaan.pengangkutan.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="pengangkutan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Jenis Angkutan</th>
                            <th>Jumlah Unit</th>
                            <th>Jumlah Pemilik</th>
                            <th>Kapasitas</th>
                            <th>Tenaga Kerja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh data statis -->
                        <tr>
                            <td>1</td>
                            <td>2025-10-02</td>
                            <td>Angkutan Penumpang</td>
                            <td>Bus</td>
                            <td>5</td>
                            <td>3</td>
                            <td>40</td>
                            <td>10</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.pengangkutan.show') }}"
                                        class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pengangkutan.edit') }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pengangkutan.print', 1) }}" target="_blank"
                                        class="btn btn-sm btn-secondary">
                                        <i class="bi bi-printer"></i> Print
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal2">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2025-10-02</td>
                            <td>Angkutan Barang</td>
                            <td>Truk</td>
                            <td>3</td>
                            <td>2</td>
                            <td>20</td>
                            <td>5</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.pengangkutan.show') }}"
                                        class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pengangkutan.edit') }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.pengangkutan.print', 1) }}" target="_blank"
                                        class="btn btn-sm btn-secondary">
                                        <i class="bi bi-printer"></i> Print
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal2">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Tambahkan data lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#pengangkutan-table').DataTable();
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 2000);
        });
    </script>
@endpush
