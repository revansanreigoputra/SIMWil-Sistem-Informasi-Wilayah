@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Format Nomor Surat</h4>
    </div>
@endsection

{{-- @section('action')
    <a href="#" class="btn btn-primary mb-3 d-flex align-items-center gap-1">
        <i class="fas fa-plus"></i> Tambah Format
    </a>
@endsection --}}

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Search Bar --}}
            {{-- <div class="row mb-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">
                        <i class="fas fa-search"></i> Cari Format Nomor
                    </label>
                    <input type="text" id="search" class="form-control" placeholder="Cari format nomor surat...">
                </div>
            </div> --}}

            {{-- Table --}}
            <div class="table-responsive">
                <table id="format-nomor-table" class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Kode Surat</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>/21/SKUMUM/DS/</td>
                            <td>SURAT KETERANGAN UMUM</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('layanan.template.format_nomor.edit', 1) }}"
                                        class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger d-flex align-items-center gap-1"
                                        data-bs-toggle="modal" data-bs-target="#delete-format-1">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="delete-format-1" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Format Nomor?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Format nomor <strong>/21/SKUMUM/DS/</strong> akan dihapus permanen.</p>
                                                <p>Yakin ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>/38/DS-LB/PEM/</td>
                            <td>SURAT KETERANGAN KEMATIAN</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('layanan.template.format_nomor.edit', 2) }}"
                                        class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>/10/SKT/DS-LB/</td>
                            <td>SURAT KETERANGAN BELUM PERNAH NIKAH</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('layanan.template.format_nomor.edit', 3) }}"
                                        class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        {{-- Tambahkan baris lain sesuai kebutuhan --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(function() {
            $('#format-nomor-table').DataTable();
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 2000);
        });
    </script>
@endpush
