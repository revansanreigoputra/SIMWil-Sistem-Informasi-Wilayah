@extends('layouts.master')

@section('title', 'Edit Data Rumah Menurut Dinding')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Rumah Menurut Dinding</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.rumah_menurut_dinding.update', $rumahMenurutDinding->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Desa otomatis dari session, tidak perlu input manual --}}

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_aset_dinding" class="form-label">Jenis Dinding</label>
                    <select name="id_aset_dinding" id="id_aset_dinding" class="form-select" required>
                        <option value="">-- Pilih Jenis Dinding --</option>
                        @foreach($jenisDindings as $dinding)
                            <option value="{{ $dinding->id }}" 
                                {{ old('id_aset_dinding', $rumahMenurutDinding->id_aset_dinding) == $dinding->id ? 'selected' : '' }}>
                                {{ $dinding->nama_dinding }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" 
                           value="{{ old('tanggal', $rumahMenurutDinding->tanggal) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" min="0"
                           value="{{ old('jumlah', $rumahMenurutDinding->jumlah) }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_dinding.index') }}" class="btn btn-secondary">
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
