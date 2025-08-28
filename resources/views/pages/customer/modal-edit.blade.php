<!-- Modal -->
<div class="modal fade" id="editModal-{{ $customer->id }}" tabindex="-1"
    aria-labelledby="editModalLabel-{{ $customer->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('customer.update', $customer->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel-{{ $customer->id }}">Edit Konsumen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name-{{ $customer->id }}" class="form-label">Nama Konsumen</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name-{{ $customer->id }}" name="name" value="{{ old('name', $customer->name) }}"
                            required>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone-{{ $customer->id }}" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                            id="phone-{{ $customer->id }}" name="phone" value="{{ old('phone', $customer->phone) }}"
                            required>
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email-{{ $customer->id }}" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email-{{ $customer->id }}" name="email" value="{{ old('email', $customer->email) }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address-{{ $customer->id }}" class="form-label">Alamat</label>
                        <textarea class="form-control @error('address') is-invalid @enderror"
                            id="address-{{ $customer->id }}" name="address"
                            rows="3">{{ old('address', $customer->address) }}</textarea>
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
