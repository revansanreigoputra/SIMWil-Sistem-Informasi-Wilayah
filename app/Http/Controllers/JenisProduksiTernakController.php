<?php

namespace App\Http\Controllers;

use App\Models\JenisProduksiTernak;
use Illuminate\Http\Request;

class JenisProduksiTernakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisProduksiTernaks = JenisProduksiTernak::all();
        return view('jenis_produksi_ternak.index', compact('jenisProduksiTernaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_produksi_ternak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        JenisProduksiTernak::create($request->all());

        return redirect()->route('jenis_produksi_ternak.index')
                         ->with('success', 'Jenis Produksi Ternak created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisProduksiTernak $jenisProduksiTernak)
    {
        return view('jenis_produksi_ternak.show', compact('jenisProduksiTernak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisProduksiTernak $jenisProduksiTernak)
    {
        return view('jenis_produksi_ternak.edit', compact('jenisProduksiTernak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisProduksiTernak $jenisProduksiTernak)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenisProduksiTernak->update($request->all());

        return redirect()->route('jenis_produksi_ternak.index')
                         ->with('success', 'Jenis Produksi Ternak updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisProduksiTernak $jenisProduksiTernak)
    {
        $jenisProduksiTernak->delete();

        return redirect()->route('jenis_produksi_ternak.index')
                         ->with('success', 'Jenis Produksi Ternak deleted successfully.');
    }
}
