@extends('layouts.public')
@section('title', 'Permohonan Surat')
@section('content')
    <div class="container">
        <div class="row centered margin-top-75">
            <div class="col-md-6 col-md-offset-3">
                <h2>Verifikasi NIK untuk Surat:
                </h2>
                <h4> {{ $jenisSurat->nama }} </h4>
                <p>Masukkan NIK Anda untuk memverifikasi data kependudukan sebelum mengajukan permohonan.</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('public.permohonanSurat.process_nik') }}">
                    @csrf
                    <input type="hidden" name="jenis_surat_id" value="{{ $jenisSurat->id }}">

                    <div class="form-group">
                        <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" name="nik" id="nikInput" class="form-control" value="{{ old('nik') }}"
                            required minlength="16" maxlength="16" placeholder="Masukkan 16 digit NIK">
                    </div>
                    
                    <button type="submit" class="btn  btn-primary border margin-top-20">Verifikasi & Lanjut ke Form</button>
                    <a class="btn  margin-top-20 btn-outline-primary" id="trackingLink"
                        href="{{ route('public.permohonanSurat.tracking_result') }}">Cek Status
                        Permohonan</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nikInput = document.getElementById('nikInput');
        const trackingLink = document.getElementById('trackingLink');
        
        // Ambil base URL tracking (misalnya: /permohonanSurat/tracking-result)
        const baseUrl = trackingLink.getAttribute('href'); 

        function updateTrackingLink() {
            const nikValue = nikInput.value;
            // Hanya update link jika NIK terisi dan panjangnya 16 digit
            if (nikValue.length === 16) {
                trackingLink.setAttribute('href', baseUrl + '?nik=' + nikValue);
            } else {
                // Opsional: Atur href kembali ke base URL atau tambahkan pesan error/disable
                trackingLink.setAttribute('href', baseUrl);
            }
        }

        // Jalankan fungsi saat input berubah
        nikInput.addEventListener('input', updateTrackingLink);

        // Jalankan sekali saat halaman dimuat (untuk mengisi ulang jika ada old('nik'))
        updateTrackingLink(); 
    });
</script>
@endpush
