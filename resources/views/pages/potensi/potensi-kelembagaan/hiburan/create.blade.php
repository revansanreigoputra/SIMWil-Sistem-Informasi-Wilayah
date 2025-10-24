@extends('layouts.master')

@section('title', 'Tambah Data Usaha Jasa & Hiburan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Tambah Data Usaha Jasa & Hiburan</h5>
    </div>
    <div class="card-body">
        <form id="form-hiburan" action="{{ route('potensi.potensi-kelembagaan.hiburan.store') }}" method="POST">
            @csrf

            {{-- Data Umum --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    {{-- Tanggal --}}
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    </div>

                    {{-- Kategori Usaha --}}
                    <div class="col-md-6">
                        <label class="form-label">Kategori Usaha *</label>
                        <select name="kategori_id" id="kategori_usaha" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jenis Usaha --}}
                    <div class="col-md-6">
                        <label class="form-label">Jenis Usaha *</label>
                        <select name="jenis_usaha_id" id="jenis_usaha" class="form-control" required>
                            <option value="">-- Pilih Kategori Dulu --</option>
                        </select>
                    </div>

                    {{-- Jumlah Unit --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Unit</label>
                        <input type="number" name="jumlah_unit" class="form-control" value="{{ old('jumlah_unit', 0) }}">
                    </div>
                </div>
            </div>

            {{-- Data Kegiatan --}}
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Kegiatan</h6>
                <div class="row g-3">
                    {{-- Jenis Produk (integer) --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Jenis Produk yang Diperdagangkan</label>
                        <input type="number" name="jenis_produk" class="form-control" value="{{ old('jenis_produk', 0) }}">
                    </div>

                    {{-- Jumlah Tenaga Kerja --}}
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Tenaga Kerja yang Terserap (Orang)</label>
                        <input type="number" name="jumlah_tenaga_kerja" class="form-control" value="{{ old('jumlah_tenaga_kerja', 0) }}">
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.hiburan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
$(document).ready(function() {
    // Template URL untuk AJAX (nanti diganti kategoriId)
    let urlTemplate = '{{ route("potensi.potensi-kelembagaan.hiburan.getJenis", ["kategoriId" => "PLACEHOLDER"]) }}';

    $('#kategori_usaha').on('change', function() {
        var kategoriId = $(this).val();
        var $jenisDropdown = $('#jenis_usaha');

        if (kategoriId) {
            let finalUrl = urlTemplate.replace('PLACEHOLDER', kategoriId);
            $jenisDropdown.empty().append('<option value="">-- Memuat... --</option>');

            $.ajax({
                url: finalUrl,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $jenisDropdown.empty();

                    if (data.length > 0) {
                        $jenisDropdown.append('<option value="">-- Pilih Jenis Usaha --</option>');
                        $.each(data, function(key, value){
                            $jenisDropdown.append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                        });
                    } else {
                        $jenisDropdown.append('<option value="">-- Data tidak ditemukan --</option>');
                    }
                },
                error: function() {
                    $jenisDropdown.empty().append('<option value="">-- Gagal memuat data --</option>');
                }
            });
        } else {
            $jenisDropdown.empty();
            $jenisDropdown.append('<option value="">-- Pilih Kategori Dulu --</option>');
        }
    });

    // Auto load ulang kalau user balik ke halaman setelah error validation
    if ($('#kategori_usaha').val()) {
        $('#kategori_usaha').trigger('change');
        setTimeout(function() {
            const oldJenisId = "{{ old('jenis_usaha_id') }}";
            if(oldJenisId) {
                $('#jenis_usaha').val(oldJenisId);
            }
        }, 300);
    }
});
</script>
@endpush
