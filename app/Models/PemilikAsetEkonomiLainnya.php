<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterPerkembangan\AsetLainnya;

class PemilikAsetEkonomiLainnya extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_desa',
        'id_aset_lainnya',
        'tanggal',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function asetLainnya()
    {
        return $this->belongsTo(AsetLainnya::class, 'id_aset_lainnya');
    }
}
