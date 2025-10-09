<?php

namespace App\Http\Controllers\LayananSurat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LayananSurat\Permohonan;
use App\Models\LayananSurat\KopTemplate;
class LaporanSuratController extends Controller

{

     public function index()
     {
         $permohonans = Permohonan::all();
          $groupedKopTemplates = KopTemplate::with('jenisSurats')->get();
         return view('pages.layanan.laporan.index', compact('permohonans', 'groupedKopTemplates'));
     }
}