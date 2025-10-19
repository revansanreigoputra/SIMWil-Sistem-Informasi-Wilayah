@extends('layouts.master')

@section('title', 'Tambah Data Kualitas Persalinan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.store') }}" method="POST">
            @csrf
            <div class="row">

                {{-- Pilih Desa --}}
                <div class="col-md-6 mb-3">
                    <label for="desa_id">Desa</label>
                    <select name="desa_id" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Tanggal --}}
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                {{-- TEMPAT PERSALINAN --}}
                <div class="col-md-6 mb-3">
                    <label for="persalinan_rumah_sakit_umum">Persalinan Rumah Sakit Umum</label>
                    <input type="number" name="persalinan_rumah_sakit_umum" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_puskesmas">Persalinan Puskesmas</label>
                    <input type="number" name="persalinan_puskesmas" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_praktek_bidan">Persalinan Praktek Bidan</label>
                    <input type="number" name="persalinan_praktek_bidan" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_rumah_bersalin">Persalinan Rumah Bersalin</label>
                    <input type="number" name="persalinan_rumah_bersalin" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_polindes">Persalinan Polindes</label>
                    <input type="number" name="persalinan_polindes" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="persalinan_balai_kesehatan_ibu_anak" class="form-label">Persalinan Balai Kesehatan Ibu Anak</label>
                <input type="number" name="persalinan_balai_kesehatan_ibu_anak" class="form-control" required>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="persalinan_praktek_dokter">Persalinan Praktek Dokter</label>
                    <input type="number" name="persalinan_praktek_dokter" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rumah_sendiri">Rumah Sendiri</label>
                    <input type="number" name="rumah_sendiri" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rumah_dukun">Rumah Dukun</label>
                    <input type="number" name="rumah_dukun" class="form-control" required>
                </div>

                {{-- PENOLONG PERSALINAN --}}
                <div class="col-md-6 mb-3">
                    <label for="ditolong_dokter">Ditolong Dokter</label>
                    <input type="number" name="ditolong_dokter" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ditolong_bidan">Ditolong Bidan</label>
                    <input type="number" name="ditolong_bidan" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ditolong_perawat">Ditolong Perawat</label>
                    <input type="number" name="ditolong_perawat" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                   <label for="ditolong_dukun_bersalin" class="form-label">Ditolong Dukun Bersalin</label>
                    <input type="number" name="ditolong_dukun_bersalin" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ditolong_keluarga">Ditolong Keluarga</label>
                    <input type="number" name="ditolong_keluarga" class="form-control" required>
                </div>

                {{-- TOTAL --}}
                <div class="col-md-6 mb-3">
                    <label for="total_persalinan">Total Persalinan</label>
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
