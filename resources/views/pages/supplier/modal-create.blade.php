<div class="modal" id="createDataModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <form action="{{ route('supplier.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama supplier"
                            value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telp</label>
                        <input type="number" class="form-control" name="phone" placeholder="Masukkan no telp supplier"
                            value="{{ old('phone') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email supplier"
                            value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea type="text" class="form-control" name="address" placeholder="Masukkan alamat supplier">{{ old('address') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
