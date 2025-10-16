<?php

namespace App\Http\Controllers;

use App\Models\JenisTransportasi;
use Illuminate\Http\Request;

class JenisTransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisTransportasi $jenisTransportasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisTransportasi $jenisTransportasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisTransportasi $jenisTransportasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisTransportasi $jenisTransportasi)
    {
        //
    }
    public function getByKategori($kategori_id)
    {
        $jenis = \App\Models\JenisTransportasi::where('kategori_id', $kategori_id)->get();
        return response()->json($jenis);
    }
}
