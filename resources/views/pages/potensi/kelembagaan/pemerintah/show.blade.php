@extends('layouts.master')

@section('title', 'Detail Data Lembaga Pemerintahan')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i> Detail Lembaga Pemerintahan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%">Tanggal</th>
                            <td>02-10-2025</td>
                        </tr>
                        <tr>
                            <th>Dasar Hukum Pembentukan</th>
                            <td>Peraturan Desa No. 1/2020</td>
                        </tr>
                        <tr>
                            <th>Dasar Hukum BPD</th>
                            <td>Peraturan BPD No. 2/2020</td>
                        </tr>
                        <tr>
                            <th>Jumlah Aparat</th>
                            <td>10</td>
                        </tr>
                        <tr>
                            <th>Jumlah Perangkat Desa</th>
                            <td>5</td>
                        </tr>
                        <tr>
                            <th>Kepala Desa</th>
                            <td>Ahmad</td>
                        </tr>
                        <tr>
                            <th>Sekretaris Desa</th>
                            <td>Siti</td>
                        </tr>
                        <tr>
                            <th>Jumlah Staf</th>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Data Anggota BPD --}}
            <h6 class="mt-4 fw-bold">Data Anggota BPD</h6>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama</th>
                            <th>Pendidikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Alice</td>
                            <td>SMA</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Bob</td>
                            <td>D3</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Charlie</td>
                            <td>S1</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('potensi.kelembagaan.pemerintah.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
