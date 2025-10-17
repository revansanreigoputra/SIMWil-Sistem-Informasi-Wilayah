<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganAir extends Model
{
    use HasFactory;

    protected $table = 'keterangan_airs';

    protected $fillable = ['nama'];
}
