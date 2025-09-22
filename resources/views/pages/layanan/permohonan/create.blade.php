@extends('layouts.master')

@section('title')
    <div class="d-flex align-items-center border-bottom pb-2 mb-3">
        <i class="fas fa-file-alt text-primary me-2"></i>
        <h4 class="fw-bold mb-0 text-dark"> Tambah Permohonan </h4>
    </div>
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0"> Tambah Permohonan Surat</h5>
                </div>
                <div class="card-body p-4">
                    <form id="formJenis">
                        @csrf
                        <div class="mb-4">
                            <label for="jenis" class="form-label fw-semibold">Jenis Surat</label>
                            <select name="jenis" id="jenis" class="form-select rounded-3">
                                <option value="">-- Pilih Jenis Surat --</option>
                                <option value="sk_domisili">Surat Keterangan Domisili</option>
                                <option value="sk_belum_pernah_nikah">Surat Keterangan Belum Pernah Nikah</option>
                                <option value="sk_berkelakuan_baik">Surat Keterangan Berkelakuan Baik</option>
                                <option value="sk_usaha">Surat Keterangan Usaha</option>
                                <option value="sk_kematian">Surat Keterangan Kematian</option>
                                <option value="sk_kelahiran">Surat Keterangan Kelahiran</option>
                                <option value="sk_pengantar_ktp">Surat Pengantar KTP</option>
                                <option value="sk_pengantar_kk">Surat Pengantar KK</option>
                                <option value="sk_pengantar_nikah">Surat Pengantar Nikah</option>
                                <option value="sk_pengantar_pindah">Surat Pengantar Pindah</option>
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="button" class="btn btn-primary btn-md-custom rounded-pill shadow-sm" onclick="lanjutkan()">
                                Selanjutnya 
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFormSurat" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title">Form Permohonan Surat</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4" id="form-container">
        <!-- Form dinamis akan dimunculkan di sini -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light border rounded-pill px-4 btn-md-custom" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success rounded-pill px-4 btn-md-custom">Simpan</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
    /* kecilin font & padding dropdown */
    #jenis {
        font-size: 0.9rem;
        padding: 0.45rem 0.75rem;
    }

    /* ukuran custom tombol (antara sm dan md) */
    .btn-md-custom {
        font-size: 0.95rem;
        padding: 0.5rem 1.25rem;
    }
</style>
@endpush

@push('scripts')
<script>
    function lanjutkan() {
        let jenis = document.getElementById('jenis').value;
        if (jenis === "") {
            alert("Silakan pilih jenis surat dulu!");
            return;
        }

        let container = document.getElementById('form-container');
        let html = '';

        switch (jenis) {
            case 'sk_domisili':
                html = `
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-3" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat</label>
                        <textarea class="form-control rounded-3" name="alamat" rows="3"></textarea>
                    </div>`;
                break;

            case 'sk_belum_pernah_nikah':
                html = `
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Pemohon</label>
                        <input type="text" class="form-control rounded-3" name="nama">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Umur</label>
                        <input type="number" class="form-control rounded-3" name="umur">
                    </div>`;
                break;

            case 'sk_kematian':
                html = `
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Almarhum/Almarhumah</label>
                        <input type="text" class="form-control rounded-3" name="nama_almarhum">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Meninggal</label>
                        <input type="date" class="form-control rounded-3" name="tanggal_meninggal">
                    </div>`;
                break;

            default:
                html = `<p class="text-muted fst-italic">Form untuk <b>${jenis}</b> belum tersedia.</p>`;
        }

        container.innerHTML = html;
        let modal = new bootstrap.Modal(document.getElementById('modalFormSurat'));
        modal.show();
    }
</script>
@endpush
