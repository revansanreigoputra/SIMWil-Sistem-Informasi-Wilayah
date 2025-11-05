@extends('layouts.master')

@section('title', 'Data Partisipasi Politik')

@section('action')
    <a href="{{ route('perkembangan.kedaulatanmasyarakat.politik.create') }}" class="btn btn-primary mb-3">
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
            <table id="politik-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        {{-- Partai Politik & Pemilu --}}
                        <th class="text-center">Jumlah Penduduk Hak Pilih</th>
                        <th class="text-center">Pengguna Hak Pilih Pemilu Legislatif</th>
                        {{-- Pilkada --}}
                        <th class="text-center">Hak Pilih Pilkada</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>

                            {{-- Partai Politik & Pemilu --}}
                            <td class="text-center">{{ $item->jumlah_penduduk_memiliki_hak_pilih ?? '-' }}</td>
                            <td class="text-center">{{ $item->jumlah_pengguna_hak_pilih_pemilu_legislatif ?? '-' }}</td>

                            {{-- Pilkada --}}
                            <td class="text-center">{{ $item->jumlah_penduduk_memiliki_hak_pilih_pilkada ?? '-' }}</td>

                            {{-- Aksi --}}
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.politik.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.politik.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-politik-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="delete-politik-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data partisipasi politik tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.kedaulatanmasyarakat.politik.destroy', $item->id) }}" method="POST">
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
            $('#politik-table').DataTable({
                scrollX: true
            });
        });
    </script>
@endpush
