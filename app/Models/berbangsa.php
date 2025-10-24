<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class berbangsa extends Model
{
    use HasFactory;

    protected $table = 'berbangsas';

    protected $fillable = [
        'id_desa',
        'tanggal',
        'kegiatan_pemantapan_pancasila',
        'jumlah_kegiatan_pemantapan_pancasila',
        'jenis_kegiatan_bhineka_tunggal_ika',
        'jumlah_kegiatan_bhineka_tunggal_ika',
        'jenis_kegiatan_pemantapan_kesatuan_bangsa',
        'kasus_desa_minta_suaka',
        'warga_melintas_resmi',
        'warga_melintas_tidak_resmi',
        'kasus_pertempuran_antar_kelompok',
        'serangan_terhadap_fasilitas',
        'kasus_merongrong_nkri',
        'korban_manusia',
        'masalah_ketenagakerjaan',
        'kasus_kejahatan_perbatasan',
        'sengketa_perbatasan_desa',
        'sengketa_perbatasan_antar_daerah',
        'kasus_diplomatik',
        'kasus_disintegrasi',
        'kasus_penangkapan',
        'kasus_nelayan_petani',
    ];

    protected $casts = [
        'id_desa',
        'tanggal' => 'date',
        'kegiatan_pemantapan_pancasila' => 'integer',
        'jumlah_kegiatan_pemantapan_pancasila' => 'integer',
        'jenis_kegiatan_bhineka_tunggal_ika' => 'integer',
        'jumlah_kegiatan_bhineka_tunggal_ika' => 'integer',
        'jenis_kegiatan_pemantapan_kesatuan_bangsa' => 'integer',
        'kasus_desa_minta_suaka' => 'integer',
        'warga_melintas_resmi' => 'integer',
        'warga_melintas_tidak_resmi' => 'integer',
        'kasus_pertempuran_antar_kelompok' => 'integer',
        'serangan_terhadap_fasilitas' => 'integer',
        'kasus_merongrong_nkri' => 'integer',
        'korban_manusia' => 'integer',
        'masalah_ketenagakerjaan' => 'integer',
        'kasus_kejahatan_perbatasan' => 'integer',                      
        'sengketa_perbatasan_desa' => 'integer',
        'sengketa_perbatasan_antar_daerah' => 'integer',
        'kasus_diplomatik' => 'integer',
        'kasus_disintegrasi' => 'integer',
        'kasus_penangkapan' => 'integer',
        'kasus_nelayan_petani' => 'integer',
    ];
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
