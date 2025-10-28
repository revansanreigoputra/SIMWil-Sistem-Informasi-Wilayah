<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatPendidikanMasyarakat extends Model
{
    use HasFactory;

    protected $table = 'tingkat_pendidikan_masyarakats';

    protected $fillable = [
        'desa_id',
        'tahun',
        'tanggal',
        'tidak_tamat_sd',
        'sd',
        'sltp',
        'slta',
        'diploma',
        'sarjana',
        'p_buta',
        'p_tamat',
        'p_cacat',
    ];

    /**
     * Relasi ke Desa
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
