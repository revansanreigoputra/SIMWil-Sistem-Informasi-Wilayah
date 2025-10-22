<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencurian extends Model
{
    use HasFactory;

    protected $table = 'pencurian';

    protected $fillable = ['nama'];
}
