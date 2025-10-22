@extends('layouts.master')

@section('title', 'Tambah Wajib Belajar 9 Tahun')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="desa_id">Desa *</label>
                <select name="desa_id" id="desa_id" class="form-control" required>
                    <option value="">-- Pilih Desa --</option>
                    @foreach($desas as $desa)
                        <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal">Tanggal *</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Jumlah penduduk usia 7–15 tahun (Orang)</label>
                <input type="number" name="penduduk" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Jumlah penduduk usia 7–15 tahun yang masih sekolah (Orang)</label>
                <input type="number" name="masih_sekolah" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label>Jumlah penduduk usia 7–15 tahun yang tidak sekolah (Orang)</label>
                <input type="number" name="tidak_sekolah" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
