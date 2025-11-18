<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Desa;

class JasaPengangkutan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'desa_id',
        'tanggal',
        'kategori',
        'jenis_angkutan',
        'jumlah_unit',
        'jumlah_pemilik',
        'kapasitas',
        'tenaga_kerja',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}