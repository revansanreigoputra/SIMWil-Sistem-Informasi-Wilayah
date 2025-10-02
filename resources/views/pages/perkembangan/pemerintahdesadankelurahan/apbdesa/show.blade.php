@extends('layouts.app')

@section('title', 'Detail APB Desa')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail APB Desa</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Tahun</dt>
                <dd class="col-sm-9">{{ $apbdesa->tahun }}</dd>

                <dt class="col-sm-3">Pendapatan</dt>
                <dd class="col-sm-9">{{ number_format($apbdesa->pendapatan, 0, ',', '.') }}</dd>

                <dt class="col-sm-3">Belanja</dt>
                <dd class="col-sm-9">{{ number_format($apbdesa->belanja, 0, ',', '.') }}</dd>

                <dt class="col-sm-3">Pembiayaan</dt>
                <dd class="col-sm-9">{{ number_format($apbdesa->pembiayaan, 0, ',', '.') }}</dd>

                <dt class="col-sm-3">Keterangan</dt>
                <dd class="col-sm-9">{{ $apbdesa->keterangan ?? '-' }}</dd>

                <dt class="col-sm-3">Dibuat</dt>
                <dd class="col-sm-9">{{ $apbdesa->created_at->format('d M Y H:i') }}</dd>

                <dt class="col-sm-3">Terakhir Diperbarui</dt>
                <dd class="col-sm-9">{{ $apbdesa->updated_at->format('d M Y H:i') }}</dd>
            </dl>

            <div class="mt-4">
                <a href="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.edit', $apbdesa->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.destroy', $apbdesa->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
