@extends('layouts.master')

@section('title', 'Edit Data Sarana Produksi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Data Sarana Produksi</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.asetekonomi.sarana_produksi.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-2">
                    <label>Desa</label>
                    <select name="desa_id" id="desa_id" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach($desas as $desa)
                            <option value="{{ $desa->id }}" {{ old('desa_id', $item->desa_id) == $desa->id ? 'selected' : '' }}>
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
                            id="produksi{{ $i }}" 
                            class="form-control produksi" 
                            min="0" 
                            value="{{ old('produksi'.$i, $item->{'produksi'.$i}) }}">
                    </div>
                @endfor

                <div class="col-md-6 mb-2">
                    <label>Jumlah (Otomatis)</label>
                    <input 
                        type="number" 
                        name="produksi13" 
                        id="jumlah" 
                        class="form-control" 
                        value="{{ old('produksi13', $item->produksi13) }}" 
                        readonly>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('perkembangan.asetekonomi.sarana_produksi.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const produksiInputs = document.querySelectorAll('.produksi');
        const jumlahInput = document.getElementById('jumlah');

        function updateJumlah() {
            let total = 0;
            produksiInputs.forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            jumlahInput.value = total;
        }

        produksiInputs.forEach(input => {
            input.addEventListener('input', updateJumlah);
        });

        // Hitung total saat halaman pertama kali dibuka
        updateJumlah();
    });
</script>
@endsection
