@extends('layouts.master')

@section('title', 'Detail Penanda Tangan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Penanda Tangan</h3>
                    <div class="card-tools">
                        @can('ttd.update')
                            <a href="{{ route('ttd.edit', $ttd->id) }}" class="btn btn-warning btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path
                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                                Edit
                            </a>
                        @endcan
                        <a href="{{ route('ttd.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="30%">NIP</th>
                                    <td>{{ $ttd->nip ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $ttd->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td>{{ $ttd->jabatan }}</td>
                                </tr>
                                <tr>
                                    <th>Status Aktif</th>
                                    <td>
                                        @if($ttd->status_aktif)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="30%">Perangkat Desa</th>
                                    <td>{{ $ttd->nama_perangkat ? $ttd->nama_perangkat . ' (' . $ttd->nama_desa . ')' : '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $ttd->keterangan ?? '-' }}</td>
                                </tr>
                                <tr>
                                    @php use Carbon\Carbon; @endphp 
                                    <th>Dibuat</th>
                                    <td>{{ Carbon::parse($ttd->created_at)->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Diubah</th>
                                    <td>{{ Carbon::parse($ttd->updated_at)->format('d/m/Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
