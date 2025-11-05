@extends('layouts.master')

@section('title', 'Edit - SEKTOR JASA-JASA')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.update', $sektorJasaJasa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tanggal">Tanggal *</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ $sektorJasaJasa->tanggal }}" class="form-control" required>
            </div>

            {{-- SUBSEKTOR JASA PEMERINTAHAN UMUM --}}
            <div class="bg-warning text-white fw-bold p-2 mb-2">Subsektor Jasa Pemerintahan Umum</div>
            <input type="number" name="jumlah_pelayanan_pemerintah" value="{{ $sektorJasaJasa->jumlah_pelayanan_pemerintah }}" class="form-control mb-2" placeholder="Jumlah jenis jasa pelayanan pemerintahan (Jenis)">
            <input type="number" name="nilai_transaksi_pemerintah" value="{{ $sektorJasaJasa->nilai_transaksi_pemerintah }}" class="form-control mb-2" placeholder="Nilai transaksi pelayanan pemerintahan (Rp)">
            <input type="number" name="biaya_pelayanan_pemerintah" value="{{ $sektorJasaJasa->biaya_pelayanan_pemerintah }}" class="form-control mb-2" placeholder="Biaya yang dikeluarkan (Rp)">

            {{-- SUBSEKTOR JASA SWASTA --}}
            <div class="bg-warning text-white fw-bold p-2 mb-2">Subsektor Jasa Swasta</div>
            <input type="number" name="jumlah_usaha_swasta" value="{{ $sektorJasaJasa->jumlah_usaha_swasta }}" class="form-control mb-2" placeholder="Jumlah usaha jasa sosial (Jenis)">
            <input type="number" name="nilai_aset_swasta" value="{{ $sektorJasaJasa->nilai_aset_swasta }}" class="form-control mb-2" placeholder="Nilai aset produksi jasa sosial (Rp)">
            <input type="number" name="biaya_swasta" value="{{ $sektorJasaJasa->biaya_swasta }}" class="form-control mb-2" placeholder="Biaya yang dikeluarkan (Rp)">

            {{-- SUBSEKTOR JASA HIBURAN DAN REKREASI --}}
            <div class="bg-warning text-white fw-bold p-2 mb-2">Subsektor Jasa Hiburan dan Rekreasi</div>
            <input type="number" name="jumlah_usaha_hiburan" value="{{ $sektorJasaJasa->jumlah_usaha_hiburan }}" class="form-control mb-2" placeholder="Jumlah usaha hiburan dan rekreasi (Jenis)">
            <input type="number" name="nilai_transaksi_hiburan" value="{{ $sektorJasaJasa->nilai_transaksi_hiburan }}" class="form-control mb-2" placeholder="Nilai transaksi usaha hiburan (Rp)">
            <input type="number" name="biaya_hiburan" value="{{ $sektorJasaJasa->biaya_hiburan }}" class="form-control mb-2" placeholder="Biaya yang dikeluarkan (Rp)">

            {{-- SUBSEKTOR JASA PERORANGAN DAN RUMAH TANGGA --}}
            <div class="bg-warning text-white fw-bold p-2 mb-2">Subsektor Jasa Perorangan dan Rumah Tangga</div>
            <input type="number" name="jumlah_jasa_perorangan" value="{{ $sektorJasaJasa->jumlah_jasa_perorangan }}" class="form-control mb-2" placeholder="Jumlah jenis kegiatan jasa perorangan (Jenis)">
            <input type="number" name="nilai_aset_perorangan" value="{{ $sektorJasaJasa->nilai_aset_perorangan }}" class="form-control mb-2" placeholder="Nilai aset jasa perorangan (Rp)">
            <input type="number" name="nilai_transaksi_perorangan" value="{{ $sektorJasaJasa->nilai_transaksi_perorangan }}" class="form-control mb-2" placeholder="Nilai transaksi jasa perorangan (Rp)">
            <input type="number" name="biaya_perorangan" value="{{ $sektorJasaJasa->biaya_perorangan }}" class="form-control mb-2" placeholder="Biaya yang dikeluarkan (Rp)">

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
