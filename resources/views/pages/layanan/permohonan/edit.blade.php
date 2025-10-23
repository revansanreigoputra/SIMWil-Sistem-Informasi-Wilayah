@extends('layouts.master')

@section('title', 'Edit Permohonan Surat')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0" id="form-title">Formulir Edit Permohonan Surat</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('permohonan.update', $permohonan->id) }}">
                @csrf
                @method('PUT')

                {{-- Hidden Data --}}
                <div id="jenis-surat-map" data-map="{{ json_encode($allJenisSurats) }}" style="display: none;"></div>
                <div id="data-storage-container"
                    data-old-custom-data="{{ json_encode(old('custom_data', $permohonan->custom_variables ?? [])) }}"
                    style="display: none;">
                </div>
                {{-- Variabel mutasiType dari Controller --}}
                <input type="hidden" id="mutasi-type-data" value="{{ $mutasiType }}">
                {{-- End Hidden Data --}}

                {{-- Bagian I: Jenis Surat --}}
                <h5 class="mt-3 mb-3 pb-2 border-bottom">Jenis Surat</h5>
                <div class="mb-4">
                    <label for="jenis_surat_nama" class="form-label fw-semibold">Jenis Surat</label>
                    <input type="text" id="jenis_surat_nama" class="form-control"
                        value="{{ $permohonan->jenisSurat->nama }}" readonly>
                    <input type="hidden" name="jenis_surat_id" id="jenis_surat_id"
                        value="{{ $permohonan->jenisSurat->id }}">
                    @error('jenis_surat_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Bagian II: Data Pemohon (id_anggota_keluargas) --}}
                <h5 class="mt-3 mb-3 pb-2 border-bottom">Data Pemohon</h5>

                {{-- Kontainer Peringatan Data Kritis (AKAN DIISI OLEH JS) --}}
                <div id="critical-data-warning" class="mb-3" style="display: none;"></div>

                <div class="mb-3">
                    <label for="id_anggota_keluargas" class="form-label fw-semibold">Pilih Pemohon</label>
                    <select name="id_anggota_keluargas" id="id_anggota_keluargas"
                        class="form-select @error('id_anggota_keluargas') is-invalid @enderror" required>
                        <option value="">-- Pilih Anggota Keluarga/Penduduk --</option>
                        @foreach ($anggotaKeluargas as $anggota)
                            @php
                                $selectedValue = old(
                                    'id_anggota_keluargas',
                                    $permohonan->id_data_keluargas
                                        ? 'kk_' . $permohonan->id_data_keluargas
                                        : $permohonan->id_anggota_keluargas,
                                );
                                $anggotaId =
                                    isset($anggota->is_kk) && $anggota->is_kk ? 'kk_' . $anggota->id : $anggota->id;
                                $isKKLeader = isset($anggota->is_kk) && $anggota->is_kk;
                            @endphp
                            <option value="{{ $anggotaId }}"
                                {{ $isKKLeader ? 'style="font-weight: bold; background-color: #f0f0f0;"' : '' }}
                                {{ $selectedValue == $anggotaId ? 'selected' : '' }}>
                                {{ $anggota->nik }} - {{ $anggota->nama }} {{ $isKKLeader ? '(KK)' : '' }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_anggota_keluargas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Bagian III: CUSTOM DYNAMIC FIELDS CONTAINER --}}
                @if ($customFields->isNotEmpty())
                    <h5 class="mt-4 mb-3 pb-2 border-bottom" id="custom-fields-title">Data Tambahan Surat</h5>
                    <div id="custom-fields-container" class="row g-3 mb-4">
                        @foreach ($customFields as $variable)
                            @php
                                $key = $variable['key'];
                                $label = $variable['label'];
                                $type = $variable['type'] ?? 'text';
                                $inputName = "custom_data[{$key}]";
                                $fieldValue = $storedCustomData[$key] ?? '';
                                $isInvalid = $errors->has("custom_data.{$key}");
                            @endphp

                            <div class="col-md-6 mb-3">
                                <label for="custom_{{ $key }}" class="form-label fw-semibold">{{ $label }}
                                    <span class="text-danger">*</span></label>

                                @if ($type === 'textarea')
                                    <textarea name="{{ $inputName }}" id="custom_{{ $key }}"
                                        class="form-control custom-field @if ($isInvalid) is-invalid @endif" rows="3" required>{{ $fieldValue }}</textarea>
                                @else
                                    <input type="{{ $type }}" name="{{ $inputName }}"
                                        id="custom_{{ $key }}"
                                        class="form-control custom-field @if ($isInvalid) is-invalid @endif"
                                        value="{{ $fieldValue }}" required>
                                @endif

                                @if ($isInvalid)
                                    <div class="invalid-feedback">{{ $errors->first("custom_data.{$key}") }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
                {{-- End of Custom Fields Container --}}

                {{-- Bagian IV: Isi dan Pengaturan Surat --}}
                <h5 class="mt-4 mb-3 pb-2 border-bottom">Isi dan Pengaturan Surat</h5>

                {{-- Nomor Surat (Editable) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control"
                        value="{{ old('nomor_surat', $permohonan->nomor_surat) }}" required>
                    <small class="form-text text-muted">Nomor surat dapat diedit.</small>
                    @error('nomor_surat')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal Permohonan --}}
                <div class="mb-3">
                    <label for="tanggal_permohonan" class="form-label fw-semibold">Tanggal Permohonan</label>
                    <input type="date" name="tanggal_permohonan" class="form-control"
                        value="{{ old('tanggal_permohonan', $permohonan->tanggal_permohonan) }}" required>
                </div>

                {{-- Paragraf Pembuka (Editable) --}}
                <div class="mb-3">
                    <div class="alert alert-warning alert-sm py-2 px-3 mb-2" role="alert">
                        ⚠️ Perhatian: Perubahan pada teks ini hanya berlaku untuk surat nomor
                        {{ $permohonan->nomor_surat }} dan TIDAK akan mengubah template surat yang asli.
                    </div>
                    <label class="form-label">Teks Pembuka Surat</label>
                    <textarea class="form-control @error('paragraf_pembuka') is-invalid @enderror" name="paragraf_pembuka"
                        id="paragraf_pembuka">{{ old('paragraf_pembuka', $permohonan->paragraf_pembuka ?? optional($permohonan->jenisSurat)->paragraf_pembuka) }} </textarea>
                    @error('paragraf_pembuka')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Paragraf Penutup (Editable) --}}
                <div class="mb-3">
                    <label for="paragraf_penutup" class="form-label">Teks Penutup Surat</label>
                    <textarea rows="5" class="form-control" name="paragraf_penutup" id="paragraf_penutup" required>{{ old('paragraf_penutup', $permohonan->paragraf_penutup ?? optional($permohonan->jenisSurat)->paragraf_penutup) }}</textarea>
                </div>

                {{-- Bagian V: Penanda Tangan & Kop Surat (Tetap) --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="id_ttds" class="form-label fw-semibold">Penanda Tangan</label>
                        <select name="id_ttds" id="id_ttds" class="form-select @error('id_ttds') is-invalid @enderror"
                            required>
                            <option value="">-- Pilih Pejabat Penanda Tangan --</option>
                            @foreach ($ttds as $ttd)
                                <option value="{{ $ttd->id }}"
                                    {{ old('id_ttds', $permohonan->id_ttds) == $ttd->id ? 'selected' : '' }}>
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
                        <select name="id_kop_templates" id="id_kop_templates"
                            class="form-select @error('id_kop_templates') is-invalid @enderror" required>
                            <option value="">-- Pilih Kop Surat --</option>
                            @foreach ($kopTemplates as $kop)
                                <option value="{{ $kop->id }}"
                                    {{ old('id_kop_templates', $permohonan->id_kop_templates) == $kop->id ? 'selected' : '' }}>
                                    {{ $kop->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_kop_templates')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status Verifikasi</label>
                        <select name="status" id="status"
                            class="form-select bg-primary text-white @error('status') is-invalid @enderror" required>
                            <option value="belum_diverifikasi"
                                {{ old('status', $permohonan->status) == 'belum_diverifikasi' ? 'selected' : '' }}>
                                Belum Diverifikasi
                            </option>
                            <option value="diverifikasi"
                                {{ old('status', $permohonan->status) == 'diverifikasi' ? 'selected' : '' }}>
                                Diverifikasi
                            </option>
                            <option value="ditolak"
                                {{ old('status', $permohonan->status) == 'ditolak' ? 'selected' : '' }}>
                                Ditolak
                            </option>
                            <option value="sudah_diambil"
                                {{ old('status', $permohonan->status) == 'sudah_diambil' ? 'selected' : '' }}>
                                Sudah Diambil
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12" id="catatan-penolakan-container">
                        <label for="catatan_penolakan" class="form-label">Catatan Penolakan</label>
                        <textarea rows="3" class="form-control" name="catatan_penolakan" id="catatan_penolakan">{{ old('catatan_penolakan', $permohonan->catatan_penolakan) }}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('permohonan.index') }}" class="btn btn-light border">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('addon-script')
    <script>
        // PERHATIAN: Pastikan jQuery telah dimuat sebelum blok skrip ini.
        $(document).ready(function() {
            // Ambil mutasiType. Pastikan ID '#mutasi-type-data' ada di form.
            const mutasiType = $('#mutasi-type-data').val();
            const statusSelect = $('#status');

            // --- Handler untuk Catatan Penolakan (Tetap Sama) ---
            function handleStatusChange() {
                const container = $('#catatan-penolakan-container');
                const textarea = $('#catatan_penolakan');

                if (statusSelect.val() === 'ditolak') {
                    container.slideDown(200);
                    textarea.attr('required', true);
                } else {
                    container.slideUp(200);
                    textarea.removeAttr('required');
                }
            }
            handleStatusChange();
            statusSelect.on('change', handleStatusChange);

            // --- Logika Kontrol Field Kritis (Mutasi) ---
            function controlFieldEditability(type) {
                const normalizedType = type ? type.toLowerCase() : '';

                // Daftar mutasi yang membutuhkan peringatan/disable field
                const criticalMutations = ['pencatatan_kelahiran', 'meninggal', 'pindah_keluar', 'mutasi_masuk_kk'];
                const isCriticalMutasi = criticalMutations.includes(normalizedType);
                const isKelahiran = normalizedType === 'pencatatan_kelahiran';
                const isMeninggal = normalizedType === 'meninggal'; // Digunakan untuk logika spesifik
                const isPindahKeluar = normalizedType === 'pindah_keluar'; // Digunakan untuk logika spesifik
                const isMutasiMasuk = normalizedType === 'mutasi_masuk_kk';

                const pemohonSelect = $('#id_anggota_keluargas');
                const customFieldsContainer = $('#custom-fields-container');
                const customFieldsTitle = $('#custom-fields-title');
                const criticalWarning = $('#critical-data-warning');

                const linkKeluarga = "{{ route('anggota_keluarga.index') }}";

                // --- RESET FIELD KE DEFAULT (PENTING) ---
                pemohonSelect.removeAttr('disabled').css('background-color', '');
                pemohonSelect.css('border', '');
                customFieldsContainer.find('.custom-field').removeAttr('readonly').css('background-color', '');
                // ----------------------------------------

                if (isCriticalMutasi) {
                    let message = '';
                    let target = '';

                    if (isKelahiran) {
                        message =
                            'Data Anggota Keluarga **Bayi** merupakan data kritis. Koreksi **Nama/NIK/Tanggal Lahir** hanya dapat dilakukan di **Menu Data Keluarga**.';
                        target = 'Bayi Baru';

                        // Disable Pemohon & Custom Fields
                        pemohonSelect.attr('disabled', true).css('background-color', '#eee');
                        customFieldsContainer.find('.custom-field').attr('readonly', true).css('background-color',
                            '#eee');
                        pemohonSelect.attr('aria-disabled', 'true')
                            .css('pointer-events', 'none') // Menonaktifkan interaksi klik
                            .css('touch-action', 'none')
                            .css('background-color', '#eee'); // Visualisasi non-aktif

                    } else if (isMeninggal) {
                        // MEKANISME BARU: PEMOHON DISABLE, CUSTOM FIELD AKTIF
                        message =
                            'Koreksi **data dasar penduduk (NIK/Nama)** harus dilakukan di **Menu Data Penduduk**. Data *Tanggal Kematian/Sebab* di bawah ini **DAPAT** diedit.';
                        target = 'Penduduk Wafat';

                        // Disable Pemohon Select 
                        pemohonSelect.attr('aria-disabled', 'true')
                            .css('pointer-events', 'none') // Menonaktifkan interaksi klik
                            .css('touch-action', 'none')
                            .css('background-color', '#eee'); // Visualisasi non-aktif

                        // Custom fields DIBIARKAN AKTIF

                    } else if (isPindahKeluar) {
                        message =
                            'Data Anggota Keluarga yang dimutasi (**Pindah Keluar**) adalah data kritis sistem. Data NIK dan Status Kependudukan hanya dapat dikoreksi di **Tabel Data Penduduk**.';
                        target = 'Penduduk Pindah';

                        // Nonaktifkan Pemohon Select (subjek mutasi) 
                        pemohonSelect.attr('aria-disabled', 'true')
                            .css('pointer-events', 'none') // Menonaktifkan interaksi klik
                            .css('touch-action', 'none')
                            .css('background-color', '#eee'); // Visualisasi non-aktif

                        // Custom fields tetap aktif

                    } else if (isMutasiMasuk) {
                        message =
                            'Data Anggota Keluarga (**Pindah Masuk**) adalah data kritis sistem. Koreksi data dasar Anggota Keluarga harus dilakukan di **Tabel Data Penduduk**.';
                        target = 'Penduduk Baru';
                        pemohonSelect.attr('aria-disabled', 'true')
                            .css('pointer-events', 'none') // Menonaktifkan interaksi klik
                            .css('touch-action', 'none')
                            .css('background-color', '#eee'); // Visualisasi non-aktif 
                    }

                    // Memperbarui Judul Custom Field
                    customFieldsTitle.html(
                        `Data Tambahan Surat <span class="text-danger">(${target} Kritis)</span>`);

                    // Menampilkan Peringatan
                    criticalWarning.html(`
                        <div class="alert alert-danger py-2 px-3 row" role="alert">
                            ⚠️ Koreksi Data Anggota Keluarga/Penduduk? ${message}
                            
                            <div class="col-md-6 mt-2">
                                <a href="${linkKeluarga}" class="alert-link fw-bold btn btn-outline-danger" target="_blank">Menu Data Keluarga</a>
                            </div>
                        </div>
                    `).slideDown(200);
                }
            }

            controlFieldEditability(mutasiType);
        });
    </script>
@endpush
