<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusGiziBalita extends Model
{
    use HasFactory;

    protected $table = 'status_gizi_balita';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'bergizi_buruk',
        'bergizi_baik',
        'bergizi_kurang',
        'bergizi_lebih',
        'jumlah_balita',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
