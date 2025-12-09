@extends('layouts.master')

@section('title', 'Edit Ruang Publik')

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0">Edit Ruang Publik</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('ruang_publik.update', $pRuangPublik->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $pRuangPublik->tanggal->format('Y-m-d')) }}" required>
                @error('tanggal')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Ruang Publik</label>
                <select name="ruang_publik_id" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    @foreach($ruangOptions as $r)
                        <option value="{{ $r->id }}" {{ old('ruang_publik_id', $pRuangPublik->ruang_publik_id) == $r->id ? 'selected' : '' }}>{{ $r->nama }}</option>
                    @endforeach
                </select>
                @error('ruang_publik_id')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Keberadaan</label>
                <select name="keberadaan" class="form-select" required>
                    <option value="ada" {{ old('keberadaan', $pRuangPublik->keberadaan) == 'ada' ? 'selected' : '' }}>Ada</option>
                    <option value="tidak" {{ old('keberadaan', $pRuangPublik->keberadaan) == 'tidak' ? 'selected' : '' }}>Tidak Ada</option>
                </select>
                @error('keberadaan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Luas (m2)</label>
                <input type="number" name="luas_m2" step="0.01" min="0" class="form-control" value="{{ old('luas_m2', $pRuangPublik->luas_m2) }}" required>
                @error('luas_m2')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tingkat Pemanfaatan</label>
                <select name="tingkat_pemanfaatan" class="form-select" required>
                    <option value="aktif" {{ old('tingkat_pemanfaatan', $pRuangPublik->tingkat_pemanfaatan) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="pasif" {{ old('tingkat_pemanfaatan', $pRuangPublik->tingkat_pemanfaatan) == 'pasif' ? 'selected' : '' }}>Pasif</option>
                </select>
                @error('tingkat_pemanfaatan')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('ruang_publik.index') }}" class="btn btn-outline-secondary">Kembali</a>
                <button class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection