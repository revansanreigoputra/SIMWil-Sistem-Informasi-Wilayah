@extends('layouts.master')

@section('title', 'Detail Status Gizi Balita')

@section('action')
    @can('gizi-balita.edit')
    <button class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#editModal-{{ $data->id }}">
        <i class="fas fa-edit me-2"></i> Edit Data
    </button>
    @endcan
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="modal-header bg-primary text-white">
        <h5 class="mb-0">Detail Status Gizi Balita</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr>
                <th style="width:30%">Tanggal</th>
                <td>{{ $data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') : '-' }}</td>
            </tr>
            <tr>
                <th>Bergizi Buruk</th>
                <td>{{ number_format($data->bergizi_buruk) }}</td>
            </tr>
            <tr>
                <th>Bergizi Kurang</th>
                <td>{{ number_format($data->bergizi_kurang) }}</td>
            </tr>
            <tr>
                <th>Bergizi Baik</th>
                <td>{{ number_format($data->bergizi_baik) }}</td>
            </tr>
            <tr>
                <th>Bergizi Lebih</th>
                <td>{{ number_format($data->bergizi_lebih) }}</td>
            </tr>
            <tr class="">
                <th>Total Balita</th>
                <td>{{ number_format($data->jumlah_balita) }}</td>
            </tr>
        </table>
    </div>
</div>

<!-- Optional: Modal Edit (sesuai modal yang ada di index) -->
@can('gizi-balita.edit')
<div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('perkembangan.kesehatan-masyarakat.gizi-balita.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header bg-primary">
          <h5 class="modal-title">Edit Data Gizi Balita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Tanggal</label>
              <input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal ? $data->tanggal->format('Y-m-d') : '' }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Bergizi Buruk</label>
              <input type="number" name="bergizi_buruk" class="form-control" value="{{ $data->bergizi_buruk }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Bergizi Kurang</label>
              <input type="number" name="bergizi_kurang" class="form-control" value="{{ $data->bergizi_kurang }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Bergizi Baik</label>
              <input type="number" name="bergizi_baik" class="form-control" value="{{ $data->bergizi_baik }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Bergizi Lebih</label>
              <input type="number" name="bergizi_lebih" class="form-control" value="{{ $data->bergizi_lebih }}" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-warning">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endcan
@endsection
