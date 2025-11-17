@extends('layouts.public')
@section('title', 'Status Permohonan Surat')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h2>Status Permohonan Surat untuk NIK: <span class="text-primary"> {{ $nik }}</span> </h2>
            @if ($permohonans->isEmpty())
                 <p class="ms-5">Tidak ada permohonan surat ditemukan untuk NIK ini.</p>
            @else
        </div>
        <div class="card-body container py-5 mt-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Jenis Surat</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permohonans as $permohonan)
                            <tr>
                                <td>{{ $permohonan->jenisSurat->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($permohonan->tanggal_permohonan)->format('d M Y') }}</td>
                                <td>
                                    @php
                                        $statusClass = '';
                                        switch ($permohonan->status) {
                                            case 'belum_diverifikasi':
                                                $statusClass = 'badge bg-secondary';
                                                break;
                                            case 'diverifikasi':
                                                $statusClass = 'badge bg-primary';
                                                break;
                                            case 'ditolak':
                                                $statusClass = 'badge bg-danger';
                                                break;
                                            case 'siap_diambil':
                                                $statusClass = 'badge bg-warning';
                                                break;
                                            case 'sudah_diambil':
                                                $statusClass = 'badge bg-success';
                                                break;
                                            default:
                                                $statusClass = 'badge bg-secondary';
                                        }
                                    @endphp
                                    <span class="{{ $statusClass }}">{{ ucfirst($permohonan->status) }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
