@extends('layouts.master')

@section('title', 'Data APB Desa dan Kelurahan')

@section('action')
    <a href="{{ route('apbdesa.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <<table id="apb-desa-table" class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>APBD Kabupaten</th>
                            <th>Bantuan Kab</th>
                            <th>Bantuan Provinsi</th>
                            <th>Bantuan Pusat</th>
                            <th>Pendapatan Asli Desa</th>
                            <th>Swadaya Masyarakat</th>
                            <th>Alokasi Dana Desa</th>
                            <th>Sumber Pendapatan Perusahaan</th>
                            <th>Sumber Pendapatan Lain</th>
                            <th>Jumlah Penerimaan</th>
                            <th>Belanja Publik</th>
                            <th>Belanja Aparatur</th>
                            <th>Jumlah Belanja</th>
                            <th>Saldo Anggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal->format('Y-m-d') }}</td>
                                <td class="text-center">{{ number_format($item->apbd_kabupaten, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->bantuan_pemerintah_kabupaten, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->bantuan_pemerintah_provinsi, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->bantuan_pemerintah_pusat, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->pendapatan_asli_desa, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->swadaya_masyarakat, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->alokasi_dana_desa, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->sumber_pendapatan_perusahaan, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->sumber_pendapatan_lain, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->jumlah_penerimaan, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->jumlah_belanja_publik, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->jumlah_belanja_aparatur, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->jumlah_belanja, 0, ',', '.') }}</td>
                                <td class="text-center">{{ number_format($item->saldo_anggaran, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('apbdesa.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path
                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                            Edit
                                        </a>

                                        <!-- Tombol Hapus dengan Modal -->
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-apbdesa-{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                            Hapus
                                        </button>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="delete-apbdesa-{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Data?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Data APB Desa tanggal <strong>{{ $item->tanggal->format('d-m-Y') }}</strong> akan dihapus dan tidak bisa dikembalikan.</p>
                                                        <p>Yakin ingin menghapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('apbdesa.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            $('#apb-desa-table').DataTable();
        });
    </script>
@endpush
