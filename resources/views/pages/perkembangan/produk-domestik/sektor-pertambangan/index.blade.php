@extends('layouts.master')

@section('title', 'Daftar - SEKTOR PERTAMBANGAN DAN GALIAN')

@section('action')
    <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
         + Data Baru
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="pertambangan-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Total Nilai Produksi Tahun Ini (Rp)</th>
                            <th>Total Nilai Bahan Baku yang Digunakan (Rp)</th>
                            <th>Total Nilai Bahan Penolong yang Digunakan (Rp)</th>
                            <th>Total Biaya Antara yang Dihabiskan (Rp)</th>
                            <th>Jumlah Total Jenis Bahan Tambang dan Galian (Buah)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pertambangan as $pertambangan)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $pertambangan->tanggal }}</td>
                                <td class="text-center">{{ $pertambangan->total_nilai_produksi_tahun_ini }}</td>
                                <td class="text-center">{{ $pertambangan->total_nilai_bahan_baku_digunakan }}</td>
                                <td class="text-center">{{ $pertambangan->total_nilai_bahan_penolong_digunakan }}</td>
                                <td class="text-center">{{ $pertambangan->total_biaya_antara_dihabiskan }}</td>
                                <td class="text-center">{{ $pertambangan->jumlah_total_jenis_bahan_tambang_dan_galian }}</td>
                                <td>
                                   <!-- Tombol Edit -->
<button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit-pertambangan-{{ $pertambangan->id }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
        <path d="M16 5l3 3" />
    </svg>
    Edit
</button>

<!-- Modal Edit -->
<div class="modal fade" id="edit-pertambangan-{{ $pertambangan->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $pertambangan->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('perkembangan.produk-domestik.sektor-pertambangan.update', $pertambangan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Pertambangan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input type="date" class="form-control" name="tanggal" value="{{ $pertambangan->tanggal }}" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Total Nilai Produksi Tahun Ini (Rp)</label>
              <input type="number" class="form-control" name="total_nilai_produksi_tahun_ini" value="{{ $pertambangan->total_nilai_produksi_tahun_ini }}" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Total Nilai Bahan Baku yang Digunakan (Rp)</label>
              <input type="number" class="form-control" name="total_nilai_bahan_baku_digunakan" value="{{ $pertambangan->total_nilai_bahan_baku_digunakan }}" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Total Nilai Bahan Penolong yang Digunakan (Rp)</label>
              <input type="number" class="form-control" name="total_nilai_bahan_penolong_digunakan" value="{{ $pertambangan->total_nilai_bahan_penolong_digunakan }}" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Total Biaya Antara yang Dihabiskan (Rp)</label>
              <input type="number" class="form-control" name="total_biaya_antara_dihabiskan" value="{{ $pertambangan->total_biaya_antara_dihabiskan }}" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Jumlah Total Jenis Bahan Tambang dan Galian (Buah)</label>
              <input type="number" class="form-control" name="jumlah_total_jenis_bahan_tambang_dan_galian" value="{{ $pertambangan->jumlah_total_jenis_bahan_tambang_dan_galian }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

                                        </a>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-pertambangan-{{ $pertambangan->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>
                                    <div class="modal fade" id="delete-pertambangan-{{ $pertambangan->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Data Pertambangan?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Data pertambangan pada
                                                        <strong>{{ $pertambangan->tanggal }}</strong> yang dihapus
                                                        tidak bisa dikembalikan.
                                                    </p>
                                                    <p>Yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="{{ route('perkembangan.produk-domestik.sektor-pertambangan.destroy', $pertambangan->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
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
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#pertambangan-table').DataTable();
        });
    </script>
    
    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Sektor Pertambangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('perkembangan.produk-domestik.sektor-pertambangan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_nilai_produksi_tahun_ini" class="form-label">Total Nilai Produksi Tahun Ini (Rp)</label>
                        <input type="number" class="form-control" id="total_nilai_produksi_tahun_ini" name="total_nilai_produksi_tahun_ini" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_nilai_bahan_baku_digunakan" class="form-label">Total Nilai Bahan Baku yang Digunakan (Rp)</label>
                        <input type="number" class="form-control" id="total_nilai_bahan_baku_digunakan" name="total_nilai_bahan_baku_digunakan" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_nilai_bahan_penolong_digunakan" class="form-label">Total Nilai Bahan Penolong yang Digunakan (Rp)</label>
                        <input type="number" class="form-control" id="total_nilai_bahan_penolong_digunakan" name="total_nilai_bahan_penolong_digunakan" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_biaya_antara_dihabiskan" class="form-label">Total Biaya Antara yang Dihabiskan (Rp)</label>
                        <input type="number" class="form-control" id="total_biaya_antara_dihabiskan" name="total_biaya_antara_dihabiskan" required>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_total_jenis_bahan_tambang_dan_galian" class="form-label">Jumlah Total Jenis Bahan Tambang dan Galian (Buah)</label>
                        <input type="number" class="form-control" id="jumlah_total_jenis_bahan_tambang_dan_galian" name="jumlah_total_jenis_bahan_tambang_dan_galian" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endpush



