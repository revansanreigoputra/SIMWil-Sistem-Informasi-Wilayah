@extends('layouts.master')

@section('title', 'Daftar - PENDERITA SAKIT')

@section('action')
    {{-- TOMBOL +DATA BARU --}}
    @can('penderita-sakit.create')
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            + Data Baru
        </button>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="penderita-sakit-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Tanggal</th>
                            <th>Jenis Penyakit</th>
                            <th>Jumlah Penderita (Orang)</th>
                            <th>Tempat Perawatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penderitaSakit as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                 <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td class="text-center">{{ $item->jenisPenyakit->nama ?? '-' }}</td>
                                <td class="text-center">{{ number_format($item->jumlah_penderita, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $item->tempatPerawatan->nama ?? '-' }}</td>
                                <td>
                                   @canany(['penderita-sakit.edit', 'penderita-sakit.delete', 'penderita-sakit.show'])
                                        <div class="d-flex justify-content-center gap-1">
                                            @can('penderita-sakit.show')
                                                <a href="{{ route('perkembangan.kesehatan-masyarakat.penderita-sakit.show', $item->id) }}" 
                                                class="btn btn-sm btn-info">
                                                    Detail
                                                </a>
                                            @endcan

                                            @can('penderita-sakit.edit')
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $item->id }}">
                                                    Edit
                                                </button>
                                            @endcan

                                            @can('penderita-sakit.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-penderita-sakit-{{ $item->id }}">
                                                    Hapus
                                                </button>
                                            @endcan
                                        </div>
                                        </div>

                                      {{-- MODAL EDIT --}}
<div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('perkembangan.kesehatan-masyarakat.penderita-sakit.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit Data Penderita Sakit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control"
                            value="{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Jenis Penyakit *</label>
                        <select name="jenis_penyakit_id" class="form-control" required>
                            <option value="">Pilih Jenis Penyakit</option>
                            @foreach ($jenisPenyakit as $jp)
                                <option value="{{ $jp->id }}"
                                    {{ $jp->id == $item->jenis_penyakit_id ? 'selected' : '' }}>
                                    {{ $jp->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Jumlah Penderita (Orang)</label>
                        <input type="number" name="jumlah_penderita" class="form-control"
                            value="{{ $item->jumlah_penderita }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Tempat Perawatan *</label>
                        <select name="tempat_perawatan_id" class="form-control" required>
                            <option value="">Pilih Tempat Perawatan</option>
                            @foreach ($tempatPerawatan as $tp)
                                <option value="{{ $tp->id }}"
                                    {{ $tp->id == $item->tempat_perawatan_id ? 'selected' : '' }}>
                                    {{ $tp->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>


                                        {{-- MODAL DELETE --}}
                                        <div class="modal fade" id="delete-penderita-sakit-{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data Penderita Sakit?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data penderita sakit <strong>{{ $item->jenisPenyakit->nama ?? '-' }}</strong> 
                                                            tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> 
                                                            akan dihapus dan tidak bisa dikembalikan.</p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{route('perkembangan.kesehatan-masyarakat.penderita-sakit.destroy', $item->id) }}" method="POST">
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

    {{-- MODAL TAMBAH DATA --}}
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('perkembangan.kesehatan-masyarakat.penderita-sakit.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Penderita Sakit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Tanggal *</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jenis Penyakit *</label>
                            <select name="jenis_penyakit_id" class="form-control" required>
                                <option value="">Pilih Jenis Penyakit</option>
                                @foreach ($jenisPenyakit as $jp)
                                    <option value="{{ $jp->id }}">{{ $jp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Jumlah Penderita (Orang)</label>
                            <input type="number" name="jumlah_penderita" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Tempat Perawatan *</label>
                            <select name="tempat_perawatan_id" class="form-control" required>
                                <option value="">Pilih Tempat Perawatan</option>
                                @foreach ($tempatPerawatan as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->nama }}</option>
                                @endforeach
                            </select>
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
            $('#penderita-sakit-table').DataTable();
        });
    </script>
@endpush
