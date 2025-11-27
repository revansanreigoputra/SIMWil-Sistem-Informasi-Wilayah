<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\MasterPotensi\JenisPotensiAir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SumberDayaAir extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jenisPotensiAir()
    {
        return $this->belongsTo(JenisPotensiAir::class);
    }
}
