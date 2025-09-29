<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataModalLabel">Tambah Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dataForm">
                    @csrf
                    <input type="hidden" id="data_id" name="id">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_laki_laki_tahun_ini">Jumlah Laki-Laki Tahun Ini</label>
                        <input type="number" class="form-control" id="jumlah_laki_laki_tahun_ini" name="jumlah_laki_laki_tahun_ini" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_perempuan_tahun_ini">Jumlah Perempuan Tahun Ini</label>
                        <input type="number" class="form-control" id="jumlah_perempuan_tahun_ini" name="jumlah_perempuan_tahun_ini" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_laki_laki_tahun_lalu">Jumlah Laki-Laki Tahun Lalu</label>
                        <input type="number" class="form-control" id="jumlah_laki_laki_tahun_lalu" name="jumlah_laki_laki_tahun_lalu" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_perempuan_tahun_lalu">Jumlah Perempuan Tahun Lalu</label>
                        <input type="number" class="form-control" id="jumlah_perempuan_tahun_lalu" name="jumlah_perempuan_tahun_lalu" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kepala_keluarga_laki_laki_tahun_ini">Jumlah Kepala Keluarga Laki-Laki Tahun Ini</label>
                        <input type="number" class="form-control" id="jumlah_kepala_keluarga_laki_laki_tahun_ini" name="jumlah_kepala_keluarga_laki_laki_tahun_ini" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kepala_keluarga_perempuan_tahun_ini">Jumlah Kepala Keluarga Perempuan Tahun Ini</label>
                        <input type="number" class="form-control" id="jumlah_kepala_keluarga_perempuan_tahun_ini" name="jumlah_kepala_keluarga_perempuan_tahun_ini" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kepala_keluarga_laki_laki_tahun_lalu">Jumlah Kepala Keluarga Laki-Laki Tahun Lalu</label>
                        <input type="number" class="form-control" id="jumlah_kepala_keluarga_laki_laki_tahun_lalu" name="jumlah_kepala_keluarga_laki_laki_tahun_lalu" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kepala_keluarga_perempuan_tahun_lalu">Jumlah Kepala Keluarga Perempuan Tahun Lalu</label>
                        <input type="number" class="form-control" id="jumlah_kepala_keluarga_perempuan_tahun_lalu" name="jumlah_kepala_keluarga_perempuan_tahun_lalu" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
            </div>
        </div>
    </div>
</div>