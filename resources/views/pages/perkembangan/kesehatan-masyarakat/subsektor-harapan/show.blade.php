@extends('layouts.master')

@section('title', 'Detail Subsektor Harapan')

@section('action')
@can('subsektor-harapan.edit')
<button class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#editModal-{{ $data->id }}">
    <i class="fas fa-edit me-2"></i>Edit Data
</button>
@endcan
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Detail Data Subsektor Harapan</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tr><th>Tanggal</th><td>{{ $data->tanggal->format('d-m-Y') }}</td></tr>
            <tr><th>Angka Harapan Hidup Desa/Kelurahan</th><td>{{ $data->angka_harapan_hidup_desa }}</td></tr>
            <tr><th>Angka Harapan Hidup Kabupaten/Kota</th><td>{{ $data->angka_harapan_hidup_kabupaten }}</td></tr>
            <tr><th>Angka Harapan Hidup Provinsi</th><td>{{ $data->angka_harapan_hidup_provinsi }}</td></tr>
            <tr><th>Angka Harapan Hidup Nasional</th><td>{{ $data->angka_harapan_hidup_nasional }}</td></tr>
        </table>
    </div>
</div>

{{-- MODAL EDIT --}}
@can('subsektor-harapan.edit')
<div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('perkembangan.kesehatan-masyarakat.subsektor-harapan.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Edit Data Subsektor Harapan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3"><label>Tanggal *</label><input type="date" name="tanggal" class="form-control" value="{{ $data->tanggal->format('Y-m-d') }}" required></div>
                    <div class="mb-3"><label>Angka Harapan Hidup Desa/Kelurahan *</label><input type="number" name="angka_harapan_hidup_desa" class="form-control" value="{{ $data->angka_harapan_hidup_desa }}" required></div>
                    <div class="mb-3"><label>Angka Harapan Hidup Kabupaten/Kota *</label><input type="number" name="angka_harapan_hidup_kabupaten" class="form-control" value="{{ $data->angka_harapan_hidup_kabupaten }}" required></div>
                    <div class="mb-3"><label>Angka Harapan Hidup Provinsi *</label><input type="number" name="angka_harapan_hidup_provinsi" class="form-control" value="{{ $data->angka_harapan_hidup_provinsi }}" required></div>
                    <div class="mb-3"><label>Angka Harapan Hidup Nasional *</label><input type="number" name="angka_harapan_hidup_nasional" class="form-control" value="{{ $data->angka_harapan_hidup_nasional }}" required></div>
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
