@extends('layouts.master')

@section('title', 'Daftar - WABAH PENYAKIT')

@section('action')
    {{-- TOMBOL +DATA BARU --}}
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        + Data Baru
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="wabah-penyakit-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Wabah</th>
                            <th>Jumlah Kejadian Tahun Ini</th>
                            <th>Jumlah Meninggal (Orang)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wabahPenyakit as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td class="text-center">{{ $item->jenis_wabah }}</td>
                                <td class="text-center">{{ number_format($item->jumlah_kejadian_tahun_ini, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->jumlah_meninggal, 0, ',', '.') }}</td>
                                <td>
                                  @canany(['wabah-penyakit.edit', 'wabah-penyakit.delete', 'wabah-penyakit.show'])
                                        <div class="d-flex gap-1 justify-content-center">
                                            {{-- TOMBOL DETAIL --}}
                                            
                                            @can('wabah-penyakit.show')
                                                <a href="{{ route('perkembangan.kesehatan-masyarakat.wabah-penyakit.show', $item->id) }}" class="btn btn-sm btn-info">
                                                    Detail
                                                </a>
                                            @endcan

                                            {{-- TOMBOL EDIT --}}
                                           @can('wabah-penyakit.edit')
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $item->id }}">
                                                    Edit
                                                </button>
                                            @endcan

                                            {{-- TOMBOL HAPUS --}}
                                            @can('wabah-penyakit.delete')
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-wabah-penyakit-{{ $item->id }}">
                                                    Hapus
                                                </button>
                                            @endcan
                                        </div>

                                        {{-- MODAL EDIT --}}
                                        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('perkembangan.kesehatan-masyarakat.wabah-penyakit.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data Wabah Penyakit</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label>Tanggal *</label>
                                                                <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal->format('Y-m-d') }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Jenis Wabah *</label>
                                                                <select name="jenis_wabah" class="form-control" required>
                                                                    <option value="">Pilih Jenis Wabah</option>
                                                                    <option value="Busung lapar" {{ $item->jenis_wabah == 'Busung lapar' ? 'selected' : '' }}>Busung lapar</option>
                                                                    <option value="Cikungunya" {{ $item->jenis_wabah == 'Cikungunya' ? 'selected' : '' }}>Cikungunya</option>
                                                                    <option value="Demam berdarah" {{ $item->jenis_wabah == 'Demam berdarah' ? 'selected' : '' }}>Demam berdarah</option>
                                                                    <option value="Flu burung" {{ $item->jenis_wabah == 'Flu burung' ? 'selected' : '' }}>Flu burung</option>
                                                                    <option value="Ispa" {{ $item->jenis_wabah == 'Ispa' ? 'selected' : '' }}>Ispa</option>
                                                                    <option value="Kelaparan" {{ $item->jenis_wabah == 'Kelaparan' ? 'selected' : '' }}>Kelaparan</option>
                                                                    <option value="Kolera" {{ $item->jenis_wabah == 'Kolera' ? 'selected' : '' }}>Kolera</option>
                                                                    <option value="Muntaber" {{ $item->jenis_wabah == 'Muntaber' ? 'selected' : '' }}>Muntaber</option>
                                                                    <option value="Polio" {{ $item->jenis_wabah == 'Polio' ? 'selected' : '' }}>Polio</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Jumlah Kejadian Tahun Ini</label>
                                                                <input type="number" name="jumlah_kejadian_tahun_ini" class="form-control" value="{{ $item->jumlah_kejadian_tahun_ini }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Jumlah Meninggal (Orang)</label>
                                                                <input type="number" name="jumlah_meninggal" class="form-control" value="{{ $item->jumlah_meninggal }}" required>
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

                                        {{-- MODAL DELETE --}}
                                        <div class="modal fade" id="delete-wabah-penyakit-{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data Wabah Penyakit?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data wabah penyakit <strong>{{ $item->jenis_wabah }}</strong> tanggal <strong>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('perkembangan.kesehatan-masyarakat.wabah-penyakit.destroy', $item->id) }}" method="POST">
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
                <form action="{{ route('perkembangan.kesehatan-masyarakat.wabah-penyakit.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Wabah Penyakit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Tanggal *</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jenis Wabah *</label>
                            <select name="jenis_wabah" class="form-control" required>
                                <option value="">Pilih Jenis Wabah</option>
                                <option value="Busung lapar">Busung lapar</option>
                                <option value="Cikungunya">Cikungunya</option>
                                <option value="Demam berdarah">Demam berdarah</option>
                                <option value="Flu burung">Flu burung</option>
                                <option value="Ispa">Ispa</option>
                                <option value="Kelaparan">Kelaparan</option>
                                <option value="Kolera">Kolera</option>
                                <option value="Muntaber">Muntaber</option>
                                <option value="Polio">Polio</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Jumlah Kejadian Tahun Ini</label>
                            <input type="number" name="jumlah_kejadian_tahun_ini" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Jumlah Meninggal (Orang)</label>
                            <input type="number" name="jumlah_meninggal" class="form-control" required>
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
            $('#wabah-penyakit-table').DataTable();
        });
    </script>
@endpush