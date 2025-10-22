<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetDinding extends Model
{
    use HasFactory;

    protected $table = 'aset_dindings';
    protected $fillable = ['nama'];
}
