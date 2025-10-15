<?php

namespace App\Models\MasterPerkembangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesejahteraanKeluargaMaster extends Model
{
    use HasFactory;

    protected $table = 'kesejahteraan_keluarga_masters';

    protected $fillable = ['nama'];
}