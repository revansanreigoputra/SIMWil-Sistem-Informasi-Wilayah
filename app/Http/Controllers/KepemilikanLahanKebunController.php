<?php

namespace App\Http\Controllers;

use App\Models\KepemilikanLahanKebun;
use Illuminate\Http\Request;

class KepemilikanLahanKebunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $kepemilikanLahanKebuns = KepemilikanLahanKebun::with('desa')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.kebun.index', compact('kepemilikanLahanKebuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.sda.kebun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'memiliki_kurang_dari_5_ha' => 'required|numeric|min:0',
            'memiliki_10_50_ha' => 'required|numeric|min:0',
            'memiliki_50_100_ha' => 'required|numeric|min:0',
            'memiliki_100_500_ha' => 'required|numeric|min:0',
            'memiliki_500_1000_ha' => 'required|numeric|min:0',
            'memiliki_lebih_dari_1000_ha' => 'required|numeric|min:0',
            'jumlah_keluarga_memiliki_tanah' => 'required|integer|min:0',
            'jumlah_keluarga_tidak_memiliki_tanah' => 'required|integer|min:0',
            'jumlah_keluarga_petani_perkebunan' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        KepemilikanLahanKebun::create($data);

        return redirect()->route('kebun.index')->with('success', 'Data Kepemilikan Lahan Kebun berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KepemilikanLahanKebun $kebun)
    {
        return view('pages.potensi.sda.kebun.show', ['kepemilikan' => $kebun]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KepemilikanLahanKebun $kebun)
    {
        return view('pages.potensi.sda.kebun.edit', ['kepemilikan' => $kebun]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KepemilikanLahanKebun $kebun)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'memiliki_kurang_dari_5_ha' => 'required|numeric|min:0',
            'memiliki_10_50_ha' => 'required|numeric|min:0',
            'memiliki_50_100_ha' => 'required|numeric|min:0',
            'memiliki_100_500_ha' => 'required|numeric|min:0',
            'memiliki_500_1000_ha' => 'required|numeric|min:0',
            'memiliki_lebih_dari_1000_ha' => 'required|numeric|min:0',
            'jumlah_keluarga_memiliki_tanah' => 'required|integer|min:0',
            'jumlah_keluarga_tidak_memiliki_tanah' => 'required|integer|min:0',
            'jumlah_keluarga_petani_perkebunan' => 'required|integer|min:0',
        ]);

        $kebun->update($request->all());

        return redirect()->route('kebun.index')->with('success', 'Data Kepemilikan Lahan Kebun berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KepemilikanLahanKebun $kebun)
    {
        $kebun->delete();
        return redirect()->route('kebun.index')->with('success', 'Data Kepemilikan Lahan Kebun berhasil dihapus.');
    }
}