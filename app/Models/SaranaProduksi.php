<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaProduksi extends Model
{
    use HasFactory;

    protected $table = 'sarana_produksis';

    protected $fillable = [
        'desa_id',
        'tanggal',
        'produksi1',
        'produksi2',
        'produksi3',
        'produksi4',
        'produksi5',
        'produksi6',
        'produksi7',
        'produksi8',
        'produksi9',
        'produksi10',
        'produksi11',
        'produksi12',
        'produksi13',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
