@extends('layouts.master')

@section('title', 'Tambah Data Sarana Produksi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Data Sarana Produksi</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.sarana_produksi.store') }}" method="POST">
            @csrf

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
            </div>

            <div class="row mt-2">
                @for($i = 1; $i <= 12; $i++)
                    <div class="col-md-6 mb-2">
                        <label>
                            @switch($i)
                                @case(1) Memiliki penggilingan padi (Orang) @break
                                @case(2) Memiliki traktor (Orang) @break
                                @case(3) Memiliki kapal penangkap ikan (Orang) @break
                                @case(4) Memiliki alat pengolahan hasil perikanan (Orang) @break
                                @case(5) Memiliki alat pengolahan hasil peternakan (Orang) @break
                                @case(6) Memiliki alat pengolahan hasil perkebunan (Orang) @break
                                @case(7) Memiliki alat pengolahan hasil hutan (Orang) @break
                                @case(8) Memiliki alat produksi dan pengolah hasil pertambangan (Orang) @break
                                @case(9) Memiliki alat produksi dan pengolah hasil pariwisata (Orang) @break
                                @case(10) Memiliki alat produksi dan pengolah hasil industri jasa perdagangan (Orang) @break
                                @case(11) Memiliki alat produksi dan pengolah hasil industri kerajinan keluarga skala kecil dan menengah (Orang) @break
                                @case(12) Memiliki alat produksi dan pengolah hasil industri Migas (Orang) @break
                            @endswitch
                        </label>
                        <input type="number" name="produksi{{ $i }}" class="form-control produksi-input" min="0" value="0" required>
                    </div>
                @endfor
            </div>

            <hr>
            <div class="mt-3">
                <label class="form-label fw-bold">Total Jumlah Produksi</label>
                <input type="number" id="total_jumlah" class="form-control bg-light" readonly>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Script hitung otomatis --}}
<script>
document.addEventListener('input', function() {
    let total = 0;
    document.querySelectorAll('.produksi-input').forEach(function(input) {
        total += parseFloat(input.value) || 0;
    });
    document.getElementById('total_jumlah').value = total;
});
</script>
@endsection
