<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\Hiburan; 

class HiburanController extends Controller
{
    /**
     * Menampilkan daftar usaha hiburan
     */
    public function index(Request $request)
    {
        return view('pages.potensi.kelembagaan.Hiburan.index');
    }

    /**
     * Menampilkan detail usaha hiburan
     */
    public function show($id)
    {
        return view('pages.potensi.kelembagaan.Hiburan.show');
    }

    /**
     * Form tambah data
     */
    public function create()
    {
        return view('pages.potensi.kelembagaan.Hiburan.create');
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
       return view('potensi.kelembagaan.hiburan.index');
    }

    /**
     * Form edit data
     */
    public function edit($id)
    {
        return view('pages.potensi.kelembagaan.Hiburan.edit');
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        return view('potensi.kelembagaan.hiburan.index');
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        return view('potensi.kelembagaan.hiburan.index');
    }
}
