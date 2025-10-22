<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPrasaranaTransportasiDarat extends Model
{
    use HasFactory;

    protected $table = 'kategori_prasarana_transportasi_darat';

    protected $fillable = ['nama',];
    
    public function jenis()
    {
        return $this->hasMany(JenisPrasaranaTransportasiDarat::class, 'kategori_prasarana_transportasi_darat_id');
    }
}
