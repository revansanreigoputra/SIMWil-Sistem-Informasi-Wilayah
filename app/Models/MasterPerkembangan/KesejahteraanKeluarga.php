<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesejahteraanKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kesejahteraan_keluargas';

    protected $fillable = ['nama'];
}
