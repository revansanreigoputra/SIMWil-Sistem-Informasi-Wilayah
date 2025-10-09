<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaKemasyarakatan;

class KemasyarakatanController extends Controller
{
    /**
     * Tampilkan semua data kemasyarakatan.
     */
    public function index()
    {
        return view('pages.potensi.kelembagaan.kemasyarakatan.index');
    }

    /**
     * Form tambah data.
     */
    public function create()
    {
        return view('pages.potensi.kelembagaan.kemasyarakatan.create');
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        return view('potensi.kelembagaan.kemasyarakatan.index');
    }

    /**
     * Detail data.
     */
    public function show($id)
    {
        return view('pages.potensi.kelembagaan.kemasyarakatan.show');
    }

    /**
     * Form edit data.
     */
    public function edit($id)
    {
        return view('pages.potensi.kelembagaan.kemasyarakatan.edit');
    }


    /**
     * Update data.
     */
    public function update(Request $request, $id)
    {
        return view('potensi.kelembagaan.kemasyarakatan.index');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        return view('potensi.kelembagaan.kemasyarakatan.index');
    }
}  