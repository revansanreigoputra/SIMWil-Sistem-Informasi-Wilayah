@extends('layouts.master')

@section('title', 'Tambah Data Kualitas Persalinan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.store') }}" method="POST">
            @csrf
            <div class="row">
                {{-- 1. Informasi dasar --}}
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                {{-- 2. Tempat Persalinan --}}
                <div class="col-md-6 mb-3">
                    <label for="persalinan_rumah_sakit_umum" class="form-label">Persalinan Rumah Sakit Umum</label>
                    <input type="number" name="persalinan_rumah_sakit_umum" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_puskesmas" class="form-label">Persalinan Puskesmas</label>
                    <input type="number" name="persalinan_puskesmas" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_praktek_bidan" class="form-label">Persalinan Praktek Bidan</label>
                    <input type="number" name="persalinan_praktek_bidan" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_rumah_bersalin" class="form-label">Persalinan Rumah Bersalin</label>
                    <input type="number" name="persalinan_rumah_bersalin" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_polindes" class="form-label">Persalinan Polindes</label>
                    <input type="number" name="persalinan_polindes" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_balai_kesehatan" class="form-label">Persalinan Balai Kesehatan</label>
                    <input type="number" name="persalinan_balai_kesehatan" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_ibu_anak" class="form-label">Persalinan Ibu Anak</label>
                    <input type="number" name="persalinan_ibu_anak" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_praktek_dokter" class="form-label">Persalinan Praktek Dokter</label>
                    <input type="number" name="persalinan_praktek_dokter" class="form-control" required>
                </div>

                {{-- 3. Penolong Persalinan --}}
                <div class="col-md-6 mb-3">
                    <label for="ditolong_dokter" class="form-label">Ditolong Dokter</label>
                    <input type="number" name="ditolong_dokter" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ditolong_bidan" class="form-label">Ditolong Bidan</label>
                    <input type="number" name="ditolong_bidan" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ditolong_perawat" class="form-label">Ditolong Perawat</label>
                    <input type="number" name="ditolong_perawat" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ditolong_dukun" class="form-label">Ditolong Dukun</label>
                    <input type="number" name="ditolong_dukun" class="form-control" required>
                </div>

                {{-- 4. Total --}}
                <div class="col-md-6 mb-3">
                    <label for="total_persalinan" class="form-label">Total Persalinan</label>
                    <input type="number" name="total_persalinan" class="form-control" required>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
