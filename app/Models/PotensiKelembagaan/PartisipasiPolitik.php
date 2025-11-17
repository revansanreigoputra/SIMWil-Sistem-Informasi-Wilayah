<?php

namespace App\Models\PotensiKelembagaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartisipasiPolitik extends Model
{
    use HasFactory;

    protected $table = 'partisipasi_politik';

    protected $fillable = [
        'nama',
    ];

    public function kelembagaanPartisipasiPolitik()
    {
        return $this->hasMany(\App\Models\PotensiKelembagaan\KelembagaanPartisipasiPolitik::class, 'partisipasi_politik_id');
    }
}
