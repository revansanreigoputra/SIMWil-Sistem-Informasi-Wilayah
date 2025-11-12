<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LahanPakanTernak extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
