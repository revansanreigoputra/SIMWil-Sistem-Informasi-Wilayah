@extends('layouts.master')

@section('title', 'Edit Data Rumah Menurut Atap')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Rumah Menurut Atap</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                {{-- Dropdown jenis atap dari master data --}}
                <div class="col-md-6 mb-3">
                    <label for="id_aset_atap" class="form-label">Jenis Atap</label>
                    <select name="id_aset_atap" id="id_aset_atap" class="form-select" required>
                        <option value="">-- Pilih Jenis Atap --</option>
                        @foreach($asetAtaps as $atap)
                            <option value="{{ $atap->id }}" 
                                {{ old('id_aset_atap', $item->id_aset_atap) == $atap->id ? 'selected' : '' }}>
                                {{ $atap->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Input tanggal --}}
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input 
                        type="date" 
                        name="tanggal" 
                        id="tanggal" 
                        class="form-control"
                        value="{{ old('tanggal', $item->tanggal) }}" 
                        required>
                </div>
            </div>

            {{-- Input jumlah rumah --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jumlah" class="form-label">Jumlah Rumah</label>
                    <input 
                        type="number" 
                        name="jumlah" 
                        id="jumlah" 
                        class="form-control" 
                        min="0"
                        value="{{ old('jumlah', $item->jumlah) }}" 
                        required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.index') }}" class="btn btn-secondary">
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
