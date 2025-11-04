<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepemilikanLahanHutan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'desa_id',
        'milik_negara',
        'milik_adat_ulayat',
        'perhutani_instansi_sektoral',
        'milik_masyarakat_perorangan',
        'luas_hutan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}