@extends('layouts.master')

@section('title', 'Detail Penderita Sakit')

@section('action')
    @can('penderita-sakit.edit')
        <button class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#editModal-{{ $data->id }}">
            <i class="fas fa-edit me-2"></i> Edit Data
        </button>
    @endcan
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-eye me-2"></i>
                        <h4 class="card-title mb-0">Detail Data Penderita Sakit</h4>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle text-primary me-2"></i> Informasi Penderita Sakit
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 30%">Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Penyakit</th>
                            <td>{{ $data->jenisPenyakit->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Penderita (Orang)</th>
                            <td>{{ number_format($data->jumlah_penderita) }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Perawatan</th>
                            <td>{{ $data->tempatPerawatan->nama ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@can('penderita-sakit.edit')
<div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('perkembangan.kesehatan-masyarakat.penderita-sakit.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Edit Data Penderita Sakit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Tanggal</label>
              <input type="date" name="tanggal" class="form-control"
                value="{{ \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jumlah Penderita (Orang)</label>
              <input type="number" name="jumlah_penderita" class="form-control"
                value="{{ $data->jumlah_penderita }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jenis Penyakit</label>
              <input type="text" class="form-control" value="{{ $data->jenisPenyakit->nama ?? '-' }}" readonly>
            </div>
            <div class="col-md-6">
              <label class="form-label">Tempat Perawatan</label>
              <input type="text" class="form-control" value="{{ $data->tempatPerawatan->nama ?? '-' }}" readonly>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan
@endsection
