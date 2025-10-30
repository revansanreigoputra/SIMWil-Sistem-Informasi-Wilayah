<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPrasaranaTransportasiLainnya extends Model
{
    use HasFactory;

    protected $table = 'kategori_prasarana_transportasi_lainnya';

    protected $fillable = ['nama',];
    
    public function jenis()
    {
        return $this->hasMany(JenisPrasaranaTransportasiLainnya::class, 'kategori_prasarana_transportasi_lainnya_id');
    }
}
