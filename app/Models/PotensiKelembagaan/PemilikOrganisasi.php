<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemilikOrganisasi extends Model
{
     use HasFactory;

    protected $table = 'pemilik_organisasi';

    protected $fillable = [
        'nama',
    ];

    public function lembagaKeamanan()
    {
        return $this->hasMany(LembagaKeamanan::class);
    }
}
