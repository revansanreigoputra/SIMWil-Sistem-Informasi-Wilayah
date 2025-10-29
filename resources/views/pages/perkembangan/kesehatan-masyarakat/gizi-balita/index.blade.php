@extends('layouts.master')

@section('title', 'Daftar - STATUS GIZI BALITA')

@section('action')
    @can('gizi-balita.create')
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
            + Data Baru
        </button>
    @endcan
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="status-gizi-balita-table" class="table table-striped align-middle">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Tanggal</th>
                            <th>Bergizi Buruk</th>
                            <th>Bergizi Kurang</th>
                            <th>Bergizi Baik</th>
                            <th>Bergizi Lebih</th>
                            <th>Total Balita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($giziBalita as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                                <td class="text-center">{{ $item->tanggal ? $item->tanggal->format('d-m-Y') : '-' }}</td>
                                <td class="text-center">{{ $item->bergizi_buruk }}</td>
                                <td class="text-center">{{ $item->bergizi_kurang }}</td>
                                <td class="text-center">{{ $item->bergizi_baik }}</td>
                                <td class="text-center">{{ $item->bergizi_lebih }}</td>
                                <td class="text-center fw-bold">{{ $item->jumlah_balita }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        {{-- Tombol Detail --}}
                                        @can('gizi-balita.show')
                                            <a href="{{ route('perkembangan.kesehatan-masyarakat.gizi-balita.show', $item->id) }}"
                                                class="btn btn-sm btn-info">
                                                Detail
                                            </a>
                                        @endcan

                                        {{-- Tombol Edit (pakai modal) --}}
                                        @can('gizi-balita.edit')
                                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal-{{ $item->id }}">
                                                Edit
                                            </button>
                                        @endcan

                                        {{-- Tombol Hapus --}}
                                        @can('gizi-balita.delete')
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $item->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </div>

                                    {{-- Modal Edit --}}
                                    @can('gizi-balita.edit')
                                        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form
                                                        action="{{ route('perkembangan.kesehatan-masyarakat.gizi-balita.update', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title" id="editModalLabel-{{ $item->id }}">
                                                                Edit Data Gizi Balita
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Tanggal</label>
                                                                    <input type="date" name="tanggal"
                                                                        value="{{ $item->tanggal ? $item->tanggal->format('Y-m-d') : '' }}"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Bergizi Buruk</label>
                                                                    <input type="number" name="bergizi_buruk"
                                                                        value="{{ $item->bergizi_buruk }}"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Bergizi Kurang</label>
                                                                    <input type="number" name="bergizi_kurang"
                                                                        value="{{ $item->bergizi_kurang }}"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Bergizi Baik</label>
                                                                    <input type="number" name="bergizi_baik"
                                                                        value="{{ $item->bergizi_baik }}"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Bergizi Lebih</label>
                                                                    <input type="number" name="bergizi_lebih"
                                                                        value="{{ $item->bergizi_lebih }}"
                                                                        class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan

                                    {{-- Modal Hapus --}}
                                    @can('gizi-balita.delete')
                                        <div class="modal fade" id="deleteModal-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel-{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data?</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin menghapus data tanggal
                                                        <strong>{{ $item->tanggal->format('d-m-Y') }}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('perkembangan.kesehatan-masyarakat.gizi-balita.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Tambah Data --}}
@can('gizi-balita.create')
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('perkembangan.kesehatan-masyarakat.gizi-balita.store') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Data Gizi Balita</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Bergizi Buruk</label>
                                <input type="number" name="bergizi_buruk" class="form-control" value="{{ old('bergizi_buruk', 0) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Bergizi Kurang</label>
                                <input type="number" name="bergizi_kurang" class="form-control" value="{{ old('bergizi_kurang', 0) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Bergizi Baik</label>
                                <input type="number" name="bergizi_baik" class="form-control" value="{{ old('bergizi_baik', 0) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Bergizi Lebih</label>
                                <input type="number" name="bergizi_lebih" class="form-control" value="{{ old('bergizi_lebih', 0) }}" required>
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
@endcan
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#status-gizi-balita-table').DataTable();
        });
    </script>
@endpush
