<?php

namespace App\Models\MasterDDK;

use Illuminate\Database\Eloquent\Model;

class HubunganKeluarga extends Model
{
     
    protected $table = 'hubungan_keluarga';
 
    protected $fillable = [
        'nama',
    ];
}
