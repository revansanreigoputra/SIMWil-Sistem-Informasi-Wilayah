@extends('layouts.master')

@section('title', 'Edit Transportasi Darat')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            Edit Data Transportasi Darat
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.update', $transportasiDarat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal"
                       value="{{ old('tanggal', $transportasiDarat->tanggal->format('Y-m-d')) }}" required>
                @error('tanggal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoriOptions as $key => $value)
                        <option value="{{ $key }}" {{ old('kategori', $transportasiDarat->kategori) == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_sarana_prasarana" class="form-label">Jenis Sarana Prasarana</label>
                <select class="form-control" id="jenis_sarana_prasarana" name="jenis_sarana_prasarana" required>
                    <option value="">Pilih Jenis Sarana Prasarana</option>
                    @foreach($jenisSaranaPrasaranaOptions as $key => $value)
                        <option value="{{ $key }}" {{ old('jenis_sarana_prasarana', $transportasiDarat->jenis_sarana_prasarana) == $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                @error('jenis_sarana_prasarana')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kondisi_baik" class="form-label">Kondisi Baik (Meter)</label>
                <input type="number" class="form-control" id="kondisi_baik" name="kondisi_baik"
                       value="{{ old('kondisi_baik', $transportasiDarat->kondisi_baik) }}" min="0" required placeholder="Contoh: 100">
                @error('kondisi_baik')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kondisi_rusak" class="form-label">Kondisi Rusak (Meter)</label>
                <input type="number" class="form-control" id="kondisi_rusak" name="kondisi_rusak"
                       value="{{ old('kondisi_rusak', $transportasiDarat->kondisi_rusak) }}" min="0" required placeholder="Contoh: 200">
                @error('kondisi_rusak')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah (Meter/Unit)</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah"
                       value="{{ old('jumlah', $transportasiDarat->jumlah) }}" min="0" required>
                @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
