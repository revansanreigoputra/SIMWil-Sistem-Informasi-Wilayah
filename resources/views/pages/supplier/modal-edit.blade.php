<div class="modal fade" id="editModal-{{ $supplier->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama supplier"
                            value="{{ old('name', $supplier->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telp</label>
                        <input type="number" class="form-control" name="phone" placeholder="Masukkan no telp supplier"
                            value="{{ old('phone', $supplier->phone) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email supplier"
                            value="{{ old('email', $supplier->email) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea type="text" class="form-control" name="address" placeholder="Masukkan alamat supplier">{{ old('address', $supplier->address) }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
