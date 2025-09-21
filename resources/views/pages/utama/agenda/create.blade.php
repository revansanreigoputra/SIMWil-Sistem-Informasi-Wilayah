@extends('layouts.master')

@section('title', 'Tambah Agenda')

@section('content')

<div class="card">
    <div class="card-body">
        {{-- Judul Form --}}
        <h4 class="mb-4">Form Tambah Agenda Kegiatan</h4>

        <form method="POST" action="#">
            @csrf

            {{-- Baris 1: Tanggal Dari & Sampai --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Dari Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tgl_dari" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Sampai Tanggal <span class="text-danger">*</span></label>
                    <input type="date" name="tgl_sampai" class="form-control" required>
                </div>
            </div>

            {{-- Baris 2: Lokasi & Kegiatan --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi kegiatan" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kegiatan <span class="text-danger">*</span></label>
                    <input type="text" name="kegiatan" class="form-control" placeholder="Nama kegiatan" required>
                </div>
            </div>

            {{-- Peserta (full width) --}}
            <div class="mb-3">
                <label class="form-label">Peserta <span class="text-danger">*</span></label>
                <textarea name="peserta" class="form-control" rows="3" placeholder="Contoh: Perangkat Desa & Warga" required></textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('utama.agenda.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
