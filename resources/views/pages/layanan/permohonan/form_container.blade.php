@extends('layouts.master') 

@section('title')
    Formulir Permohonan: {{ $jenisSurat->nama }}
@endsection

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        {{-- Menggunakan variabel 'jenisSurat' yang dikirim dari controller --}}
        <h1 class="h4 mb-0">Formulir Permohonan: {{ $jenisSurat->nama }}</h1>
        <p class="mb-0 mt-1">Kode Surat: {{ $jenisSurat->kode }}</p>
    </div>
    
    <div class="card-body">
        {{-- Sesuaikan route store Anda --}}
        <form method="POST" action="{{ route('permohonan_surats.store') }}">
            @csrf
            
            {{-- Mengirim ID Jenis Surat yang dipilih --}}
            <input type="hidden" name="id_jenis_surat" value="{{ $jenisSurat->id }}">

            {{-- Bagian I: Data Pemohon (Data Statis, Select dari Anggota Keluarga) --}}
            <h5 class="mt-3 mb-3 pb-2 border-bottom">Data Pemohon</h5>
            <div class="mb-3">
                <label for="id_anggota_keluargas" class="form-label fw-semibold">Pilih Pemohon</label>
                <select name="id_anggota_keluargas" id="id_anggota_keluargas" class="form-select @error('id_anggota_keluargas') is-invalid @enderror" required>
                    <option value="">-- Pilih Anggota Keluarga/Penduduk --</option>
                    {{-- Asumsi $anggotaKeluargas dikirim dari controller --}}
                    @foreach ($anggotaKeluargas as $anggota)
                        <option value="{{ $anggota->id }}" {{ old('id_anggota_keluargas') == $anggota->id ? 'selected' : '' }}>
                            {{ $anggota->nik }} - {{ $anggota->nama }}
                        </option>
                    @endforeach
                </select>
                @error('id_anggota_keluargas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="tanggal_permohonan" class="form-label fw-semibold">Tanggal Permohonan</label>
                <input type="date" name="tanggal_permohonan" class="form-control" value="{{ old('tanggal_permohonan', now()->format('Y-m-d')) }}" required>
            </div>
            
            <hr>

            {{-- Bagian II: Data Tambahan (RENDER DINAMIS DARI JSON) --}}
            @if (count($variabelInputs) > 0)
                <h5 class="mt-4 mb-3 pb-2 border-bottom">Data Khusus Surat (Template: {{ $jenisSurat->kode }})</h5>
                @foreach ($variabelInputs as $input)
                    {{-- Perhatian: Gunakan strtolower() untuk key/name jika di controller Anda mengharapkan lowercase --}}
                    @php
                        $fieldName = strtolower($input['key']);
                        $isRequired = isset($input['required']) && $input['required'];
                    @endphp

                    <div class="mb-3">
                        <label for="{{ $fieldName }}" class="form-label fw-semibold">
                            {{ $input['label'] }} @if($isRequired)<span class="text-danger">*</span>@endif
                        </label>

                        @if ($input['tipe'] == 'textarea')
                            <textarea 
                                name="{{ $fieldName }}" 
                                id="{{ $fieldName }}" 
                                class="form-control" 
                                rows="3" 
                                placeholder="{{ $input['placeholder'] ?? 'Isi data...' }}"
                                {{ $isRequired ? 'required' : '' }}>{{ old($fieldName) }}</textarea>

                        @elseif ($input['tipe'] == 'select' && isset($input['options']))
                            <select 
                                name="{{ $fieldName }}" 
                                id="{{ $fieldName }}" 
                                class="form-select"
                                {{ $isRequired ? 'required' : '' }}>
                                <option value="">-- Pilih {{ $input['label'] }} --</option>
                                @foreach ($input['options'] as $option)
                                    <option value="{{ $option }}" {{ old($fieldName) == $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                        
                        @else 
                            <input 
                                type="{{ $input['tipe'] }}" 
                                name="{{ $fieldName }}" 
                                id="{{ $fieldName }}" 
                                class="form-control" 
                                value="{{ old($fieldName) }}" 
                                placeholder="{{ $input['placeholder'] ?? 'Isi data...' }}"
                                {{ $isRequired ? 'required' : '' }}>
                        @endif

                        @error($fieldName)
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            @else
                <p class="alert alert-info">Template surat ini tidak memerlukan input data tambahan.</p>
            @endif

            <hr>

            {{-- Bagian III: Penanda Tangan (TTD) --}}
            <h5 class="mt-4 mb-3 pb-2 border-bottom">Persetujuan dan Tanda Tangan</h5>
            <div class="mb-3">
                <label for="id_ttds" class="form-label fw-semibold">Penanda Tangan (Kepala/Sekretaris Desa)</label>
                <select name="id_ttds" id="id_ttds" class="form-select @error('id_ttds') is-invalid @enderror" required>
                    <option value="">-- Pilih Pejabat Penanda Tangan --</option>
                    {{-- Asumsi $ttds dikirim dari controller --}}
                    @foreach ($ttds as $ttd)
                        <option value="{{ $ttd->id }}" {{ old('id_ttds') == $ttd->id ? 'selected' : '' }}>
                            {{ $ttd->nama }} ({{ $ttd->jabatan }})
                        </option>
                    @endforeach
                </select>
                @error('id_ttds')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-4 w-100">
                <i class="fas fa-paper-plane me-2"></i> Ajukan & Buat Permohonan Surat
            </button>
        </form>
    </div>
</div>
@endsection