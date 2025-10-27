@extends('layouts.master')

@section('title', 'Edit Data Lembaga Pemerintahan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-building me-2"></i>Form Edit Data Potensi Kelembagaan</h5>
        </div>

        <div class="card-body p-4">
            <form id="form-pemerintahan"
                action="{{ route('potensi.potensi-kelembagaan.pemerintah.update', $potensi->id) }}"
                method="POST">
                @csrf
                @method('PUT')

                {{-- Tampilkan Error --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- ===================== SECTION 1 ===================== --}}
                <div class="mb-4 border rounded-3 p-4 bg-light">
                    <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-info-circle me-1"></i>Data Umum Lembaga Pemerintahan</h6>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Data <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal_data"
                                value="{{ old('tanggal_data', $potensi->tanggal_data) }}">
                            @error('tanggal_data')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Jumlah Aparat Pemerintah <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_aparat_pemerintah"
                                value="{{ old('jumlah_aparat_pemerintah', $potensi->jumlah_aparat_pemerintah) }}"
                                placeholder="Total Aparat">
                            @error('jumlah_aparat_pemerintah')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Jumlah Perangkat Desa <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_perangkat_desa"
                                value="{{ old('jumlah_perangkat_desa', $potensi->jumlah_perangkat_desa) }}"
                                placeholder="Total Perangkat">
                            @error('jumlah_perangkat_desa')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Jumlah Staf <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_staf"
                                value="{{ old('jumlah_staf', $potensi->jumlah_staf) }}" placeholder="Total Staf">
                            @error('jumlah_staf')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Jumlah Dusun <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_dusun"
                                value="{{ old('jumlah_dusun', $potensi->jumlah_dusun) }}" placeholder="Total Dusun">
                            @error('jumlah_dusun')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Dasar Hukum Pembentukan (Lembaga Desa)</label>
                            <textarea class="form-control" name="dasar_hukum_pembentukan" rows="2"
                                placeholder="Tuliskan dasar hukum pembentukan">{{ old('dasar_hukum_pembentukan', $potensi->dasar_hukum_pembentukan) }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Dasar Hukum Pembentukan BPD</label>
                            <textarea class="form-control" name="dasar_hukum_pembentukan_bpd" rows="2"
                                placeholder="Tuliskan dasar hukum BPD">{{ old('dasar_hukum_pembentukan_bpd', $potensi->dasar_hukum_pembentukan_bpd) }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- ===================== SECTION 2 ===================== --}}
                <div class="mb-4 border rounded-3 p-4 bg-light">
                    <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-people-fill me-1"></i>Badan Permusyawaratan Desa (BPD)</h6>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Keberadaan BPD <span class="text-danger">*</span></label>
                            <select class="form-select" name="keberadaan_bpd">
                                <option value="">-- Pilih Status --</option>
                                @foreach (['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada'] as $status)
                                    @php $selectedStatus = old('keberadaan_bpd', optional($bpd)->keberadaan_bpd); @endphp
                                    <option value="{{ $status }}" {{ $selectedStatus == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                            @error('keberadaan_bpd')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jumlah Anggota BPD <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_anggota"
                                value="{{ old('jumlah_anggota', optional($bpd)->jumlah_anggota) }}"
                                placeholder="Jumlah anggota BPD">
                            @error('jumlah_anggota')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- ===================== SECTION 3 ===================== --}}
                <div class="mb-4 border rounded-3 p-4 bg-light">
                    <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-person-badge me-1"></i>Data Personil & Status Jabatan</h6>
                    <p class="text-muted small mb-4">Tentukan siapa yang mengisi jabatan dan bagaimana status jabatannya.</p>

                    <div id="anggota-organisasi-wrapper">
                        @foreach ($jabatans as $index => $jabatan)
                            @php
                                $existingAnggota = $anggotaOrganisasis->get($jabatan->id);
                                $selectedPerangkatId = old("anggota_organisasi.$index.perangkat_desa_id", optional($existingAnggota)->perangkat_desa_id);
                                $selectedStatus = old("anggota_organisasi.$index.status_jabatan", optional($existingAnggota)->status_jabatan);
                                $keterangan = old("anggota_organisasi.$index.keterangan_tambahan", optional($existingAnggota)->keterangan_tambahan);
                            @endphp
                            <div class="border rounded-3 p-3 mb-3 bg-white">
                                <input type="hidden" name="anggota_organisasi[{{ $index }}][jabatan_id]"
                                    value="{{ $jabatan->id }}">

                                <label class="form-label fw-bold mb-3 d-block text-primary">{{ $jabatan->nama_jabatan }}</label>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Pilih Personil</label>
                                        <select class="form-select"
                                            name="anggota_organisasi[{{ $index }}][perangkat_desa_id]">
                                            <option value="">-- Pilih Perangkat Desa --</option>
                                            @foreach ($perangkatDesas as $perangkat)
                                                <option value="{{ $perangkat->id }}"
                                                    {{ $selectedPerangkatId == $perangkat->id ? 'selected' : '' }}>
                                                    {{ $perangkat->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Status Jabatan <span class="text-danger">*</span></label>
                                        @php
                                            $statuses = ['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada', 'Aktif', 'Pasif', 'Pasif (Dusun)', 'Aktif (Dusun)'];
                                        @endphp
                                        <select class="form-select"
                                            name="anggota_organisasi[{{ $index }}][status_jabatan]">
                                            <option value="">-- Pilih Status --</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}"
                                                    {{ $selectedStatus == $status ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">Keterangan Tambahan</label>
                                        <textarea class="form-control" name="anggota_organisasi[{{ $index }}][keterangan_tambahan]" rows="1">{{ $keterangan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- ===================== BUTTON ===================== --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('potensi.potensi-kelembagaan.pemerintah.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('select').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: '-- Pilih --',
            allowClear: true
        });
    });
</script>
@endpush
