<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaAdat;

class LembagaAdatController extends Controller
{
    /**
     * Menampilkan daftar lembaga adat.
     */
    public function index()
    {
        return view('pages.potensi.kelembagaan.adat.index');
    }

    /**
     * Menampilkan form create lembaga adat.
     */
    public function create()
    {
        return view('pages.potensi.kelembagaan.adat.create');
    }

    /**
     * Simpan data baru lembaga adat.
     */
    public function store(Request $request)
    {
        return view('potensi.kelembagaan.adat.index');
    }

    /**
     * Tampilkan detail lembaga adat.
     */
    public function show($id)
    {
        return view('pages.potensi.kelembagaan.adat.show');
    }

    /**
     * Tampilkan form edit lembaga adat.
     */
    public function edit($id)
    {
        return view('pages.potensi.kelembagaan.adat.edit');
    }

    /**
     * Update data lembaga adat.
     */
    public function update(Request $request, $id)
    {
        return view('potensi.kelembagaan.adat.index');
    }

    /**
     * Hapus data lembaga adat.
     */
    public function destroy($id)
    {
        return view('potensi.kelembagaan.adat.index');
    }
}
