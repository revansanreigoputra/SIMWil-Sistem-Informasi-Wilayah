@extends('layouts.master')

@section('title', 'Daftar - MATA PENCAHARIAN SEKTOR PERDAGANGAN')

@section('action')
    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.create') }}" class="btn btn-primary mb-3">
        + Data Baru
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="sektor-perdagangan-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Desa</th>
                        <th>Tanggal</th>
                        <th>Karyawan Perdagangan Hasil Bumi (Orang)</th>
                        <th>Pengusaha Perdagangan Hasil Bumi (Orang)</th>
                        <th>Buruh Perdagangan Hasil Bumi (Orang)</th>
                        <th>Jumlah (Orang)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $item->desa->nama_desa ?? '-' }}</td>
                            <td class="text-center">{{ $item->tanggal }}</td>
                            <td class="text-center">{{ $item->karyawan_perdagangan_hasil_bumi }}</td>
                            <td class="text-center">{{ $item->pengusaha_perdagangan_hasil_bumi }}</td>
                            <td class="text-center">{{ $item->buruh_perdagangan_hasil_bumi }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.show', $item->id) }}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('perkembangan.struktur-mata-pencaharian.sektor-perdagangan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready(function() {
        $('#sektor-perdagangan-table').DataTable();
    });
</script>
@endpush
