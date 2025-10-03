<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;

class KelembagaanController extends Controller
{
    // Tampilkan daftar lembaga pemerintah (frontend statis)
    public function index()
    {
        return view('pages.potensi.kelembagaan.pemerintah.index');
    }

    // Tampilkan form create (frontend statis)
    public function create()
    {
        return view('pages.potensi.kelembagaan.pemerintah.create');
    }

    // Tampilkan form edit (frontend statis)
    public function edit($id)
    {
        return view('pages.potensi.kelembagaan.pemerintah.edit');
    }

    // Tampilkan detail (frontend statis)
    public function show($id)
    {
        return view('pages.potensi.kelembagaan.pemerintah.show');
    }

    // Hapus data (hanya tampilan frontend, tidak ada logika)
    public function destroy($id)
    {
        return redirect()->route('potensi.kelembagaan.pemerintah.index');
    }
}
