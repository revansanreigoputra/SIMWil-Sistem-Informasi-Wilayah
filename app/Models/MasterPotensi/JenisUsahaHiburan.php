<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPotensi\KategoriUsahaJasaDanHiburan;

class JenisUsahaHiburan extends Model
{
    use HasFactory;

    protected $table = 'jenis_usaha_hiburan';

    protected $fillable = [
        'nama',
        'kategori_id',
    ];

    /**
     * Relasi ke kategori (Many to One)
     */
    public function kategori()
    {
        return $this->belongsTo(KategoriUsahaJenisDanHiburan::class, 'kategori_id');
    }
}
