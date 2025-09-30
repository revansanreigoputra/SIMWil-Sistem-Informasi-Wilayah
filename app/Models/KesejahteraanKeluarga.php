<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesejahteraanKeluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'prasejahtera',
        'sejahtera1',
        'sejahtera2',
        'sejahtera3',
        'sejahteraplus',
    ];
}
