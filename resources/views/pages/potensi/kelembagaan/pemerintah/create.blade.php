@extends('layouts.master')

@section('title', 'Tambah Data Lembaga Pemerintahan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Tambah Data Lembaga Pemerintahan</h5>
        </div>
        <div class="card-body">
            <form id="form-pemerintahan">

                {{-- Data Umum --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Data Umum</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jenis Lembaga</label>
                            <input type="text" class="form-control" placeholder="Contoh: Karang Taruna">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control" placeholder="Masukkan jumlah">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Dasar Hukum</label>
                            <input type="text" class="form-control" placeholder="Contoh: Peraturan Desa">
                        </div>
                    </div>
                </div>

                {{-- Data Kegiatan --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Data Kegiatan</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Pengurus</label>
                            <input type="number" class="form-control" placeholder="Jumlah pengurus">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Jenis Kegiatan</label>
                            <input type="number" class="form-control" placeholder="Jumlah jenis kegiatan">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ruang Lingkup Kegiatan</label>
                            <input type="text" class="form-control" placeholder="Contoh: Desa / Kecamatan">
                        </div>
                    </div>
                </div>

                {{-- Dasar Hukum Tambahan --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Dasar Hukum Tambahan</h6>
                    <div class="mb-2">
                        <label class="form-label">Dasar Hukum Pembentukan</label>
                        <textarea class="form-control" rows="2" placeholder="Tuliskan dasar hukum pembentukan"></textarea>
                    </div>
                    <div>
                        <label class="form-label">Dasar Hukum BPD</label>
                        <textarea class="form-control" rows="2" placeholder="Tuliskan dasar hukum BPD"></textarea>
                    </div>
                </div>

                {{-- Data Aparat --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Data Aparat</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Aparat</label>
                            <input type="number" class="form-control" placeholder="Jumlah aparat">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jumlah Perangkat</label>
                            <input type="number" class="form-control" placeholder="Jumlah perangkat">
                        </div>
                    </div>
                </div>

                {{-- Data Personil --}}
                <div class="card mb-3 p-3 bg-light">
                    <h6>Data Personil</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Kepala Desa</label>
                            <input type="text" class="form-control" placeholder="Nama Kepala Desa">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sekretaris Desa</label>
                            <input type="text" class="form-control" placeholder="Nama Sekretaris Desa">
                        </div>
                    </div>
                </div>
                <!-- Pendidikan Anggota BPD -->
                <div class="card mb-3 p-3 bg-light">
                    <h6>Pendidikan Anggota BPD</h6>
                    <div id="anggota-bpd-wrapper">
                        <div class="row mb-2 anggota-bpd-item">
                            <div class="col-md-6">
                                <label class="form-label">Nama Anggota 1</label>
                                <input type="text" class="form-control" placeholder="Nama Anggota">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Pendidikan</label>
                                <select class="form-control">
                                    <option>-- Pilih --</option>
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA</option>
                                    <option>D3</option>
                                    <option>S1</option>
                                    <option>S2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="add-anggota" class="btn btn-primary btn-sm mt-2">+ Tambah Anggota</button>
                </div>

                <script>
                    let anggotaIndex = 2;
                    document.getElementById('add-anggota').addEventListener('click', function() {
                        let wrapper = document.getElementById('anggota-bpd-wrapper');
                        let newItem = document.createElement('div');
                        newItem.classList.add('row', 'mb-2', 'anggota-bpd-item');
                        newItem.innerHTML = `
        <div class="col-md-6">
            <label class="form-label">Nama Anggota ${anggotaIndex}</label>
            <input type="text" class="form-control" placeholder="Nama Anggota">
        </div>
        <div class="col-md-6">
            <label class="form-label">Pendidikan</label>
            <select class="form-control">
                <option>-- Pilih --</option>
                <option>SD</option><option>SMP</option><option>SMA</option>
                <option>D3</option><option>S1</option><option>S2</option>
            </select>
        </div>
        <div class="col-12 text-end mt-2">
            <button type="button" class="btn btn-danger btn-sm remove-anggota">Hapus</button>
        </div>
    `;
                        wrapper.appendChild(newItem);
                        anggotaIndex++;
                    });

                    // Hapus anggota
                    document.getElementById('anggota-bpd-wrapper').addEventListener('click', function(e) {
                        if (e.target && e.target.classList.contains('remove-anggota')) {
                            e.target.closest('.anggota-bpd-item').remove();
                        }
                    });
                </script>


               <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('potensi.kelembagaan.pemerintah.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
            </form>
        </div>
    </div>
@endsection
