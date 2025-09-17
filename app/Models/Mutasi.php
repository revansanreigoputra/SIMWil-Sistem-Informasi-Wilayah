<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    // Tentukan kolom mana saja yang boleh diisi secara massal
    protected $table = 'mutasi';
    protected $fillable = [
        'nik',
        'nomor',
        'tanggal',
        'jenis',
        'penyebab',
        'kecamatan',
        'desa',
        // tambahkan kolom lain jika ada
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date', // Otomatis mengubah kolom tanggal menjadi objek Carbon
    ];
}
