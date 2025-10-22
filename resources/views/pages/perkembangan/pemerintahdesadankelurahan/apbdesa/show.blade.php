@extends('layouts.master')

@section('title', 'Detail APB Desa')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Detail Data APB Desa</h5>
        <a href="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card-body">

        <!-- Informasi Umum -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h5 class="fw-bold text-primary mb-3">Informasi Umum</h5>
                <table class="table table-borderless">
                    <tr>
                        <td width="40%"><strong>Tanggal</strong></td>
                        <td width="10%">:</td>
                        <td>{{ \Carbon\Carbon::parse($apb->tanggal)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td width="40%"><strong>Desa</strong></td>
                        <td width="10%">:</td>
                        <td>{{ $apb->desa->nama_desa ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>


        <!-- Data Penerimaan -->
        <h5 class="fw-bold text-primary mb-3">Data Penerimaan</h5>
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>APBD Kabupaten</th>
                        <th>Bantuan Pemkab</th>
                        <th>Bantuan Pemprov</th>
                        <th>Bantuan Pusat</th>
                        <th>Pendapatan Asli Desa</th>
                        <th>Swadaya Masyarakat</th>
                        <th>Alokasi Dana Desa</th>
                        <th>Sumber Perusahaan</th>
                        <th>Sumber Lain</th>
                        <th>Jumlah Penerimaan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>{{ number_format($apb->apbd_kabupaten ?? 0, 0, ',', '.') }}</td>
                        <td>{{ number_format($apb->bantuan_pemerintah_kabupaten ?? 0, 0, ',', '.') }}</td>
                        <td>{{ number_format($apb->bantuan_pemerintah_provinsi ?? 0, 0, ',', '.') }}</td>
                        <td>{{ number_format($apb->bantuan_pemerintah_pusat ?? 0, 0, ',', '.') }}</td>
                        <td>{{ number_format($apb->pendapatan_asli_desa ?? 0, 0, ',', '.') }}</td>
                        <td>{{ number_format($apb->swadaya_masyarakat ?? 0, 0, ',', '.') }}</td>
                        <td>{{ number_format($apb->alokasi_dana_desa ?? 0, 0, ',', '.') }}</td>
                        <td>{{ number_format($apb->sumber_pendapatan_perusahaan ?? 0, 0, ',', '.') }}</td>
                        <td>{{ number_format($apb->sumber_pendapatan_lain ?? 0, 0, ',', '.') }}</td>
                        <td class="fw-bold text-primary">{{ number_format($apb->jumlah_penerimaan ?? 0, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Data Belanja -->
        <h5 class="fw-bold text-primary mb-3">Data Belanja</h5>
        <div class="table-responsive mb-4">
            <table class="table table-bordered">
                <thead class="table-light text-center">
                    <tr>
                        <th>Belanja Publik</th>
                        <th>Belanja Aparatur</th>
                        <th>Jumlah Belanja</th>
                        <th>Saldo Anggaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>{{ number_format($apb->jumlah_belanja_publik ?? 0, 0, ',', '.') }}</td>
                        <td>{{ number_format($apb->jumlah_belanja_aparatur ?? 0, 0, ',', '.') }}</td>
                        <td class="fw-bold text-primary">{{ number_format($apb->jumlah_belanja ?? 0, 0, ',', '.') }}</td>
                        <td class="fw-bold text-success">{{ number_format($apb->saldo_anggaran ?? 0, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Action Buttons -->
        <div class="mt-4">
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.edit', $apb->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('perkembangan.pemerintahdesadankelurahan.apbdesa.destroy', $apb->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
