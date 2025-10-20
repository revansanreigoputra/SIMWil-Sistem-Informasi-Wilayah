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

                {{-- Hidden JSON Data Map for JavaScript --}}
                <div id="jenis-surat-map" data-map="{{ json_encode($allJenisSurats) }}" style="display: none;"></div>
                {{-- Data Permohonan yang sudah tersimpan untuk di-load di custom fields --}}
                <div id="data-storage-container"
                    data-old-custom-data="{{ json_encode(old('custom_data', $permohonan->custom_variables ?? [])) }}"
                    style="display: none;">
                </div>

                {{-- Bagian I: Jenis Surat  --}}
                {{-- Bagian I: Jenis Surat --}}
                <h5 class="mt-3 mb-3 pb-2 border-bottom">Jenis Surat</h5>
                <div class="mb-4">
                    <label for="jenis_surat_nama" class="form-label fw-semibold">Jenis Surat</label>

                    {{-- Tampilkan nama surat sebagai teks yang tidak bisa diedit --}}
                    <input type="text" id="jenis_surat_nama" class="form-control"
                        value="{{ $permohonan->jenisSurat->nama }}" readonly>

                    {{-- KIRIM ID SURAT melalui input HIDDEN --}}
                    <input type="hidden" name="jenis_surat_id" id="jenis_surat_id"
                        value="{{ $permohonan->jenisSurat->id }}">

                    @error('jenis_surat_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Bagian II: Data Pemohon (id_anggota_keluargas) --}}
                <h5 class="mt-3 mb-3 pb-2 border-bottom">Data Pemohon</h5>
                <div class="mb-3">
                    <label for="id_anggota_keluargas" class="form-label fw-semibold">Pilih Pemohon</label>
                    <select name="id_anggota_keluargas" id="id_anggota_keluargas"
                        class="form-select @error('id_anggota_keluargas') is-invalid @enderror" required>
                        <option value="">-- Pilih Anggota Keluarga/Penduduk --</option>
                        @foreach ($anggotaKeluargas as $anggota)
                            @php
                                // Determine the selected ID: prefer old input, otherwise use the stored AnggotaKeluarga ID
                                $selectedValue = old('id_anggota_keluargas', $permohonan->id_anggota_keluargas);
                                $isKKLeader = isset($anggota->is_kk) && $anggota->is_kk;
                            @endphp
                            <option value="{{ $anggota->id }}"
                                {{ $isKKLeader ? 'style="font-weight: bold; background-color: #f0f0f0;"' : '' }}
                                {{ $selectedValue == $anggota->id ? 'selected' : '' }}>
                                {{ $anggota->nik }} - {{ $anggota->nama }} {{ $isKKLeader ? '(Kepala Keluarga)' : '' }}
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
                                // Use the passed storedCustomData variable
                                $fieldValue = $storedCustomData[$key] ?? '';
                                $isInvalid = $errors->has("custom_data.{$key}");
                            @endphp

                            <div class="col-md-12 mb-3">
                                <label for="custom_{{ $key }}" class="form-label fw-semibold">{{ $label }}
                                    <span class="text-danger">*</span></label>

                                @if ($type === 'textarea')
                                    <textarea name="{{ $inputName }}" id="custom_{{ $key }}"
                                        class="form-control @if ($isInvalid) is-invalid @endif" rows="3" required>{{ $fieldValue }}</textarea>
                                @else
                                    <input type="{{ $type }}" name="{{ $inputName }}"
                                        id="custom_{{ $key }}"
                                        class="form-control @if ($isInvalid) is-invalid @endif"
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

                {{-- Nomor Surat (Fixed on Edit) --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nomor Surat</label>
                    <div class="row g-2 align-items-center">
                        <div class="col-12">
                            <input type="text" class="form-control" value="{{ $permohonan->nomor_surat }}" readonly>
                        </div>
                        <input type="hidden" name="nomor_surat_full" id="nomor_surat_full"
                            value="{{ $permohonan->nomor_surat }}">
                    </div>
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
                        ⚠️ **Perhatian:** Perubahan pada teks ini hanya berlaku untuk surat nomor
                        {{ $permohonan->nomor_surat }}  dan TIDAK  akan mengubah template surat yang asli.
                    </div>

                    <label class="form-label">Teks Pembuka Surat</label>
                    <textarea class="form-control @error('paragraf_pembuka') is-invalid @enderror" name="paragraf_pembuka" readonly
                        id="paragraf_pembuka">{{ old('paragraf_pembuka', $permohonan->paragraf_pembuka ?? optional($permohonan->jenisSurat)->paragraf_pembuka) }} </textarea>
                    @error('paragraf_pembuka')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Paragraf Penutup (Editable) --}}
                <div class="mb-3">
                    <label for="paragraf_penutup" class="form-label">Teks Penutup Surat</label>
                    <textarea rows="5" class="form-control" name="paragraf_penutup" id="paragraf_penutup" required readonly>{{ old('paragraf_penutup', $permohonan->paragraf_penutup ?? optional($permohonan->jenisSurat)->paragraf_penutup) }}</textarea>

                </div>

                {{-- Bagian V: Penanda Tangan & Kop Surat --}}
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

                            {{-- Nilai yang tersimpan diambil dari $permohonan->status sebagai fallback old() --}}

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
        // Since Jenis Surat selection and dynamic fields are now rendered via PHP on page load,
        // this script primarily maintains the data map structure for potential future use or debugging.

        // --- Global Data Setup ---
        let jenisSuratDataMap = {};
        let oldCustomData = {};

        // CAPTURE INITIAL VALUES (Saved values from $permohonan or old input)
        // This is used for comparison in the syncParagraphs function if it were to run
        const initialPembuka =
            '{{ old('paragraf_pembuka', $permohonan->paragraf_pembuka ?? optional($permohonan->jenisSurat)->paragraf_pembuka) }}'
            .trim();
        const initialPenutup =
            '{{ old('paragraf_penutup', $permohonan->paragraf_penutup ?? optional($permohonan->jenisSurat)->paragraf_penutup) }}'
            .trim();

        // --- Utility Functions ---

        function initializeDataMap() {
            // Only initializes data map from hidden element.
            const jsonString = $('#jenis-surat-map').data('map');
            if (jsonString) {
                try {
                    jenisSuratDataMap = JSON.parse(jsonString).reduce((map, item) => {
                        map[item.id] = item;
                        return map;
                    }, {});
                } catch (e) {
                    console.error("Error parsing Jenis Surat data map:", e);
                }
            }
        }

        // This function is kept for completeness, though currently unused without a 'change' listener.
        // It handles the logic for updating paragraphs based on template values.
        function syncParagraphs(selectedId) {
            const templateData = jenisSuratDataMap[selectedId] || {};
            const newPembuka = templateData.paragraf_pembuka || '';
            const newPenutup = templateData.paragraf_penutup || '';
            const pembukaField = $('#paragraf_pembuka');
            const penutupField = $('#paragraf_penutup');

            // Logic: Only update the textarea if the current value matches the initial saved value 
            if (pembukaField.val().trim() === initialPembuka || pembukaField.val().trim() === '') {
                pembukaField.val(newPembuka);
            }
            if (penutupField.val().trim() === initialPenutup || penutupField.val().trim() === '') {
                penutupField.val(newPenutup);
            }
        }

        function handleStatusChange() {
            const statusSelect = $('#status');
            const container = $('#catatan-penolakan-container');
            const textarea = $('#catatan_penolakan');
            const warning = $('#catatan-required-warning');

            if (statusSelect.val() === 'ditolak') {
                // Tampilkan form jika status adalah 'ditolak'
                container.slideDown(200);
                warning.show();
                // Tambahkan atribut required di sisi client (Opsional, tapi membantu UX)
                textarea.attr('required', true);
            } else {
                // Sembunyikan form untuk status lainnya
                container.slideUp(200);
                warning.hide();
                // Hapus required dan kosongkan nilai agar tidak ikut tersimpan atau divalidasi
                textarea.removeAttr('required');
                // Hanya kosongkan jika tidak ada old input (mencegah kehilangan data setelah error validasi)
                if (textarea.val().trim() === '') {
                    // Tidak perlu dikosongkan jika Anda ingin menjaga data lama, 
                    // tapi harus dihapus di Controller jika status berubah dari Ditolak.
                }
            }
        }

        // --- Core Initialization Logic ---
        $(document).ready(function() {
            // We still run this in case we need the map later, or for debugging.
            const statusSelect = $('#status');
            const catatanContainer = $('#catatan-penolakan-container');
            handleStatusChange();
            statusSelect.on('change', handleStatusChange);
            initializeDataMap();
            // NO NEED to call renderCustomFields or syncParagraphs here, 
            // as the initial values are handled by the PHP/Blade rendering logic.
        });
    </script>
@endpush
