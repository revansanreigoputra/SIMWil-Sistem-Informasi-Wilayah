<?php

namespace App\Models;

use App\Models\MasterPotensi\Pencemaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KualitasUdara extends Model
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

    public function sumberPencemaran()
    {
        return $this->belongsTo(Pencemaran::class, 'sumber_pencemaran_id');
    }
}
