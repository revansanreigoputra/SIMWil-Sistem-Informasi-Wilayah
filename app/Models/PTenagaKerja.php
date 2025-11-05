<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Desa; // Import Desa model

class PTenagaKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'tenaga_kerja_id',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_total',
        'desa_id',
    ];

    /**
     * Get the desa that owns the PTenagaKerja.
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    /**
     * Get the master tenaga kerja that owns the PTenagaKerja.
     */
    public function tenagaKerja()
    {
        return $this->belongsTo(\App\Models\MasterDDK\TenagaKerja::class);
    }
}
