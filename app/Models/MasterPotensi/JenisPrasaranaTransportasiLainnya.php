<?php

namespace App\Models\MasterPotensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPrasaranaTransportasiLainnya extends Model
{
    use HasFactory;

    protected $table = 'jenis_prasarana_transportasi_lainnya';
    protected $fillable = [
        'kategori_prasarana_transportasi_lainnya_id',
        'nama',
    ];

    // Relasi ke kategori
    public function KategoriPrasaranaTransportasiLainnya()
    {
        return $this->belongsTo(KategoriPrasaranaTransportasiLainnya::class, 'kategori_prasarana_transportasi_lainnya_id');
    }
}
