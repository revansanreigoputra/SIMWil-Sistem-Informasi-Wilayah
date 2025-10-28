@extends('layouts.master')

@section('title', 'Tambah Data Rasio Guru dan Murid')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">🧾 Form Tambah Data Rasio Guru dan Murid</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.store') }}" method="POST">
            @csrf

            {{-- Tanggal --}}
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                </div>
            </div>

            {{-- TK --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label for="guru_tk">Jumlah Guru TK/KB (Orang)</label>
                    <input type="number" id="guru_tk" name="guru_tk" class="form-control" value="{{ old('guru_tk') }}" required>
                </div>

                <div class="col-md-6 mb-2">
                    <label for="siswa_tk">Jumlah Siswa TK/KB (Orang)</label>
                    <input type="number" id="siswa_tk" name="siswa_tk" class="form-control" value="{{ old('siswa_tk') }}" required>
                </div>
            </div>

            {{-- SD --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label for="guru_sd">Jumlah Guru SD (Orang)</label>
                    <input type="number" id="guru_sd" name="guru_sd" class="form-control" value="{{ old('guru_sd') }}" required>
                </div>

                <div class="col-md-6 mb-2">
                    <label for="siswa_sd">Jumlah Siswa SD (Orang)</label>
                    <input type="number" id="siswa_sd" name="siswa_sd" class="form-control" value="{{ old('siswa_sd') }}" required>
                </div>
            </div>

            {{-- SLTP --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label for="guru_sltp">Jumlah Guru SLTP (Orang)</label>
                    <input type="number" id="guru_sltp" name="guru_sltp" class="form-control" value="{{ old('guru_sltp') }}" required>
                </div>

                <div class="col-md-6 mb-2">
                    <label for="siswa_sltp">Jumlah Siswa SLTP (Orang)</label>
                    <input type="number" id="siswa_sltp" name="siswa_sltp" class="form-control" value="{{ old('siswa_sltp') }}" required>
                </div>
            </div>

            {{-- SLTA --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label for="guru_slta">Jumlah Guru SLTA (Orang)</label>
                    <input type="number" id="guru_slta" name="guru_slta" class="form-control" value="{{ old('guru_slta') }}" required>
                </div>

                <div class="col-md-6 mb-2">
                    <label for="siswa_slta">Jumlah Siswa SLTA (Orang)</label>
                    <input type="number" id="siswa_slta" name="siswa_slta" class="form-control" value="{{ old('siswa_slta') }}" required>
                </div>
            </div>

            {{-- SLB --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label for="guru_slb">Jumlah Guru SLB (Orang)</label>
                    <input type="number" id="guru_slb" name="guru_slb" class="form-control" value="{{ old('guru_slb') }}" required>
                </div>

                <div class="col-md-6 mb-2">
                    <label for="siswa_slb">Jumlah Siswa SLB (Orang)</label>
                    <input type="number" id="siswa_slb" name="siswa_slb" class="form-control" value="{{ old('siswa_slb') }}" required>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
