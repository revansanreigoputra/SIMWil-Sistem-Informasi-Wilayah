<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\MasterPotensi\AreaWisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $wisatas = Wisata::with('desa', 'areaWisata')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.wisata.index', compact('wisatas'));
    }

    public function create()
    {
        $areaWisatas = AreaWisata::all();
        return view('pages.potensi.sda.wisata.create', compact('areaWisatas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'area_wisata_id' => 'required|exists:area_wisata,id',
            'keberadaan' => 'required|in:ada,tidak ada',
            'luas_m2' => 'required|numeric|min:0',
            'tingkat_pemanfaatan' => 'required|in:aktif,pasif',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        Wisata::create($data);

        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil ditambahkan.');
    }

    public function show(Wisata $wisata)
    {
        return view('pages.potensi.sda.wisata.show', compact('wisata'));
    }

    public function edit(Wisata $wisata)
    {
        $areaWisatas = AreaWisata::all();
        return view('pages.potensi.sda.wisata.edit', compact('wisata', 'areaWisatas'));
    }

    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'area_wisata_id' => 'required|exists:area_wisata,id',
            'keberadaan' => 'required|in:ada,tidak ada',
            'luas_m2' => 'required|numeric|min:0',
            'tingkat_pemanfaatan' => 'required|in:aktif,pasif',
        ]);

        $wisata->update($request->all());

        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil diubah.');
    }

    public function destroy(Wisata $wisata)
    {
        $wisata->delete();
        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil dihapus.');
    }
}
