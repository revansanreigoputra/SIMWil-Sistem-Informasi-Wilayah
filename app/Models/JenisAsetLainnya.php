<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAsetLainnya extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jenis_aset',
    ];

    public function pemilikAsetEkonomiLainnya()
    {
        return $this->hasMany(PemilikAsetEkonomiLainnya::class, 'id_jenis_aset_lainnya');
    }
}
