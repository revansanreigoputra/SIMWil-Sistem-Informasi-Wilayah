<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kemasyarakatan extends Model
{
    protected $fillable = [
        'desa_id',
        'tanggal',
        // GEDUNG KANTOR LKD/LKK
        'gedung_lembaga_kemasyarakatan',
        'peralatan_kantor_lkd',
        'mesin_tik_lkd',
        'kardek_lkd',
        'buku_administrasi_lembaga_lkd',
        'jumlah_meja_kursi_lkd',
        'lainnya_lkd',
        // LKMD / LPM
        'memiliki_kantor_sendiri',
        'peralatan_kantor_lpm',
        'mesin_tik_lpm',
        'kardek_lpm',
        'buku_administrasi_lembaga_lpm',
        'jumlah_meja_kursi_lpm',
        'buku_administrasi_lpm',
        'jumlah_kegiatan_lpm',
        'lainnya_lpm',
        // PKK
        'pkk',
        'gedung_kantor_pkk',
        'peralatan_kantor_pkk',
        'kepengurusan_pkk',
        'buku_administrasi_pkk',
        'kegiatan_pkk',
        'jumlah_kegiatan_pkk',
        'kelengkapan_darmawisata_pkk',
        'kelengkapan_pokja_pkk',
        // Karang Taruna
        'karang_taruna',
        'kepengurusan_karang',
        'buku_administrasi_karang',
        'jumlah_kegiatan_karang',
        'lainnya_karang',
        // Rukun Tangga
        'rukun_tangga',
        'kepengurusan_rt',
        'buku_administrasi_rt',
        'jumlah_kegiatan_rt',
        // Rukun Warga
        'rukun_warga',
        'kepengurusan_rw',
        'buku_administrasi_rw',
        'jumlah_kegiatan_rw',
        'lainnya_rw',
        // Lembaga Adat
        'lembaga_adat',
        'gedung_kantor_adat',
        'kepengurusan_adat',
        'buku_administrasi_adat',
        'jumlah_kegiatan_adat',
        // BUMDes
        'bumdes',
        'gedung_kantor_bumdes',
        'kepengurusan_bumdes',
        'buku_administrasi_bumdes',
        'jumlah_kegiatan_bumdes',
        // Forum Komunikasi Kader Pemberdayaan Masyarakat
        'forum_komunikasi_kader',
        'gedung_kantor_forum',
        'kepengurusan_forum',
        'buku_administrasi_forum',
        'jumlah_kegiatan_forum',
        'lainnya_forum',
        // Lain-lain
        'gedung_kantor_sosial_lain',
        'gedung_kantor_profesi_lain',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}