@extends('layouts.master')

@section('title', 'Data Perkembangan Penduduk')

@section('action')
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">+ Data Baru</button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="perkembangan-penduduk-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jml Laki-laki Thn Ini</th>
                            <th>Jml Perempuan Thn Ini</th>
                            <th>Jml Laki-laki Thn Lalu</th>
                            <th>Jml Perempuan Thn Lalu</th>
                            <th>Jml KK Lk Thn Ini</th>
                            <th>Jml KK Pr Thn Ini</th>
                            <th>Jml KK Lk Thn Lalu</th>
                            <th>Jml KK Pr Thn Lalu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perkembangan_penduduks as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->jumlah_laki_laki_tahun_ini }}</td>
                                <td>{{ $item->jumlah_perempuan_tahun_ini }}</td>
                                <td>{{ $item->jumlah_laki_laki_tahun_lalu }}</td>
                                <td>{{ $item->jumlah_perempuan_tahun_lalu }}</td>
                                <td>{{ $item->jumlah_kepala_keluarga_laki_laki_tahun_ini }}</td>
                                <td>{{ $item->jumlah_kepala_keluarga_perempuan_tahun_ini }}</td>
                                <td>{{ $item->jumlah_kepala_keluarga_laki_laki_tahun_lalu }}</td>
                                <td>{{ $item->jumlah_kepala_keluarga_perempuan_tahun_lalu }}</td>
                                <td>
                                    {{-- Menggunakan @canany untuk otorisasi --}}
                                    @canany(['perkembangan-penduduk.view', 'perkembangan-penduduk.update', 'perkembangan-penduduk.delete'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            @can('perkembangan-penduduk.update')
                                                <a href="{{ route('perkembangan-penduduk.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            @endcan
                                            @can('perkembangan-penduduk.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-modal-{{ $item->id }}">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            @endcan
                                        </div>

                                        <div class="modal fade" id="delete-modal-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Yakin ingin menghapus data perkembangan penduduk pada tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong>?
                                                        Data yang dihapus tidak bisa dikembalikan.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('perkembangan-penduduk.destroy', $item->id) }}" method="POST">
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
    <!-- Modal Tambah Data -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Data Perkembangan Penduduk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('perkembangan-penduduk.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_laki_laki_tahun_ini" class="form-label">Jumlah Laki-laki Tahun Ini</label>
                            <input type="number" class="form-control" name="jumlah_laki_laki_tahun_ini" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_perempuan_tahun_ini" class="form-label">Jumlah Perempuan Tahun Ini</label>
                            <input type="number" class="form-control" name="jumlah_perempuan_tahun_ini" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_laki_laki_tahun_lalu" class="form-label">Jumlah Laki-laki Tahun Lalu</label>
                            <input type="number" class="form-control" name="jumlah_laki_laki_tahun_lalu" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_perempuan_tahun_lalu" class="form-label">Jumlah Perempuan Tahun Lalu</label>
                            <input type="number" class="form-control" name="jumlah_perempuan_tahun_lalu" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_kepala_keluarga_laki_laki_tahun_ini" class="form-label">Jumlah KK Laki-laki Tahun Ini</label>
                            <input type="number" class="form-control" name="jumlah_kepala_keluarga_laki_laki_tahun_ini" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_kepala_keluarga_perempuan_tahun_ini" class="form-label">Jumlah KK Perempuan Tahun Ini</label>
                            <input type="number" class="form-control" name="jumlah_kepala_keluarga_perempuan_tahun_ini" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_kepala_keluarga_laki_laki_tahun_lalu" class="form-label">Jumlah KK Laki-laki Tahun Lalu</label>
                            <input type="number" class="form-control" name="jumlah_kepala_keluarga_laki_laki_tahun_lalu" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jumlah_kepala_keluarga_perempuan_tahun_lalu" class="form-label">Jumlah KK Perempuan Tahun Lalu</label>
                            <input type="number" class="form-control" name="jumlah_kepala_keluarga_perempuan_tahun_lalu" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#perkembangan-penduduk-table').DataTable();
        });
    </script>
@endpush