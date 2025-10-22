@extends('layouts.master')

@section('title', 'Edit Wajib Belajar 9 Tahun')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="desa_id">Desa *</label>
                <select name="desa_id" id="desa_id" class="form-control" required>
                    @foreach($desas as $desa)
                        <option value="{{ $desa->id }}" {{ $desa->id == $item->desa_id ? 'selected' : '' }}>
                            {{ $desa->nama_desa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="tanggal">Tanggal *</label>
                <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Jumlah penduduk usia 7–15 tahun (Orang)</label>
                <input type="number" name="penduduk" class="form-control" value="{{ $item->penduduk }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Jumlah penduduk usia 7–15 tahun yang masih sekolah (Orang)</label>
                <input type="number" name="masih_sekolah" class="form-control" value="{{ $item->masih_sekolah }}" required>
            </div>

            <div class="form-group mb-3">
                <label>Jumlah penduduk usia 7–15 tahun yang tidak sekolah (Orang)</label>
                <input type="number" name="tidak_sekolah" class="form-control" value="{{ $item->tidak_sekolah }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
