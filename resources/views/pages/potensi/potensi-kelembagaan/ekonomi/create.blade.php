@extends('layouts.master')

@section('title', 'Tambah Data Lembaga Ekonomi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">Form Tambah Data Lembaga Ekonomi</h5>
    </div>
    <div class="card-body">
        <form id="form-lembaga-ekonomi" action="{{ route('potensi.potensi-kelembagaan.ekonomi.store') }}" method="POST">
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Umum</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal *</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Kategori Lembaga *</label>
                        <select name="kategori_lembaga_ekonomi_id" id="kategori_lembaga" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach($kategori as $item)
                                <option value="{{ $item->id }}" {{ old('kategori_lembaga_ekonomi_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jenis Lembaga *</label>
                        <select name="jenis_lembaga_ekonomi_id" id="jenis_lembaga" class="form-control" required>
                            <option value="">-- Pilih Kategori Dulu --</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', 0) }}">
                    </div>
                </div>
            </div>
            <div class="card mb-3 p-3 bg-light">
                <h6>Data Kegiatan</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Jumlah Pengurus (Orang)</label>
                        <input type="number" name="jumlah_pengurus" class="form-control" value="{{ old('jumlah_pengurus', 0) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Jumlah Jenis Kegiatan</label>
                        <input type="number" name="jumlah_kegiatan" class="form-control" value="{{ old('jumlah_kegiatan', 0) }}">
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.ekonomi.index') }}" class="btn btn-outline-secondary">
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
    let urlTemplate = '{{ route("potensi.potensi-kelembagaan.ekonomi.getJenis", ["kategoriId" => "PLACEHOLDER"]) }}';

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

    if ($('#kategori_lembaga').val()) {
        $('#kategori_lembaga').trigger('change');
        setTimeout(function() {
            const oldJenisId = "{{ old('jenis_lembaga_ekonomi_id') }}";
            if(oldJenisId) {
                $('#jenis_lembaga').val(oldJenisId);
            }
        }, 200); 
    }

});
</script>
@endpush