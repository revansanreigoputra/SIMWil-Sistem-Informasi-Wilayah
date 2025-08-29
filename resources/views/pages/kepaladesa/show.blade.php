@extends('layouts.master')

@section('title', 'Detail Kepala Desa')

@section('action')
@can('kepala-desa.update')
<a href="{{ route('kepala-desa.edit', $kepalaDesa->id) }}" class="btn btn-warning">Edit</a>
@endcan
@can('kepala-desa.delete')
<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-kepala-desa-{{ $kepalaDesa->id }}">
    Hapus
</button>
@endcan
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                @if($kepalaDesa->foto)
                <img src="{{ asset('storage/' . $kepalaDesa->foto) }}" alt="{{ $kepalaDesa->nama_kepala_desa }}" 
                     class="rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                @else
                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mx-auto mb-3"
                     style="width: 200px; height: 200px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="text-white">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                @endif
                <h4>{{ $kepalaDesa->nama_kepala_desa }}</h4>
                <p class="text-muted">Kepala Desa</p>
                
                @if($kepalaDesa->masa_jabatan)
                <div class="badge bg-primary text-white mb-2">{{ $kepalaDesa->masa_jabatan }}</div>
                @endif
                
                <div class="mt-3">
                    <span class="badge 
                        @if($kepalaDesa->jenis_kelamin === 'L') bg-primary
                        @else bg-pink
                        @endif text-white">
                        {{ $kepalaDesa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </span>
                    
                    @if($kepalaDesa->golongan_darah)
                    <span class="badge bg-info text-white ms-1">{{ $kepalaDesa->golongan_darah }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Informasi Pribadi</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Tanggal Lahir</label>
                            <p class="fw-semibold">
                                {{ $kepalaDesa->tanggal_lahir ? $kepalaDesa->tanggal_lahir->format('d F Y') : '-' }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Kontak</label>
                            <p class="fw-semibold">{{ $kepalaDesa->kontak ?: '-' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Alamat</label>
                    <p class="fw-semibold">{{ $kepalaDesa->alamat ?: '-' }}</p>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Nama Istri</label>
                            <p class="fw-semibold">{{ $kepalaDesa->nama_istri ?: '-' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label text-muted">Jumlah Anak</label>
                            <p class="fw-semibold">{{ $kepalaDesa->jumlah_anak ?: '0' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if($kepalaDesa->sambutan)
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">Sambutan</h5>
            </div>
            <div class="card-body">
                <p class="text-justify">{{ $kepalaDesa->sambutan }}</p>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Delete Modal -->
@can('kepala-desa.delete')
<div class="modal fade" id="delete-kepala-desa-{{ $kepalaDesa->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Kepala Desa?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Data kepala desa <strong>{{ $kepalaDesa->nama_kepala_desa }}</strong> yang dihapus tidak bisa dikembalikan.</p>
                <p>Yakin ingin menghapus data ini?</p>
            </div>
            <div class极速赛车开奖结果记录="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('kepala-desa.destroy', $kepalaDesa->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection
