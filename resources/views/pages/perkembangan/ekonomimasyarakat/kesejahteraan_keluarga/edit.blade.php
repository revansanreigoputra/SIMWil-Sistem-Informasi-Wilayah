@extends('layouts.master')

@section('title', 'Edit Kesejahteraan Keluarga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Kesejahteraan Keluarga</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.update', $item->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Tanggal --}}
                <div class="col-md-6 mb-2">
                    <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                        value="{{ old('tanggal', $item->tanggal) }}" required>
                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Prasejahtera --}}
                <div class="col-md-6 mb-2">
                    <label for="prasejahtera" class="form-label">Prasejahtera <span class="text-danger">*</span></label>
                    <input type="number" name="prasejahtera" id="prasejahtera" class="form-control"
                        value="{{ old('prasejahtera', $item->prasejahtera) }}" min="0" required>
                    @error('prasejahtera')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mt-2">
                {{-- Sejahtera 1 --}}
                <div class="col-md-6 mb-2">
                    <label for="sejahtera1" class="form-label">Sejahtera 1 <span class="text-danger">*</span></label>
                    <input type="number" name="sejahtera1" id="sejahtera1" class="form-control"
                        value="{{ old('sejahtera1', $item->sejahtera1) }}" min="0" required>
                    @error('sejahtera1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Sejahtera 2 --}}
                <div class="col-md-6 mb-2">
                    <label for="sejahtera2" class="form-label">Sejahtera 2 <span class="text-danger">*</span></label>
                    <input type="number" name="sejahtera2" id="sejahtera2" class="form-control"
                        value="{{ old('sejahtera2', $item->sejahtera2) }}" min="0" required>
                    @error('sejahtera2')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mt-2">
                {{-- Sejahtera 3 --}}
                <div class="col-md-6 mb-2">
                    <label for="sejahtera3" class="form-label">Sejahtera 3 <span class="text-danger">*</span></label>
                    <input type="number" name="sejahtera3" id="sejahtera3" class="form-control"
                        value="{{ old('sejahtera3', $item->sejahtera3) }}" min="0" required>
                    @error('sejahtera3')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Sejahtera Plus --}}
                <div class="col-md-6 mb-2">
                    <label for="sejahteraplus" class="form-label">Sejahtera Plus <span class="text-danger">*</span></label>
                    <input type="number" name="sejahteraplus" id="sejahteraplus" class="form-control"
                        value="{{ old('sejahteraplus', $item->sejahteraplus) }}" min="0" required>
                    @error('sejahteraplus')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index') }}"
                    class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
