{{-- Modal Edit Data --}}
<div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $data->id }}">Edit Data Industri Pengolahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('sektor-industri-pengolahan.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ \Carbon\Carbon::parse($data->tanggal)->format('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_industri" class="form-label">Jenis Industri</label>
                        <input type="text" class="form-control" id="jenis_industri" name="jenis_industri" value="{{ $data->jenis_industri }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nilai_produksi_tahunan" class="form-label">Total nilai produksi tahunan (Rp)</label>
                        <input type="number" class="form-control" id="nilai_produksi_tahunan" name="nilai_produksi_tahunan" value="{{ $data->nilai_produksi_tahunan }}" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="nilai_bahan_baku" class="form-label">Total nilai bahan baku (Rp)</label>
                        <input type="number" class="form-control" id="nilai_bahan_baku" name="nilai_bahan_baku" value="{{ $data->nilai_bahan_baku }}" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="nilai_bahan_penolong" class="form-label">Total nilai bahan penolong (Rp)</label>
                        <input type="number" class="form-control" id="nilai_bahan_penolong" name="nilai_bahan_penolong" value="{{ $data->nilai_bahan_penolong }}" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="biaya_antara" class="form-label">Total biaya antara (Rp)</label>
                        <input type="number" class="form-control" id="biaya_antara" name="biaya_antara" value="{{ $data->biaya_antara }}" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_jenis_industri_tsb" class="form-label">Total jumlah jenis industri tsb (Jenis)</label>
                        <input type="number" class="form-control" id="jumlah_jenis_industri_tsb" name="jumlah_jenis_industri_tsb" value="{{ $data->jumlah_jenis_industri_tsb }}" min="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>