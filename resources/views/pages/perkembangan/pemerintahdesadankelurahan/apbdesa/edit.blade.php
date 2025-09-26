@extends('layouts.master')

@section('title', 'Edit Data APB Desa')

@section('content')
<div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2"></i>
            Edit Data APB Desa
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.update', $apb->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $apb->tanggal->format('Y-m-d')) }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="apbd_kabupaten" class="form-label">APBD Kabupaten</label>
                    <input type="number" class="form-control" id="apbd_kabupaten" name="apbd_kabupaten" value="{{ old('apbd_kabupaten', $apb->apbd_kabupaten) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bantuan_pemerintah_kabupaten" class="form-label">Bantuan Pemerintah Kabupaten</label>
                    <input type="number" class="form-control" id="bantuan_pemerintah_kabupaten" name="bantuan_pemerintah_kabupaten" value="{{ old('bantuan_pemerintah_kabupaten', $apb->bantuan_pemerintah_kabupaten) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bantuan_pemerintah_provinsi" class="form-label">Bantuan Pemerintah Provinsi</label>
                    <input type="number" class="form-control" id="bantuan_pemerintah_provinsi" name="bantuan_pemerintah_provinsi" value="{{ old('bantuan_pemerintah_provinsi', $apb->bantuan_pemerintah_provinsi) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bantuan_pemerintah_pusat" class="form-label">Bantuan Pemerintah Pusat</label>
                    <input type="number" class="form-control" id="bantuan_pemerintah_pusat" name="bantuan_pemerintah_pusat" value="{{ old('bantuan_pemerintah_pusat', $apb->bantuan_pemerintah_pusat) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pendapatan_asli_desa" class="form-label">Pendapatan Asli Desa</label>
                    <input type="number" class="form-control" id="pendapatan_asli_desa" name="pendapatan_asli_desa" value="{{ old('pendapatan_asli_desa', $apb->pendapatan_asli_desa) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="swadaya_masyarakat" class="form-label">Swadaya Masyarakat</label>
                    <input type="number" class="form-control" id="swadaya_masyarakat" name="swadaya_masyarakat" value="{{ old('swadaya_masyarakat', $apb->swadaya_masyarakat) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="alokasi_dana_desa" class="form-label">Alokasi Dana Desa</label>
                    <input type="number" class="form-control" id="alokasi_dana_desa" name="alokasi_dana_desa" value="{{ old('alokasi_dana_desa', $apb->alokasi_dana_desa) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sumber_pendapatan_perusahaan" class="form-label">Sumber Pendapatan Perusahaan</label>
                    <input type="number" class="form-control" id="sumber_pendapatan_perusahaan" name="sumber_pendapatan_perusahaan" value="{{ old('sumber_pendapatan_perusahaan', $apb->sumber_pendapatan_perusahaan) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sumber_pendapatan_lain" class="form-label">Sumber Pendapatan Lain</label>
                    <input type="number" class="form-control" id="sumber_pendapatan_lain" name="sumber_pendapatan_lain" value="{{ old('sumber_pendapatan_lain', $apb->sumber_pendapatan_lain) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_penerimaan" class="form-label">Jumlah Penerimaan</label>
                    <input type="number" class="form-control" id="jumlah_penerimaan" name="jumlah_penerimaan" value="{{ old('jumlah_penerimaan', $apb->jumlah_penerimaan) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_belanja_publik" class="form-label">Jumlah Belanja Publik</label>
                    <input type="number" class="form-control" id="jumlah_belanja_publik" name="jumlah_belanja_publik" value="{{ old('jumlah_belanja_publik', $apb->jumlah_belanja_publik) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_belanja_aparatur" class="form-label">Jumlah Belanja Aparatur</label>
                    <input type="number" class="form-control" id="jumlah_belanja_aparatur" name="jumlah_belanja_aparatur" value="{{ old('jumlah_belanja_aparatur', $apb->jumlah_belanja_aparatur) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_belanja" class="form-label">Jumlah Belanja</label>
                    <input type="number" class="form-control" id="jumlah_belanja" name="jumlah_belanja" value="{{ old('jumlah_belanja', $apb->jumlah_belanja) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="saldo_anggaran" class="form-label">Saldo Anggaran</label>
                    <input type="number" class="form-control" id="saldo_anggaran" name="saldo_anggaran" value="{{ old('saldo_anggaran', $apb->saldo_anggaran) }}">
                </div>
            </div>

            <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.pemerintahdesadankelurahan.pertanggungjawaban.index') }}"
                        class="btn btn-outline-secondary rounded">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary rounded">
                        Perbarui Data
                    </button>
                </div>
        </form>
    </div>
</div>
@endsection
