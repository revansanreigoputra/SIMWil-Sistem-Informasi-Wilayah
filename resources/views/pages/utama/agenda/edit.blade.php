@extends('layouts.master')

@section('content')
<header class="p-header mb-3">
    <h2 class="p-title">Edit Agenda Kegiatan</h2>
</header>

<div class="card">
    <div class="card-body">
        <h3 class="mb-3">Edit Agenda</h3>

        <form method="POST" action="#">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $data['id'] }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Dari Tanggal</label>
                    <input type="date" name="tgl_dari" class="form-control" value="{{ $data['tgl_dari'] }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Sampai Tanggal</label>
                    <input type="date" name="tgl_sampai" class="form-control" value="{{ $data['tgl_sampai'] }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="{{ $data['lokasi'] }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control" value="{{ $data['kegiatan'] }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Peserta</label>
                <textarea name="peserta" class="form-control" rows="3">{{ $data['peserta'] }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('utama.agenda.index') }}" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
