@extends('layouts.master')
@section('title', 'Gabung KK Existing & Input Data Baru')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Gabung KK Existing & Input Data Anggota Baru</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('permohonan.masuk_kk.store_existing_kk') }}">
                @csrf

                {{-- HIDDEN INPUT: Stores the selected KK ID for submission --}}
                <input type="hidden" name="data_keluarga_id" value="{{ old('data_keluarga_id') }}" id="data_keluarga_id_hidden"
                    required>

                {{-- SECTION 1: KK SELECTION --}}
                <h5 class="mt-3 mb-3 pb-2 border-bottom">1. Pilih Kepala Keluarga Tujuan</h5>
                <div class="mb-4">
                    <label for="kk_select" class="form-label fw-semibold">Kepala Keluarga Tujuan</label>
                    <select name="kk_select" id="kk_select"
                        class="form-select @error('data_keluarga_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Kepala Keluarga --</option>
                        @foreach ($dataKeluargas as $kk)
                            <option value="{{ $kk->id }}" data-kk-kepala="{{ $kk->kepala_keluarga }}"
                                data-kk-nokk="{{ $kk->no_kk }}"
                                {{ old('data_keluarga_id') == $kk->id ? 'selected' : '' }}>
                                {{ $kk->no_kk }} - {{ $kk->kepala_keluarga }} ({{ $kk->alamat }}, RT
                                {{ $kk->rt }}/RW {{ $kk->rw }})
                            </option>
                        @endforeach
                    </select>
                    @error('data_keluarga_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p id="kk-target-info" class="mt-2 text-primary" style="display: none;"></p>
                </div>

                {{-- SECTION 2: ANGGOTA KELUARGA DETAILS (Hidden until KK is selected) --}}
                <div id="anggota-details-container"
                    style="{{ old('data_keluarga_id') ? 'display: block;' : 'display: none;' }}">
                    <h5 class="mt-4 mb-3 pb-2 border-bottom">2. Isi Data Anggota Keluarga Baru</h5>

                    <div class="row g-3">
                        {{-- Row 1: No Urut, NIK, No Akte --}}
                        <div class="card bg-card-inside-form p-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">No Urut dalam KK</label>
                                    <input type="number" name="no_urut" class="form-control" value="{{ old('no_urut') }}">
                                    @error('no_urut')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">NIK <span class="text-danger">*</span></label>
                                    <input type="number" name="nik"
                                        class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                                        placeholder="16 Digit NIK" required>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Nomor Akte Kelahiran</label>
                                    <input type="number" name="no_akta_kelahiran" class="form-control"
                                        value="{{ old('no_akta_kelahiran') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                    placeholder="Sesuai KTP/Akta" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card bg-card-inside-form p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select name="jenis_kelamin"
                                        class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Hubungan Dalam Keluarga <span
                                            class="text-danger">*</span></label>
                                    <select name="hubungan_keluarga_id"
                                        class="form-select @error('hubungan_keluarga_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>-- Pilih Hubungan --</option>
                                        @foreach ($hubunganKeluarga as $hubungan)
                                            <option value="{{ $hubungan->id }}"
                                                {{ old('hubungan_keluarga_id') == $hubungan->id ? 'selected' : '' }}>
                                                {{ $hubungan->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('hubungan_keluarga_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                        class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status Perkawinan <span class="text-danger">*</span></label>
                                    <select name="status_perkawinan" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Status --</option>
                                        <option value="Belum Menikah" @if (old('status_perkawinan') == 'Belum Menikah') selected @endif>
                                            Belum Menikah</option>
                                        <option value="Menikah" @if (old('status_perkawinan') == 'Menikah') selected @endif>Menikah
                                        </option>
                                        <option value="Cerai" @if (old('status_perkawinan') == 'Cerai') selected @endif>Cerai
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Agama<span class="text-danger">*</span></label>
                                    <select name="agama_id" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Agama --</option>
                                        @foreach ($agama as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('agama_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->agama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Golongan Darah<span class="text-danger">*</span></label>
                                    <select name="golongan_darah_id" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Golongan Darah --</option>
                                        @foreach ($golonganDarah as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('golongan_darah_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->golongan_darah }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Kewarganegaraan<span class="text-danger">*</span></label>
                                    <select name="kewarganegaraan_id" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Kewarganegaraan --</option>
                                        @foreach ($kewarganegaraan as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('kewarganegaraan_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->kewarganegaraan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Etnis/Suku</label>
                                    <input type="text" name="etnis" class="form-control"
                                        value="{{ old('etnis') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mata Pencaharian Pokok <span
                                            class="text-danger">*</span></label>
                                    <select name="mata_pencaharian_id" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                                        @foreach ($mataPencaharians as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('mata_pencaharian_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->mata_pencaharian }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nama Orang Tua<span class="text-danger">*</span></label>
                                    <input type="text" name="nama_orang_tua" class="form-control"
                                        value="{{ old('nama_orang_tua') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Akseptor KB</label>
                                    <select name="kb_id" class="form-select">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        @foreach ($kb as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('kb_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->kb }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Updated Cacat Fields --}}
                                <div class="col-md-6">
                                    <label class="form-label">Cacat</label>
                                    <select name="cacat_id" class="form-select" id="cacat-select">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        @foreach ($cacat as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('cacat_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->tipe }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6" id="nama-cacat-container" style="display: none;">
                                    <label class="form-label">Jika Cacat, Sebutkan</label>
                                    <input type="text" name="nama_cacat" class="form-control"
                                        value="{{ old('nama_cacat') }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Pendidikan Terakhir<span
                                            class="text-danger">*</span></label>
                                    <select name="pendidikan_id" class="form-select" required>
                                        <option value="" disabled selected>-- Pilih Pendidikan --</option>
                                        @foreach ($pendidikan as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('pendidikan_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->pendidikan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Kedudukan sebagai Wajib Pajak</label>
                                    <select name="kedudukan_pajak_id" class="form-select">
                                        <option value="" disabled selected>-- Pilih Kedudukan --</option>
                                        @foreach ($kedudukanPajak as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('kedudukan_pajak_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->kedudukan_pajak }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Lembaga yang Diikuti</label>
                                    <select name="lembaga_id" class="form-select" id="lembaga-select">
                                        <option value="" disabled selected>-- Pilih Lembaga --</option>
                                        @foreach ($lembaga as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('lembaga_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->jenis_lembaga }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6" id="nama-lembaga-container" style="display: none;">
                                    <label class="form-label">Jika Lembaga, Sebutkan</label>
                                    <input type="text" name="nama_lembaga" class="form-control"
                                        value="{{ old('nama_lembaga') }}">
                                </div>
                            </div>
                            <div class="card bg-card-inside-form p-2 ">
                                <div class="col-md-12">
                                    <label class="form-label">Tanggal Pencatatan</label>
                                    <input type="date" name="tanggal_pencatatan"
                                        value="{{ old('tanggal_pencatatan', date('Y-m-d')) }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4 w-100" id="submit-button"
                    {{ old('data_keluarga_id') ? '' : 'disabled' }}>
                    <i class="fas fa-save me-2"></i> Simpan Data & Lanjut ke Permohonan Surat
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kkSelect = document.getElementById('kk_select');
            const hiddenIdInput = document.getElementById('data_keluarga_id_hidden');
            const detailsContainer = document.getElementById('anggota-details-container');
            const submitButton = document.getElementById('submit-button');
            const kkInfo = document.getElementById('kk-target-info');

            // Cacat Logic Elements
            const cacatSelect = document.getElementById('cacat-select');
            const namaCacatContainer = document.getElementById('nama-cacat-container');

            // Lembaga Logic Elements
            const lembagaSelect = document.getElementById('lembaga-select');
            const namaLembagaContainer = document.getElementById('nama-lembaga-container');

            // Find all *potentially* required fields within the details container
            const requiredFields = detailsContainer.querySelectorAll('[required]');

            // --- DYNAMIC LOGIC FUNCTIONS ---

            function handleCacatLembagaLogic() {
                // Cacat logic
                if (cacatSelect && namaCacatContainer) {
                    const isCacatSelected = cacatSelect.value && cacatSelect.value !== "";
                    namaCacatContainer.style.display = isCacatSelected ? 'block' : 'none';
                }

                // Lembaga logic
                if (lembagaSelect && namaLembagaContainer) {
                    const isLembagaSelected = lembagaSelect.value && lembagaSelect.value !== "";
                    namaLembagaContainer.style.display = isLembagaSelected ? 'block' : 'none';
                }
            }

            function updateFormState(selectedKKId, selectedOption) {
                if (selectedKKId) {
                    // 1. Update hidden ID field for submission
                    hiddenIdInput.value = selectedKKId;

                    // 2. Show KK info (optional)
                    const kkKepala = selectedOption.dataset.kkKepala;
                    const kkNokk = selectedOption.dataset.kkNokk;
                    kkInfo.textContent = `KK Terpilih: ${kkNokk} (Kepala: ${kkKepala})`;
                    kkInfo.style.display = 'block';

                    // 3. Show the new member details form
                    detailsContainer.style.display = 'block';
                    submitButton.disabled = false;

                    // 4. Enforce required attribute on fields (only needed when container is visible)
                    requiredFields.forEach(field => field.setAttribute('required', 'required'));

                } else {
                    // Reset state
                    hiddenIdInput.value = '';
                    detailsContainer.style.display = 'none';
                    kkInfo.style.display = 'none';
                    submitButton.disabled = true;

                    // Disable required attribute on fields (when container is hidden)
                    requiredFields.forEach(field => field.removeAttribute('required'));
                }
            }

            // --- EVENT LISTENERS ---

            kkSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const selectedKKId = this.value;
                updateFormState(selectedKKId, selectedOption);
            });

            // Attach logic to Cacat/Lembaga dropdowns
            if (cacatSelect) cacatSelect.addEventListener('change', handleCacatLembagaLogic);
            if (lembagaSelect) lembagaSelect.addEventListener('change', handleCacatLembagaLogic);

            // --- INITIALIZATION ---

            // Initialize Cacat/Lembaga state based on old input
            handleCacatLembagaLogic();

            // Initialize KK selection state if old input exists (after validation failure)
            if (hiddenIdInput.value) {
                const selectedOption = kkSelect.querySelector(`option[value="${hiddenIdInput.value}"]`);
                if (selectedOption) {
                    // Trigger the update to restore visibility and required attributes
                    updateFormState(hiddenIdInput.value, selectedOption);
                }
            }
        });
    </script>
@endsection
