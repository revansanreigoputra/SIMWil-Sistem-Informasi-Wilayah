<?php

namespace App\Http\Controllers;
use App\Models\AnggotaKeluarga;  
use Illuminate\Http\Request;
use App\Models\DataKeluarga; 

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKeluargas = DataKeluarga::with(['desas', 'kecamatans'])->get();
        return view('data_keluarga.index', compact('dataKeluargas'));
    }
     
}
