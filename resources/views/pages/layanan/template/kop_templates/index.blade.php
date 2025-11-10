@extends('layouts.master')

@section('title', 'Kop Dokumen')

@section('action')
    <a href="{{ route('kop_templates.create') }}" class="btn btn-primary ">
        <i class="bi bi-plus-circle me-2"></i> Tambah Kop Dokumen
    </a>
@endsection

@section('content') 
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="format-nomor-table" class="table table-striped">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Jenis Kop</th>
                                <th>Nama Kop</th>
                                <th>Logo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kopTemplates as $kopTemplate)
                                <tr>
                                    <td class="text-center fw-semibold">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="uppercase-input">
                                        <strong>{{ $kopTemplate->jenis_kop }}</strong><br>

                                    </td>
                                    <td>{{ $kopTemplate->nama }}</td>
                                    <td class="text-center">
                                        @if ($kopTemplate->logo)
                                         <img src="{{ asset($kopTemplate->logo) }}" alt="Logo" 
                                                class="img-fluid rounded shadow-sm" width="80">
                                        @else
                                            <span class="text-muted">Tidak ada logo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('kop_templates.edit', $kopTemplate->id) }}"
                                            class="btn btn-sm btn-warning me-1">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        @can('kop_template.delete')
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete-confirm-{{ $kopTemplate->id }}">
                                                Hapus
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
@endsection
@foreach ($kopTemplates as $kopTemplate)
    <x-modal.delete-confirm id="delete-confirm-{{ $kopTemplate->id }}" title="Yakin hapus data ini?"
        description="Aksi ini tidak bisa dikembalikan." route="{{ route('kop_templates.destroy', $kopTemplate) }}"
        item="{{ $kopTemplate->nama }}" />
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
