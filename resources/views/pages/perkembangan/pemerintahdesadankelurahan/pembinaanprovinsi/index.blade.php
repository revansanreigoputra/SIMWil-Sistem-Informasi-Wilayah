@extends('layouts.master')

@section('title', 'Data Pembinaan Pemerintah Provinsi')

@section('action')
    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.create') }}" class="btn btn-primary mb-3">
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
            <table id="pembinaan-provinsi-table" class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pedoman Pelaksanaan</th>
                        <th>Pedoman Pembiayaan</th>
                        <th>Pedoman Administrasi</th>
                        <th>Pedoman Tanda Jabatan</th>
                        <th>Pedoman Diklat</th>
                        <th>Jumlah Bimbingan</th>
                        <th>Jumlah Kegiatan Pendidikan</th>
                        <th>Jumlah Penelitian</th>
                        <th>Jumlah Kegiatan APBN</th>
                        <th>Jumlah Penghargaan</th>
                        <th>Jumlah Sanksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal->format('Y-m-d') }}</td>
                            <td><span class="badge bg-{{ $item->pedoman_pelaksanaan_urusan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_pelaksanaan_urusan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pedoman_bantuan_pembiayaan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_bantuan_pembiayaan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pedoman_administrasi === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_administrasi ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pedoman_tanda_jabatan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_tanda_jabatan ?? '-' }}</span></td>
                            <td><span class="badge bg-{{ $item->pedoman_pendidikan_pelatihan === 'Ada' ? 'success' : 'secondary' }}">{{ $item->pedoman_pendidikan_pelatihan ?? '-' }}</span></td>
                            <td>{{ $item->jumlah_bimbingan ?? '-' }}</td>
                            <td>{{ $item->jumlah_kegiatan_pendidikan ?? '-' }}</td>
                            <td>{{ $item->jumlah_penelitian_pengkajian ?? '-' }}</td>
                            <td>{{ $item->jumlah_kegiatan_terkait_apbn ?? '-' }}</td>
                            <td>{{ $item->jumlah_penghargaan ?? '-' }}</td>
                            <td>{{ $item->jumlah_sanksi ?? '-' }}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <!-- Tombol Hapus dengan Modal -->
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-pembinaanprovinsi-{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete-pembinaanprovinsi-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data pada tanggal <strong>{{ $item->tanggal->format('d-m-Y') }}</strong> akan dihapus permanen.</p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.pemerintahdesadankelurahan.pembinaanprovinsi.destroy', $item->id) }}"
                                                          method="POST">
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
            $('#pembinaan-provinsi-table').DataTable();
        });
    </script>
@endpush
