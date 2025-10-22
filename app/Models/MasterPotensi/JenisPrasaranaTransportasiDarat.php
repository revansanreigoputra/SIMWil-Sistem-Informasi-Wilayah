<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPrasaranaTransportasiDarat extends Model
{
    use HasFactory;

    protected $table = 'jenis_prasarana_transportasi_darat';
    protected $fillable = ['kategori_prasarana_transportasi_darat_id','nama',];

    // Relasi ke kategori
    public function KategoriPrasaranaTransportasiDarat()
    {
        return $this->belongsTo(KategoriPrasaranaTransportasiDarat::class, 'kategori_prasarana_transportasi_darat_id');
    }
}
