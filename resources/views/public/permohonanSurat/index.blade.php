@extends('layouts.public')
@section('title', 'Permohonan Surat')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="headline_part centered margin-top-75">
                    SHORTCUT SURAT
                    <span>Daftar shortcut pengajuan berbagai jenis surat ijin, permohonan, keterangan maupun
                        pengantar</span>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container_categories_box margin-top-5 margin-bottom-30">
                    @forelse ($jenis_surat_shortcuts as $index => $jenisSurat)
                        {{-- Menggunakan event JavaScript untuk mencegat klik dan mengecek kode surat --}}
                        <a href="javascript:void(0);" data-id="{{ $jenisSurat->id }}" data-kode="{{ $jenisSurat->kode }}"
                            data-mutasi-type="{{ $jenisSurat->mutasi_type ?? '' }}"
                            data-verify-url="{{ route('public.permohonanSurat.verify_nik', $jenisSurat->id) }}"
                            class="utf_category_small_box_part surat-link">
                            {{-- Ikon statis, Anda bisa membuatnya dinamis jika punya kolom ikon di DB --}}
                            <i class="im im-icon-File-ClipboardFileText"></i>

                            {{-- Kode surat (H4) --}}
                            <h4 style="margin-bottom:0">{{ $jenisSurat->kode }}</h4>

                            {{-- Nama surat (Paragraph) --}}
                            <p style="margin-bottom:0">{{ $jenisSurat->nama }}</p>

                            {{-- Nomor urut (Span) --}}
                            <span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </a>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="lead text-muted">Belum ada jenis surat yang diaktifkan untuk permohonan
                                publik.</p>
                        </div>
                    @endforelse
                </div>
                <div class="col-md-12 centered_content">
                    <a href="{{ route('public.permohonanSurat.index') }}"
                        class="button border margin-top-20">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
       $(document).ready(function() {
            const warningTypes = ['meninggal', 'pindah_keluar', 'mutasi_masuk_kk', 'pencatatan_kelahiran'];
            const message =
                'Untuk mengajukan surat yang memicu perubahan data penduduk harap datangi kantor desa secara langsung untuk registrasi.';

            // Use $ (jQuery) to select the links and attach the click handler
            $('.surat-link').on('click', function(event) {
                event.preventDefault(); // Stop default navigation

                // Use jQuery's .data() method to reliably read the attribute
                const mutasiType = $(this).data('mutasi-type');

                // Safety check and cleaning
                const cleanMutasiType = mutasiType ? mutasiType.toLowerCase().trim() : '';
                const verifyUrl = $(this).data('verify-url'); 

                // Debugging: Show the clean value read from the element
                console.log('Clicked Mutasi Type (jQuery Cleaned):', cleanMutasiType);

                if (warningTypes.includes(cleanMutasiType)) {
                    // Show pop-up
                    alert(message);
                    return; // Stop processing and remain on the current page
                } else {
                    // Proceed to NIK verification page
                    window.location.href = verifyUrl;
                }
            });
        });
    </script> 
@endpush
