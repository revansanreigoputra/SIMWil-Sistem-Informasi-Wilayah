@extends('layouts.master')

@section('title', 'Daftar - SEKTOR JASA USAHA')

@section('action')
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
        + Data Baru
    </button>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-sektor-jasa-usaha" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Mata Pencaharian</th>
                        <th>Jumlah (Orang)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Menggunakan $data dari controller --}}
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->desa->nama_desa ?? '-' }}</td> 
                            <td>{{ $item->tanggal }}</td>
                            {{-- Relasi ke MataPencaharian disamakan --}}
                            <td>{{ $item->mataPencaharian->mata_pencaharian ?? '-' }}</td> 
                            <td>{{ $item->jumlah }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    {{-- Mengubah nama route ke sektor-jasa-usaha --}}
                                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.show', $item->id) }}" 
                                        class="btn btn-sm btn-info">
                                        Detail
                                    </a>
                                    <button type="button"
                                        class="btn btn-sm btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $item->id }}">
                                        Edit
                                    </button>
                                    <button type="button"
                                        class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $item->id }}">
                                        Hapus
                                    </button>
                                </div>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            {{-- Mengubah route update --}}
                                            <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="tanggal" class="form-label">Tanggal</label>
                                                        <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="mata_pencaharian_id" class="form-label">Mata Pencaharian</label>
                                                        <select name="mata_pencaharian_id" class="form-control" required>
                                                            <option value="">Pilih Mata Pencaharian</option>
                                                            {{-- $mataPencaharians dari controller --}}
                                                            @foreach ($mataPencaharians as $mp) 
                                                                <option value="{{ $mp->id }}" {{ $item->mata_pencaharian_id == $mp->id ? 'selected' : '' }}>
                                                                    {{ $mp->mata_pencaharian }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jumlah" class="form-label">Jumlah (Orang)</label>
                                                        <input type="number" name="jumlah" class="form-control" value="{{ $item->jumlah }}" min="0">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal Hapus --}}
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Data?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Yakin ingin menghapus data tanggal <strong>{{ $item->tanggal }}</strong>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                {{-- Mengubah route destroy --}}
                                                <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }} {{-- Tambahkan pagination links --}}
        </div>
    </div>
</div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- Mengubah route store --}}
            <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-jasa-usaha.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mata_pencaharian_id" class="form-label">Mata Pencaharian</label>
                        <select name="mata_pencaharian_id" class="form-control" required>
                            <option value="">Pilih Mata Pencaharian</option>
                            @foreach ($mataPencaharians as $mp)
                                <option value="{{ $mp->id }}">{{ $mp->mata_pencaharian }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah (Orang)</label>
                        <input type="number" name="jumlah" class="form-control" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    // Asumsi menggunakan jQuery DataTables, disesuaikan dengan ID tabel baru
    $(document).ready(function() {
        $('#table-sektor-jasa-usaha').DataTable();
    });
</script>
@endpush