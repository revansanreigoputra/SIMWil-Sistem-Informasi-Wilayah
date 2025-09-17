@extends('layouts.master')

@section('title', 'Detail Transportasi Darat')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            Detail Data Transportasi Darat
        </h5>
    </div>

    <div class="card-body">
        <div class="mb-3">
            <label class="form-label"><strong>Tanggal</strong></label>
            <div class="form-control-plaintext">{{ $transportasiDarat->tanggal->format('Y-m-d') }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Kategori</strong></label>
            <div class="form-control-plaintext">{{ $transportasiDarat->getKategoriOptions()[$transportasiDarat->kategori] ?? $transportasiDarat->kategori }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Jenis Sarana Prasarana</strong></label>
            <div class="form-control-plaintext">{{ $transportasiDarat->getJenisSaranaPrasaranaOptions()[$transportasiDarat->jenis_sarana_prasarana] ?? $transportasiDarat->jenis_sarana_prasarana }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Kondisi Baik</strong></label>
            <div class="form-control-plaintext">{{ $transportasiDarat->kondisi_baik }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Kondisi Rusak</strong></label>
            <div class="form-control-plaintext">{{ $transportasiDarat->kondisi_rusak }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label"><strong>Jumlah (Km/Unit)</strong></label>
            <div class="form-control-plaintext">{{ $transportasiDarat->jumlah }}</div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group d-flex justify-content-end gap-2">
                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.edit', $transportasiDarat->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('potensi.potensi-prasarana-dan-sarana.transportasi-darat.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection