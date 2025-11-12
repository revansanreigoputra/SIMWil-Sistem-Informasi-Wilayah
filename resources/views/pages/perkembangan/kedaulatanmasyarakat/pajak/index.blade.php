@extends('layouts.master')

@section('title', 'Data Pajak Desa')

@section('action')
    <a href="{{ route('perkembangan.kedaulatanmasyarakat.pajak.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus me-1"></i> Tambah Data
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table id="pajak-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Jenis Pajak</th>
                        <th class="text-center">Jumlah Wajib Pajak</th>
                        <th class="text-center">Target PBB (Rp)</th>
                        <th class="text-center">Realisasi PBB (Rp)</th>
                        <th class="text-center">Penyelesaian Pungli <br> (Selesai/Jumlah)</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>

                            <!-- Data Pajak -->
                            <td class="text-center">{{ $item->jenis_pajak ?? '-' }}</td>
                            <td class="text-center">{{ number_format($item->jumlah_wajib_pajak ?? 0, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($item->target_pbb ?? 0, 0, ',', '.') }}</td>
                            <td class="text-center">{{ number_format($item->realisasi_pbb ?? 0, 0, ',', '.') }}</td>

                            <!-- Kasus Pungli -->
                            <td class="text-center">{{ $item->jumlah_penyelesaian_pungli ?? 0 }} / {{ $item->jumlah_kasus_pungli ?? 0 }}</td>

                            <!-- Tombol Aksi -->
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.pajak.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.pajak.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-pajak-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="delete-pajak-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data Pajak?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data pajak desa <strong>{{ $item->desa->nama_desa ?? '-' }}</strong> tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.kedaulatanmasyarakat.pajak.destroy', $item->id) }}" method="POST">
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
            $('#pajak-table').DataTable();
        });
    </script>
@endpush
