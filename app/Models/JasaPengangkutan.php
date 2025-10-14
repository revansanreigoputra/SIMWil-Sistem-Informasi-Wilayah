<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaPengangkutan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tanggal',
        'kategori',
        'jenis_angkutan',
        'jumlah_unit',
        'jumlah_pemilik',
        'kapasitas',
        'tenaga_kerja',
    ];
}