@extends('layouts.master')

@section('title', 'Data Usaha Jasa, Hiburan, dll')

@section('action')
    {{-- Tombol Tambah Data, memerlukan izin 'hiburan.create' --}}
    @can('hiburan.create')
        <a href="{{ route('potensi.potensi-kelembagaan.hiburan.create') }}" class="btn btn-primary mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
    @endcan
@endsection

@section('content')
    {{-- Seluruh konten halaman ini memerlukan izin 'hiburan.index' --}}
    @can('hiburan.index')
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="hiburan-table" class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Jenis Usaha</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($hiburan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $item->kategori->nama ?? '-' }}</td>
                                    <td>{{ $item->jenisUsaha->nama ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-1 justify-content-center">
                                            {{-- Tombol Detail, memerlukan izin 'hiburan.show' --}}
                                            @can('hiburan.show')
                                                <a href="{{ route('potensi.potensi-kelembagaan.hiburan.show', $item->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="bi bi-eye"></i> Detail
                                                </a>
                                            @endcan

                                            {{-- Tombol Edit, memerlukan izin 'hiburan.edit' --}}
                                            @can('hiburan.edit')
                                                <a href="{{ route('potensi.potensi-kelembagaan.hiburan.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                            @endcan
                                            
                                            {{-- Tombol Print, memerlukan izin 'hiburan.print' --}}
                                            @can('hiburan.print')
                                                <button class="btn btn-sm btn-success"
                                                    onclick="downloadAndOpen({{ $item->id }})">
                                                    <i class="bi bi-printer"></i> Print
                                                </button>
                                            @endcan

                                            {{-- Tombol Hapus, memerlukan izin 'hiburan.delete' --}}
                                            @can('hiburan.delete')
                                                <form
                                                    action="{{ route('potensi.potensi-kelembagaan.hiburan.destroy', $item->id) }}"
                                                    method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                                    <td colspan="5" class="text-center text-muted">Belum ada data usaha hiburan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        {{-- Pesan jika pengguna tidak punya izin 'hiburan.index' --}}
        <div class="alert alert-danger text-center">
            <h4 class="alert-heading">Akses Ditolak!</h4>
            <p>Maaf, Anda tidak memiliki izin untuk melihat data ini. Silakan hubungi Administrator.</p>
        </div>
    @endcan
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#hiburan-table').DataTable();
        });

        function downloadAndOpen(id) {
            // Cek izin di frontend bersifat opsional, karena backend sudah memproteksi route
            // Namun, ini bisa memberikan feedback lebih cepat jika diperlukan.
            // Untuk saat ini, kita asumsikan jika tombol terlihat, user punya izin.
            const downloadUrl = `/potensi/potensi-kelembagaan/hiburan/${id}/download`;
            const previewUrl = `/potensi/potensi-kelembagaan/hiburan/${id}/print`;

            // Membuat elemen link sementara untuk trigger download
            const a = document.createElement('a');
            a.href = downloadUrl;
            a.download = ''; // Atribut download tanpa nama file akan menyarankan nama file dari server
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);

            // Buka tab baru untuk preview/print setelah jeda singkat
            setTimeout(() => {
                window.open(previewUrl, '_blank');
            }, 1500);
        }
    </script>
@endpush