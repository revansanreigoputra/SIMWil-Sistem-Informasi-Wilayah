<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkembanganSaranaPrasarana extends Model
{
    use HasFactory;

    protected $table = 'perkembangan_sarana_prasarana';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'fasilitas_umum',
        'tenaga_kesehatan_aktif',
        'kader_keluarga_lapangan',
        'dokumentasi_posyandu',
        'kegiatan_kesehatan',
        'kegiatan_lingkungan',
        'kegiatan_lainnya',
        'jumlah_mck_umum',
        'jumlah_posyandu',
        'jumlah_kader_posyandu_aktif',
        'jumlah_pembina_posyandu',
        'jumlah_pengurus_dasawisma_aktif',
        'jumlah_kader_bina_keluarga_balita_aktif',
        'jumlah_petugas_lapangan_keluarga_berencana',
        'buku_rencana_kegiatan_posyandu',
        'buku_data_pengunjung_posyandu',
        'buku_administrasi_posyandu_lainnya',
        'jumlah_kegiatan_posyandu',
        'jumlah_kader_kesehatan_lainnya',
        'jumlah_kegiatan_pengobatan_gratis',
        'jumlah_kegiatan_pemberantasan_psn',
        'jumlah_kegiatan_pembersihan_lingkungan',
    ];

    // 🔹 Relasi ke desa
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
