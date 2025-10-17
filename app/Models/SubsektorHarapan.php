<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsektorHarapan extends Model
{
    use HasFactory;

    protected $table = 'subsektor_harapans';

    protected $fillable = [
        'tanggal',
        'angka_harapan_hidup_desa',
        'angka_harapan_hidup_kabupaten',
        'angka_harapan_hidup_provinsi',
        'angka_harapan_hidup_nasional',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
