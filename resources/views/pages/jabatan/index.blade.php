@extends('layouts.master')

@section('title', 'Data Jabatan')

@section('action')
    @can('jabatan.store')
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createJabatanModal">
            Tambah Jabatan
        </button>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="jabatan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Desa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatans as $jabatan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jabatan->nama_jabatan }}</td>
                                <td>{{ $jabatan->desa ? $jabatan->desa->nama_desa : '-' }}</td>
                                <td>
                                    @canany(['jabatan.update', 'jabatan.delete'])
                                        <div class="d-flex gap-1">
                                            @can('jabatan.update')
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editJabatanModal-{{ $jabatan->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                    Edit
                                                </button>
                                            @endcan
                                            @can('jabatan.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteJabatanModal-{{ $jabatan->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
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
                                    @else
                                        <span class="text-muted">Tidak ada aksi</span>
                                    @endcanany
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    @can('jabatan.store')
        <div class="modal fade" id="createJabatanModal" tabindex="-1" aria-labelledby="createJabatanModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createJabatanModalLabel">Tambah Jabatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('jabatan.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_jabatan" class="form-label">Nama Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror"
                                       id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }}" required>
                                @error('nama_jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="desa_id" class="form-label">Desa</label>
                                <select class="form-select @error('desa_id') is-invalid @enderror" id="desa_id" name="desa_id">
                                    <option value="">Pilih Desa</option>
                                    @foreach ($desas as $desa)
                                        <option value="{{ $desa->id }}" {{ old('desa_id') == $desa->id ? 'selected' : '' }}>
                                            {{ $desa->nama_desa }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('desa_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan

    <!-- Edit Modals -->
    @foreach ($jabatans as $jabatan)
        @can('jabatan.update')
            <div class="modal fade" id="editJabatanModal-{{ $jabatan->id }}" tabindex="-1" aria-labelledby="editJabatanModalLabel-{{ $jabatan->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editJabatanModalLabel-{{ $jabatan->id }}">Edit Jabatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama_jabatan-{{ $jabatan->id }}" class="form-label">Nama Jabatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror"
                                           id="nama_jabatan-{{ $jabatan->id }}" name="nama_jabatan"
                                           value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}" required>
                                    @error('nama_jabatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="desa_id-{{ $jabatan->id }}" class="form-label">Desa</label>
                                    <select class="form-select @error('desa_id') is-invalid @enderror" id="desa_id-{{ $jabatan->id }}" name="desa_id">
                                        <option value="">Pilih Desa</option>
                                        @foreach ($desas as $desa)
                                            <option value="{{ $desa->id }}" {{ old('desa_id', $jabatan->desa_id) == $desa->id ? 'selected' : '' }}>
                                                {{ $desa->nama_desa }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('desa_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        <!-- Delete Modal -->
        @can('jabatan.delete')
            <div class="modal fade" id="deleteJabatanModal-{{ $jabatan->id }}" tabindex="-1" aria-labelledby="deleteJabatanModalLabel-{{ $jabatan->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteJabatanModalLabel-{{ $jabatan->id }}">Hapus Jabatan?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Data jabatan <strong>{{ $jabatan->nama_jabatan }}</strong> yang dihapus tidak bisa dikembalikan.</p>
                            <p>Yakin ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    @endforeach
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#jabatan-table').DataTable();
        });
    </script>
@endpush
