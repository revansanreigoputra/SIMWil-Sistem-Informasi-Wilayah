<?php

namespace App\Models\LayananSurat;

use Illuminate\Database\Eloquent\Model;

class FormatNomorSurat extends Model
{
   protected $table = 'format_nomor_surats';

    protected $fillable = [
         'kode',
         'nama',
    ];
}
