@extends('layouts.master')

@section('title', 'Tambah Data Kesejahteraan Keluarga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Kesejahteraan Keluarga</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id_desa" value="{{ session('desa_id') }}">

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                        required value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-2">
                    <label for="prasejahtera" class="form-label">Prasejahtera <span class="text-danger">*</span></label>
                    <input type="number" name="prasejahtera" id="prasejahtera" class="form-control" min="0"
                        required value="{{ old('prasejahtera') }}">
                    @error('prasejahtera')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label for="sejahtera1" class="form-label">Sejahtera 1 <span class="text-danger">*</span></label>
                    <input type="number" name="sejahtera1" id="sejahtera1" class="form-control" min="0"
                        required value="{{ old('sejahtera1') }}">
                    @error('sejahtera1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-2">
                    <label for="sejahtera2" class="form-label">Sejahtera 2 <span class="text-danger">*</span></label>
                    <input type="number" name="sejahtera2" id="sejahtera2" class="form-control" min="0"
                        required value="{{ old('sejahtera2') }}">
                    @error('sejahtera2')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label for="sejahtera3" class="form-label">Sejahtera 3 <span class="text-danger">*</span></label>
                    <input type="number" name="sejahtera3" id="sejahtera3" class="form-control" min="0"
                        required value="{{ old('sejahtera3') }}">
                    @error('sejahtera3')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-2">
                    <label for="sejahteraplus" class="form-label">Sejahtera Plus <span class="text-danger">*</span></label>
                    <input type="number" name="sejahteraplus" id="sejahteraplus" class="form-control" min="0"
                        required value="{{ old('sejahteraplus') }}">
                    @error('sejahteraplus')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index') }}"
                    class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
