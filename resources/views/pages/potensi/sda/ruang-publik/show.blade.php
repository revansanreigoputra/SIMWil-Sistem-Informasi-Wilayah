@extends("layouts.master")

@section("title", "Detail Data Ruang Publik")

@section("content")
    <div class="card shadow-sm">
        <div class="card-header text-dark">
            <h5 class="card-title mb-0">
                <i class="fas fa-info-circle me-2"></i>
                Detail Data Ruang Publik
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pencatatan</label>
                        <p class="form-control-plaintext">{{ $pRuangPublik->tanggal->format("d F Y") }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Desa</label>
                        <p class="form-control-plaintext">{{ $pRuangPublik->desa->nama_desa }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jenis Ruang Publik</label>
                        <p class="form-control-plaintext">{{ $pRuangPublik->ruangPublik->nama }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keberadaan</label>
                        <p class="form-control-plaintext">{{ ucfirst($pRuangPublik->keberadaan) }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Luas m2</label>
                        <p class="form-control-plaintext">{{ number_format($pRuangPublik->luas_m2, 2, ",", ".") }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tingkat Pemanfaatan</label>
                        <p class="form-control-plaintext">{{ ucfirst($pRuangPublik->tingkat_pemanfaatan) }}</p>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-between">
                <a href="{{ route("ruang_publik.index") }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
                <div>
                    @can("ruang_publik.update")
                        <a href="{{ route("ruang_publik.edit", $pRuangPublik->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-2"></i>
                            Edit
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
