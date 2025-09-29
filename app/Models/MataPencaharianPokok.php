<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MasterDDK\MataPencaharian;
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
    ];

    // Relasi ke MataPencaharian
    public function mataPencaharian()
    {
        return $this->belongsTo(MataPencaharian::class, 'mata_pencaharian_id');
    }
}
