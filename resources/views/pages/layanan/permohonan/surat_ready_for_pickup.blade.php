@component('mail::message')
# Pemberitahuan Pengambilan Surat

Yth. Sdr/i **{{ $nama }}**,

Kami informasikan bahwa permohonan surat Anda telah selesai diproses dan **siap untuk diambil**.

Berikut adalah detail permohonan Anda:

* **Jenis Surat:** {{ $jenisSurat }}
* **Nomor Surat:** {{ $nomorSurat }}
* **Status:** Siap Diambil

Silakan datang ke Kantor Desa selama jam kerja untuk mengambil dokumen asli. Mohon bawa identitas diri (KTP/KK) yang sah.

@component('mail::button', ['url' => url('/layanan/permohonan/' . $permohonan->id)])
Lihat Detail Permohonan
@endcomponent

Terima kasih atas kerja samanya.

Hormat kami,

{{ config('app.name') }}
@endcomponent