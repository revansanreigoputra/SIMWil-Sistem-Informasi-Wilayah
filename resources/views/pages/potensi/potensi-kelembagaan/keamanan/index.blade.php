@extends('layouts.master')

@section('title', 'Data Lembaga Keamanan')

@section('action')
@can('keamanan.create')
    <a href="{{ route('potensi.potensi-kelembagaan.keamanan.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Data
    </a>
@endcan
@endsection

@section('content')
{{-- Seluruh konten halaman ini memerlukan izin 'keamanan.index' --}}
@can('keamanan.index')
    <div class="card shadow-sm">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table id="keamanan-table" class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keberadaan Hansip & Linmas</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->keberadaan_hansip_linmas }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Tombol Detail, memerlukan izin 'keamanan.show' --}}
                                        @can('keamanan.show')
                                            <a href="{{ route('potensi.potensi-kelembagaan.keamanan.show', $item->id) }}"
                                               class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Detail
                                            </a>
                                        @endcan

                                        {{-- Tombol Edit, memerlukan izin 'keamanan.edit' --}}
                                        @can('keamanan.edit')
                                            <a href="{{ route('potensi.potensi-kelembagaan.keamanan.edit', $item->id) }}"
                                               class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                        @endcan

                                        {{-- Tombol Print, memerlukan izin 'keamanan.print' --}}
                                        @can('keamanan.print')
                                            <button class="btn btn-sm btn-success"
                                                onclick="downloadAndOpen({{ $item->id }})">
                                                <i class="bi bi-printer"></i> Print
                                            </button>
                                        @endcan

                                        {{-- Tombol Hapus, memerlukan izin 'keamanan.delete' --}}
                                        @can('keamanan.delete')
                                            <form
                                                action="{{ route('potensi.potensi-kelembagaan.keamanan.destroy', $item->id) }}"
                                                method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                <td colspan="4" class="text-center text-muted">Belum ada data lembaga keamanan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    {{-- Pesan jika pengguna tidak punya izin 'keamanan.index' --}}
    <div class="alert alert-danger text-center">
        <h4 class="alert-heading">Akses Ditolak!</h4>
        <p>Maaf, Anda tidak memiliki izin untuk melihat data ini. Silakan hubungi Administrator.</p>
    </div>
@endcan
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#keamanan-table').DataTable();
            setTimeout(function() {
                $('.alert-success').fadeOut('slow');
            }, 3000); // Durasi alert diperpanjang sedikit
        });

        function downloadAndOpen(id) {
            const downloadUrl = `/potensi/potensi-kelembagaan/keamanan/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/keamanan/${id}/print`;

            // Download PDF
            const a = document.createElement('a');
            a.href = downloadUrl;
            a.download = '';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);

            // Preview PDF
            setTimeout(() => {
                window.open(previewUrl, '_blank');
            }, 1500);
        }
    </script>
@endpush