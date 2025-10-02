@extends('layouts.master')

@section('title', 'Jenis Surat Template')


@section('action')
@can('jenis_surat.create')
<a href="{{ route('jenis_surats.create') }}" class="btn btn-primary ">
    <i class="bi bi-plus-circle me-2"></i> Tambah Jenis Surat
</a>
@endcan
@endsection



@section('content')
<div class="card">
    <div class="card-body">
        {{-- Search Bar --}}
        {{-- <div class="row mb-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">
                        <i class="fas fa-search"></i> Cari Jenis Surat
                    </label>
                    <input type="text" id="search" class="form-control" placeholder="Cari format nomor surat...">
                </div>
            </div> --}}

        {{-- Table --}}
        <div class="table-responsive">
            <table id="format-nomor-table" class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Kode Surat</th>
                        <th>Nama</th>
                        <th>Paragraf Pembuka</th>
                        <th>Paragraf Penutup</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenisSurats as $format)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $format->kode }}</td>
                        <td>{{ $format->nama }}</td>
                       <td>{{ Str::limit($format->paragraf_pembuka ?? 'Belum ada paragraf pembuka', 50) }}</td>
                        <td>{{ Str::limit($format->paragraf_penutup ?? 'Belum ada paragraf penutup', 50) }}</td>
                        <td>
                            <div class="d-flex gap-1 justify-content-center">
                                @can('jenis_surat.edit')
                                <a href="{{ route('jenis_surats.edit', $format->id) }}"
                                    class="btn btn-sm btn-warning d-flex align-items-center gap-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @endcan
                                @can('jenis_surat.delete')
                                <button type="button" class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#delete-confirm-{{ $format->id }}">
                                    Hapus
                                </button>
                                @endcan
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

@foreach ($jenisSurats as $item)
    <x-modal.delete-confirm
        id="delete-confirm-{{ $item->id }}"
        title="Yakin hapus data ini?"
        description="Aksi ini tidak bisa dikembalikan."
        route="{{ route('jenis_surats.destroy', $item) }}"
        item="{{ $item->nama }}"
    />
@endforeach

@push('addon-script')
<script>
    $(function() {
        $('#format-nomor-table').DataTable();
        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 2000);
    });
</script>
@endpush