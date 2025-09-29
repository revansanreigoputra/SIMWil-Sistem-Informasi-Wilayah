@extends('layouts.master')

@section('title', 'Buat Permohonan Surat Baru')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h1 class="h4 mb-0" id="form-title">Formulir Permohonan Surat Baru</h1>
        <p class="mb-0 mt-1" id="form-subtitle">Pilih jenis surat di bawah untuk memuat formulir.</p>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('layanan.permohonan.store') }}"> 
            @csrf
 
            <h5 class="mt-3 mb-3 pb-2 border-bottom">Pilih Jenis Surat</h5>
            <div class="mb-4">
                <label for="jenis_surat_id" class="form-label fw-semibold">Jenis Surat</label>
                <select name="jenis_surat_id" id="jenis_surat_id" class="form-select @error('jenis_surat_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Jenis Surat untuk Membuat Permohonan --</option>
                    @foreach ($jenisSurats as $jenis)
                        <option value="{{ $jenis->id }}" data-kode="{{ $jenis->kode }}">{{ $jenis->nama }}</option>
                    @endforeach
                </select>
                @error('jenis_surat_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- 2. DYNAMIC FORM CONTAINER (Starts hidden/empty) --}}
            <div id="dynamic-form-container" style="display: none;">
                
                {{-- Bagian I: Data Pemohon (Static fields, now included after selection) --}}
                <h5 class="mt-3 mb-3 pb-2 border-bottom">Data Pemohon</h5>
                <div class="mb-3">
                    <label for="id_anggota_keluargas" class="form-label fw-semibold">Pilih Pemohon</label>
                    <select name="id_anggota_keluargas" id="id_anggota_keluargas" class="form-select @error('id_anggota_keluargas') is-invalid @enderror" required>
                        <option value="">-- Pilih Anggota Keluarga/Penduduk --</option>
                        @foreach ($anggotaKeluargas as $anggota)
                            <option value="{{ $anggota->id }}" {{ old('id_anggota_keluargas') == $anggota->id ? 'selected' : '' }}>
                                {{ $anggota->nik }} - {{ $anggota->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_anggota_keluargas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="tanggal_permohonan" class="form-label fw-semibold">Tanggal Permohonan</label>
                    <input type="date" name="tanggal_permohonan" class="form-control" value="{{ old('tanggal_permohonan', now()->format('Y-m-d')) }}" required>
                </div>
                
                <hr>

                {{-- 3. AJAX-LOADED DYNAMIC FIELDS WILL APPEAR HERE --}}
                <h5 class="mt-4 mb-3 pb-2 border-bottom">Data Khusus Surat</h5>
                <div id="specific-fields-placeholder">
                    {{-- The form fields (like @include($specificFormView)) will be loaded here via AJAX --}}
                </div>
                {{-- **************************************************************** --}}

                <hr>

                {{-- Bagian III: Penanda Tangan (TTD) & Kop Surat (Static fields) --}}
                <h5 class="mt-4 mb-3 pb-2 border-bottom">Pengaturan Surat</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="id_ttds" class="form-label fw-semibold">Penanda Tangan</label>
                        <select name="id_ttds" id="id_ttds" class="form-select @error('id_ttds') is-invalid @enderror" required>
                            <option value="">-- Pilih Pejabat Penanda Tangan --</option>
                            @foreach ($ttds as $ttd)
                                <option value="{{ $ttd->id }}" {{ old('id_ttds') == $ttd->id ? 'selected' : '' }}>
                                    {{ $ttd->nama }} ({{ $ttd->jabatan }})
                                </option>
                            @endforeach
                        </select>
                        @error('id_ttds')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="id_kop_templates" class="form-label fw-semibold">Kop Surat</label>
                        <select name="id_kop_templates" id="id_kop_templates" class="form-select @error('id_kop_templates') is-invalid @enderror" required>
                            <option value="">-- Pilih Kop Surat --</option>
                            @foreach ($kopTemplates as $kop)
                                <option value="{{ $kop->id }}" {{ old('id_kop_templates') == $kop->id ? 'selected' : '' }}>
                                    {{ $kop->nama_kop }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kop_templates')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4 w-100">
                    <i class="fas fa-paper-plane me-2"></i> Ajukan & Buat Permohonan Surat
                </button>
            </div> {{-- end dynamic-form-container --}}
        </form>
    </div>
</div>
@endsection
@push('addon-script')
<script>
    $(document).ready(function() {
        const jenisSuratSelect = $('#jenis_surat_id');
        const formContainer = $('#dynamic-form-container');
        const specificFieldsPlaceholder = $('#specific-fields-placeholder');
        const formTitle = $('#form-title');
        const formSubtitle = $('#form-subtitle');

        jenisSuratSelect.on('change', function() {
            const selectedId = $(this).val();
            
            // Clear previous content
            specificFieldsPlaceholder.empty();
            formContainer.hide();
            formTitle.text('Formulir Permohonan Surat Baru');
            formSubtitle.text('Pilih jenis surat di bawah untuk memuat formulir.');

            if (selectedId) {
                const jenisSuratName = $(this).find('option:selected').text();
                
                // Show a loading indicator
                specificFieldsPlaceholder.html('<div class="text-center p-4"><i class="fas fa-spinner fa-spin me-2"></i>Memuat formulir...</div>');
                formContainer.show();

                // AJAX call to fetch the form
                $.ajax({
                    url: '{{ route('layanan.permohonan.getForm', ['jenisSuratId' => 'PLACEHOLDER']) }}'.replace('PLACEHOLDER', selectedId),
                    method: 'GET',
                    success: function(response) {
                        specificFieldsPlaceholder.html(response.html);
                        
                        // Update dynamic titles
                        formTitle.text(`Formulir Permohonan: ${response.nama}`);
                        formSubtitle.text(`Kode Surat: **${response.kode}**`);
                    },
                    error: function(xhr, status, error) {
                        specificFieldsPlaceholder.html('<div class="alert alert-danger">Gagal memuat formulir. Silakan coba lagi.</div>');
                        formTitle.text('Error Memuat Formulir');
                        formSubtitle.text('');
                        console.error("AJAX Error:", error);
                    }
                });
            }
        });
    });
</script>
@endpush