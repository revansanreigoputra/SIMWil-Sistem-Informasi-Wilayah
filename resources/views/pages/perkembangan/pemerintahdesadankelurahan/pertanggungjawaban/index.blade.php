@extends('layouts.master')

@section('title', 'Data Pertanggungjawaban Kepala Desa/Lurah')

@section('action')
    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table id="pertanggungjawaban-table" class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Penyampaian Laporan Kepala Desa ke BPD</th>
                            <th>Jumlah Informasi yang Disampakan</th>
                            <th>Status Laporan Pertanggungjawaban</th>
                            <th>Laporan Kinerja Kepala Desa/Lurah</th>
                            <th>Jumlah Media Informasi</th>
                            <th>Pengaduan (Selesai/Diterima)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>
                                    @if($item->penyampaian_laporan === 'ada')
                                        <span class="badge bg-success">Ada</span>
                                    @elseif($item->penyampaian_laporan === 'tidak_ada')
                                        <span class="badge bg-danger">Tidak Ada</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->jumlah_informasi ?? '-' }}</td>
                                <td>
                                    @if($item->status_laporan === 'diterima')
                                        <span class="badge bg-success">Diterima</span>
                                    @elseif($item->status_laporan === 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->laporan_kinerja === 'diterima')
                                        <span class="badge bg-success">Diterima</span>
                                    @elseif($item->laporan_kinerja === 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->jumlah_media_informasi ?? '-' }}</td>
                                <td class="text-center">{{ $item->jumlah_pengaduan_selesai ?? 0 }} / {{ $item->jumlah_pengaduan_diterima ?? 0 }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.edit', $item->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-pertanggungjawaban-{{ $item->id }}">
                                            Hapus
                                        </button>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="delete-pertanggungjawaban-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data pertanggungjawaban tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
            $('#pertanggungjawaban-table').DataTable();
        });
    </script>
@endpush
