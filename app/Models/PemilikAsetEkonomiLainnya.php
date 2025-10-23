<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikAsetEkonomiLainnya extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_desa',
        'id_jenis_aset_lainnya',
        'tanggal',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function jenisAsetLainnya()
    {
        return $this->belongsTo(JenisAsetLainnya::class, 'id_jenis_aset_lainnya');
    }
}
