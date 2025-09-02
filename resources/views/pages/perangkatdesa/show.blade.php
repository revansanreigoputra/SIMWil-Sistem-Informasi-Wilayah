@extends('layouts.master')

@section('title', 'Detail Perangkat Desa')

@section('action')
    @can('perangkat_desa.update')
        <a href="{{ route('perangkat_desa.edit', $perangkatDesa->id) }}" class="btn btn-warning">Edit</a>
    @endcan
    @can('perangkat_desa.delete')
        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-perangkat-desa-{{ $perangkatDesa->id }}">
            Hapus
        </button>
    @endcan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Detail Perangkat Desa</h3>
                        {{-- <div class="card-tools">
                        @can('perangkat_desa.update')
                        <a href="{{ route('perangkat_desa.edit', $perangkatDesa->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        @endcan
                        <a href="{{ route('perangkat_desa.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($perangkatDesa->foto)
                                    <div class="text-center">
                                        <img src="{{ asset('storage/' . $perangkatDesa->foto) }}"
                                            alt="Foto {{ $perangkatDesa->nama }}" class="img-fluid rounded"
                                            style="max-width: 200px;">
                                    </div>
                                @else
                                    <div class="text-center">
                                        <div class="bg-light rounded p-4">
                                            <i class="fas fa-user fa-4x text-muted"></i>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <table class="table table-borderless">
                                    <tr>
                                        <th width="200">Nama</th>
                                        <td>: {{ $perangkatDesa->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td>: {{ $perangkatDesa->nama_jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Desa</th>
                                        <td>: {{ $perangkatDesa->nama_desa }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>:
                                            {{ $perangkatDesa->tanggal_lahir ? \Carbon\Carbon::parse($perangkatDesa->tanggal_lahir)->format('d/m/Y') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>: {{ $perangkatDesa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Golongan Darah</th>
                                        <td>: {{ $perangkatDesa->golongan_darah ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kontak</th>
                                        <td>: {{ $perangkatDesa->kontak ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Masa Jabatan</th>
                                        <td>: {{ $perangkatDesa->masa_jabatan ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Istri</th>
                                        <td>: {{ $perangkatDesa->nama_pasangan ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Anak</th>
                                        <td>: {{ $perangkatDesa->jumlah_anak }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>: {{ $perangkatDesa->alamat ?: '-' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        @if ($perangkatDesa->sambutan)
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Sambutan</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">{!! nl2br(e($perangkatDesa->sambutan)) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
