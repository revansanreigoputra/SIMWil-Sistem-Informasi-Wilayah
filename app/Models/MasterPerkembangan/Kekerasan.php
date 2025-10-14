<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kekerasan extends Model
{
    use HasFactory;

    protected $table = 'kekerasans';
    protected $fillable = ['nama'];
}
