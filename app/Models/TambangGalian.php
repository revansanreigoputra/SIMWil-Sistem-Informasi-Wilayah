<?php
// app/Models/TambangGalian.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TambangGalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'total_nilai_produksi',
        'total_nilai_bahan_baku',
        'total_nilai_bahan_penolong',
        'total_biaya_antara',
        'jumlah_jenis_bahan_tambang'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'total_nilai_produksi' => 'decimal:2',
        'total_nilai_bahan_baku' => 'decimal:2',
        'total_nilai_bahan_penolong' => 'decimal:2',
        'total_biaya_antara' => 'decimal:2',
    ];
}