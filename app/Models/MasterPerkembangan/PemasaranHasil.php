<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasaranHasil extends Model
{
    use HasFactory;

    protected $table = 'pemasaran_hasil';

    protected $fillable = ['nama'];
}
