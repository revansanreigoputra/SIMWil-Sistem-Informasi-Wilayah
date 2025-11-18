@extends('layouts.master')

@section('title', 'Tambah Data Rumah Menurut Atap')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Form Tambah Data Rumah Menurut Atap</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.store') }}" method="POST">
            @csrf

            {{-- Error Validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                {{-- Jenis Atap --}}
                <div class="col-md-6 mb-3">
                    <label for="id_aset_atap" class="form-label">Jenis Atap</label>
                    <select 
                        name="id_aset_atap" 
                        id="id_aset_atap" 
                        class="form-select @error('id_aset_atap') is-invalid @enderror" 
                        required
                    >
                        <option value="">-- Pilih Jenis Atap --</option>
                        @foreach ($asetAtaps as $aset)
                            <option value="{{ $aset->id }}" {{ old('id_aset_atap') == $aset->id ? 'selected' : '' }}>
                                {{ $aset->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_aset_atap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input 
                        type="date" 
                        name="tanggal" 
                        id="tanggal" 
                        class="form-control @error('tanggal') is-invalid @enderror" 
                        value="{{ old('tanggal') }}"
                        required
                    >
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                {{-- Jumlah Rumah --}}
                <div class="col-md-6 mb-3">
                    <label for="jumlah" class="form-label">Jumlah Rumah</label>
                    <input 
                        type="number" 
                        name="jumlah" 
                        id="jumlah" 
                        class="form-control @error('jumlah') is-invalid @enderror" 
                        min="0" 
                        value="{{ old('jumlah', 0) }}" 
                        required
                    >
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.index') }}" class="btn btn-secondary">
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
