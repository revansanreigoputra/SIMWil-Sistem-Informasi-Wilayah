@extends('layouts.master')

@section('title', 'Detail Kesejahteraan Keluarga')

@section('content')
<div class="container">
    <h4>Detail Kesejahteraan Keluarga</h4>

    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th width="25%">Tanggal</th>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                    <th>Prasejahtera</th>
                    <td>{{ $item->prasejahtera ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Sejahtera 1</th>
                    <td>{{ $item->sejahtera1 ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Sejahtera 2</th>
                    <td>{{ $item->sejahtera2 ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Sejahtera 3</th>
                    <td>{{ $item->sejahtera3 ?? '-' }}</td>
                </tr>

                <tr>
                    <th>Sejahtera Plus</th>
                    <td>{{ $item->sejahteraplus ?? '-' }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.edit', $item->id) }}" class="btn btn-warning">
                    Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
