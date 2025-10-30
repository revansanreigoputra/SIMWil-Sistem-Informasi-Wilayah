<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembunuhan extends Model
{
    use HasFactory;

    protected $table = 'pembunuhan';

    protected $fillable = ['nama'];
}
