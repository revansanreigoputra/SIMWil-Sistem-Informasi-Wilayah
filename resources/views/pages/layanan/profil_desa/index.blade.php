@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Profil Desa</h4>
    </div>
@endsection

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Provinsi</th>
                            <th>Kabupaten/Kota</th>
                            <th>Kecamatan</th>
                            <th>Status</th>
                            <th>Desa/Kelurahan</th>
                            <th style="width: 120px;">Logo</th>
                            <th>Dibuat / Diupdate</th>
                            <th style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data Dummy --}}
                        <tr>
                            <td class="text-center fw-semibold">1</td>
                            <td>KEPULAUAN RIAU</td>
                            <td>LINGGA</td>
                            <td>LINGGA</td>
                            <td><span class="badge bg-primary">Desa</span></td>
                            <td>DABO BARU</td>
                            <td class="text-center">
                                <img src="{{ asset('images/logo_desa.png') }}" 
                                     alt="Logo Desa" 
                                     class="img-fluid rounded shadow-sm" 
                                     width="60">
                            </td>
                            <td>
                                <small class="text-muted">
                                    Administrator <br> (11 September 2025)
                                </small>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('layanan.profil_desa.edit') }}" 
                                   class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="{{ route('layanan.profil_desa.show') }}" 
                                   class="btn btn-sm btn-dark">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Pagination Dummy
            <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-muted">Menampilkan 1 dari 1 data</small>
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
