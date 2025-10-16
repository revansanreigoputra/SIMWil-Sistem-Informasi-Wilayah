<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class musrenbangdesa extends Model
{
    use HasFactory;

    protected $table = 'musrenbangdesas';

    protected $fillable = [
        'tanggal',
        'jumlah_musrenbang_desa_kelurahan',
        'jumlah_kehadiran_masyarakat',
        'jumlah_peserta_laki',
        'jumlah_peserta_perempuan',
        'jumlah_musrenbang_antar_desa',
        'penggunaan_profil_desa',
        'penggunaan_data_bps',
        'pelibatan_masyarakat',
        'usulan_masyarakat_disetujui',
        'usulan_pemerintah_desa_disetujui',
        'usulan_rencana_kerja_pemkab',
        'usulan_rencana_kerja_ditolak',
        'dokumen_rkpdes',
        'dokumen_rpjmdes',
        'dokumen_hasil_musrenbang',
        'jumlah_kegiatan_terdanai',
        'jumlah_kegiatan_tidak_sesuai',
    ];
}
