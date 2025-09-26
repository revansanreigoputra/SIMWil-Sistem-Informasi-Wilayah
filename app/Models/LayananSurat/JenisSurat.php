<?php

namespace App\Models\LayananSurat;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
     protected $table = 'Jenis_surats';

     protected $fillable = [
          'kode',
          'nama', 
          'konten_template', 
     ];
}
