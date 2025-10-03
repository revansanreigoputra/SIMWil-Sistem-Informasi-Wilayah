<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaPendidikan;

class PendidikanController extends Controller
{
    /**
     * Menampilkan semua data pendidikan.
     */
    public function index()
    {
        return view('pages.potensi.kelembagaan.pendidikan.index');
    }

    /**
     * Form tambah data baru.
     */
    public function create()
    {
        return view('pages.potensi.kelembagaan.pendidikan.create');
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        return view('potensi.kelembagaan.pendidikan.index');
    }

    /**
     * Menampilkan detail data.
     */
    public function show($id)
    {
        return view('pages.potensi.kelembagaan.pendidikan.show');
    }

    /**
     * Form edit data.
     */
    public function edit($id)
    {
        return view('pages.potensi.kelembagaan.pendidikan.edit');
    }

    /**
     * Update data.
     */
    public function update(Request $request, $id)
    {
        return view('potensi.kelembagaan.pendidikan.index');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        return view('potensi.kelembagaan.pendidikan.index');
    }
}
