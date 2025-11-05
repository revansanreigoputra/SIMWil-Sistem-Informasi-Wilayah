<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorIndustriKecil extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'tanggal',
        'mata_pencaharian_id',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

   public function mataPencaharian()
{
    return $this->belongsTo(\App\Models\MasterDDK\MataPencaharian::class, 'mata_pencaharian_id');
}

}
