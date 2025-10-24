@extends('layouts.master')

@section('title', 'Tambah Data Lembaga Pemerintahan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Input Data Potensi Kelembagaan</h5>
        </div>
        <div class="card-body">
            {{-- Form setup for POST request and CSRF token --}}
            <form id="form-pemerintahan" action="{{ route('potensi.potensi-kelembagaan.pemerintah.store') }}" method="POST">
                @csrf
                
                {{-- Error Display (Optional but recommended) --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Section 1: PotensiKelembagaan Fields (Lembaga Pemerintahan) --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Data Umum Lembaga Pemerintahan</h6>
                    <div class="row g-3">
                        {{-- 1. Tanggal Data --}}
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Data <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal_data" value="{{ old('tanggal_data', date('Y-m-d')) }}">
                            @error('tanggal_data')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        {{-- 2. Jumlah Aparat Pemerintah --}}
                        <div class="col-md-4">
                            <label class="form-label">Jumlah Aparat Pemerintah <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_aparat_pemerintah" value="{{ old('jumlah_aparat_pemerintah') }}" placeholder="Total Aparat">
                            @error('jumlah_aparat_pemerintah')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        {{-- 3. Jumlah Perangkat Desa --}}
                        <div class="col-md-4">
                            <label class="form-label">Jumlah Perangkat Desa <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_perangkat_desa" value="{{ old('jumlah_perangkat_desa') }}" placeholder="Total Perangkat">
                            @error('jumlah_perangkat_desa')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        {{-- 4. Jumlah Staf --}}
                        <div class="col-md-4">
                            <label class="form-label">Jumlah Staf <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_staf" value="{{ old('jumlah_staf') }}" placeholder="Total Staf">
                            @error('jumlah_staf')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        
                        {{-- 5. Jumlah Dusun --}}
                        <div class="col-md-4">
                            <label class="form-label">Jumlah Dusun <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_dusun" value="{{ old('jumlah_dusun') }}" placeholder="Total Dusun">
                            @error('jumlah_dusun')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        
                        {{-- 6. Dasar Hukum Pembentukan --}}
                        <div class="col-md-6">
                            <label class="form-label">Dasar Hukum Pembentukan (Lembaga Desa)</label>
                            <textarea class="form-control" name="dasar_hukum_pembentukan" rows="2" placeholder="Tuliskan dasar hukum pembentukan">{{ old('dasar_hukum_pembentukan') }}</textarea>
                        </div>
                        
                        {{-- 7. Dasar Hukum BPD --}}
                        <div class="col-md-6">
                            <label class="form-label">Dasar Hukum Pembentukan BPD</label>
                            <textarea class="form-control" name="dasar_hukum_pembentukan_bpd" rows="2" placeholder="Tuliskan dasar hukum BPD">{{ old('dasar_hukum_pembentukan_bpd') }}</textarea>
                        </div>

                    </div>
                </div>

                {{-- Section 2: BPD Fields --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Badan Perwakilan Desa (BPD)</h6>
                    <div class="row g-3">
                        {{-- 1. Keberadaan BPD --}}
                        <div class="col-md-6">
                            <label class="form-label">Keberadaan BPD <span class="text-danger">*</span></label>
                            <select class="form-control" name="keberadaan_bpd">
                                <option value="">-- Pilih Status --</option>
                                @foreach(['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada'] as $status)
                                    <option value="{{ $status }}" {{ old('keberadaan_bpd') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @error('keberadaan_bpd')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>

                        {{-- 2. Jumlah Anggota BPD --}}
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Anggota BPD <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="jumlah_anggota" value="{{ old('jumlah_anggota') }}" placeholder="Jumlah anggota BPD">
                            @error('jumlah_anggota')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                {{-- Section 3: Anggota Organisasi (Dynamic Roles based on $jabatans) --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Data Personil & Status Jabatan</h6>
                    <p class="text-muted small">Tentukan siapa yang mengisi jabatan dan bagaimana status jabatannya.</p>

                    <div id="anggota-organisasi-wrapper">
                        {{-- Loop through Jabatans to create input fields for each role --}}
                        @foreach($jabatans as $index => $jabatan)
                        <div class="row g-3 mb-3 border-bottom pb-3">
                            <input type="hidden" name="anggota_organisasi[{{ $index }}][jabatan_id]" value="{{ $jabatan->id }}">

                            {{-- Jabatan Name --}}
                            <div class="col-12">
                                <label class="form-label fw-bold">{{ $jabatan->nama_jabatan }}</label>
                            </div>

                            {{-- Perangkat Desa ID (The Person) --}}
                            <div class="col-md-6">
                                <label class="form-label">Pilih Personil</label>
                                <select class="form-control" name="anggota_organisasi[{{ $index }}][perangkat_desa_id]">
                                    <option value="">-- Pilih Perangkat Desa --</option>
                                    @foreach($perangkatDesas as $perangkat)
                                        <option value="{{ $perangkat->id }}" {{ old("anggota_organisasi.$index.perangkat_desa_id") == $perangkat->id ? 'selected' : '' }}>
                                            {{ $perangkat->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error("anggota_organisasi.$index.perangkat_desa_id")<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>

                            {{-- Status Jabatan (Role Status) --}}
                            <div class="col-md-6">
                                <label class="form-label">Status Jabatan <span class="text-danger">*</span></label>
                                @php
                                    $statuses = ['Ada dan Aktif', 'Ada dan Tidak Aktif', 'Tidak Ada', 'Aktif', 'Pasif', 'Pasif (Dusun)', 'Aktif (Dusun)'];
                                    $oldStatus = old("anggota_organisasi.$index.status_jabatan");
                                @endphp
                                <select class="form-control" name="anggota_organisasi[{{ $index }}][status_jabatan]">
                                    <option value="">-- Pilih Status --</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}" {{ $oldStatus == $status ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error("anggota_organisasi.$index.status_jabatan")<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            
                            {{-- Keterangan Tambahan --}}
                            <div class="col-12">
                                <label class="form-label">Keterangan Tambahan</label>
                                <textarea class="form-control" name="anggota_organisasi[{{ $index }}][keterangan_tambahan]" rows="1">{{ old("anggota_organisasi.$index.keterangan_tambahan") }}</textarea>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- Dynamic 'Tambah Anggota' section removed as roles are now static and controlled by the 'jabatans' master table. --}}


               <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.potensi-kelembagaan.pemerintah.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
               </div>
            </form>
        </div>
    </div>
@endsection