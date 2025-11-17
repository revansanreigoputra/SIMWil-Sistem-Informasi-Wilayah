<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterDDK\MataPencaharian;

class SektorIndustriMenengahBesar extends Model
{
    use HasFactory;

    protected $table = 'sektor_industri_menengah_besar';

    protected $fillable = [
        'desa_id',
        'mata_pencaharian_id',
        'tanggal',
        'jumlah'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function mataPencaharian()
    {
        return $this->belongsTo(MataPencaharian::class, 'mata_pencaharian_id');
    }
}
