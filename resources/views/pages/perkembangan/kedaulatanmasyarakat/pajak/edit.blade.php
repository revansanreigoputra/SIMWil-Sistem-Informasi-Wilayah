@extends('layouts.master')

@section('title', 'Edit Data Pajak Desa')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-edit me-2 text-warning"></i>
            Edit Data Pajak Desa
        </h5>
    </div>

    <div class="card-body">
        <form id="formPajak" action="{{ route('perkembangan.kedaulatanmasyarakat.pajak.update', $pajak->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar-alt me-1"></i> Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" name="tanggal" id="tanggal"
                           class="form-control @error('tanggal') is-invalid @enderror"
                           value="{{ old('tanggal', $pajak->tanggal) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kolom Desa -->

            </div>

            <hr>

            <h6 class="fw-bold mt-3 mb-3 text-primary">Data Pajak</h6>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jenis_pajak" class="form-label">Jenis Pajak <span class="text-danger">*</span></label>
                    <input type="text" name="jenis_pajak" id="jenis_pajak" class="form-control"
                           value="{{ old('jenis_pajak', $pajak->jenis_pajak) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_wajib_pajak" class="form-label">Jumlah Wajib Pajak</label>
                    <input type="number" name="jumlah_wajib_pajak" id="jumlah_wajib_pajak" min="0"
                           class="form-control"
                           value="{{ old('jumlah_wajib_pajak', $pajak->jumlah_wajib_pajak) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="target_pbb" class="form-label">Target PBB (Rp)</label>
                    <input type="number" name="target_pbb" id="target_pbb" min="0"
                           class="form-control"
                           value="{{ old('target_pbb', $pajak->target_pbb) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="realisasi_pbb" class="form-label">Realisasi PBB (Rp)</label>
                    <input type="number" name="realisasi_pbb" id="realisasi_pbb" step="0.01" min="0"
                           class="form-control"
                           value="{{ old('realisasi_pbb', $pajak->realisasi_pbb) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_tindakan_penunggak_pbb" class="form-label">Jumlah Tindakan Penunggak PBB</label>
                    <input type="number" name="jumlah_tindakan_penunggak_pbb" id="jumlah_tindakan_penunggak_pbb" min="0"
                           class="form-control"
                           value="{{ old('jumlah_tindakan_penunggak_pbb', $pajak->jumlah_tindakan_penunggak_pbb) }}">
                </div>
            </div>

            <hr>

            <h6 class="fw-bold mt-3 mb-3 text-primary">Data Retribusi</h6>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jenis_retribusi" class="form-label">Jenis Retribusi</label>
                    <input type="text" name="jenis_retribusi" id="jenis_retribusi" class="form-control"
                           value="{{ old('jenis_retribusi', $pajak->jenis_retribusi) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_wajib_retribusi" class="form-label">Jumlah Wajib Retribusi</label>
                    <input type="number" name="jumlah_wajib_retribusi" id="jumlah_wajib_retribusi" min="0"
                           class="form-control"
                           value="{{ old('jumlah_wajib_retribusi', $pajak->jumlah_wajib_retribusi) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="target_retribusi" class="form-label">Target Retribusi (Rp)</label>
                    <input type="number" name="target_retribusi" id="target_retribusi" min="0"
                           class="form-control"
                           value="{{ old('target_retribusi', $pajak->target_retribusi) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="realisasi_retribusi" class="form-label">Realisasi Retribusi (Rp)</label>
                    <input type="number" name="realisasi_retribusi" id="realisasi_retribusi" step="0.01" min="0"
                           class="form-control"
                           value="{{ old('realisasi_retribusi', $pajak->realisasi_retribusi) }}">
                </div>
            </div>

            <hr>

            <h6 class="fw-bold mt-3 mb-3 text-primary">Data Pungutan Resmi</h6>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jenis_pungutan_resmi" class="form-label">Jenis Pungutan Resmi</label>
                    <input type="text" name="jenis_pungutan_resmi" id="jenis_pungutan_resmi" class="form-control"
                           value="{{ old('jenis_pungutan_resmi', $pajak->jenis_pungutan_resmi) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="target_pungutan_resmi" class="form-label">Target Pungutan Resmi (Rp)</label>
                    <input type="number" name="target_pungutan_resmi" id="target_pungutan_resmi" min="0"
                           class="form-control"
                           value="{{ old('target_pungutan_resmi', $pajak->target_pungutan_resmi) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="realisasi_pungutan_resmi" class="form-label">Realisasi Pungutan Resmi (Rp)</label>
                    <input type="number" name="realisasi_pungutan_resmi" id="realisasi_pungutan_resmi" step="0.01" min="0"
                           class="form-control"
                           value="{{ old('realisasi_pungutan_resmi', $pajak->realisasi_pungutan_resmi) }}">
                </div>
            </div>

            <hr>

            <h6 class="fw-bold mt-3 mb-3 text-primary">Kasus Pungutan Liar</h6>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jumlah_kasus_pungli" class="form-label">Jumlah Kasus Pungli</label>
                    <input type="number" name="jumlah_kasus_pungli" id="jumlah_kasus_pungli" min="0"
                           class="form-control"
                           value="{{ old('jumlah_kasus_pungli', $pajak->jumlah_kasus_pungli) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="jumlah_penyelesaian_pungli" class="form-label">Jumlah Penyelesaian Pungli</label>
                    <input type="number" name="jumlah_penyelesaian_pungli" id="jumlah_penyelesaian_pungli" min="0"
                           class="form-control"
                           value="{{ old('jumlah_penyelesaian_pungli', $pajak->jumlah_penyelesaian_pungli) }}">
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
                        <i class="fas fa-save me-1"></i> Perbarui Data
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
