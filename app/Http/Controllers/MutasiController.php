<?php

namespace App\Http\Controllers;
use App\Models\AnggotaKeluarga;
use Illuminate\Http\Request;
use App\Models\Mutasi;
use Illuminate\Support\Facades\Auth;

class MutasiController extends Controller
{
    public function index()
    {
        // Mengambil semua Anggota Keluarga yang statusnya bukan 'hidup'
        $mutasiRecords = AnggotaKeluarga::where('status_kehidupan', '!=', 'hidup')
            ->orderBy('tanggal_mutasi', 'desc')
            ->with('dataKeluarga') // Load relasi KK
            ->get();

        return view('pages.mutasi.index', compact('mutasiRecords'));
    }

    public function show($id)
    {
        $record = AnggotaKeluarga::where('status_kehidupan', '!=', 'hidup')
            ->with('dataKeluarga')
            ->findOrFail($id);

        return view('pages.mutasi.show', compact('record'));
    }

     public function create()
     {
         return view('pages.mutasi.create');
     }
     

}
