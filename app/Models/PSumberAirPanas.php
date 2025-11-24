<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Desa;
use App\Models\MasterPotensi\SumberAirPanas;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PSumberAirPanas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
        'pemanfaatan' => 'array',
        'kepemilikan' => 'array',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jenisSumberAirPanas()
    {
        return $this->belongsTo(SumberAirPanas::class, 'jenis_sumber_air_panas_id');
    }
}
