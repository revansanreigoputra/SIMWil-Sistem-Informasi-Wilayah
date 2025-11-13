@extends('layouts.master')

@section('title', 'Edit Data Sarana Produksi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Sarana Produksi</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.sarana_produksi.update', $saranaProduksi) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Tanggal --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" 
                           value="{{ old('tanggal', $saranaProduksi->tanggal) }}" required>
                </div>
            </div>

            {{-- Produksi 1-12 --}}
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
                        <input 
                            type="number" 
                            name="produksi{{ $i }}" 
                            class="form-control produksi" 
                            min="0" 
                            value="{{ old('produksi'.$i, $saranaProduksi->{'produksi'.$i}) }}">
                    </div>
                @endfor

                {{-- Jumlah otomatis --}}
                <div class="col-md-6 mb-2">
                    <label>Jumlah (Otomatis)</label>
                    <input type="number" id="jumlah" class="form-control" 
                           value="{{ old('produksi13', $saranaProduksi->produksi13) }}" readonly>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

{{-- Script hitung otomatis --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.produksi');
    const jumlahInput = document.getElementById('jumlah');

    function hitungJumlah() {
        let total = 0;
        inputs.forEach(input => total += parseFloat(input.value) || 0);
        jumlahInput.value = total;
    }

    inputs.forEach(input => input.addEventListener('input', hitungJumlah));
    hitungJumlah(); // hitung saat halaman load
});
</script>
@endsection
