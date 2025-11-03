<?php

namespace App\Http\Controllers;

use App\Models\Klahan;
use Illuminate\Http\Request;

class KlahanController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $klahans = Klahan::with('desa')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.lahan.index', compact('klahans'));
    }

    public function create()
    {
        return view('pages.potensi.sda.lahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'memiliki_kurang_10_ha' => 'required|integer|min:0',
            'memiliki_10_50_ha' => 'required|integer|min:0',
            'memiliki_50_100_ha' => 'required|integer|min:0',
            'memiliki_lebih_100_ha' => 'required|integer|min:0',
            'jml_keluarga_memiliki_tanah' => 'required|integer|min:0',
            'jml_keluarga_tidak_memiliki_tanah' => 'required|integer|min:0',
            'jml_keluarga_petani_tanaman_pangan' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        Klahan::create($data);

        return redirect()->route('lahan.index')->with('success', 'Data kepemilikan lahan berhasil ditambahkan.');
    }

    public function show(Klahan $lahan)
    {
        return view('pages.potensi.sda.lahan.show', compact('lahan'));
    }

    public function edit(Klahan $lahan)
    {
        return view('pages.potensi.sda.lahan.edit', compact('lahan'));
    }

    public function update(Request $request, Klahan $lahan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'memiliki_kurang_10_ha' => 'required|integer|min:0',
            'memiliki_10_50_ha' => 'required|integer|min:0',
            'memiliki_50_100_ha' => 'required|integer|min:0',
            'memiliki_lebih_100_ha' => 'required|integer|min:0',
            'jml_keluarga_memiliki_tanah' => 'required|integer|min:0',
            'jml_keluarga_tidak_memiliki_tanah' => 'required|integer|min:0',
            'jml_keluarga_petani_tanaman_pangan' => 'required|integer|min:0',
        ]);

        $lahan->update($request->all());

        return redirect()->route('lahan.index')->with('success', 'Data kepemilikan lahan berhasil diubah.');
    }

    public function destroy(Klahan $lahan)
    {
        $lahan->delete();
        return redirect()->route('lahan.index')->with('success', 'Data kepemilikan lahan berhasil dihapus.');
    }
}