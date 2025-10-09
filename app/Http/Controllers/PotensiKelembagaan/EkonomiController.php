<?php

namespace App\Http\Controllers\PotensiKelembagaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PotensiKelembagaan\LembagaEkonomi;

class EkonomiController extends Controller
{
    public function index()
    {
        return view('pages.potensi.kelembagaan.ekonomi.index');
    }

    public function create()
    {
        return view('pages.potensi.kelembagaan.ekonomi.create');
    }

    public function store(Request $request)
    {
        return view('potensi.kelembagaan.ekonomi.index');
    }

    public function edit($id)
    {
        return view('pages.potensi.kelembagaan.ekonomi.edit');
    }

    public function update(Request $request, $id)
    {
        return view('potensi.kelembagaan.ekonomi.index');
    }

    public function destroy($id)
    {
        return view('potensi.kelembagaan.ekonomi.index');
    }
    public function show($id)
    {
         return view('pages.potensi.kelembagaan.ekonomi.show');
    }

}
