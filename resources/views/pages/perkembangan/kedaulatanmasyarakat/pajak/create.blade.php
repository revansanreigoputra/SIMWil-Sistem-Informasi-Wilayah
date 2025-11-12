@extends('layouts.master')

@section('title', 'Tambah Data Pajak dan Retribusi')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Pajak dan Retribusi
        </h5>
    </div>

    <div class="card-body">
        <form id="formPajak" action="{{ route('perkembangan.kedaulatanmasyarakat.pajak.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
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

            <hr>
            <h5 class="fw-bold text-primary mb-3"><i class="fas fa-money-bill-wave me-1"></i> Data Pajak</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jenis_pajak" class="form-label fw-semibold">
                        Jenis Pajak <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="jenis_pajak" class="form-control @error('jenis_pajak') is-invalid @enderror"
                        value="{{ old('jenis_pajak') }}" required>
                    @error('jenis_pajak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_wajib_pajak" class="form-label fw-semibold">
                        Jumlah Wajib Pajak <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_wajib_pajak" class="form-control @error('jumlah_wajib_pajak') is-invalid @enderror"
                        value="{{ old('jumlah_wajib_pajak') }}" required>
                    @error('jumlah_wajib_pajak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="target_pbb" class="form-label fw-semibold">
                        Target PBB (Rp) <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="target_pbb" class="form-control @error('target_pbb') is-invalid @enderror"
                        value="{{ old('target_pbb') }}" required>
                    @error('target_pbb') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="realisasi_pbb" class="form-label fw-semibold">
                        Realisasi PBB (Rp) <span class="text-danger">*</span>
                    </label>
                    <input type="number" step="0.01" name="realisasi_pbb" class="form-control @error('realisasi_pbb') is-invalid @enderror"
                        value="{{ old('realisasi_pbb') }}" required>
                    @error('realisasi_pbb') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_tindakan_penunggak_pbb" class="form-label fw-semibold">
                        Jumlah Tindakan Penunggak PBB <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_tindakan_penunggak_pbb" class="form-control @error('jumlah_tindakan_penunggak_pbb') is-invalid @enderror"
                        value="{{ old('jumlah_tindakan_penunggak_pbb') }}" required>
                    @error('jumlah_tindakan_penunggak_pbb') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <hr>
            <h5 class="fw-bold text-primary mb-3"><i class="fas fa-hand-holding-usd me-1"></i> Data Retribusi</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jenis_retribusi" class="form-label fw-semibold">
                        Jenis Retribusi <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="jenis_retribusi" class="form-control @error('jenis_retribusi') is-invalid @enderror"
                        value="{{ old('jenis_retribusi') }}" required>
                    @error('jenis_retribusi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_wajib_retribusi" class="form-label fw-semibold">
                        Jumlah Wajib Retribusi <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_wajib_retribusi" class="form-control @error('jumlah_wajib_retribusi') is-invalid @enderror"
                        value="{{ old('jumlah_wajib_retribusi') }}" required>
                    @error('jumlah_wajib_retribusi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="target_retribusi" class="form-label fw-semibold">
                        Target Retribusi (Rp) <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="target_retribusi" class="form-control @error('target_retribusi') is-invalid @enderror"
                        value="{{ old('target_retribusi') }}" required>
                    @error('target_retribusi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="realisasi_retribusi" class="form-label fw-semibold">
                        Realisasi Retribusi (Rp) <span class="text-danger">*</span>
                    </label>
                    <input type="number" step="0.01" name="realisasi_retribusi" class="form-control @error('realisasi_retribusi') is-invalid @enderror"
                        value="{{ old('realisasi_retribusi') }}" required>
                    @error('realisasi_retribusi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <hr>
            <h5 class="fw-bold text-primary mb-3"><i class="fas fa-balance-scale me-1"></i> Pungutan Resmi & Kasus Pungli</h5>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jenis_pungutan_resmi" class="form-label fw-semibold">
                        Jenis Pungutan Resmi <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="jenis_pungutan_resmi" class="form-control @error('jenis_pungutan_resmi') is-invalid @enderror"
                        value="{{ old('jenis_pungutan_resmi') }}" required>
                    @error('jenis_pungutan_resmi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="target_pungutan_resmi" class="form-label fw-semibold">
                        Target Pungutan Resmi (Rp) <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="target_pungutan_resmi" class="form-control @error('target_pungutan_resmi') is-invalid @enderror"
                        value="{{ old('target_pungutan_resmi') }}" required>
                    @error('target_pungutan_resmi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="realisasi_pungutan_resmi" class="form-label fw-semibold">
                        Realisasi Pungutan Resmi (Rp) <span class="text-danger">*</span>
                    </label>
                    <input type="number" step="0.01" name="realisasi_pungutan_resmi" class="form-control @error('realisasi_pungutan_resmi') is-invalid @enderror"
                        value="{{ old('realisasi_pungutan_resmi') }}" required>
                    @error('realisasi_pungutan_resmi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_kasus_pungli" class="form-label fw-semibold">
                        Jumlah Kasus Pungli <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_kasus_pungli" class="form-control @error('jumlah_kasus_pungli') is-invalid @enderror"
                        value="{{ old('jumlah_kasus_pungli') }}" required>
                    @error('jumlah_kasus_pungli') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="jumlah_penyelesaian_pungli" class="form-label fw-semibold">
                        Jumlah Penyelesaian Kasus Pungli <span class="text-danger">*</span>
                    </label>
                    <input type="number" name="jumlah_penyelesaian_pungli" class="form-control @error('jumlah_penyelesaian_pungli') is-invalid @enderror"
                        value="{{ old('jumlah_penyelesaian_pungli') }}" required>
                    @error('jumlah_penyelesaian_pungli') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.kedaulatanmasyarakat.pajak.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- ✅ JavaScript Validasi Jumlah Pungli --}}
<script>
document.getElementById('formPajak').addEventListener('submit', function(e) {
    const kasus = parseInt(document.getElementById('jumlah_kasus_pungli').value) || 0;
    const penyelesaian = parseInt(document.getElementById('jumlah_penyelesaian_pungli').value) || 0;

    if (penyelesaian > kasus) {
        e.preventDefault();
        alert('Jumlah penyelesaian kasus pungli tidak boleh lebih besar dari jumlah kasus pungli.');
        document.getElementById('jumlah_penyelesaian_pungli').focus();
    }
});
</script>
@endsection
