<?php

namespace App\Models\MasterDDK;
use App\Models\AnggotaKeluarga;
use Illuminate\Database\Eloquent\Model;

class MataPencaharian extends Model
{
    protected $table = 'mata_pencaharians';

    protected $fillable = [
        'mata_pencaharian',
        'keterangan',
    ];
    public function anggotaKeluargas()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'mata_pencaharian_id');
    }
}
