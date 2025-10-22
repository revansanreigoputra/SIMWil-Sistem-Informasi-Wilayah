<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPrasaranaKomunikasiInformasi extends Model
{
    use HasFactory;

    protected $table = 'kategori_prasarana_komunikasi_informasi';

    protected $fillable = ['nama',];
    
    public function jenis()
    {
        return $this->hasMany(JenisPrasaranakomunikasiInformasi::class, 'kategori_prasarana_komunikasi_informasi_id');
    }
}
