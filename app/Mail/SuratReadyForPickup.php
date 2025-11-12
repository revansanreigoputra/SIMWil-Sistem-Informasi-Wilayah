<?php

namespace App\Mail;
use App\Models\LayananSurat\Permohonan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuratReadyForPickup extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The Permohonan instance.
     * @var Permohonan
     */
    public $permohonan;

   
    public function __construct(Permohonan $permohonan)
    {
        $this->permohonan = $permohonan;
    }

   
    public function envelope(): Envelope
    {
        $jenisSurat = optional($this->permohonan->jenisSurat)->nama ?? 'Surat Anda';

        return new Envelope(
            subject: "✅ Surat Anda Siap Diambil: {$jenisSurat}",
        );
    }

     
    public function content(): Content
    {
        return new Content(
            markdown: 'pages.layanan.permohonan.surat_ready_for_pickup',
            with: [
                'nama' => optional($this->permohonan->anggotaKeluarga)->nama ?? 'Pelanggan',
                'nomorSurat' => $this->permohonan->nomor_surat,
                'jenisSurat' => optional($this->permohonan->jenisSurat)->nama,
            ],
        );
    }
}