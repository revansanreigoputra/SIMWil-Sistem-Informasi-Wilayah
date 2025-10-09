<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\JasaPengangkutan;


class PengangkutanController extends Controller
{
    /**
     * Menampilkan daftar usaha jasa pengangkutan.
     */
    public function index()
    {
        return view('pages.potensi.kelembagaan.pengangkutan.index');
    }

    /**
     * Form tambah data pengangkutan.
     */
    public function create()
    {
        return view('pages.potensi.kelembagaan.pengangkutan.create');
    }

    /**
     * Simpan data pengangkutan baru.
     */
    public function store(Request $request)
    {
        return view('potensi.kelembagaan.pengangkutan.index');
    }

    /**
     * Tampilkan detail data pengangkutan.
     */
    public function show($id)
    {
        return view('pages.potensi.kelembagaan.pengangkutan.show');
    }

    /**
     * Form edit data pengangkutan.
     */
    public function edit($id)
    {
        return view('pages.potensi.kelembagaan.pengangkutan.edit');
    }

    /**
     * Update data pengangkutan.
     */
    public function update(Request $request, $id)
    {
        return view('potensi.kelembagaan.pengangkutan.index');
    }

    /**
     * Hapus data pengangkutan.
     */
    public function destroy($id)
    {
        return view('potensi.kelembagaan.pengangkutan.index');
    }
}
