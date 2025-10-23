@extends('layouts.master')

@section('title', 'Tambah Data Sikap dan Mental Masyarakat')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2 text-primary"></i>
            Tambah Data Sikap dan Mental Masyarakat
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Kolom Tanggal -->
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label fw-semibold">
                        <i class="fas fa-calendar me-1"></i>
                        Tanggal <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                        id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kolom Desa -->
                <div class="col-md-6 mb-3">
                    <label for="id_desa" class="form-label fw-semibold">
                        <i class="fas fa-map-marker-alt me-1"></i>
                        Desa <span class="text-danger">*</span>
                    </label>
                    <select name="id_desa" id="id_desa" class="form-control" required>
                        <option value="">-- Pilih Desa --</option>
                        @foreach ($desas as $item)
                            <option value="{{ $item->id }}" {{ old('id_desa') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_desa }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_desa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Input Angka --}}
            @php
                $numberFields = [
                    'jumlah_pungutan_gelandangan' => 'Jumlah jenis pungutan liar dari anak gelandangan di sudut jalanan',
                    'jumlah_pungutan_terminal_pelabuhan_pasar' => 'Jumlah jenis pungutan liar di terminal, pelabuhan dan pasar',
                    'jenis_pungutan_rt_rw' => 'Jenis pungutan dari RT/RW atau sebutan lain kepada warga',
                    'jenis_pungutan_desa_kelurahan' => 'Jenis pungutan dari desa/kelurahan kepada warga',
                    'kasus_aparat_rt_rw' => 'Kasus aparat RT/RW yang dipecat karena pungutan liar/pemerasan',
                    'dipindah_karena_kasus' => 'Jumlah yang dipindahkan karena kasus pungutan liar/pemerasan',
                    'diberhentikan_kasus' => 'Jumlah yang diberhentikan karena kasus pungutan liar/pemerasan',
                    'dimutasi_kasus' => 'Jumlah yang dimutasi karena kasus pungutan liar/pemerasan',
                ];
            @endphp

            <div class="row">
                @foreach ($numberFields as $name => $label)
                    <div class="col-md-6 mb-3">
                        <label for="{{ $name }}" class="form-label fw-semibold">{{ $label }} <span class="text-danger">*</span></label>
                        <input 
                            type="number" 
                            id="{{ $name }}" 
                            name="{{ $name }}" 
                            class="form-control @error($name) is-invalid @enderror" 
                            value="{{ old($name) }}"
                            required
                        >
                        @error($name)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach
            </div>

            {{-- Radio Field (Ada / Tidak Ada) --}}
            @php
                $radioAdaTidakAda = [
                    'permintaan_sumbangan_perorangan' => 'Permintaan sumbangan perorangan dari rumah ke rumah',
                    'permintaan_sumbangan_terorganisir' => 'Permintaan sumbangan terorganisir dari rumah ke rumah',
                ];
            @endphp

            @foreach ($radioAdaTidakAda as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label">{{ $label }} <span class="text-danger">*</span></label>
                    <div class="col-sm-6">
                        <div class="form-check form-check-inline">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="{{ $name }}" 
                                value="Ada"
                                {{ old($name) === 'Ada' ? 'checked' : '' }} 
                                required>
                            <label class="form-check-label">Ada</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="{{ $name }}" 
                                value="Tidak Ada"
                                {{ old($name) === 'Tidak Ada' ? 'checked' : '' }}>
                            <label class="form-check-label">Tidak Ada</label>
                        </div>

                        @error($name)
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach


            {{-- Radio Ya/Tidak --}}
            @php
                $radioYaTidak = [
                    'praktik_jalan_pintas' => 'Semakin berkembang praktik jalan pintas dalam mencari uang secara tidak halal',
                    'masyarakat_biaya_pelayanan' => 'Masyarakat memberi biaya pelayanan di kantor desa/kelurahan',
                    'pelayanan_gratis_aparat' => 'Banyak warga ingin pelayanan gratis dari aparat desa/kelurahan',
                    'keluhan_pelayanan' => 'Banyak penduduk yang mengeluh atas pelayanan masyarakat',
                    'hiburan_inisiatif_masyarakat' => 'Banyak kegiatan hiburan dari inisiatif masyarakat',
                    'kurang_toleran' => 'Masyarakat agak kurang toleran terhadap perbedaan',
                    'wilayah_sangat_luas' => 'Wilayah desa/kelurahan sangat luas',
                    'lahan_terlantar' => 'Banyak lahan terlantar yang tidak dikelola pemiliknya',
                    'lahan_perkarangan_tidak_dimanfaatkan' => 'Banyak lahan pekarangan tidak dimanfaatkan',
                    'tidur_milir_tidak_dimanfaatkan' => 'Banyak lahan tidur milik masyarakat tidak dimanfaatkan',
                    'cari_pekerjaan_luar_desa' => 'Penduduk mencari pekerjaan di luar desa namun masih satu kabupaten',
                    'cari_pekerjaan_kota_besar' => 'Penduduk mencari pekerjaan di kota besar lainnya',
                    'masyarakat_apatih' => 'Banyak masyarakat yang diam/masabodoh/apatih ketika ada permasalahan sosial',
                ];
            @endphp

            @foreach ($radioYaTidak as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label">{{ $label }} <span class="text-danger">*</span></label>
                    <div class="col-sm-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Ya"
                                {{ old($name) === 'Ya' ? 'checked' : '' }} required>
                            <label class="form-check-label">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $name }}" value="Tidak"
                                {{ old($name) === 'Tidak' ? 'checked' : '' }}>
                            <label class="form-check-label">Tidak</label>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Radio Tinggi/Sedang/Rendah --}}
            @php
                $radioTSR = [
                    'petani_gagal_panen' => 'Jumlah petani gagal panen yang pasrah tidak mencari pekerjaan lain',
                    'nelayan_tidak_melayat' => 'Jumlah nelayan yang tidak melaut untuk mencari pekerjaan lain',
                    'rayakan_pesta' => 'Kebiasaan masyarakat merayakan pesta dan menghadiri undangan',
                    'menuntut_kebutuhan_pokok' => 'Masyarakat sering menuntut kebutuhan dasar (sembako) ke kantor desa',
                    'mencari_bahan_pengganti_pangan' => 'Kebiasaan mencari bahan makanan pengganti beras/jagung saat gagal panen',
                    'pemotongan_hewan_besar' => 'Kebiasaan pemotongan hewan besar untuk upacara/pesta adat',
                    'berdemo' => 'Kebiasaan masyarakat berdemo atau protes terhadap kebijakan pemerintah',
                    'terprovokasi_isu' => 'Kebiasaan masyarakat terprovokasi oleh isu yang menyesatkan',
                    'bermusyawarah' => 'Kebiasaan masyarakat bermusyawarah untuk menyelesaikan persoalan sosial',
                    'aparat_kurang_menangani' => 'Kebiasaan aparat desa yang kurang tanggap terhadap kesulitan masyarakat',
                ];
            @endphp

            @foreach ($radioTSR as $name => $label)
                <div class="row mb-3">
                    <label class="col-sm-6 col-form-label">{{ $label }} <span class="text-danger">*</span></label>
                    <div class="col-sm-6">
                        @foreach (['Tinggi', 'Sedang', 'Rendah'] as $option)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="{{ $name }}" value="{{ $option }}"
                                    {{ old($name) === $option ? 'checked' : '' }} required>
                                <label class="form-check-label">{{ $option }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            {{-- Tombol aksi --}}
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">
                    <span class="text-danger">*</span> wajib diisi
                </small>
                <div class="btn-group gap-2">
                    <a href="{{ route('perkembangan.peransertamasyarakat.sikapdanmental.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Data
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
