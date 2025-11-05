@extends('layouts.master')

@section('title', 'Tambah - SEKTOR JASA-JASA')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="tanggal">Tanggal *</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            {{-- SUBSEKTOR JASA PEMERINTAHAN UMUM --}}
            <div class="bg-warning text-white fw-bold p-2 mb-2">Subsektor Jasa Pemerintahan Umum</div>
            <div class="mb-3">
                <label>Jumlah jenis jasa pelayanan pemerintahan kepada masyarakat (Jenis)</label>
                <input type="number" name="jumlah_pelayanan_pemerintah" class="form-control">
            </div>
            <div class="mb-3">
                <label>Nilai transaksi pelayanan pemerintahan kepada masyarakat (Rp)</label>
                <input type="number" name="nilai_transaksi_pemerintah" class="form-control">
            </div>
            <div class="mb-3">
                <label>Biaya yang dikeluarkan dalam pelayanan (Rp)</label>
                <input type="number" name="biaya_pelayanan_pemerintah" class="form-control">
            </div>

            {{-- SUBSEKTOR JASA SWASTA --}}
            <div class="bg-warning text-white fw-bold p-2 mb-2">Subsektor Jasa Swasta</div>
            <div class="mb-3">
                <label>Jumlah usaha jasa pelayanan sosial yang disediakan masyarakat (Jenis)</label>
                <input type="number" name="jumlah_usaha_swasta" class="form-control">
            </div>
            <div class="mb-3">
                <label>Nilai aset produksi jasa pelayanan sosial (Rp)</label>
                <input type="number" name="nilai_aset_swasta" class="form-control">
            </div>
            <div class="mb-3">
                <label>Biaya yang dikeluarkan (Rp)</label>
                <input type="number" name="biaya_swasta" class="form-control">
            </div>

            {{-- SUBSEKTOR JASA HIBURAN DAN REKREASI --}}
            <div class="bg-warning text-white fw-bold p-2 mb-2">Subsektor Jasa Hiburan dan Rekreasi</div>
            <div class="mb-3">
                <label>Jumlah jenis jasa hiburan dan rekreasi (Jenis)</label>
                <input type="number" name="jumlah_usaha_hiburan" class="form-control">
            </div>
            <div class="mb-3">
                <label>Nilai transaksi usaha jasa hiburan dan rekreasi (Rp)</label>
                <input type="number" name="nilai_transaksi_hiburan" class="form-control">
            </div>
            <div class="mb-3">
                <label>Biaya yang dikeluarkan (Rp)</label>
                <input type="number" name="biaya_hiburan" class="form-control">
            </div>

            {{-- SUBSEKTOR JASA PERORANGAN DAN RUMAH TANGGA --}}
            <div class="bg-warning text-white fw-bold p-2 mb-2">Subsektor Jasa Perorangan dan Rumah Tangga</div>
            <div class="mb-3">
                <label>Jumlah jenis kegiatan jasa pelayanan perorangan dan rumah tangga (Jenis)</label>
                <input type="number" name="jumlah_jasa_perorangan" class="form-control">
            </div>
            <div class="mb-3">
                <label>Nilai aset jasa pelayanan perorangan dan rumah tangga (Rp)</label>
                <input type="number" name="nilai_aset_perorangan" class="form-control">
            </div>
            <div class="mb-3">
                <label>Nilai transaksi jasa pelayanan perorangan dan rumah tangga (Rp)</label>
                <input type="number" name="nilai_transaksi_perorangan" class="form-control">
            </div>
            <div class="mb-3">
                <label>Biaya yang dikeluarkan (Rp)</label>
                <input type="number" name="biaya_perorangan" class="form-control">
            </div>

            <p class="text-muted fst-italic">* Field yang wajib diisi</p>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('perkembangan.produk-domestik.sektor-jasa-jasa.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
