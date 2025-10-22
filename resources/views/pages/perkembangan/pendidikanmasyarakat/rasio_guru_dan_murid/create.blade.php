@extends('layouts.master')

@section('title', 'Tambah Data Rasio Guru & Murid')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">🧾 Form Tambah Data Rasio Guru & Murid</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.store') }}" method="POST">
            @csrf

            {{-- Baris 1: Desa & Tanggal --}}
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Desa</label>
                    <select name="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach($desas as $desa)
                            <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
            </div>

            {{-- Baris 2: TK --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru TK/KB (Orang)</label>
                    <input type="number" name="guru_tk" id="guru_tk" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa TK/KB (Orang)</label>
                    <input type="number" name="siswa_tk" id="siswa_tk" class="form-control" value="0" required>
                </div>
            </div>

            {{-- Baris 3: SD --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru SD (Orang)</label>
                    <input type="number" name="guru_sd" id="guru_sd" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa SD (Orang)</label>
                    <input type="number" name="siswa_sd" id="siswa_sd" class="form-control" value="0" required>
                </div>
            </div>

            {{-- Baris 4: SLTP --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru SLTP (Orang)</label>
                    <input type="number" name="guru_sltp" id="guru_sltp" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa SLTP (Orang)</label>
                    <input type="number" name="siswa_sltp" id="siswa_sltp" class="form-control" value="0" required>
                </div>
            </div>

            {{-- Baris 5: SLTA --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru SLTA (Orang)</label>
                    <input type="number" name="guru_slta" id="guru_slta" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa SLTA (Orang)</label>
                    <input type="number" name="siswa_slta" id="siswa_slta" class="form-control" value="0" required>
                </div>
            </div>

            {{-- Baris 6: SLB --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru SLB (Orang)</label>
                    <input type="number" name="guru_slb" id="guru_slb" class="form-control" value="0" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa SLB (Orang)</label>
                    <input type="number" name="siswa_slb" id="siswa_slb" class="form-control" value="0" required>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
