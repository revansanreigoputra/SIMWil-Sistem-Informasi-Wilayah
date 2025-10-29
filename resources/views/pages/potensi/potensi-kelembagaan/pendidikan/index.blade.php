@extends('layouts.master')

@section('title', 'Data Lembaga Pendidikan Formal')

@section('action')
@can('pendidikan.create')
    <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Data
    </a>
@endcan
@endsection

@section('content')
{{-- Seluruh konten halaman ini memerlukan izin 'pendidikan.index' --}}
@can('pendidikan.index')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="pendidikan-table" class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Jenis Sekolah</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->kategori->nama ?? '-' }}</td>
                                <td>{{ $item->jenisSekolah->nama ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Tombol Detail, memerlukan izin 'pendidikan.show' --}}
                                        @can('pendidikan.show')
                                            <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.show', $item->id) }}"
                                               class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                        @endcan

                                        {{-- Tombol Edit, memerlukan izin 'pendidikan.edit' --}}
                                        @can('pendidikan.edit')
                                            <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.edit', $item->id) }}"
                                               class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        @endcan

                                        {{-- Tombol Print, memerlukan izin 'pendidikan.print' --}}
                                        @can('pendidikan.print')
                                            <button class="btn btn-sm btn-success"
                                                onclick="downloadAndOpen({{ $item->id }})">
                                                <i class="bi bi-printer"></i> Print
                                            </button>
                                        @endcan
                                        
                                        {{-- Tombol Hapus, memerlukan izin 'pendidikan.delete' --}}
                                        @can('pendidikan.delete')
                                            <form action="{{ route('potensi.potensi-kelembagaan.pendidikan.destroy', $item->id) }}"
                                                  method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
                                <td colspan="5" class="text-center text-muted">Belum ada data lembaga pendidikan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    {{-- Pesan jika pengguna tidak punya izin 'pendidikan.index' --}}
    <div class="alert alert-danger text-center">
        <h4 class="alert-heading">Akses Ditolak!</h4>
        <p>Maaf, Anda tidak memiliki izin untuk melihat data ini. Silakan hubungi Administrator.</p>
    </div>
@endcan
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#pendidikan-table').DataTable();
        });

        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/pendidikan/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/pendidikan/${id}/print`;

            const a = document.createElement('a');
            a.href = downloadUrl;
            a.download = '';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);

            setTimeout(() => {
                window.open(previewUrl, '_blank');
            }, 1500);
        }
    </script>
@endpush