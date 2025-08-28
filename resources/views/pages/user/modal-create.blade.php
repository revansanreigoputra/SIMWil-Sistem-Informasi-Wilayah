<div class="modal" id="createDataModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama User</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama user"
                            value="{{ old('name', '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telp</label>
                        <input type="number" class="form-control" name="phone" placeholder="Masukkan no telp user"
                            value="{{ old('phone', '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan email user"
                            value="{{ old('email', '') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password user"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea type="text" class="form-control" name="address" placeholder="Masukkan alamat user">{{ old('address') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Roles</label>
                        <select class="form-select" name="roles" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
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
