@extends('layouts.master')

@section('title', 'Edit Data Lembaga Pendidikan')

@section('content')
@can('pendidikan.edit')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-pencil-square me-2"></i>Form Edit Data Lembaga Pendidikan
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('potensi.potensi-kelembagaan.pendidikan.update', $data->id) }}" method="POST">
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
                               value="{{ old('tanggal', $data->tanggal) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Kategori Sekolah --}}
                    <div class="col-md-6">
                        <label for="kategori_id" class="form-label fw-semibold">Kategori Sekolah <span class="text-danger">*</span></label>
                        <select name="kategori_id" id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ old('kategori_id', $data->kategori_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jenis Sekolah / Tingkatan --}}
                    <div class="col-md-6">
                        <label for="jenis_sekolah_id" class="form-label fw-semibold">Tingkatan / Jenis Sekolah <span class="text-danger">*</span></label>
                        <select name="jenis_sekolah_id" id="jenis_sekolah_id" class="form-select @error('jenis_sekolah_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori Dulu --</option>
                        </select>
                        @error('jenis_sekolah_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6">
                        <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Terdaftar" {{ old('status', $data->status) == 'Terdaftar' ? 'selected' : '' }}>Terdaftar</option>
                            <option value="Terakreditasi" {{ old('status', $data->status) == 'Terakreditasi' ? 'selected' : '' }}>Terakreditasi</option>
                        </select>
                         @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Data Kuantitas --}}
            <div class="mb-2 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-bar-chart-line me-1"></i> Data Kuantitas
                </h6>
                <div class="row g-3">
                    {{-- Jumlah Negeri --}}
                    <div class="col-md-4">
                        <label for="jumlah_negeri" class="form-label fw-semibold">Jumlah Negeri</label>
                        <div class="input-group">
                             <input type="number" name="jumlah_negeri" id="jumlah_negeri" class="form-control" value="{{ old('jumlah_negeri', $data->jumlah_negeri) }}" min="0">
                             <span class="input-group-text">Gedung</span>
                        </div>
                    </div>

                    {{-- Jumlah Swasta --}}
                    <div class="col-md-4">
                        <label for="jumlah_swasta" class="form-label fw-semibold">Jumlah Swasta</label>
                         <div class="input-group">
                            <input type="number" name="jumlah_swasta" id="jumlah_swasta" class="form-control" value="{{ old('jumlah_swasta', $data->jumlah_swasta) }}" min="0">
                            <span class="input-group-text">Gedung</span>
                        </div>
                    </div>
                    
                    {{-- Jumlah Dimiliki Desa --}}
                    <div class="col-md-4">
                        <label for="jumlah_dimiliki_desa" class="form-label fw-semibold">Jumlah Milik Desa</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_dimiliki_desa" id="jumlah_dimiliki_desa" class="form-control" value="{{ old('jumlah_dimiliki_desa', $data->jumlah_dimiliki_desa) }}" min="0">
                            <span class="input-group-text">Gedung</span>
                        </div>
                    </div>

                    {{-- Jumlah Total --}}
                    <div class="col-md-6">
                        <label for="jumlah" class="form-label fw-semibold">Jumlah Total</label>
                        <div class="input-group">
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ old('jumlah', $data->jumlah) }}" min="0">
                            <span class="input-group-text">Gedung</span>
                        </div>
                    </div>

                    {{-- Jumlah Pengajar --}}
                    <div class="col-md-6">
                        <label for="jumlah_pengajar" class="form-label fw-semibold">Jumlah Pengajar</label>
                        <div class="input-group">
                            <input type="number" name="jumlah_pengajar" id="jumlah_pengajar" class="form-control" value="{{ old('jumlah_pengajar', $data->jumlah_pengajar) }}" min="0">
                            <span class="input-group-text">Orang</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end gap-2 mt-4">
                @can('pendidikan.index')
                <a href="{{ route('potensi.potensi-kelembagaan.pendidikan.index') }}" class="btn btn-outline-secondary">
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
    {{-- Jika pengguna tidak punya izin 'pendidikan.edit', tampilkan pesan ini --}}
    <div class="alert alert-danger mt-3">
        <i class="bi bi-exclamation-triangle me-2"></i>
        Maaf, Anda tidak memiliki izin untuk mengubah data ini.
    </div>
@endcan
@endsection

@push('addon-script')
<script>
$(document).ready(function() {
    let urlTemplate = '{{ route("potensi.potensi-kelembagaan.pendidikan.getJenis", ["kategoriId" => "PLACEHOLDER"]) }}';
    const currentJenisId = "{{ old('jenis_sekolah_id', $data->jenis_sekolah_id) }}";

    function fetchJenisPendidikan(kategoriId, selectedJenisId = null) {
        const $jenisDropdown = $('#jenis_sekolah_id');
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
                    $jenisDropdown.append('<option value="">-- Pilih Jenis Sekolah --</option>');
                    $.each(data, function(key, value) {
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

    $('#kategori_id').on('change', function() {
        fetchJenisPendidikan($(this).val());
    });

    // Panggil fungsi saat halaman pertama kali dimuat untuk mengisi dan memilih jenis sekolah yang benar
    const initialKategoriId = $('#kategori_id').val();
    if (initialKategoriId) {
        fetchJenisPendidikan(initialKategoriId, currentJenisId);
    }
});
</script>
@endpush