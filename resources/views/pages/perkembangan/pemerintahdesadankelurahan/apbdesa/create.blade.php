@extends('layouts.master')

@section('title', 'Tambah Data APB Desa')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2"></i>
            Tambah Data APB Desa
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.store') }}" method="POST">
            @csrf

           <div class="row">
            <!-- Kolom Tanggal -->
            <div class="col-md-6 mb-3">
                <label for="tanggal" class="form-label fw-semibold">
                    <i class="fas fa-calendar me-1"></i>
                    Tanggal <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    name="tanggal" value="{{ old('tanggal') }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kolom Desa -->
            <div class="col-md-6 mb-3">
                <label for="id_desa" class="form-label fw-semibold">
                    <i class="fas fa-map-marker-alt me-1"></i>
                    Desa <span class="text-danger">*</span>
                </label>
                <select name="id_desa" id="id_desa" class="form-control" required>
                    <option value="">-- Pilih Desa --</option>
                    @foreach ($desas as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_desa }}</option>
                    @endforeach
                </select>
            </div>

            <h5 class="fw-bold text-primary mb-3">Pendapatan</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="apbd_kabupaten" class="form-label fw-semibold">APBD Kabupaten (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('apbd_kabupaten') is-invalid @enderror"
                        name="apbd_kabupaten" id="apbd_kabupaten" value="{{ old('apbd_kabupaten') }}" required>
                    @error('apbd_kabupaten')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="bantuan_pemerintah_kabupaten" class="form-label fw-semibold">Bantuan Pemerintah Kabupaten (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('bantuan_pemerintah_kabupaten') is-invalid @enderror"
                        name="bantuan_pemerintah_kabupaten" id="bantuan_pemerintah_kabupaten" value="{{ old('bantuan_pemerintah_kabupaten') }}" required>
                    @error('bantuan_pemerintah_kabupaten')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="bantuan_pemerintah_provinsi" class="form-label fw-semibold">Bantuan Pemerintah Provinsi (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('bantuan_pemerintah_provinsi') is-invalid @enderror"
                        name="bantuan_pemerintah_provinsi" id="bantuan_pemerintah_provinsi" value="{{ old('bantuan_pemerintah_provinsi') }}" required>
                    @error('bantuan_pemerintah_provinsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="bantuan_pemerintah_pusat" class="form-label fw-semibold">Bantuan Pemerintah Pusat (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('bantuan_pemerintah_pusat') is-invalid @enderror"
                        name="bantuan_pemerintah_pusat" id="bantuan_pemerintah_pusat" value="{{ old('bantuan_pemerintah_pusat') }}" required>
                    @error('bantuan_pemerintah_pusat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="pendapatan_asli_desa" class="form-label fw-semibold">Pendapatan Asli Desa (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('pendapatan_asli_desa') is-invalid @enderror"
                        name="pendapatan_asli_desa" id="pendapatan_asli_desa" value="{{ old('pendapatan_asli_desa') }}" required>
                    @error('pendapatan_asli_desa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="swadaya_masyarakat" class="form-label fw-semibold">Swadaya Masyarakat (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('swadaya_masyarakat') is-invalid @enderror"
                        name="swadaya_masyarakat" id="swadaya_masyarakat" value="{{ old('swadaya_masyarakat') }}" required>
                    @error('swadaya_masyarakat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <h5 class="fw-bold text-primary mb-3">Belanja & Saldo</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="alokasi_dana_desa" class="form-label fw-semibold">Alokasi Dana Desa (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('alokasi_dana_desa') is-invalid @enderror"
                        name="alokasi_dana_desa" id="alokasi_dana_desa" value="{{ old('alokasi_dana_desa') }}" required>
                    @error('alokasi_dana_desa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="sumber_pendapatan_perusahaan" class="form-label fw-semibold">Sumber Pendapatan Perusahaan (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('sumber_pendapatan_perusahaan') is-invalid @enderror"
                        name="sumber_pendapatan_perusahaan" id="sumber_pendapatan_perusahaan" value="{{ old('sumber_pendapatan_perusahaan') }}" required>
                    @error('sumber_pendapatan_perusahaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="sumber_pendapatan_lain" class="form-label fw-semibold">Sumber Pendapatan Lain (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('sumber_pendapatan_lain') is-invalid @enderror"
                        name="sumber_pendapatan_lain" id="sumber_pendapatan_lain" value="{{ old('sumber_pendapatan_lain') }}" required>
                    @error('sumber_pendapatan_lain')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_penerimaan" class="form-label fw-semibold">Jumlah Penerimaan (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('jumlah_penerimaan') is-invalid @enderror"
                        name="jumlah_penerimaan" id="jumlah_penerimaan" value="{{ old('jumlah_penerimaan') }}" required>
                    @error('jumlah_penerimaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jumlah_belanja" class="form-label fw-semibold">Jumlah Belanja (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('jumlah_belanja') is-invalid @enderror"
                        name="jumlah_belanja" id="jumlah_belanja" value="{{ old('jumlah_belanja') }}" required>
                    @error('jumlah_belanja')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_belanja_publik" class="form-label fw-semibold">Jumlah Belanja Publik (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('jumlah_belanja_publik') is-invalid @enderror"
                        name="jumlah_belanja_publik" id="jumlah_belanja_publik" value="{{ old('jumlah_belanja_publik') }}" required>
                    @error('jumlah_belanja_publik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jumlah_belanja_aparatur" class="form-label fw-semibold">Jumlah Belanja Aparatur (Rp) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rupiah @error('jumlah_belanja_aparatur') is-invalid @enderror"
                        name="jumlah_belanja_aparatur" id="jumlah_belanja_aparatur" value="{{ old('jumlah_belanja_aparatur') }}" required>
                    @error('jumlah_belanja_aparatur')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-6 mb-3">
                <label for="saldo_anggaran" class="form-label fw-semibold">Saldo Anggaran (Rp) <span class="text-danger">*</span></label>
                <input type="text" class="form-control rupiah @error('saldo_anggaran') is-invalid @enderror"
                    name="saldo_anggaran" id="saldo_anggaran" value="{{ old('saldo_anggaran') }}" required>
                @error('saldo_anggaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Field dengan tanda <span class="text-danger">*</span> wajib diisi
                </small>

                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.index') }}"
                        class="btn btn-outline-secondary rounded">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary rounded">
                        Simpan Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.rupiah').forEach(function (input) {
    input.addEventListener('input', function (e) {
        let value = e.target.value.replace(/[^,\d]/g, '');
        let numberString = value.toString(),
            split = numberString.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        e.target.value = rupiah ? 'Rp ' + rupiah : '';
    });
});
</script>
@endpush
