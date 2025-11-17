<?php

namespace App\Http\Controllers;

use App\Models\KepemilikanLahanHutan;
use Illuminate\Http\Request;

class KepemilikanLahanHutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $hutans = KepemilikanLahanHutan::with('desa')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.hutan.index', compact('hutans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.sda.hutan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'milik_negara' => 'required|numeric|min:0',
            'milik_adat_ulayat' => 'required|numeric|min:0',
            'perhutani_instansi_sektoral' => 'required|numeric|min:0',
            'milik_masyarakat_perorangan' => 'required|numeric|min:0',
            'luas_hutan' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        KepemilikanLahanHutan::create($data);

        return redirect()->route('hutan.index')->with('success', 'Data Kepemilikan Lahan Hutan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KepemilikanLahanHutan $hutan)
    {
        return view('pages.potensi.sda.hutan.show', compact('hutan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KepemilikanLahanHutan $hutan)
    {
        return view('pages.potensi.sda.hutan.edit', compact('hutan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KepemilikanLahanHutan $hutan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'milik_negara' => 'required|numeric|min:0',
            'milik_adat_ulayat' => 'required|numeric|min:0',
            'perhutani_instansi_sektoral' => 'required|numeric|min:0',
            'milik_masyarakat_perorangan' => 'required|numeric|min:0',
            'luas_hutan' => 'required|numeric|min:0',
        ]);

        $hutan->update($request->all());

        return redirect()->route('hutan.index')->with('success', 'Data Kepemilikan Lahan Hutan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KepemilikanLahanHutan $hutan)
    {
        $hutan->delete();
        return redirect()->route('hutan.index')->with('success', 'Data Kepemilikan Lahan Hutan berhasil dihapus.');
    }
}