<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penculikan extends Model
{
    use HasFactory;

    protected $table = 'penculikan';

    protected $fillable = ['nama'];
}
