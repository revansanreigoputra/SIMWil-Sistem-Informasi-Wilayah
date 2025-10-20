@if(isset($activeTab))
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="edit-form" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="tab" value="{{ $activeTab }}">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-pencil-alt me-2 text-warning"></i>
                        Edit {{ Str::headline($activeTab) }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    {{-- Kondisi kalau tab aktif kabupaten_kota --}}
                    @if($activeTab === 'kabupaten_kota')
                        <div class="form-group mb-3">
                            <label for="edit-provinsi" class="form-label">Provinsi</label>
                            <select name="provinsi_id" id="edit-provinsi" class="form-select" required>
                                <option value="">-- Pilih Provinsi --</option>
                                @foreach($provinsiList as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="edit-nama" class="form-label">Nama {{ Str::headline($activeTab) }}</label>
                        <input type="text" name="nama" id="edit-nama" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-2"></i> Perbarui
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const provinsiId = this.dataset.provinsiId;
                const actionUrl = this.dataset.url;

                // Isi form edit
                document.getElementById('edit-nama').value = nama;
                document.getElementById('edit-form').action = actionUrl;

                // Kalau ada dropdown provinsi, isi juga
                const provinsiSelect = document.getElementById('edit-provinsi');
                if (provinsiSelect) {
                    provinsiSelect.value = provinsiId || '';
                }

                // Tampilkan modal
                const modal = new bootstrap.Modal(document.getElementById('edit-modal'));
                modal.show();
            });
        });
    });
</script>
@endpush