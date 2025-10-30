@extends('layouts.master')

@section('title', 'Data Kepala Keluarga')

@section('action')
<<<<<<< HEAD
    @can('data_keluarga.create')
        <a href="{{ route('data_keluarga.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah KK
=======
    <div class="card-header d-flex justify-content-between align-items-center">

        <button type="button" class="btn  btn-outline-primary mb-3 me-2" data-bs-toggle="modal" data-bs-target="#importModal">
            <i class="bi bi-file-arrow-down me-2"></i> Impor Data
        </button>
        <a href="{{ route('data_keluarga.export') }}" class="btn  btn-outline-primary mb-3 me-2">
            <i class="bi bi-file-arrow-up me-2"></i> Ekspor Data
>>>>>>> 9b083ddb19f2b3af4310b3bd0b4f9c33dd402c37
        </a>
    @endcan

<<<<<<< HEAD
    <button type="button" class="btn btn-outline-info mb-3 me-2" data-bs-toggle="modal" data-bs-target="#importModal">
        <i class="bi bi-file-earmark-arrow-up"></i> Impor Data
    </button>
=======
        @can('data_keluarga.create')
            <a href="{{ route('data_keluarga.create') }}" class="btn btn-primary mb-3 ">
                <i class="bi bi-plus-circle me-2"></i>Tambah KK</a>
        @endcan
    @endsection
>>>>>>> 9b083ddb19f2b3af4310b3bd0b4f9c33dd402c37

    <a href="{{ route('data_keluarga.export') }}" class="btn btn-outline-success mb-3 me-2">
        <i class="bi bi-file-earmark-arrow-down"></i> Ekspor Data
    </a>
@endsection

@section('content')
    @can('data_keluarga.view')
        <div class="card shadow-sm">
            <div class="card-body">
<<<<<<< HEAD
                {{-- Alert Sukses --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Alert Error Import --}}
=======
              
>>>>>>> 9b083ddb19f2b3af4310b3bd0b4f9c33dd402c37
                @if (session('import_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ session('import_error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="data-keluarga-table" class="table table-striped align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>No KK</th>
                                <th>Nama Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>Desa</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataKeluargas as $index => $dataKeluarga)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dataKeluarga->no_kk ?? '-' }}</td>
                                    <td>{{ $dataKeluarga->kepala_keluarga ?? '-' }}</td>
                                    <td>{{ $dataKeluarga->alamat ?? '-' }}</td>
                                    <td>{{ $dataKeluarga->desas->nama_desa ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('data_keluarga.show')
                                                <a href="{{ route('data_keluarga.show', $dataKeluarga) }}" 
                                                   class="btn btn-sm btn-info">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                            @endcan

                                            @can('data_keluarga.edit')
                                                <a href="{{ route('data_keluarga.edit', $dataKeluarga) }}" 
                                                   class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                            @endcan

                                            {{-- DELETE pakai permission "data_keluarga.delete" --}}
                                            @can('data_keluarga.delete')
                                                <form action="{{ route('data_keluarga.destroy', $dataKeluarga) }}" 
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted">
                                        Belum ada data keluarga.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal Impor --}}
        <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="importModalLabel">Impor Data Keluarga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('data_keluarga.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Unduh template impor untuk memastikan format data Anda benar.</p>
<<<<<<< HEAD
                            <a href="{{ route('data_keluarga.template') }}" class="btn btn-warning mb-3">
                                <i class="bi bi-download"></i> Unduh Template Excel
=======
                            <a href="{{ route('data_keluarga.template') }}" class="btn btn-outline-primary mb-3">
                                <i class="bi bi-download me-2"></i> Unduh Template Excel
>>>>>>> 9b083ddb19f2b3af4310b3bd0b4f9c33dd402c37
                            </a>

                            <div class="mb-3">
                                <label for="file" class="form-label">Pilih File Excel (.xlsx, .xls, .csv)</label>
                                <input type="file" class="form-control" id="file" name="file" required>
                            </div>
<<<<<<< HEAD

                            <div class="alert alert-warning">
                                Pastikan kolom foreign key (misal: DESA_ID, AGAMA_ID) berisi **ID** yang sesuai dari tabel referensi.
=======
                            <div class="alert alert-warning" role="alert">
                                Pastikan kolom yang terdapat tanda * wajib diisi. 
>>>>>>> 9b083ddb19f2b3af4310b3bd0b4f9c33dd402c37
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Mulai Impor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        {{-- Pesan jika pengguna tidak punya izin --}}
        <div class="alert alert-danger text-center">
            <h4 class="alert-heading">Akses Ditolak!</h4>
            <p>Maaf, Anda tidak memiliki izin untuk melihat data ini. Silakan hubungi Administrator.</p>
        </div>
    @endcan
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#data-keluarga-table').DataTable({
                pageLength: 10,
                responsive: true
            });

            // Hilangkan alert otomatis setelah 3 detik
            setTimeout(() => $('.alert-success').fadeOut('slow'), 3000);
        });
    </script>
@endpush
