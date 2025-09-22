@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-3 mb-4">
        <i class="fas fa-file-signature text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark">Form Surat Rekomendasi RT</h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white fw-bold rounded-top-4">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Surat Rekomendasi RT
                </div>
                <div class="card-body p-4">

                    <form>
                        {{-- DATA SURAT --}}
                        <h6 class="fw-bold text-primary mb-3">DATA SURAT</h6>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">NIK</label>
                            <input type="text" class="form-control rounded-3 shadow-sm"
                                   placeholder="Masukkan NIK/Nama, otomatis tampil jika sudah ada">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanggal</label>
                            <input type="date" class="form-control rounded-3 shadow-sm">
                        </div>

                        {{-- ISI SURAT --}}
                        <h6 class="fw-bold text-primary mb-3">ISI SURAT</h6>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Isi Surat</label>
                            <div class="border rounded-3 shadow-sm p-2">
                                <!-- Toolbar dummy -->
                                <div class="mb-2 d-flex flex-wrap gap-2">
                                    <select class="form-select form-select-sm w-auto">
                                        <option>Font Family</option>
                                    </select>
                                    <select class="form-select form-select-sm w-auto">
                                        <option>Font Size</option>
                                    </select>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Styles</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Insert youtube video</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit HTML Source</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Insert code using Syntaxhighlighter</button>
                                </div>
                                <!-- Textarea isi surat -->
                                <textarea class="form-control border-0" rows="4">
Demikian surat rekomendasi ini dibuat untuk dapat dipergunakan seperlunya.
                                </textarea>
                                <small class="text-muted">Path: p</small>
                            </div>
                        </div>

                        {{-- TANDA TANGAN --}}
                        <h6 class="fw-bold text-primary mb-3">TANDA TANGAN</h6>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tanda Tangan</label>
                            <select class="form-select rounded-3 shadow-sm">
                                <option value="Carmadi :: Ketua RT 1">Carmadi :: Ketua RT 1</option>
                            </select>
                        </div>

                        {{-- TOMBOL --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('layanan/permohonan') }}" 
                               class="btn btn-light border rounded-pill px-4 shadow-sm">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
