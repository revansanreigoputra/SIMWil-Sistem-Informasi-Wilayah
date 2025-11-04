@extends('layouts.master')

@section('title', 'Edit Data - Perkembangan Sarana dan Prasarana Kesehatan Masyarakat')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- 8 kolom utama (ringkas) --}}
                <div class="col-md-4 mb-3">
                    <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $data->tanggal) }}" required>
                    @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="fasilitas_umum" class="form-label">Fasilitas Umum</label>
                    <input type="text" class="form-control" id="fasilitas_umum" name="fasilitas_umum" value="{{ old('fasilitas_umum', $data->fasilitas_umum) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="tenaga_kesehatan_aktif" class="form-label">Tenaga Kesehatan Aktif</label>
                    <input type="text" class="form-control" id="tenaga_kesehatan_aktif" name="tenaga_kesehatan_aktif" value="{{ old('tenaga_kesehatan_aktif', $data->tenaga_kesehatan_aktif) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="kader_keluarga_lapangan" class="form-label">Kader Keluarga & Lapangan</label>
                    <input type="text" class="form-control" id="kader_keluarga_lapangan" name="kader_keluarga_lapangan" value="{{ old('kader_keluarga_lapangan', $data->kader_keluarga_lapangan) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="dokumentasi_posyandu" class="form-label">Dokumentasi Posyandu</label>
                    <input type="text" class="form-control" id="dokumentasi_posyandu" name="dokumentasi_posyandu" value="{{ old('dokumentasi_posyandu', $data->dokumentasi_posyandu) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="kegiatan_kesehatan" class="form-label">Kegiatan Kesehatan</label>
                    <input type="text" class="form-control" id="kegiatan_kesehatan" name="kegiatan_kesehatan" value="{{ old('kegiatan_kesehatan', $data->kegiatan_kesehatan) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="kegiatan_lingkungan" class="form-label">Kegiatan Lingkungan</label>
                    <input type="text" class="form-control" id="kegiatan_lingkungan" name="kegiatan_lingkungan" value="{{ old('kegiatan_lingkungan', $data->kegiatan_lingkungan) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="kegiatan_lainnya" class="form-label">Kegiatan Lainnya</label>
                    <input type="text" class="form-control" id="kegiatan_lainnya" name="kegiatan_lainnya" value="{{ old('kegiatan_lainnya', $data->kegiatan_lainnya) }}">
                </div>

                {{-- Pemisah --}}
                <div class="col-12 mt-3 mb-2">
                    <hr>
                    <h6 class="fw-bold">Data Tambahan (Detail yang akan muncul di halaman Detail / Show)</h6>
                </div>

                {{-- Semua field tambahan --}}
                <div class="col-md-4 mb-3">
                    <label for="jumlah_mck_umum" class="form-label">Jumlah MCK Umum (unit)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_mck_umum" name="jumlah_mck_umum" value="{{ old('jumlah_mck_umum', $data->jumlah_mck_umum) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_posyandu" class="form-label">Jumlah Posyandu (unit)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_posyandu" name="jumlah_posyandu" value="{{ old('jumlah_posyandu', $data->jumlah_posyandu) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_kader_posyandu_aktif" class="form-label">Jumlah Kader Posyandu Aktif (orang)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_kader_posyandu_aktif" name="jumlah_kader_posyandu_aktif" value="{{ old('jumlah_kader_posyandu_aktif', $data->jumlah_kader_posyandu_aktif) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_pembina_posyandu" class="form-label">Jumlah Pembina Posyandu (orang)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_pembina_posyandu" name="jumlah_pembina_posyandu" value="{{ old('jumlah_pembina_posyandu', $data->jumlah_pembina_posyandu) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_pengurus_dasawisma_aktif" class="form-label">Jumlah Pengurus Dasawisma Aktif (orang)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_pengurus_dasawisma_aktif" name="jumlah_pengurus_dasawisma_aktif" value="{{ old('jumlah_pengurus_dasawisma_aktif', $data->jumlah_pengurus_dasawisma_aktif) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_kader_bina_keluarga_balita_aktif" class="form-label">Jumlah Kader Bina Keluarga Balita Aktif (orang)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_kader_bina_keluarga_balita_aktif" name="jumlah_kader_bina_keluarga_balita_aktif" value="{{ old('jumlah_kader_bina_keluarga_balita_aktif', $data->jumlah_kader_bina_keluarga_balita_aktif) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_petugas_lapangan_keluarga_berencana" class="form-label">Jumlah Petugas Lapangan KB (orang)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_petugas_lapangan_keluarga_berencana" name="jumlah_petugas_lapangan_keluarga_berencana" value="{{ old('jumlah_petugas_lapangan_keluarga_berencana', $data->jumlah_petugas_lapangan_keluarga_berencana) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="buku_rencana_kegiatan_posyandu" class="form-label">Buku Rencana Kegiatan Posyandu</label>
                    <select name="buku_rencana_kegiatan_posyandu" id="buku_rencana_kegiatan_posyandu" class="form-control">
                        <option value="">- Pilih -</option>
                        <option value="Diisi" {{ old('buku_rencana_kegiatan_posyandu', $data->buku_rencana_kegiatan_posyandu) == 'Diisi' ? 'selected' : '' }}>Diisi</option>
                        <option value="Tidak Diisi" {{ old('buku_rencana_kegiatan_posyandu', $data->buku_rencana_kegiatan_posyandu) == 'Tidak Diisi' ? 'selected' : '' }}>Tidak Diisi</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="buku_data_pengunjung_posyandu" class="form-label">Buku Data Pengunjung Posyandu</label>
                    <select name="buku_data_pengunjung_posyandu" id="buku_data_pengunjung_posyandu" class="form-control">
                        <option value="">- Pilih -</option>
                        <option value="Diisi" {{ old('buku_data_pengunjung_posyandu', $data->buku_data_pengunjung_posyandu) == 'Diisi' ? 'selected' : '' }}>Diisi</option>
                        <option value="Tidak Diisi" {{ old('buku_data_pengunjung_posyandu', $data->buku_data_pengunjung_posyandu) == 'Tidak Diisi' ? 'selected' : '' }}>Tidak Diisi</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="buku_administrasi_posyandu_lainnya" class="form-label">Buku Administrasi Posyandu Lainnya (jenis)</label>
                    <input type="text" class="form-control" id="buku_administrasi_posyandu_lainnya" name="buku_administrasi_posyandu_lainnya" value="{{ old('buku_administrasi_posyandu_lainnya', $data->buku_administrasi_posyandu_lainnya) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_kegiatan_posyandu" class="form-label">Jumlah Kegiatan Posyandu (jenis)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_kegiatan_posyandu" name="jumlah_kegiatan_posyandu" value="{{ old('jumlah_kegiatan_posyandu', $data->jumlah_kegiatan_posyandu) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_kader_kesehatan_lainnya" class="form-label">Jumlah Kader Kesehatan Lainnya (orang)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_kader_kesehatan_lainnya" name="jumlah_kader_kesehatan_lainnya" value="{{ old('jumlah_kader_kesehatan_lainnya', $data->jumlah_kader_kesehatan_lainnya) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_kegiatan_pengobatan_gratis" class="form-label">Jumlah Kegiatan Pengobatan Gratis (jenis)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_kegiatan_pengobatan_gratis" name="jumlah_kegiatan_pengobatan_gratis" value="{{ old('jumlah_kegiatan_pengobatan_gratis', $data->jumlah_kegiatan_pengobatan_gratis) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_kegiatan_pemberantasan_psn" class="form-label">Jumlah Kegiatan Pemberantasan Sarang Nyamuk / PSN (jenis)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_kegiatan_pemberantasan_psn" name="jumlah_kegiatan_pemberantasan_psn" value="{{ old('jumlah_kegiatan_pemberantasan_psn', $data->jumlah_kegiatan_pemberantasan_psn) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="jumlah_kegiatan_pembersihan_lingkungan" class="form-label">Jumlah Kegiatan Pembersihan Lingkungan (jenis)</label>
                    <input type="number" min="0" class="form-control" id="jumlah_kegiatan_pembersihan_lingkungan" name="jumlah_kegiatan_pembersihan_lingkungan" value="{{ old('jumlah_kegiatan_pembersihan_lingkungan', $data->jumlah_kegiatan_pembersihan_lingkungan) }}">
                </div>

                <div class="col-12 mt-4 text-end">
                    <a href="{{ route('perkembangan.kesehatan-masyarakat.sarana-prasarana.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
