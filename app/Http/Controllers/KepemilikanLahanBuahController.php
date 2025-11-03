<?php

namespace App\Http\Controllers;

use App\Models\KepemilikanLahanBuah;
use Illuminate\Http\Request;

class KepemilikanLahanBuahController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $kepemilikanLahanBuahs = KepemilikanLahanBuah::with('desa')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.kepemilikan.index', compact('kepemilikanLahanBuahs'));
    }

    public function create()
    {
        return view('pages.potensi.sda.kepemilikan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'memiliki_kurang_10' => 'required|numeric|min:0',
            'memiliki_10_50' => 'required|numeric|min:0',
            'memiliki_50_100' => 'required|numeric|min:0',
            'memiliki_100_500' => 'required|numeric|min:0',
            'memiliki_500_1000' => 'required|numeric|min:0',
            'memiliki_lebih_1000' => 'required|numeric|min:0',
            'jumlah_keluarga_memiliki_tanah' => 'required|numeric|min:0',
            'jumlah_keluarga_tidak_memiliki_tanah' => 'required|numeric|min:0',
            'jumlah_keluarga_petani_buah' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        KepemilikanLahanBuah::create($data);

        return redirect()->route('kepemilikan.index')->with('success', 'Data kepemilikan lahan buah berhasil ditambahkan.');
    }

    public function show(KepemilikanLahanBuah $kepemilikan)
    {
        return view('pages.potensi.sda.kepemilikan.show', compact('kepemilikan'));
    }

    public function edit(KepemilikanLahanBuah $kepemilikan)
    {
        return view('pages.potensi.sda.kepemilikan.edit', compact('kepemilikan'));
    }

    public function update(Request $request, KepemilikanLahanBuah $kepemilikan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'memiliki_kurang_10' => 'required|numeric|min:0',
            'memiliki_10_50' => 'required|numeric|min:0',
            'memiliki_50_100' => 'required|numeric|min:0',
            'memiliki_100_500' => 'required|numeric|min:0',
            'memiliki_500_1000' => 'required|numeric|min:0',
            'memiliki_lebih_1000' => 'required|numeric|min:0',
            'jumlah_keluarga_memiliki_tanah' => 'required|numeric|min:0',
            'jumlah_keluarga_tidak_memiliki_tanah' => 'required|numeric|min:0',
            'jumlah_keluarga_petani_buah' => 'required|numeric|min:0',
        ]);

        $kepemilikan->update($request->all());

        return redirect()->route('kepemilikan.index')->with('success', 'Data kepemilikan lahan buah berhasil diubah.');
    }

    public function destroy(KepemilikanLahanBuah $kepemilikan)
    {
        $kepemilikan->delete();
        return redirect()->route('kepemilikan.index')->with('success', 'Data kepemilikan lahan buah berhasil dihapus.');
    }
}