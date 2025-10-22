<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KebiasaanBerobat extends Model
{
    use HasFactory;

    protected $table = 'kebiasaan_berobats';

    protected $fillable = ['nama'];
}
