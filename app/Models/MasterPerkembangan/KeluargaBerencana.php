<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaBerencana extends Model
{
    use HasFactory;

    protected $table = 'keluarga_berencanas';

    protected $fillable = ['nama'];
}
