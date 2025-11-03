<?php

namespace App\Http\Controllers;

use App\Models\ApotikHidup;
use App\Models\MasterPerkembangan\KomoditasObat;
use Illuminate\Http\Request;

class ApotikHidupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $apotikHidups = ApotikHidup::with('desa', 'komoditas')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.apotikhidup.index', compact('apotikHidups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $komoditasObats = KomoditasObat::all();
        return view('pages.potensi.sda.apotikhidup.create', compact('komoditasObats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_obat_id' => 'required|exists:komoditas_obat,id',
            'luas_produksi' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
            'jumlah_produksi' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        ApotikHidup::create($data);

        return redirect()->route('apotikhidup.index')->with('success', 'Data apotik hidup berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ApotikHidup $apotikhidup)
    {
        return view('pages.potensi.sda.apotikhidup.show', compact('apotikhidup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApotikHidup $apotikhidup)
    {
        $komoditasObats = KomoditasObat::all();
        return view('pages.potensi.sda.apotikhidup.edit', compact('apotikhidup', 'komoditasObats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApotikHidup $apotikhidup)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'komoditas_obat_id' => 'required|exists:komoditas_obat,id',
            'luas_produksi' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
            'jumlah_produksi' => 'required|numeric|min:0',
        ]);

        $apotikhidup->update($request->all());

        return redirect()->route('apotikhidup.index')->with('success', 'Data apotik hidup berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApotikHidup $apotikhidup)
    {
        $apotikhidup->delete();
        return redirect()->route('apotikhidup.index')->with('success', 'Data apotik hidup berhasil dihapus.');
    }
}