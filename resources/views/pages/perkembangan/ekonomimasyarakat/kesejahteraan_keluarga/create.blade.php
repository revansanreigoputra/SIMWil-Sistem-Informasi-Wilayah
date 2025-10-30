@extends('layouts.master')

@section('title', 'Tambah Data Kesejahteraan Keluarga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Data Kesejahteraan Keluarga</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.store') }}" method="POST" id="form-create-keluarga">
            @csrf

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="tanggal" class="form-label required">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="prasejahtera" class="form-label required">Prasejahtera</label>
                    <input type="number" name="prasejahtera" id="prasejahtera" class="form-control" value="{{ old('prasejahtera') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sejahtera1" class="form-label required">Sejahtera 1</label>
                    <input type="number" name="sejahtera1" id="sejahtera1" class="form-control" value="{{ old('sejahtera1') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sejahtera2" class="form-label required">Sejahtera 2</label>
                    <input type="number" name="sejahtera2" id="sejahtera2" class="form-control" value="{{ old('sejahtera2') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sejahtera3" class="form-label required">Sejahtera 3</label>
                    <input type="number" name="sejahtera3" id="sejahtera3" class="form-control" value="{{ old('sejahtera3') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sejahteraplus" class="form-label required">Sejahtera Plus</label>
                    <input type="number" name="sejahteraplus" id="sejahteraplus" class="form-control" value="{{ old('sejahteraplus') }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3 flex-wrap">
                <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index') }}" class="btn btn-secondary me-2 mb-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary mb-2">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-style')
<style>
    .required::after {
        content: " *";
        color: red;
        font-weight: bold;
    }
    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    .card {
        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        border: none;
    }
</style>
@endpush
