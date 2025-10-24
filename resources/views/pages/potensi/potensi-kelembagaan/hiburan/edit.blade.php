@extends('layouts.master')

@section('title', 'Edit Data Usaha Jasa, Hiburan, dll')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Edit Data Usaha Jasa, Hiburan, dll</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('potensi.potensi-kelembagaan.hiburan.update', $hiburan->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6 class="fw-bold">Data Umum</h6>
                <div class="row g-3">
                    {{-- Tanggal --}}
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control"
                            value="{{ old('tanggal', $hiburan->tanggal) }}" required>
                    </div>

                    {{-- Kategori --}}
                    <div class="col-md-6">
                        <label class="form-label">Kategori *</label>
                        <select name="kategori_id" id="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ $hiburan->kategori_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jenis Usaha --}}
                    <div class="col-md-6">
                        <label class="form-label">Jenis Usaha *</label>
                        <select name="jenis_usaha_id" id="jenis_usaha" class="form-select" required>
                            <option value="">-- Pilih Jenis Usaha --</option>
                            @foreach($jenisUsaha as $j)
                                <option value="{{ $j->id }}" {{ $hiburan->jenis_usaha_id == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jumlah Unit --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah (Unit)</label>
                        <input type="number" name="jumlah_unit" class="form-control"
                            value="{{ old('jumlah_unit', $hiburan->jumlah_unit) }}" required>
                    </div>

                    {{-- Jenis Produk --}}
                    <div class="col-md-6">
                        <label class="form-label">Jenis Produk</label>
                        <input type="number" name="jenis_produk" class="form-control"
                            value="{{ old('jenis_produk', $hiburan->jenis_produk) }}" required>
                    </div>
                </div>
            </div>

            {{-- Data Kegiatan --}}
            <div class="card mb-3 p-3 bg-light">
                <h6 class="fw-bold">Data Kegiatan</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Tenaga Kerja (Orang)</label>
                        <input type="number" name="jumlah_tenaga_kerja" class="form-control"
                            value="{{ old('jumlah_tenaga_kerja', $hiburan->jumlah_tenaga_kerja) }}" required>
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.hiburan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

{{-- Script dependent dropdown --}}
<script>
document.getElementById('kategori').addEventListener('change', function() {
    let kategoriId = this.value;
    let jenisSelect = document.getElementById('jenis_usaha');

    // Kosongkan pilihan lama
    jenisSelect.innerHTML = '<option value="">-- Pilih Jenis Usaha --</option>';

    if (kategoriId) {
        fetch(`/potensi/potensi-kelembagaan/hiburan/getJenis/${kategoriId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(item => {
                    let opt = document.createElement('option');
                    opt.value = item.id;
                    opt.textContent = item.nama;
                    jenisSelect.appendChild(opt);
                });
            })
            .catch(error => console.error('Error:', error));
    }
});
</script>
@endsection
