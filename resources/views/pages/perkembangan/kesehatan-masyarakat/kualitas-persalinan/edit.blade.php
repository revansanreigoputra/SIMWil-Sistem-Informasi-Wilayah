@extends('layouts.master')

@section('title', 'Edit Data Kualitas Persalinan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Formulir Edit Data Kualitas Persalinan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.update', $kualitasPersalinan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Informasi Umum --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control"
                        value="{{ \Carbon\Carbon::parse($kualitasPersalinan->tanggal)->format('Y-m-d') }}" required>
                </div>

                {{-- Tempat Persalinan --}}
                <h6 class="mt-3 fw-bold text-primary">Tempat Persalinan</h6>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Persalinan Rumah Sakit Umum</label>
                    <input type="number" name="persalinan_rumah_sakit_umum" class="form-control"
                        value="{{ $kualitasPersalinan->persalinan_rumah_sakit_umum }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Persalinan Puskesmas</label>
                    <input type="number" name="persalinan_puskesmas" class="form-control"
                        value="{{ $kualitasPersalinan->persalinan_puskesmas }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Persalinan Praktek Bidan</label>
                    <input type="number" name="persalinan_praktek_bidan" class="form-control"
                        value="{{ $kualitasPersalinan->persalinan_praktek_bidan }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Persalinan Rumah Bersalin</label>
                    <input type="number" name="persalinan_rumah_bersalin" class="form-control"
                        value="{{ $kualitasPersalinan->persalinan_rumah_bersalin }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Persalinan Polindes</label>
                    <input type="number" name="persalinan_polindes" class="form-control"
                        value="{{ $kualitasPersalinan->persalinan_polindes }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Persalinan Balai Kesehatan Ibu Anak</label>
                    <input type="number" name="persalinan_balai_kesehatan_ibu_anak" class="form-control"
                        value="{{ $kualitasPersalinan->persalinan_balai_kesehatan_ibu_anak }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Persalinan Praktek Dokter</label>
                    <input type="number" name="persalinan_praktek_dokter" class="form-control"
                        value="{{ $kualitasPersalinan->persalinan_praktek_dokter }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Persalinan di Rumah Sendiri</label>
                    <input type="number" name="rumah_sendiri" class="form-control"
                        value="{{ $kualitasPersalinan->rumah_sendiri }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Persalinan di Rumah Dukun</label>
                    <input type="number" name="rumah_dukun" class="form-control"
                        value="{{ $kualitasPersalinan->rumah_dukun }}">
                </div>

                {{-- Penolong Persalinan --}}
                <h6 class="mt-4 fw-bold text-primary">Penolong Persalinan</h6>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ditolong Dokter</label>
                    <input type="number" name="ditolong_dokter" class="form-control"
                        value="{{ $kualitasPersalinan->ditolong_dokter }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ditolong Bidan</label>
                    <input type="number" name="ditolong_bidan" class="form-control"
                        value="{{ $kualitasPersalinan->ditolong_bidan }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ditolong Perawat</label>
                    <input type="number" name="ditolong_perawat" class="form-control"
                        value="{{ $kualitasPersalinan->ditolong_perawat }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ditolong Dukun Bersalin</label>
                    <input type="number" name="ditolong_dukun_bersalin" class="form-control"
                        value="{{ $kualitasPersalinan->ditolong_dukun_bersalin }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ditolong Keluarga</label>
                    <input type="number" name="ditolong_keluarga" class="form-control"
                        value="{{ $kualitasPersalinan->ditolong_keluarga }}">
                </div>

                {{-- Total --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Total Persalinan</label>
                    <input type="number" name="total_persalinan" class="form-control"
                        value="{{ $kualitasPersalinan->total_persalinan }}">
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
