@extends('layouts.master')

@section('title', 'Detail Wabah Penyakit')

@section('action')
    @can('wabah-penyakit.edit')
        <button class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#editModal-{{ $data->id }}">
            <i class="fas fa-edit me-2"></i> Edit Data
        </button>
    @endcan
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <!-- Header -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-eye me-2"></i>
                        <h4 class="card-title mb-0">Detail Data Wabah Penyakit</h4>
                    </div>
                </div>
            </div>

            <!-- Informasi Wabah -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle text-primary me-2"></i> Informasi Wabah
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 30%">Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Wabah</th>
                            <td>{{ $data->jenis_wabah }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Kejadian Tahun Ini</th>
                            <td>{{ number_format($data->jumlah_kejadian_tahun_ini) }} kejadian</td>
                        </tr>
                        <tr>
                            <th>Jumlah Meninggal</th>
                            <td>{{ number_format($data->jumlah_meninggal) }} orang</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Edit -->
@can('wabah-penyakit.edit')
<div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('perkembangan.kesehatan-masyarakat.wabah-penyakit.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Edit Data Wabah Penyakit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Tanggal</label>
              <input type="date" name="tanggal" class="form-control"
                value="{{ $data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') : '' }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jenis Wabah</label>
              <input type="text" name="jenis_wabah" class="form-control" value="{{ $data->jenis_wabah }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jumlah Kejadian Tahun Ini</label>
              <input type="number" name="jumlah_kejadian_tahun_ini" class="form-control"
                value="{{ $data->jumlah_kejadian_tahun_ini }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Jumlah Meninggal</label>
              <input type="number" name="jumlah_meninggal" class="form-control"
                value="{{ $data->jumlah_meninggal }}" required>
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

@push('addon-style')
<style>
    .form-control-plaintext {
        padding-top: 0.375rem;
        padding-bottom: 0.375rem;
        margin-bottom: 0;
        line-height: 1.5;
        color: #495057;
        background-color: transparent;
        border: solid transparent;
        border-width: 1px 0;
    }
</style>
@endpush
