@extends('layouts.master')

@section('title', 'Tambah Data Rumah Menurut Atap')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Rumah Menurut Atap</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.store') }}" method="POST">
            @csrf

            {{-- Pesan error validasi --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Tidak ada dropdown desa karena diambil otomatis dari session --}}

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_aset_atap" class="form-label">Jenis Atap</label>
                    <select name="id_aset_atap" id="id_aset_atap" class="form-select" required>
                        <option value="">-- Pilih Jenis Atap --</option>
                        @foreach($jenisAtaps as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->nama_jenis_atap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" 
                           class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jumlah" class="form-label">Jumlah Rumah</label>
                    <input type="number" name="jumlah" id="jumlah" 
                           class="form-control" min="0" value="0" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.rumah_menurut_atap.index') }}" class="btn btn-secondary">
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
