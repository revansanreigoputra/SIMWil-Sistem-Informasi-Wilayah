<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Desa;
use App\Models\MasterPotensi\AlatProduksiIkanLaut;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PAlatProduksiIkanLaut extends Model
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

    public function alatProduksiIkanLaut()
    {
        return $this->belongsTo(AlatProduksiIkanLaut::class);
    }
}
