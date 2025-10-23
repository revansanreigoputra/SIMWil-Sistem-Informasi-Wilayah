@extends('layouts.master')

@section('title', 'Edit Data Rasio Guru & Murid')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">🧾 Form Edit Data Rasio Guru & Murid</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Baris 1: Desa dan Tanggal --}}
            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Desa</label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('id_desa', $item->id_desa) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $item->tanggal) }}" required>
                </div>
            </div>

            {{-- Baris 2: TK --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru TK/KB (Orang)</label>
                    <input type="number" name="guru_tk" id="guru_tk" class="form-control" value="{{ old('guru_tk', $item->guru_tk) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa TK/KB (Orang)</label>
                    <input type="number" name="siswa_tk" id="siswa_tk" class="form-control" value="{{ old('siswa_tk', $item->siswa_tk) }}" required>
                </div>
            </div>

            {{-- Baris 3: SD --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru SD (Orang)</label>
                    <input type="number" name="guru_sd" id="guru_sd" class="form-control" value="{{ old('guru_sd', $item->guru_sd) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa SD (Orang)</label>
                    <input type="number" name="siswa_sd" id="siswa_sd" class="form-control" value="{{ old('siswa_sd', $item->siswa_sd) }}" required>
                </div>
            </div>

            {{-- Baris 4: SLTP --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru SLTP (Orang)</label>
                    <input type="number" name="guru_sltp" id="guru_sltp" class="form-control" value="{{ old('guru_sltp', $item->guru_sltp) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa SLTP (Orang)</label>
                    <input type="number" name="siswa_sltp" id="siswa_sltp" class="form-control" value="{{ old('siswa_sltp', $item->siswa_sltp) }}" required>
                </div>
            </div>

            {{-- Baris 5: SLTA --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru SLTA (Orang)</label>
                    <input type="number" name="guru_slta" id="guru_slta" class="form-control" value="{{ old('guru_slta', $item->guru_slta) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa SLTA (Orang)</label>
                    <input type="number" name="siswa_slta" id="siswa_slta" class="form-control" value="{{ old('siswa_slta', $item->siswa_slta) }}" required>
                </div>
            </div>

            {{-- Baris 6: SLB --}}
            <div class="row mt-2">
                <div class="col-md-6 mb-2">
                    <label>Jumlah Guru SLB (Orang)</label>
                    <input type="number" name="guru_slb" id="guru_slb" class="form-control" value="{{ old('guru_slb', $item->guru_slb) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Jumlah Siswa SLB (Orang)</label>
                    <input type="number" name="siswa_slb" id="siswa_slb" class="form-control" value="{{ old('siswa_slb', $item->siswa_slb) }}" required>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>
@endsection
