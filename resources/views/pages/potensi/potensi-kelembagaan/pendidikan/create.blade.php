@extends('layouts.master')

@section('title', 'Tambah Data Lembaga Pendidikan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Tambah Data Lembaga Pendidikan</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('potensi.potensi-kelembagaan.pendidikan.store') }}" method="POST">
            @csrf

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6 class="fw-bold">Data Umum</h6>
                <div class="row g-3">
                    {{-- Tanggal --}}
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    </div>

                    {{-- Kategori Sekolah --}}
                    <div class="col-md-6">
                        <label class="form-label">Kategori Sekolah *</label>
                        <select name="kategori_id" id="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jenis Sekolah / Tingkatan --}}
                    <div class="col-md-6">
                        <label class="form-label">Tingkatan / Jenis Sekolah *</label>
                        <select name="jenis_sekolah_id" id="jenisSekolah" class="form-select" required>
                            <option value="">-- Pilih Jenis Sekolah --</option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Negeri">Terdaftar</option>
                            <option value="Swasta">Terakreditasi</option>
                        </select>
                    </div>

                    {{-- Jumlah Negeri --}}
                    <div class="col-md-4">
                        <label class="form-label">Jumlah Negeri</label>
                        <input type="number" name="jumlah_negeri" class="form-control" value="{{ old('jumlah_negeri', 0) }}">
                    </div>

                    {{-- Jumlah Swasta --}}
                    <div class="col-md-4">
                        <label class="form-label">Jumlah Swasta</label>
                        <input type="number" name="jumlah_swasta" class="form-control" value="{{ old('jumlah_swasta', 0) }}">
                    </div>

                    {{-- Jumlah Dimiliki Desa --}}
                    <div class="col-md-4">
                        <label class="form-label">Jumlah Dimiliki Desa</label>
                        <input type="number" name="jumlah_dimiliki_desa" class="form-control" value="{{ old('jumlah_dimiliki_desa', 0) }}">
                    </div>

                    {{-- Jumlah Total --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Total</label>
                        <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', 0) }}">
                    </div>

                    {{-- Jumlah Pengajar --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pengajar</label>
                        <input type="number" name="jumlah_pengajar" class="form-control" value="{{ old('jumlah_pengajar', 0) }}">
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

{{-- Dropdown dinamis: Jenis Sekolah berdasarkan Kategori --}}
<script>
    document.getElementById('kategori').addEventListener('change', function() {
        const kategoriId = this.value;
        const jenisSelect = document.getElementById('jenisSekolah');
        jenisSelect.innerHTML = '<option value="">-- Pilih Jenis Sekolah --</option>';

        if (kategoriId) {
            fetch(`/potensi/potensi-kelembagaan/pendidikan/getJenis/${kategoriId}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(item => {
                        let opt = document.createElement('option');
                        opt.value = item.id;
                        opt.textContent = item.nama;
                        jenisSelect.appendChild(opt);
                    });
                })
                .catch(error => console.error('Gagal memuat data jenis sekolah:', error));
        }
    });
</script>
@endsection
