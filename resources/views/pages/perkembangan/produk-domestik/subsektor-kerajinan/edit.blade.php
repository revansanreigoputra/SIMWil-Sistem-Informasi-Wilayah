
@extends('layouts.master')

@section('title', 'Edit Data - SUBSEKTOR KERAJINAN')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Form Edit Data Subsektor Kerajinan (Tanggal: {{ $kerajinan->tanggal }})</h4>
        </div>
        <div class="card-body">
            
            {{-- Form untuk memperbarui data --}}
            {{-- Route akan mengarah ke SubsektorKerajinanController@update --}}
            <form action="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.update', $kerajinan->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- PENTING: Gunakan method PUT/PATCH untuk update --}}

                {{-- Field: Tanggal --}}
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Data</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" 
                        value="{{ old('tanggal', $kerajinan->tanggal) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field: Total nilai produksi tahun ini (Rp) --}}
                <div class="mb-3">
                    <label for="total_nilai_produksi_tahun_ini" class="form-label">Total Nilai Produksi Tahun Ini (Rp)</label>
                    <input type="number" class="form-control @error('total_nilai_produksi_tahun_ini') is-invalid @enderror" id="total_nilai_produksi_tahun_ini" name="total_nilai_produksi_tahun_ini" 
                        value="{{ old('total_nilai_produksi_tahun_ini', $kerajinan->total_nilai_produksi_tahun_ini) }}" required>
                    @error('total_nilai_produksi_tahun_ini')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field: Total nilai bahan baku yang digunakan (Rp) --}}
                <div class="mb-3">
                    <label for="total_nilai_bahan_baku_digunakan" class="form-label">Total Nilai Bahan Baku Digunakan (Rp)</label>
                    <input type="number" class="form-control @error('total_nilai_bahan_baku_digunakan') is-invalid @enderror" id="total_nilai_bahan_baku_digunakan" name="total_nilai_bahan_baku_digunakan" 
                        value="{{ old('total_nilai_bahan_baku_digunakan', $kerajinan->total_nilai_bahan_baku_digunakan) }}" required>
                    @error('total_nilai_bahan_baku_digunakan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field: Total nilai bahan penolong yang digunakan (Rp) --}}
                <div class="mb-3">
                    <label for="total_nilai_bahan_penolong_digunakan" class="form-label">Total Nilai Bahan Penolong Digunakan (Rp)</label>
                    <input type="number" class="form-control @error('total_nilai_bahan_penolong_digunakan') is-invalid @enderror" id="total_nilai_bahan_penolong_digunakan" name="total_nilai_bahan_penolong_digunakan" 
                        value="{{ old('total_nilai_bahan_penolong_digunakan', $kerajinan->total_nilai_bahan_penolong_digunakan) }}" required>
                    @error('total_nilai_bahan_penolong_digunakan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field: Total biaya antara yang dihabiskan (Rp) --}}
                <div class="mb-3">
                    <label for="total_biaya_antara_dihabiskan" class="form-label">Total Biaya Antara Dihabiskan (Rp)</label>
                    <input type="number" class="form-control @error('total_biaya_antara_dihabiskan') is-invalid @enderror" id="total_biaya_antara_dihabiskan" name="total_biaya_antara_dihabiskan" 
                        value="{{ old('total_biaya_antara_dihabiskan', $kerajinan->total_biaya_antara_dihabiskan) }}" required>
                    @error('total_biaya_antara_dihabiskan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field: Total jenis kerajinan rumah tangga (Jenis) --}}
                <div class="mb-3">
                    <label for="total_jenis_kerajinan_rumah_tangga" class="form-label">Total Jenis Kerajinan Rumah Tangga (Jenis)</label>
                    <input type="number" class="form-control @error('total_jenis_kerajinan_rumah_tangga') is-invalid @enderror" id="total_jenis_kerajinan_rumah_tangga" name="total_jenis_kerajinan_rumah_tangga" 
                        value="{{ old('total_jenis_kerajinan_rumah_tangga', $kerajinan->total_jenis_kerajinan_rumah_tangga) }}" required>
                    @error('total_jenis_kerajinan_rumah_tangga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('perkembangan.produk-domestik.subsektor-kerajinan.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning">Update Data</button>
                </div>
            </form>

        </div>
    </div>
@endsection