@extends('layouts.master')

@section('title', 'Edit Data Pengangguran')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Pengangguran</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('perkembangan.ekonomimasyarakat.pengangguran.update', $pengangguran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $pengangguran->tanggal) }}" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Kecamatan</label>
                    <select name="id_kecamatan" id="id_kecamatan" class="form-control" required>
                        <option value="">-- Pilih Kecamatan --</option>
                        @foreach($kecamatans as $kec)
                            <option value="{{ $kec->id }}" {{ old('id_kecamatan', $pengangguran->id_kec) == $kec->id ? 'selected' : '' }}>
                                {{ $kec->nama_kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-2">
                    <label>Desa</label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach($desas as $desa)
                            <option value="{{ $desa->id }}" data-kec="{{ $desa->id_kec }}" {{ old('id_desa', $pengangguran->id_desa) == $desa->id ? 'selected' : '' }}>
                                {{ $desa->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4 mb-2">
                    <label>Angkatan Kerja</label>
                    <input type="number" name="angkatan_kerja" class="form-control" value="{{ old('angkatan_kerja', $pengangguran->angkatan_kerja) }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Masih Sekolah</label>
                    <input type="number" name="masih_sekolah" class="form-control" value="{{ old('masih_sekolah', $pengangguran->masih_sekolah) }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Ibu Rumah Tangga</label>
                    <input type="number" name="ibu_rumah_tangga" class="form-control" value="{{ old('ibu_rumah_tangga', $pengangguran->ibu_rumah_tangga) }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Bekerja Penuh</label>
                    <input type="number" name="bekerja_penuh" class="form-control" value="{{ old('bekerja_penuh', $pengangguran->bekerja_penuh) }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Bekerja Tidak Tentu</label>
                    <input type="number" name="bekerja_tidak_tentu" class="form-control" value="{{ old('bekerja_tidak_tentu', $pengangguran->bekerja_tidak_tentu) }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Tidak Bekerja</label>
                    <input type="number" name="tidak_bekerja" class="form-control" value="{{ old('tidak_bekerja', $pengangguran->tidak_bekerja) }}" required>
                </div>
                <div class="col-md-4 mb-2">
                    <label>Bekerja</label>
                    <input type="number" name="bekerja" class="form-control" value="{{ old('bekerja', $pengangguran->bekerja) }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.ekonomimasyarakat.pengangguran.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
$(document).ready(function() {
    function filterDesa() {
        var kecId = $('#id_kecamatan').val();
        $('#id_desa option').each(function() {
            var desaKec = $(this).data('kec');
            if(!desaKec || kecId == desaKec) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        if($('#id_desa option:selected').is(':hidden')) {
            $('#id_desa').val('');
        }
    }

    $('#id_kecamatan').change(filterDesa);
    filterDesa(); // filter saat load halaman
});
</script>
@endpush
