<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MasterDDK\MataPencaharian;
use App\Models\Desa; // Import the Desa model
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataPencaharianPokok extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'mata_pencaharian_id',
        'laki_laki',
        'perempuan',
        'total',
        'desa_id', // Add desa_id to fillable
    ];

    // Relasi ke MataPencaharian
    public function mataPencaharian()
    {
        return $this->belongsTo(MataPencaharian::class, 'mata_pencaharian_id');
    }

    // Relasi ke Desa
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
