    @extends('layouts.master')

@section('title', 'Tambah Data Prasarana dan Irigasi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header text-dark">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2"></i>
            Tambah Data Prasarana dan Irigasi
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label fw-semibold">
                            <i class="fas fa-calendar me-1"></i>
                            Tanggal <span class="text-danger">*</span>
                        </label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                            name="tanggal" value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3">Data Saluran</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="saluran_primer" class="form-label fw-semibold">
                            Saluran Primer (m) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('saluran_primer') is-invalid @enderror"
                            id="saluran_primer" name="saluran_primer" value="{{ old('saluran_primer') }}" min="0" step="0.01" required>
                        @error('saluran_primer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="saluran_primer_rusak" class="form-label fw-semibold">
                            Saluran Primer Rusak (m) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('saluran_primer_rusak') is-invalid @enderror"
                            id="saluran_primer_rusak" name="saluran_primer_rusak" value="{{ old('saluran_primer_rusak') }}" min="0" step="0.01" required oninput="checkRusak('saluran_primer', 'saluran_primer_rusak')">
                        @error('saluran_primer_rusak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback d-none" id="error-saluran_primer_rusak"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="saluran_sekunder" class="form-label fw-semibold">
                            Saluran Sekunder (m) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('saluran_sekunder') is-invalid @enderror"
                            id="saluran_sekunder" name="saluran_sekunder" value="{{ old('saluran_sekunder') }}" min="0" step="0.01" required>
                        @error('saluran_sekunder')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="saluran_sekunder_rusak" class="form-label fw-semibold">
                            Saluran Sekunder Rusak (m) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('saluran_sekunder_rusak') is-invalid @enderror"
                            id="saluran_sekunder_rusak" name="saluran_sekunder_rusak" value="{{ old('saluran_sekunder_rusak') }}" min="0" step="0.01" required oninput="checkRusak('saluran_sekunder', 'saluran_sekunder_rusak')">
                        @error('saluran_sekunder_rusak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback d-none" id="error-saluran_sekunder_rusak"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="saluran_tersier" class="form-label fw-semibold">
                            Saluran Tersier (m) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('saluran_tersier') is-invalid @enderror"
                            id="saluran_tersier" name="saluran_tersier" value="{{ old('saluran_tersier') }}" min="0" step="0.01" required>
                        @error('saluran_tersier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="saluran_tersier_rusak" class="form-label fw-semibold">
                            Saluran Tersier Rusak (m) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('saluran_tersier_rusak') is-invalid @enderror"
                            id="saluran_tersier_rusak" name="saluran_tersier_rusak" value="{{ old('saluran_tersier_rusak') }}" min="0" step="0.01" required oninput="checkRusak('saluran_tersier', 'saluran_tersier_rusak')">
                        @error('saluran_tersier_rusak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback d-none" id="error-saluran_tersier_rusak"></div>
                    </div>
                </div>
            </div>

            <h6 class="fw-bold text-primary mb-3">Data Pintu</h6>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="pintu_sadap" class="form-label fw-semibold">
                            Pintu Sadap (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('pintu_sadap') is-invalid @enderror"
                            id="pintu_sadap" name="pintu_sadap" value="{{ old('pintu_sadap') }}" min="0" required>
                        @error('pintu_sadap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="pintu_sadap_rusak" class="form-label fw-semibold">
                            Pintu Sadap Rusak (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('pintu_sadap_rusak') is-invalid @enderror"
                            id="pintu_sadap_rusak" name="pintu_sadap_rusak" value="{{ old('pintu_sadap_rusak') }}" min="0" required oninput="checkRusak('pintu_sadap', 'pintu_sadap_rusak')">
                        @error('pintu_sadap_rusak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback d-none" id="error-pintu_sadap_rusak"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="pintu_pembagi_air" class="form-label fw-semibold">
                            Pintu Pembagi Air (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('pintu_pembagi_air') is-invalid @enderror"
                            id="pintu_pembagi_air" name="pintu_pembagi_air" value="{{ old('pintu_pembagi_air') }}" min="0" required>
                        @error('pintu_pembagi_air')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="pintu_pembagi_air_rusak" class="form-label fw-semibold">
                            Pintu Pembagi Air Rusak (unit) <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('pintu_pembagi_air_rusak') is-invalid @enderror"
                            id="pintu_pembagi_air_rusak" name="pintu_pembagi_air_rusak" value="{{ old('pintu_pembagi_air_rusak') }}" min="0" required oninput="checkRusak('pintu_pembagi_air', 'pintu_pembagi_air_rusak')">
                        @error('pintu_pembagi_air_rusak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback d-none" id="error-pintu_pembagi_air_rusak"></div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Field dengan tanda <span class="text-danger">*</span> wajib diisi
                        </small>

                        <div class="btn-group gap-2">
                            <a href="{{ route('potensi.potensi-prasarana-dan-sarana.irigasi.index') }}"
                                class="btn btn-outline-secondary rounded">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary rounded">
                                Simpan Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function checkRusak(baikId, rusakId) {
        const baik = parseFloat(document.getElementById(baikId).value) || 0;
        const rusak = parseFloat(document.getElementById(rusakId).value) || 0;
        const errorElement = document.getElementById('error-' + rusakId);
        if (rusak > baik) {
            errorElement.textContent = 'Nilai rusak tidak boleh lebih besar dari nilai baik.';
            errorElement.classList.remove('d-none');
            document.getElementById(rusakId).value = baik;
        } else {
            errorElement.textContent = '';
            errorElement.classList.add('d-none');
        }
    }
</script>
@endsection
