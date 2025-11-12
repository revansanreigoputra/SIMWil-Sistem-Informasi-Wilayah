<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('master-potensi.store') }}" method="POST">
                @csrf
                <input type="hidden" name="bagian" value="{{ $activeBagian }}">
                <input type="hidden" name="tab" value="{{ $activeTab }}">

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus-circle me-2 text-primary"></i>
                        Tambah {{ Str::headline($activeTab) }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    {{-- Form kategori dinamis --}}
                    @if ($activeTab === 'jenis_lembaga_ekonomi')
                        @php
                            $categories = \App\Models\MasterPotensi\KategoriLembagaEkonomi::all();
                        @endphp
                        <div class="mb-3">
                            <label class="form-label">Kategori Lembaga Ekonomi</label>
                            <select name="kategori_lembaga_ekonomi_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif ($activeTab === 'jenis_prasarana_transportasi_darat')
                        @php
                            $categories = \App\Models\MasterPotensi\KategoriPrasaranaTransportasiDarat::all();
                        @endphp
                        <div class="mb-3">
                            <label class="form-label">Kategori Prasarana Transportasi Darat</label>
                            <select name="kategori_prasarana_transportasi_darat_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif ($activeTab === 'jenis_prasarana_transportasi_lainnya')
                        @php
                            $categories = \App\Models\MasterPotensi\KategoriPrasaranaTransportasiLainnya::all();
                        @endphp
                        <div class="mb-3">
                            <label class="form-label">Kategori Prasarana Transportasi Lainnya</label>
                            <select name="kategori_prasarana_transportasi_lainnya_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif ($activeTab === 'jenis_prasarana_komunikasi_informasi')
                        @php
                            $categories = \App\Models\MasterPotensi\KategoriPrasaranaKomunikasiInformasi::all();
                        @endphp
                        <div class="mb-3">
                            <label class="form-label">Kategori Prasarana Komunikasi dan Informasi</label>
                            <select name="kategori_prasarana_komunikasi_informasi_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif ($activeTab === 'jenis_sekolah_tingkatan')
                        <div class="mb-3">
                            <label for="kategori_sekolah_id" class="form-label">Kategori Sekolah</label>
                            <select name="kategori_sekolah_id" id="kategori_sekolah_id" class="form-select" required>
                                <option value="">-- Pilih Kategori Sekolah --</option>
                                @foreach (\App\Models\MasterPotensi\KategoriSekolah::all() as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                            @error('kategori_sekolah_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    @elseif ($activeTab === 'jenis_produksi_ternak')
                        {{-- No specific category for jenis_produksi_ternak, just the name input --}}
                    @endif
                    {{-- Input nama jenis --}}
                    <div class="mb-3">
                        <label class="form-label">Nama {{ Str::headline($activeTab) }}</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama..."
                            required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
