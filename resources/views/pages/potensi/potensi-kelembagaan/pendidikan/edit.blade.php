@extends('layouts.master')

@section('title', 'Edit Data Lembaga Pendidikan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Edit Data Lembaga Pendidikan</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('potensi.potensi-kelembagaan.pendidikan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $data->tanggal) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kategori Sekolah *</label>
                        <select name="kategori_id" id="kategori_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ $data->kategori_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Sekolah *</label>
                        <select name="jenis_sekolah_id" id="jenis_sekolah_id" class="form-control" required>
                            <option value="">-- Pilih Jenis --</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}" {{ $data->jenis_sekolah_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Negeri" {{ $data->status == 'Negeri' ? 'selected' : '' }}>Negeri</option>
                            <option value="Swasta" {{ $data->status == 'Swasta' ? 'selected' : '' }}>Swasta</option>
                            <option value="Lainnya" {{ $data->status == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Data Jumlah --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Jumlah dan Tenaga Pengajar</h6>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Jumlah Negeri</label>
                        <input type="number" name="jumlah_negeri" class="form-control" value="{{ old('jumlah_negeri', $data->jumlah_negeri) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Swasta</label>
                        <input type="number" name="jumlah_swasta" class="form-control" value="{{ old('jumlah_swasta', $data->jumlah_swasta) }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Jumlah Dimiliki Desa</label>
                        <input type="number" name="jumlah_dimiliki_desa" class="form-control" value="{{ old('jumlah_dimiliki_desa', $data->jumlah_dimiliki_desa) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Total Sekolah</label>
                        <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $data->jumlah) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pengajar (Orang)</label>
                        <input type="number" name="jumlah_pengajar" class="form-control" value="{{ old('jumlah_pengajar', $data->jumlah_pengajar) }}">
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </form>
    </div>
</div>

{{-- Script Dependent Dropdown --}}
<script>
    document.getElementById('kategori_id').addEventListener('change', function () {
        let kategoriId = this.value;
        let jenisSelect = document.getElementById('jenis_sekolah_id');

        jenisSelect.innerHTML = '<option value="">Loading...</option>';

        if (kategoriId) {
            fetch(`/potensi/potensi-kelembagaan/pendidikan/getJenis/${kategoriId}`)
                .then(response => response.json())
                .then(data => {
                    jenisSelect.innerHTML = '<option value="">-- Pilih Jenis --</option>';
                    data.forEach(function (item) {
                        jenisSelect.innerHTML += `<option value="${item.id}">${item.nama}</option>`;
                    });
                });
        } else {
            jenisSelect.innerHTML = '<option value="">-- Pilih Jenis --</option>';
        }
    });
</script>
@endsection
