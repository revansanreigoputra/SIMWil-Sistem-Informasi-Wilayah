@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-3 mb-4">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Edit Permohonan</h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white fw-bold rounded-top-4">
                    <i class="fas fa-edit me-2"></i> Form Edit Permohonan
                </div>
                <div class="card-body p-4">
                    
                    <form>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Nama Pemohon</label>
                            <input type="text" class="form-control rounded-3 shadow-sm" value="Budi Santoso">
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Alamat</label>
                            <textarea class="form-control rounded-3 shadow-sm" rows="3">Jl. Mawar No. 5</textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('layanan/permohonan') }}" 
                               class="btn btn-light border rounded-pill px-4 shadow-sm">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="fas fa-save me-1"></i> Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
