@extends('layouts.master')

@section('title', 'Edit Data Kualitas Persalinan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                {{-- 1. Informasi dasar --}}

                
             <div class="col-md-6 mb-3">
                <label for="desa_id" class="form-label">Desa</label>
                <select name="desa_id" class="form-control" required>
                    @foreach ($desas as $desa)
                        <option value="{{ $desa->id }}" {{ $data->desa_id == $desa->id ? 'selected' : '' }}>
                            {{ $desa->nama_desa }}
                        </option>
                    @endforeach
                </select>
            </div>
            
                <div class="col-md-6 mb-3">
                    <input type="date" name="tanggal" class="form-control" 
                  value="{{ \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') }}" required>
                </div>

                {{-- 2. Tempat Persalinan --}}
                <div class="col-md-6 mb-3">
                    <label for="persalinan_rumah_sakit_umum" class="form-label">Persalinan Rumah Sakit Umum</label>
                    <input type="number" name="persalinan_rumah_sakit_umum" class="form-control" value="{{ $data->persalinan_rumah_sakit_umum }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_puskesmas" class="form-label">Persalinan Puskesmas</label>
                    <input type="number" name="persalinan_puskesmas" class="form-control" value="{{ $data->persalinan_puskesmas }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_praktek_bidan" class="form-label">Persalinan Praktek Bidan</label>
                    <input type="number" name="persalinan_praktek_bidan" class="form-control" value="{{ $data->persalinan_praktek_bidan }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_rumah_bersalin" class="form-label">Persalinan Rumah Bersalin</label>
                    <input type="number" name="persalinan_rumah_bersalin" class="form-control" value="{{ $data->persalinan_rumah_bersalin }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_polindes" class="form-label">Persalinan Polindes</label>
                    <input type="number" name="persalinan_polindes" class="form-control" value="{{ $data->persalinan_polindes }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_balai_kesehatan" class="form-label">Persalinan Balai Kesehatan</label>
                    <input type="number" name="persalinan_balai_kesehatan" class="form-control" value="{{ $data->persalinan_balai_kesehatan }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_ibu_anak" class="form-label">Persalinan Ibu Anak</label>
                    <input type="number" name="persalinan_ibu_anak" class="form-control" value="{{ $data->persalinan_ibu_anak }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_praktek_dokter" class="form-label">Persalinan Praktek Dokter</label>
                    <input type="number" name="persalinan_praktek_dokter" class="form-control" value="{{ $data->persalinan_praktek_dokter }}" required>
                </div>

                {{-- 3. Penolong Persalinan --}}
                <div class="col-md-6 mb-3">
                    <label for="ditolong_dokter" class="form-label">Ditolong Dokter</label>
                    <input type="number" name="ditolong_dokter" class="form-control" value="{{ $data->ditolong_dokter }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ditolong_bidan" class="form-label">Ditolong Bidan</label>
                    <input type="number" name="ditolong_bidan" class="form-control" value="{{ $data->ditolong_bidan }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ditolong_perawat" class="form-label">Ditolong Perawat</label>
                    <input type="number" name="ditolong_perawat" class="form-control" value="{{ $data->ditolong_perawat }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ditolong_dukun" class="form-label">Ditolong Dukun</label>
                    <input type="number" name="ditolong_dukun" class="form-control" value="{{ $data->ditolong_dukun }}" required>
                </div>

                {{-- 4. Total --}}
                <div class="col-md-6 mb-3">
                    <label for="total_persalinan" class="form-label">Total Persalinan</label>
                    <input type="number" name="total_persalinan" class="form-control" value="{{ $data->total_persalinan }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
