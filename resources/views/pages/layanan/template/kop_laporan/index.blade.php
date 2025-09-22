@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Kop Laporan</h4>
    </div>
@endsection


@section('content')
<div class="container mt-5">
    {{-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">📑 Kop Laporan</h3>
        <a href="#" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Kop
        </a>
    </div> --}}

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th style="width: 60px;">No</th>
                            <th>Kop Laporan</th>
                            <th style="width: 180px;">Logo</th>
                            <th style="width: 160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data dummy tanpa database --}}
                        <tr>
                            <td class="text-center fw-semibold">1</td>
                            <td>
                                <strong>PEMERINTAH PROVINSI JAWA BARAT</strong><br>
                                KABUPATEN YOGYAKARTA
                            </td>
                            <td class="text-center">
                                <img src="{{ asset('images/logo_dummy.png') }}" 
                                     alt="Logo" 
                                     class="img-fluid rounded shadow-sm" 
                                     width="80">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('layanan.template.kop_laporan.edit') }}" 
                                   class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="confirm('Yakin ingin hapus data ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Pagination dummy
            <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Menampilkan 1 - 2 dari 2 data</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link">Awal</a></li>
                        <li class="page-item active"><a class="page-link">1</a></li>
                        <li class="page-item disabled"><a class="page-link">Akhir</a></li>
                    </ul>
                </nav>
            </div> --}}
        </div>
    </div>
</div>
@endsection
