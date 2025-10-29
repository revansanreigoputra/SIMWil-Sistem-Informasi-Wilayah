@extends('layouts.master')

@section('title', 'Edit Data Usaha Jasa, Hiburan, dll')

@section('content')
{{-- Memeriksa apakah pengguna memiliki izin 'hiburan.edit' --}}
@can('hiburan.edit')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-pencil-square me-2"></i>Form Edit Data Usaha Jasa, Hiburan, dll
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('potensi.potensi-kelembagaan.hiburan.update', $hiburan->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- SECTION 1: Data Umum --}}
            <div class="mb-2 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-info-circle me-1"></i> Data Umum
                </h6>
                <div class="row g-3">
                    {{-- Tanggal --}}
                    <div class="col-md-6">
                        <label for="tanggal" class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                               value="{{ old('tanggal', $hiburan->tanggal) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="col-md-6">
                        <label for="kategori_usaha" class="form-label fw-semibold">Kategori Usaha <span class="text-danger">*</span></label>
                        <select name="kategori_id" id="kategori_usaha" class="form-select @error('kategori_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id', $hiburan->kategori_id) == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jenis Usaha --}}
                    <div class="col-md-6">
                        <label for="jenis_usaha" class="form-label fw-semibold">Jenis Usaha <span class="text-danger">*</span></label>
                        <select name="jenis_usaha_id" id="jenis_usaha" class="form-select @error('jenis_usaha_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori Dulu --</option>
                        </select>
                         @error('jenis_usaha_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Data Kegiatan --}}
            <div class="mb-2 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-clipboard-data me-1"></i> Data Kegiatan
                </h6>
                <div class="row g-3">
                    {{-- Jumlah Unit --}}
                    <div class="col-md-4">
                        <label for="jumlah_unit" class="form-label fw-semibold">Jumlah Unit</label>
                        <div class="input-group">
                             <input type="number" name="jumlah_unit" id="jumlah_unit" class="form-control @error('jumlah_unit') is-invalid @enderror"
                                   value="{{ old('jumlah_unit', $hiburan->jumlah_unit) }}" min="0">
                            <span class="input-group-text">Unit</span>
                        </div>
                        @error('jumlah_unit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jenis Produk --}}
                    <div class="col-md-4">
                        <label for="jenis_produk" class="form-label fw-semibold">Jumlah Jenis Produk</label>
                         <div class="input-group">
                            <input type="number" name="jenis_produk" id="jenis_produk" class="form-control @error('jenis_produk') is-invalid @enderror"
                                   value="{{ old('jenis_produk', $hiburan->jenis_produk) }}" min="0">
                            <span class="input-group-text">Jenis</span>
                        </div>
                        @error('jenis_produk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                     {{-- Jumlah Tenaga Kerja --}}
                    <div class="col-md-4">
                        <label for="jumlah_tenaga_kerja" class="form-label fw-semibold">Jumlah Tenaga Kerja</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_tenaga_kerja" id="jumlah_tenaga_kerja" class="form-control @error('jumlah_tenaga_kerja') is-invalid @enderror"
                                   value="{{ old('jumlah_tenaga_kerja', $hiburan->jumlah_tenaga_kerja) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                         @error('jumlah_tenaga_kerja')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                @can('hiburan.index')
                <a href="{{ route('potensi.potensi-kelembagaan.hiburan.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                @endcan
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Perbarui Data
                </button>
            </div>
        </form>
    </div>
</div>
@else
    {{-- Jika pengguna tidak punya izin 'hiburan.edit', tampilkan pesan ini --}}
    <div class="alert alert-danger mt-3">
        <i class="bi bi-exclamation-triangle me-2"></i>
        Maaf, Anda tidak memiliki izin untuk mengubah data ini.
    </div>
@endcan
@endsection

@push('addon-script')
<script>
$(document).ready(function() {
    let urlTemplate = '{{ route("potensi.potensi-kelembagaan.hiburan.getJenis", ["kategoriId" => "PLACEHOLDER"]) }}';
    
    // Simpan ID jenis usaha yang ada saat ini (dari DB atau dari old value jika ada error)
    const currentJenisId = "{{ old('jenis_usaha_id', $hiburan->jenis_usaha_id) }}";

    function fetchJenisUsaha(kategoriId, selectedJenisId = null) {
        var $jenisDropdown = $('#jenis_usaha');
        if (!kategoriId) {
            $jenisDropdown.empty().append('<option value="">-- Pilih Kategori Dulu --</option>');
            return;
        }

        let finalUrl = urlTemplate.replace('PLACEHOLDER', kategoriId);
        $jenisDropdown.empty().append('<option value="">-- Memuat... --</option>').prop('disabled', true);

        $.ajax({
            url: finalUrl,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $jenisDropdown.empty().prop('disabled', false);
                if (data.length > 0) {
                    $jenisDropdown.append('<option value="">-- Pilih Jenis Usaha --</option>');
                    $.each(data, function(key, value) {
                        // Cek jika ID ini harus dipilih
                        let isSelected = selectedJenisId && value.id == selectedJenisId;
                        $jenisDropdown.append('<option value="' + value.id + '"' + (isSelected ? ' selected' : '') + '>' + value.nama + '</option>');
                    });
                } else {
                    $jenisDropdown.append('<option value="">-- Data tidak ditemukan --</option>');
                }
            },
            error: function() {
                $jenisDropdown.empty().append('<option value="">-- Gagal memuat data --</option>').prop('disabled', false);
            }
        });
    }

    // Event listener untuk dropdown kategori
    $('#kategori_usaha').on('change', function() {
        var kategoriId = $(this).val();
        // Saat kategori diubah, panggil fungsi tanpa ID jenis terpilih
        fetchJenisUsaha(kategoriId);
    });

    // Panggil fungsi saat halaman pertama kali dimuat
    var initialKategoriId = $('#kategori_usaha').val();
    if (initialKategoriId) {
        fetchJenisUsaha(initialKategoriId, currentJenisId);
    }
});
</script>
@endpush