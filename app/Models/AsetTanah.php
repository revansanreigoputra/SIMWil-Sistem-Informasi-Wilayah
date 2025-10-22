<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetTanah extends Model
{
    use HasFactory;

    protected $table = 'aset_tanahs'; // 🔥 ini kunci utamanya

    protected $fillable = [
        'id_desa',
        'tanggal',
        'tidak_memiliki',
        'tanah1',
        'tanah2',
        'tanah3',
        'tanah4',
        'tanah5',
        'tanah6',
        'tanah7',
        'tanah8',
        'tanah9',
        'tanah10',
        'tanah11',
        'memiliki_lebih',
        'jumlah',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
