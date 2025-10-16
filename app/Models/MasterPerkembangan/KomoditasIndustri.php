<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasIndustri extends Model
{
    use HasFactory;

    protected $table = 'komoditas_industri';

    protected $fillable = ['nama'];
}
