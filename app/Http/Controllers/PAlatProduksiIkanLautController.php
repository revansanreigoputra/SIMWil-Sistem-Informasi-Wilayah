<?php

namespace App\Http\Controllers;

use App\Models\PAlatProduksiIkanLaut;
use App\Models\MasterPotensi\AlatProduksiIkanLaut;
use Illuminate\Http\Request;

class PAlatProduksiIkanLautController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $pAlatProduksiIkanLauts = PAlatProduksiIkanLaut::with(['desa', 'alatProduksiIkanLaut'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();
        return view('pages.potensi.sda.alat-produksi-ikan-laut.index', compact('pAlatProduksiIkanLauts'));
    }

    public function create()
    {
        $alatProduksiIkanLauts = AlatProduksiIkanLaut::all();
        return view('pages.potensi.sda.alat-produksi-ikan-laut.create', compact('alatProduksiIkanLauts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'alat_produksi_ikan_laut_id' => 'required|exists:alat_produksi_ikan_laut,id',
            'jumlah_alat_luas' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        PAlatProduksiIkanLaut::create($data);

        return redirect()->route('p-alat-produksi-ikan-laut.index')->with('success', 'Data alat produksi ikan laut berhasil ditambahkan.');
    }

    public function show(PAlatProduksiIkanLaut $pAlatProduksiIkanLaut)
    {
        return view('pages.potensi.sda.alat-produksi-ikan-laut.show', compact('pAlatProduksiIkanLaut'));
    }

    public function edit(PAlatProduksiIkanLaut $pAlatProduksiIkanLaut)
    {
        $alatProduksiIkanLauts = AlatProduksiIkanLaut::all();
        return view('pages.potensi.sda.alat-produksi-ikan-laut.edit', compact('pAlatProduksiIkanLaut', 'alatProduksiIkanLauts'));
    }

    public function update(Request $request, PAlatProduksiIkanLaut $pAlatProduksiIkanLaut)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'alat_produksi_ikan_laut_id' => 'required|exists:alat_produksi_ikan_laut,id',
            'jumlah_alat_luas' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
        ]);

        $pAlatProduksiIkanLaut->update($request->all());

        return redirect()->route('p-alat-produksi-ikan-laut.index')->with('success', 'Data alat produksi ikan laut berhasil diubah.');
    }

    public function destroy(PAlatProduksiIkanLaut $pAlatProduksiIkanLaut)
    {
        $pAlatProduksiIkanLaut->delete();
        return redirect()->route('p-alat-produksi-ikan-laut.index')->with('success', 'Data alat produksi ikan laut berhasil dihapus.');
    }
}
