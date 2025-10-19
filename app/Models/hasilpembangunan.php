<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class hasilpembangunan extends Model
{
    use HasFactory;

    protected $table = 'hasilpembangunans';

    protected $fillable = [
        'id_desa',
        'tanggal',
        'jumlah_masyarakat_terlibat',
        'jumlah_penduduk_dilibatkan',
        'jumlah_kegiatan_masyarakat',
        'jumlah_kegiatan_pihak_ketiga',
        'jumlah_kegiatan_luar_musrenbang',
        'jumlah_masyarakat_disetujui_rk',
        'usulan_pemerintah_desa_kelurahan_disetujui_rk',
        'usulan_rencana_kerja_program',
        'penyelenggaraan_musyawarah',
        'pelaksanaan_kegiatan_masyarakat',
        'pelaksanaan_kegiatan_tersisa',
        'jumlah_kasus_penyimpangan_kepada_kepala_desa',
        'jumlah_kasus_penyimpangan_desa_kelurahan',
        'jumlah_kasus_penyimpangan_desa_kelurahan_hukum',
        'jenis_kegiatan_pemeliharaan',
        'jumlah_kegiatan_didanai_apb_desa',
        'jumlah_kegiatan_didanai_apb_kabupaten',
        'jumlah_kegiatan_didanai_apbd_provinsi',
        'jumlah_kegiatan_didanai_apbn',
    ];
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
