<?php

namespace App\Models;

use App\Models\Desa;
use App\Models\MasterPotensi\NamaIkan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PNamaIkan extends Model
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

    public function namaIkan()
    {
        return $this->belongsTo(NamaIkan::class);
    }
}
