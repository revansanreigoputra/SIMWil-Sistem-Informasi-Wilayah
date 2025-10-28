@extends('layouts.master')

@section('title', 'Edit Aset Sarana Transportasi Umum')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Aset Sarana Transportasi Umum</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Desa --}}
                <div class="col-md-6 mb-2">
                    <label for="id_desa" class="form-label">Desa <span class="text-danger">*</span></label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('id_desa', $item->id_desa) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="col-md-6 mb-2">
                    <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $item->tanggal) }}" required>
                    @error('tanggal')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mt-2">
                {{-- Jenis Aset --}}
                <div class="col-md-6 mb-2">
                    <label for="jenis_aset" class="form-label">Jenis Aset <span class="text-danger">*</span></label>
                    <select name="jenis_aset" id="jenis_aset" class="form-control" required>
                        <option value="">-- Pilih Jenis Aset --</option>
                        @foreach($jenis_aset_list as $jenis)
                            <option value="{{ $jenis }}" {{ old('jenis_aset', $item->jenis_aset) == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis_aset')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Jumlah Pemilik --}}
                <div class="col-md-3 mb-2">
                    <label for="jumlah_pemilik" class="form-label">Jumlah Pemilik (Orang)</label>
                    <input type="number" name="jumlah_pemilik" id="jumlah_pemilik" class="form-control" min="0" value="{{ old('jumlah_pemilik', $item->jumlah_pemilik ?? 0) }}">
                    @error('jumlah_pemilik')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Jumlah Aset --}}
                <div class="col-md-3 mb-2">
                    <label for="jumlah_aset" class="form-label">Jumlah Aset (Unit)</label>
                    <input type="number" name="jumlah_aset" id="jumlah_aset" class="form-control" min="0" value="{{ old('jumlah_aset', $item->jumlah_aset ?? 0) }}">
                    @error('jumlah_aset')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.sarana_transportasi_umum.index') }}" class="btn btn-secondary">
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
