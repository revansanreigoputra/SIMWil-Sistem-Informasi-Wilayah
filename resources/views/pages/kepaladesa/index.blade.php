@extends('layouts.master')

@section('title', 'Data Kepala Desa')

@section('action')
    @can('kepala-desa.create')
        <a href="{{ route('kepala-desa.create') }}" class="btn btn-primary">Tambah Data</a>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="kepala-desa-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Kepala Desa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kontak</th>
                            <th>Masa Jabatan</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kepalaDesas as $kepalaDesa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($kepalaDesa->foto)
                                        <img src="{{ asset('storage/' . $kepalaDesa->foto) }}"
                                            alt="{{ $kepalaDesa->nama_kepala_desa }}" class="rounded"
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="rounded bg-secondary d-flex align-items-center justify-content-center"
                                            style="width: 50px; height: 50px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $kepalaDesa->nama_kepala_desa }}</strong>
                                    @if ($kepalaDesa->tanggal_lahir)
                                        <small class="text-muted d-block">Lahir:
                                            {{ $kepalaDesa->tanggal_lahir->format('d/m/Y') }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span
                                        class="text-white badge 
                                @if ($kepalaDesa->jenis_kelamin === 'L') bg-primary
                                @else bg-pink @endif">
                                        {{ $kepalaDesa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </span>
                                </td>
                                <td>
                                    @if ($kepalaDesa->kontak)
                                        <span class="text-muted">{{ $kepalaDesa->kontak }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($kepalaDesa->masa_jabatan)
                                        <span class="text-muted">{{ $kepalaDesa->masa_jabatan }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($kepalaDesa->alamat)
                                        <span class="text-muted">{{ Str::limit($kepalaDesa->alamat, 50) }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @canany(['kepala-desa.view', 'kepala-desa.update', 'kepala-desa.delete'])
                                        <div class="d-flex gap-1">
                                            @can('kepala-desa.view')
                                                <a href="{{ route('kepala-desa.show', $kepalaDesa->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                    Detail
                                                </a>
                                            @endcan
                                            @can('kepala-desa.update')
                                                <a href="{{ route('kepala-desa.edit', $kepalaDesa->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                    Edit
                                                </a>
                                            @endcan
                                            @can('kepala-desa.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-kepala-desa-{{ $kepalaDesa->id }}">
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

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete-kepala-desa-{{ $kepalaDesa->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Kepala Desa?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data kepala desa
                                                            <strong>{{ $kepalaDesa->nama_kepala_desa }}</strong> yang dihapus
                                                            tidak bisa dikembalikan.</p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('kepala-desa.destroy', $kepalaDesa->id) }}"
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#kepala-desa-table').DataTable();
        });
    </script>
@endpush
