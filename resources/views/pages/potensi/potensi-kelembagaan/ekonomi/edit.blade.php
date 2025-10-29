@extends('layouts.master')

@section('title', 'Edit Data Lembaga Ekonomi')

@section('content')
@can('lembaga-ekonomi.edit')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-pencil-square me-2"></i> Form Edit Data Lembaga Ekonomi
        </h5>
    </div>

    <div class="card-body p-4">
        <form action="{{ route('potensi.potensi-kelembagaan.ekonomi.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- ===================== SECTION 1: Data Umum ===================== --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-info-circle me-1"></i> Data Umum Lembaga Ekonomi
                </h6>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" class="form-control" 
                            value="{{ old('tanggal', \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d')) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kategori Lembaga <span class="text-danger">*</span></label>
                        <select name="kategori_lembaga_ekonomi_id" id="kategori_lembaga" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}" 
                                    {{ (old('kategori_lembaga_ekonomi_id', $data->kategori_lembaga_ekonomi_id) == $item->id) ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_lembaga_ekonomi_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jenis Lembaga <span class="text-danger">*</span></label>
                        <select name="jenis_lembaga_ekonomi_id" id="jenis_lembaga" class="form-select" required>
                            {{-- Akan diisi oleh AJAX --}}
                            <option value="">-- Pilih Kategori Dulu --</option>
                        </select>
                        @error('jenis_lembaga_ekonomi_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jumlah Lembaga</label>
                        <div class="input-group">
                            <input type="number" name="jumlah" class="form-control text-end"
                                value="{{ old('jumlah', $data->jumlah) }}" min="0">
                            <span class="input-group-text">Unit</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===================== SECTION 2: Data Kegiatan ===================== --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-bar-chart-line me-1"></i> Data Kegiatan Lembaga
                </h6>

                <div class="row g-3 align-items-center">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jumlah Pengurus</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_pengurus" class="form-control text-end"
                                value="{{ old('jumlah_pengurus', $data->jumlah_pengurus) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jumlah Jenis Kegiatan</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_kegiatan" class="form-control text-end"
                                value="{{ old('jumlah_kegiatan', $data->jumlah_kegiatan) }}" min="0">
                            <span class="input-group-text">Jenis</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===================== BUTTON ===================== --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('potensi.potensi-kelembagaan.ekonomi.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@else
<div class="alert alert-danger mt-3">
    <i class="bi bi-exclamation-triangle me-2"></i>
    Kamu tidak memiliki izin untuk mengedit data Lembaga Ekonomi.
</div>
@endcan
@endsection

@push('addon-script')
<script>
$(document).ready(function() {
    let urlTemplate = '{{ route("potensi.potensi-kelembagaan.ekonomi.getJenis", ["kategoriId" => "PLACEHOLDER"]) }}';

    // Event listener saat kategori berubah
    $('#kategori_lembaga').on('change', function() {
        var kategoriId = $(this).val();
        var $jenisDropdown = $('#jenis_lembaga');

        if(kategoriId) {
            let finalUrl = urlTemplate.replace('PLACEHOLDER', kategoriId);
            $jenisDropdown.empty().append('<option value="">-- Memuat... --</option>');

            $.ajax({
                url: finalUrl,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $jenisDropdown.empty(); 
                    if(data.length > 0) {
                        $jenisDropdown.append('<option value="">-- Pilih Jenis --</option>');
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

    // Otomatis isi dropdown & pilih value yang ada saat halaman edit dimuat
    if ($('#kategori_lembaga').val()) {
        var kategoriId = $('#kategori_lembaga').val();
        var $jenisDropdown = $('#jenis_lembaga');
        // Ambil ID jenis yang tersimpan (baik dari old() atau dari $data)
        var selectedJenisId = "{{ old('jenis_lembaga_ekonomi_id', $data->jenis_lembaga_ekonomi_id) }}";
        
        let finalUrl = urlTemplate.replace('PLACEHOLDER', kategoriId);
        $jenisDropdown.empty().append('<option value="">-- Memuat... --</option>');

        $.ajax({
            url: finalUrl,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $jenisDropdown.empty(); 
                if(data.length > 0) {
                    $jenisDropdown.append('<option value="">-- Pilih Jenis --</option>');
                    $.each(data, function(key, value){
                        // Cek apakah value ini harus 'selected'
                        var isSelected = (value.id == selectedJenisId);
                        $jenisDropdown.append('<option value="'+ value.id +'"'+ (isSelected ? ' selected' : '') +'>'+ value.nama +'</option>');
                    });
                } else {
                    $jenisDropdown.append('<option value="">-- Data tidak ditemukan --</option>');
                }
            },
            error: function() {
                    $jenisDropdown.empty().append('<option value="">-- Gagal memuat data --</option>');
            }
        });
    }
});
</script>
@endpush
