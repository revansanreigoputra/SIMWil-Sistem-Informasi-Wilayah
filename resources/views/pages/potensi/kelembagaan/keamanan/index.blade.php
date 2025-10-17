@extends('layouts.master')

@section('title', 'Data Lembaga Keamanan')

@section('action')
    <a href="{{ route('potensi.kelembagaan.keamanan.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Data Lembaga Keamanan</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="keamanan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keberadaan Hansip & Linmas</th>
                        <th>Jumlah Hansip</th>
                        <th>Jumlah Satgas Linmas</th>
                        <th>Pelaksanaan Siskamling</th>
                        <th>Jumlah Pos Kamling</th>
                        <th>Keberadaan Satpam</th>
                        <th>Jumlah Satpam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2025-10-02</td>
                        <td>Ada</td>
                        <td>15</td>
                        <td>10</td>
                        <td>Ya</td>
                        <td>5</td>
                        <td>Ada</td>
                        <td>12</td>
                        <td>
                            <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.keamanan.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.keamanan.edit') }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.keamanan.print', 1) }}" target="_blank" class="btn btn-sm btn-secondary">
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
                        <td>2025-10-03</td>
                        <td>Ada</td>
                        <td>10</td>
                        <td>8</td>
                        <td>Tidak</td>
                        <td>2</td>
                        <td>Ada</td>
                        <td>6</td>
                        <td>
                             <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('potensi.kelembagaan.keamanan.show') }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.keamanan.edit') }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <a href="{{ route('potensi.kelembagaan.keamanan.print', 1) }}" target="_blank" class="btn btn-sm btn-secondary">
                                        <i class="bi bi-printer"></i> Print
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal2">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                        </td>
                    </tr>
                    <!-- Tambahkan baris data sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#keamanan-table').DataTable();
        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 2000);
    });
</script>
@endpush
