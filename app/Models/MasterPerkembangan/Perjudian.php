<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjudian extends Model
{
    use HasFactory;

    protected $table = 'perjudian';

    protected $fillable = ['nama'];
}
