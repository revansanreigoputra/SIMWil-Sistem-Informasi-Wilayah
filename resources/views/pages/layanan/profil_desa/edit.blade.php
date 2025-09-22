@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Edit Profil Desa</h4>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
            <i class="fas fa-edit me-2"></i>
            <h5 class="mb-0 fw-bold">Edit Profil Desa</h5>
        </div>
        <div class="card-body p-4">
            <form action="#" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Provinsi</label>
                        <input type="text" name="provinsi" class="form-control rounded-pill" value="KEPULAUAN RIAU">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kabupaten/Kota</label>
                        <input type="text" name="kabupaten" class="form-control rounded-pill" value="LINGGA">
                    </div>
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control rounded-pill" value="LINGGA">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select rounded-pill">
                            <option value="Desa" selected>Desa</option>
                            <option value="Kelurahan">Kelurahan</option>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label fw-semibold">Desa/Kelurahan</label>
                    <input type="text" name="desa" class="form-control rounded-pill" value="DABO BARU">
                </div>

                <div class="mt-3">
                    <label class="form-label fw-semibold">Logo Desa</label>
                    <div class="d-flex align-items-center mt-2">
                        <img src="{{ asset('images/logo_desa.png') }}" alt="Logo Desa" width="80" class="me-3 rounded shadow-sm border">
                        <input type="file" name="logo" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('layanan.profil_desa.show') }}" class="btn btn-light border rounded-pill px-4 me-2">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
