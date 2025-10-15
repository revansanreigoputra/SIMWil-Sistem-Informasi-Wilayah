<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkelahian extends Model
{
    use HasFactory;

    protected $table = 'perkelahian';

    protected $fillable = ['nama'];
}
