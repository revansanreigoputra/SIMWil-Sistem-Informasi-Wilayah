<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPotensi\KategoriUsahaJasaDanHiburan;
use App\Models\MasterPotensi\JenisUsahaHiburan;

class Hiburan extends Model
{
    use HasFactory;

    protected $table = 'usaha_jasa_dan_hiburan';

    protected $fillable = [
        'tanggal',
        'kategori_id',
        'jenis_usaha_id',
        'jumlah_unit',
        'jenis_produk',
        'jumlah_tenaga_kerja',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriUsahaJasaDanHiburan::class, 'kategori_id');
    }

    public function jenisUsaha()
    {
        return $this->belongsTo(JenisUsahaHiburan::class, 'jenis_usaha_id');
    }
}
