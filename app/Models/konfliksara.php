<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonflikSara extends Model
{
    use HasFactory;

    protected $table = 'konfliksaras';

    protected $fillable = [
        'id_desa',
        'tanggal',
        'kasus_konflik_tahun_ini',
        'kasus_konflik_sara_tahun_ini',
        'kasus_pertengkaran_tetangga',
        'kasus_pertengkaran_rt_rw',
        'konflik_pendatang_dan_asli',
        'konflik_kelompok_desa_kelurahan_lain',
        'konflik_dengan_pemerintah',
        'kerugian_material_dengan_pemerintah',
        'korban_jiwa_dengan_pemerintah',
        'konflik_dengan_perusahaan',
        'korban_jiwa_dengan_perusahaan',
        'kerugian_material_dengan_perusahaan',
        'konflik_dengan_lembaga_politik',
        'korban_jiwa_dengan_lembaga_politik',
        'kerugian_material_dengan_lembaga_politik',
        'prasarana_rusak_konflik_sara',
        'rumah_rusak_konflik_sara',
        'korban_luka_konflik_sara',
        'korban_meninggal_konflik_sara',
        'anak_janda_konflik_sara',
        'anak_yatim_konflik_sara',
        'pelaku_diadili',
    ];

    /**
     * Relasi ke tabel desa.
     * Misal kamu punya model Desa dengan tabel `desas`
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
