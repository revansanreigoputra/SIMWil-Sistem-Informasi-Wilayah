@extends('layouts.master')

@section('title', 'Edit Data Desa')

@section('content')
@can('desa.update')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0 fw-bold">
            <i class="bi bi-pencil-square me-2"></i>Form Edit Data Desa
        </h5>
    </div>

    <div class="card-body p-4">
        <form action="{{ route('desa.update', $desa->id) }}" method="POST" id="form-edit-desa">
            @csrf
            @method('PUT')

            {{-- SECTION 1: Informasi Dasar --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-primary">
                    <i class="bi bi-info-circle me-2"></i>Informasi Dasar
                </h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="kecamatan_id" class="form-label fw-semibold">Kecamatan <span class="text-danger">*</span></label>
                        <select name="kecamatan_id" id="kecamatan_id" class="form-select @error('kecamatan_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kecamatan --</option>
                            @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan->id }}" {{ old('kecamatan_id', $desa->kecamatan_id) == $kecamatan->id ? 'selected' : '' }}>
                                    {{ $kecamatan->nama_kecamatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('kecamatan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nama_desa" class="form-label fw-semibold">Nama Desa <span class="text-danger">*</span></label>
                        <input type="text" name="nama_desa" id="nama_desa" class="form-control @error('nama_desa') is-invalid @enderror" 
                               value="{{ old('nama_desa', $desa->nama_desa) }}" placeholder="Masukkan nama desa" required>
                        @error('nama_desa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label fw-semibold">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="desa" {{ old('status', $desa->status) == 'desa' ? 'selected' : '' }}>Desa</option>
                            <option value="kelurahan" {{ old('status', $desa->status) == 'kelurahan' ? 'selected' : '' }}>Kelurahan</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="kode_pum" class="form-label fw-semibold">Kode PUM <span class="text-danger">*</span></label>
                        <input type="text" name="kode_pum" id="kode_pum" class="form-control @error('kode_pum') is-invalid @enderror"
                               value="{{ old('kode_pum', $desa->kode_pum) }}" placeholder="Masukkan kode PUM" required>
                        @error('kode_pum') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            {{-- SECTION 2: Informasi Geografis --}}
            <div class="mb-3 border rounded-3 p-4 bg-light">
                <h6 class="fw-bold mb-3 text-success">
                    <i class="bi bi-geo-alt me-2"></i>Informasi Geografis
                </h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="kelurahan_terluar" class="form-label fw-semibold">Kelurahan Terluar</label>
                        <input type="text" name="kelurahan_terluar" id="kelurahan_terluar" class="form-control @error('kelurahan_terluar') is-invalid @enderror"
                               value="{{ old('kelurahan_terluar', $desa->kelurahan_terluar) }}" placeholder="Masukkan kelurahan terluar">
                        @error('kelurahan_terluar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tipologi" class="form-label fw-semibold">Tipologi</label>
                        <select name="tipologi" id="tipologi" class="form-select @error('tipologi') is-invalid @enderror">
                            <option value="">-- Pilih Tipologi --</option>
                            @foreach (['Dataran Tinggi', 'Dataran Rendah', 'Pesisir', 'Pegunungan', 'Perbukitan'] as $tipe)
                                <option value="{{ $tipe }}" {{ old('tipologi', $desa->tipologi) == $tipe ? 'selected' : '' }}>{{ $tipe }}</option>
                            @endforeach
                        </select>
                        @error('tipologi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="luas" class="form-label fw-semibold">Luas (Ha)</label>
                        <div class="input-group">
                            <input type="number" name="luas" id="luas" class="form-control @error('luas') is-invalid @enderror"
                                   value="{{ old('luas', $desa->luas) }}" placeholder="0" step="0.01" min="0">
                            <span class="input-group-text">Ha</span>
                        </div>
                        @error('luas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="bujur" class="form-label fw-semibold">Bujur (Longitude)</label>
                        <div class="input-group">
                            <input type="number" name="bujur" id="bujur" class="form-control @error('bujur') is-invalid @enderror"
                                   value="{{ old('bujur', $desa->bujur) }}" placeholder="106.123456" step="0.000001" min="-180" max="180">
                            <span class="input-group-text">°</span>
                        </div>
                        @error('bujur') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="lintang" class="form-label fw-semibold">Lintang (Latitude)</label>
                        <div class="input-group">
                            <input type="number" name="lintang" id="lintang" class="form-control @error('lintang') is-invalid @enderror"
                                   value="{{ old('lintang', $desa->lintang) }}" placeholder="-6.123456" step="0.000001" min="-90" max="90">
                            <span class="input-group-text">°</span>
                        </div>
                        @error('lintang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="ketinggian" class="form-label fw-semibold">Ketinggian (mdpl)</label>
                        <div class="input-group">
                            <input type="number" name="ketinggian" id="ketinggian" class="form-control @error('ketinggian') is-invalid @enderror"
                                   value="{{ old('ketinggian', $desa->ketinggian) }}" placeholder="0" min="0" max="9000">
                            <span class="input-group-text">mdpl</span>
                        </div>
                        @error('ketinggian') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4 flex-wrap">
                <a href="{{ route('desa.index') }}" class="btn btn-outline-secondary mb-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary mb-2">
                    <i class="bi bi-save"></i> Update Data
                </button>
            </div>
        </form>
    </div>
</div>

@else
<div class="alert alert-danger mt-3 text-center">
    <h4 class="alert-heading">Akses Ditolak!</h4>
    <p>Maaf, Anda tidak memiliki izin untuk mengedit data desa.</p>
</div>
@endcan
@endsection

@push('addon-script')
<script>
$(document).ready(function() {
    $('#kecamatan_id, #status, #tipologi').select2({
        theme: 'bootstrap4',
        width: '100%'
    });

    const originalValues = {
        kecamatan_id: "{{ $desa->kecamatan_id }}",
        nama_desa: "{{ $desa->nama_desa }}",
        status: "{{ $desa->status }}",
        kode_pum: "{{ $desa->kode_pum }}",
        kelurahan_terluar: "{{ $desa->kelurahan_terluar }}",
        tipologi: "{{ $desa->tipologi }}",
        luas: "{{ $desa->luas }}",
        bujur: "{{ $desa->bujur }}",
        lintang: "{{ $desa->lintang }}",
        ketinggian: "{{ $desa->ketinggian }}"
    };

    $('#form-edit-desa').on('submit', function(e) {
        let isValid = true;
        $(this).find('[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
                isValid = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            e.preventDefault();
            Swal.fire({
                title: 'Form Tidak Lengkap',
                text: 'Mohon lengkapi semua field yang wajib diisi',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }
    });

    $('input, select').on('change input', function() {
        const name = $(this).attr('name');
        const value = $(this).val();
        if (originalValues[name] != value) {
            $(this).addClass('border-warning');
        } else {
            $(this).removeClass('border-warning');
        }
    });
});

function resetToOriginal() {
    const data = {
        kecamatan_id: "{{ $desa->kecamatan_id }}",
        nama_desa: "{{ $desa->nama_desa }}",
        status: "{{ $desa->status }}",
        kode_pum: "{{ $desa->kode_pum }}",
        kelurahan_terluar: "{{ $desa->kelurahan_terluar }}",
        tipologi: "{{ $desa->tipologi }}",
        luas: "{{ $desa->luas }}",
        bujur: "{{ $desa->bujur }}",
        lintang: "{{ $desa->lintang }}",
        ketinggian: "{{ $desa->ketinggian }}"
    };

    Object.keys(data).forEach(key => {
        $(`[name="${key}"]`).val(data[key]).trigger('change');
    });
    $('input, select').removeClass('border-warning');
}
</script>
@endpush
