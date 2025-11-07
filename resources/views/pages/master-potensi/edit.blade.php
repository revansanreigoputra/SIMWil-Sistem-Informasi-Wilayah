<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="edit-form" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="tab" value="{{ $activeTab }}">
                <input type="hidden" name="bagian" value="{{ $activeBagian }}">

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-edit me-2 text-primary"></i>
                        Edit {{ Str::headline($activeTab) }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    {{-- Dropdown kategori dinamis --}}
                    @if ($activeTab === 'jenis_lembaga_ekonomi')
                        @php
                            $categories = \App\Models\MasterPotensi\KategoriLembagaEkonomi::all();
                        @endphp
                        <div class="mb-3">
                            <label class="form-label">Kategori Lembaga Ekonomi</label>
                            <select name="kategori_lembaga_ekonomi_id" id="edit-kategori-lembaga-ekonomi" class="form-select" required>
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
                            <select name="kategori_prasarana_transportasi_darat_id" id="edit-kategori-prasarana-transportasi-darat" class="form-select" required>
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
                            <select name="kategori_prasarana_komunikasi_informasi_id" id="edit-kategori-prasarana-komunikasi-informasi" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif ($activeTab === 'jenis_produksi_ternak')
                        {{-- No specific category for jenis_produksi_ternak, just the name input --}}
                    @endif

                    {{-- Input nama jenis --}}
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama {{ Str::headline($activeTab) }}</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i> Tutup
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Tambahkan script JS agar dropdown auto-select pas tombol edit diklik --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editModal = document.getElementById('edit-modal');
        editModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const nama = button.getAttribute('data-nama');
            const kategoriId = button.getAttribute('data-kategori-id');

            document.getElementById('edit-nama').value = nama;

            // Isi kategori jika ada
            if (kategoriId) {
                const select = editModal.querySelector('select');
                if (select) select.value = kategoriId;
            }

            // Atur form action
            const form = document.getElementById('edit-form');
            form.action = `/master-potensi/${id}`;
        });
    });
</script>
