@extends('layouts.master')

@section('title', 'Detail Kesejahteraan Keluarga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Detail Data Kesejahteraan Keluarga</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Prasejahtera</th>
                        <td><span class="badge bg-primary">{{ $item->prasejahtera }}</span></td>
                    </tr>
                    <tr>
                        <th>Sejahtera 1</th>
                        <td><span class="badge bg-success">{{ $item->sejahtera1 }}</span></td>
                    </tr>
                    <tr>
                        <th>Sejahtera 2</th>
                        <td><span class="badge bg-info">{{ $item->sejahtera2 }}</span></td>
                    </tr>
                    <tr>
                        <th>Sejahtera 3</th>
                        <td><span class="badge bg-warning text-dark">{{ $item->sejahtera3 }}</span></td>
                    </tr>
                    <tr>
                        <th>Sejahtera Plus</th>
                        <td><span class="badge bg-secondary">{{ $item->sejahteraplus }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3 d-flex gap-2">
            <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.edit', $item->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
</div>
@endsection
