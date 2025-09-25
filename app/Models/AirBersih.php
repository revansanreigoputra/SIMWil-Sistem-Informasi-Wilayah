<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirBersih extends Model
{
    protected $fillable = [
        'tanggal',
        'sumur_pompa',
        'sumur_gali',
        'hidran_umum',
        'penampung_air_hujan',
        'tangki_air_bersih',
        'embung',
        'mata_air',
        'bangunan_pengolahan_air',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'sumur_pompa' => 'integer',
        'sumur_gali' => 'integer',
        'hidran_umum' => 'integer',
        'penampung_air_hujan' => 'integer',
        'tangki_air_bersih' => 'integer',
        'embung' => 'integer',
        'mata_air' => 'integer',
        'bangunan_pengolahan_air' => 'integer',
    ];

    public function getTotalPrasaranaAttribute()
    {
        return $this->sumur_pompa + $this->sumur_gali + $this->hidran_umum +
               $this->penampung_air_hujan + $this->tangki_air_bersih +
               $this->embung + $this->mata_air + $this->bangunan_pengolahan_air;
    }
}