@extends('layouts.master')

@section('title', 'Data Adat Istiadat Desa dan Kelurahan')

@section('action')
    <a href="{{ route('perkembangan.peransertamasyarakat.adatistiadat.create') }}" class="btn btn-primary mb-3">
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
            <table id="adatistiadat-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">Perkawinan</th>
                        <th class="text-center">Kelahiran Anak</th>
                        <th class="text-center">Upacara Kematian</th>
                        <th class="text-center">Pengelolaan Hutan</th>
                        <th class="text-center">Tanah Pertanian</th>
                        <th class="text-center">Pengelolaan Laut/Pantai</th>
                        <th class="text-center">Memecahkan Konflik</th>
                        <th class="text-center">Menjauhkan Bencana</th>
                        <th class="text-center">Memulihkan Hubungan Alam-Manusia</th>
                        <th class="text-center">Penanggulangan Kemiskinan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->desa->nama_desa ?? '-' }}</td>

                        {{-- Badge Status (Aktif / Tidak Aktif / Pernah Ada) --}}
                        <td><span class="badge bg-{{ $item->perkawinan === 'Aktif' ? 'success' : ($item->perkawinan === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->perkawinan ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->kelahiran_anak === 'Aktif' ? 'success' : ($item->kelahiran_anak === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->kelahiran_anak ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->upacara_kematian === 'Aktif' ? 'success' : ($item->upacara_kematian === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->upacara_kematian ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->pengelolaan_hutan === 'Aktif' ? 'success' : ($item->pengelolaan_hutan === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->pengelolaan_hutan ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->tanah_pertanian === 'Aktif' ? 'success' : ($item->tanah_pertanian === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->tanah_pertanian ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->pengelolaan_laut === 'Aktif' ? 'success' : ($item->pengelolaan_laut === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->pengelolaan_laut ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->memecahkan_konflik === 'Aktif' ? 'success' : ($item->memecahkan_konflik === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->memecahkan_konflik ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->menjauhkan_bala === 'Aktif' ? 'success' : ($item->menjauhkan_bala === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->menjauhkan_bala ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->memulihkan_hubungan_alam === 'Aktif' ? 'success' : ($item->memulihkan_hubungan_alam === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->memulihkan_hubungan_alam ?? '-' }}</span></td>
                        <td><span class="badge bg-{{ $item->penanggulangan_kemiskinan === 'Aktif' ? 'success' : ($item->penanggulangan_kemiskinan === 'Pernah Ada' ? 'warning' : 'secondary') }}">{{ $item->penanggulangan_kemiskinan ?? '-' }}</span></td>

                        <td>
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('perkembangan.peransertamasyarakat.adatistiadat.show', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('perkembangan.peransertamasyarakat.adatistiadat.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-adat-{{ $item->id }}">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="delete-adat-{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Data adat istiadat tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                <p>Yakin ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('perkembangan.peransertamasyarakat.adatistiadat.destroy', $item->id) }}" method="POST">
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
        $('#adatistiadat-table').DataTable();
    });
</script>
@endpush
