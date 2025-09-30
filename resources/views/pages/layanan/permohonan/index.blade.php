@extends('layouts.master')

@section('title', 'Permohonan Surat')


@section('styles')
<style>
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        background-color: #fff;
    }

    .card-header {
        border-bottom: none;
        background-color: #fff;
        padding: 1rem;
    }

    .card-body {
        padding: 1rem;
    }

    .nav-pills .nav-link {
        padding: 8px 12px;
        background-color: #f0f2f5;
        border: none;
        border-radius: 6px;
        color: #6a7f8e;
        transition: all 0.2s ease;
        margin-right: 4px;
        margin-bottom: 8px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .nav-pills .nav-link.active {
        background-color: #4CAF50 !important;
        color: white !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important;
        transform: translateY(-1px);
    }

    .nav-pills .nav-link:hover:not(.active) {
        background-color: #e0e2e5;

    }

    @media (max-width: 768px) {
        .nav-pills {
            flex-direction: column;
        }

        .nav-pills .nav-link {
            margin-right: 0;
            margin-bottom: 8px;
            text-align: center;
            width: 100%;
        }
    }
</style>
@endsection
<!-- FFor id generator -->

@section('action')
<a id="create-permohonan-btn"
    href="{{ route('layanan.permohonan.create')}}"
    class="btn btn-primary">
    Tambah Permohonan untuk Jenis Surat Ini
</a>


@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Data Permohonan Surat</h5>
    </div>
    <div class="card-body">

        <ul class="nav nav-pills mb-3" id="jenisSuratTab" role="tablist">
            @foreach ($jenisSurats as $index => $format)
            @php
            // Use the ID or the slug, depending on what your route expects.
            // Let's assume your route expects the SLUG (like your original code)
            $tabId = \Illuminate\Support\Str::slug($format->id);
            @endphp

            <li class="nav-item" role="presentation">
                <a class="nav-link @if($index === 0) active @endif"
                    id="{{ $tabId }}-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#{{ $tabId }}"
                    type="button"
                    role="tab"
                    aria-controls="{{ $tabId }}"
                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                  
                    data-tab-param="{{ $tabId }}">
                    {{ $format->nama }}
                </a>
            </li>
            @endforeach
        </ul>

        <hr>

        <div class="tab-content mt-3" id="jenisSuratTabContent">

            @foreach ($jenisSurats as $index => $format)
            @php
            $paneId = \Illuminate\Support\Str::slug($format->id);
            @endphp

            <div class="tab-pane fade @if($index === 0) show active @endif"
                id="{{ $paneId }}"
                role="tabpanel"
                aria-labelledby="{{ $paneId }}-tab"
                tabindex="0">

                {{-- CONTENT: Place the table structure inside the correct tab pane --}}

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>No Surat</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat/Tgl. Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Dibuat/Diupdate</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Here you would loop through $permohonans, filtering by the current $format->id --}}
                            @forelse ($permohonans->where('jenis_surats_id', $format->id) as $permohonan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permohonan->nomor_surat }}</td>
                                <td>{{ $permohonan->anggotaKeluarga->nik ?? 'N/A' }}</td>
                                <td>{{ $permohonan->anggotaKeluarga->nama ?? 'N/A' }}</td>
                                <td>{{ ($permohonan->anggotaKeluarga->tempat_lahir ?? '-') . ', ' . ($permohonan->anggotaKeluarga->tanggal_lahir ?? '-') }}</td>
                                <td>{{ $permohonan->anggotaKeluarga->jenis_kelamin ?? 'N/A' }}</td>
                                <td>{{ $permohonan->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="#" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                    <a href="#" class="btn btn-sm btn-success" target="_blank">Cetak</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data permohonan untuk jenis surat ini ({{ $format->nama }}).</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
            @endforeach
        </div>

    </div> {{-- end card-body --}}
</div> {{-- end card --}}
<!-- Modal Tambah Permohonan -->
<!-- <div class="modal fade" id="modalTambahPermohonan" tabindex="-1" aria-labelledby="modalTambahPermohonanLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-body p-0"> 
                <div class="card border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-primary text-white fw-bold rounded-top-4">
                        <h5 class="mb-0 fw-bold">Tambah Permohonan</h5>
                    </div>
                    <div class="card-body p-4">
                        {{-- Ganti form dan hapus route yang salah --}}
                        <div class="mb-3">
                            <label for="jenis_surat_selector" class="form-label fw-semibold text-dark">Pilih Jenis Surat</label>
                            <select name="jenis_surat_selector" id="jenis_surat_selector" class="form-select border-primary shadow-sm" required>
                                <option value="">-- Pilih Jenis Surat untuk Membuat Permohonan --</option>
                                @foreach ($jenisSurats as $format)
                                {{-- Simpan URL yang BENAR sebagai value --}}
                                <option value="{{ route('layanan.permohonan.create', ['kode' => $format->kode]) }}">
                                    {{ $format->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light border"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Lanjut</button>
                        </div>
                        </form>
                    </div>
                    <div class="card-footer text-center small text-muted py-2 bg-light">
                        Pastikan jenis surat sesuai dengan kebutuhan Anda
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
@push('addon-script')
<!-- <script>
    $(function() {
        const createButton = $('#create-permohonan-btn');
        const baseUrl = '{{ route('layanan.permohonan.create', 'PLACEHOLDER') }}';
        
        // This function updates the 'Tambah Permohonan' button link
        function updateCreatePermohonanLink() {
            // Find the currently active tab link element
            const activeTabLink = $('#jenisSuratTab').find('.nav-link.active');
            
            // Get the parameter value from the active tab's data attribute
            // We use 'data-tab-param' to hold the slug (e.g., 'surat-domisili')
            const tabParam = activeTabLink.data('tab-param');

            if (tabParam) {
                // Construct the new URL by replacing the placeholder in the base URL
                const newHref = baseUrl.replace('PLACEHOLDER', tabParam);
                createButton.attr('href', newHref);
            } else {
                // Fallback for safety if no tab is active or no data is found
                console.error('Could not find active tab parameter.');
            }
        }

        // --- Execution Flow ---

        // 1. Run once on page load to set the initial link
        updateCreatePermohonanLink();

        // 2. On tab change (using Bootstrap's 'shown.bs.tab' event)
        $('#jenisSuratTab a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            updateCreatePermohonanLink();
        });
    });
</script> -->
@endpush