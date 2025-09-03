@extends('layouts.master')

@section('title', 'Tambah Data Penduduk Masuk')

@section('action')
    <a href="{{ route('mutasi.masuk.index') }}" class="btn btn-secondary mb-3">
        Kembali
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('mutasi.masuk.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tgl_mutasi" class="form-label">Tanggal Mutasi</label>
                    <input type="date" name="tgl_mutasi" id="tgl_mutasi" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Mutasi</label>
                    <select name="jenis" id="jenis" class="form-select" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Pindah">Pindah</option>
                        <option value="Meninggal">Meninggal</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_ak" class="form-label">ID AK</label>
                    <input type="text" name="id_ak" id="id_ak" class="form-control" placeholder="Masukkan ID AK" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
@endsection
