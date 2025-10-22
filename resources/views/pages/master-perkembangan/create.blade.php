<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('master-perkembangan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="tab" value="{{ $activeTab }}">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-plus-circle me-2 text-primary"></i>
                        Tambah {{ Str::headline($activeTab) }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    {{-- Kalau tab aktif adalah kabupaten_kota, tampilkan dropdown provinsi --}}
                    @if ($activeTab === 'kabupaten_kota')
                        <div class="mb-3">
                            <label class="form-label">Provinsi</label>
                            <select name="provinsi" class="form-select" required>
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach ($provinsiList as $prov)
                                    <option value="{{ $prov->nama }}">{{ $prov->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Nama {{ Str::headline($activeTab) }}</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama..." required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
