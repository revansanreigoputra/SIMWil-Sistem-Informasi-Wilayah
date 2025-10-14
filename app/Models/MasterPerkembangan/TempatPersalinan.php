<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TempatPersalinan extends Model
{
    use HasFactory;

    protected $table = 'tempat_persalinan';

    protected $fillable = ['nama'];
}
