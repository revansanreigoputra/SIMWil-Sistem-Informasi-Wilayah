@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-user-edit text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Data Mutasi Penduduk</h4>
    </div>
@endsection

@section('action')
    <a href="{{ route('mutasi.data.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@if (session('success'))
    {{-- Notifikasi ini akan kita targetkan dengan JavaScript --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- Filter --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jenis" class="form-label required">
                            <i class="fas fa-list-ul"></i> Jenis Mutasi
                        </label>
                        <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror"
                            required>
                            <option value="">-- Pilih Jenis Mutasi --</option>
                            @foreach (['pendatang', 'pindah', 'meninggal'] as $item)
                                <option value="{{ $item }}" {{ old('jenis') == $item ? 'selected' : '' }}>
                                    {{ ucfirst($item) }}
                                </option>
                            @endforeach
                        </select>
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="filter-tanggal" class="form-label">Filter Tanggal</label>
                    <input type="date" id="filter-tanggal" class="form-control">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button id="btn-filter" type="button" class="btn btn-primary d-flex align-items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon">
                            <path d="M3 4h18l-7 8v6l-4 2v-8z"></path>
                        </svg>
                        Filter
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="mutasi-data-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Jenis</th>
                                <th>Penyebab</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mutasiDatas as $index => $mutasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mutasi->nik }}</td>
                                    <td>{{ $mutasi->nomor }}</td>
                                    <td>{{ $mutasi->tanggal->format('d M Y') }}</td>
                                    <td>{{ $mutasi->jenis }}</td>
                                    <td>{{ $mutasi->penyebab }}</td>
                                    <td>{{ $mutasi->kecamatan }}</td>
                                    <td>{{ $mutasi->desa }}</td>
                                    <td>
                                        @canany(['mutasi.data.view', 'mutasi.data.update', 'mutasi.data.delete'])
                                            <div class="d-flex gap-1">
                                                @can('mutasi.data.view')
                                                    <a href="{{ route('mutasi.data.show', $mutasi->id) }}"
                                                        class="btn btn-sm btn-info d-flex align-items-center gap-1">
                                                        {{-- Ikon detail (mata) --}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="3" />
                                                            <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7z" />
                                                        </svg>
                                                        Detail
                                                    </a>
                                                @endcan
                                                @can('mutasi.data.update')
                                                    <a href="{{ route('mutasi.data.edit', $mutasi->id) }}"
                                                        class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                                        {{-- Ikon edit (pensil) --}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path
                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                        Edit
                                                    </a>
                                                @endcan
                                                @can('mutasi.data.destroy')
                                                    <button class="btn btn-sm btn-danger d-flex align-items-center gap-1"
                                                        data-bs-toggle="modal" data-bs-target="#delete-mutasi-{{ $mutasi->id }}">
                                                        {{-- Ikon hapus (trash) --}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                @endcan
                                            </div>

                                            <!-- Modal Konfirmasi Hapus -->
                                            <div class="modal fade" id="delete-mutasi-{{ $mutasi->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Hapus Data Mutasi?</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Data mutasi <strong>{{ $mutasi->nik }}</strong> akan dihapus
                                                                dan tidak bisa dikembalikan.</p>
                                                            <p>Yakin ingin menghapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form action="{{ route('mutasi.data.destroy', $mutasi->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-muted">Tidak ada aksi</span>
                                        @endcanany
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data mutasi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @push('addon-script')
        <script>
            $(function() {
                $('#mutasi-data-table').DataTable();
                setTimeout(function() {
                    $('.alert-success').fadeOut('slow');
                }, 2000);

            });
        </script>
    @endpush
