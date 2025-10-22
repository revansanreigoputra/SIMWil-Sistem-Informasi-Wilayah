<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaKeamanan;

class LembagaKeamananController extends Controller
{
    public function index()
    {
        return view('pages.potensi.kelembagaan.keamanan.index');
    }

    public function create()
    {
        return view('pages.potensi.kelembagaan.keamanan.create');
    }

    public function store(Request $request)
    {
        return view('potensi.kelembagaan.keamanan.index');
    }

    public function edit($id)
    {
        return view('pages.potensi.kelembagaan.keamanan.edit');
    }

    public function update(Request $request, $id)
    {
        return view('potensi.kelembagaan.keamanan.index');
    }

    public function destroy($id)
    {
        return view('potensi.kelembagaan.keamanan.index');  
    }
    public function show($id)
    {
        $keamanan = LembagaKeamanan::findOrFail($id);

        return view('pages.potensi.kelembagaan.keamanan.show');
    }
}
