<?php

namespace App\Http\Controllers;

use App\Models\PAlatProduksiIkanTawar;
use App\Models\MasterPotensi\AlatProduksiIkanTawar;
use Illuminate\Http\Request;

class PAlatProduksiIkanTawarController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $pAlatProduksiIkanTawars = PAlatProduksiIkanTawar::with(['desa', 'alatProduksiIkanTawar'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();
        return view('pages.potensi.sda.alat-produksi-ikan-tawar.index', compact('pAlatProduksiIkanTawars'));
    }

    public function create()
    {
        $alatProduksiIkanTawars = AlatProduksiIkanTawar::all();
        return view('pages.potensi.sda.alat-produksi-ikan-tawar.create', compact('alatProduksiIkanTawars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'alat_produksi_ikan_tawar_id' => 'required|exists:alat_produksi_ikan_tawar,id',
            'jumlah_alat_luas' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        PAlatProduksiIkanTawar::create($data);

        return redirect()->route('p-alat-produksi-ikan-tawar.index')->with('success', 'Data alat produksi ikan tawar berhasil ditambahkan.');
    }

    public function show(PAlatProduksiIkanTawar $pAlatProduksiIkanTawar)
    {
        return view('pages.potensi.sda.alat-produksi-ikan-tawar.show', compact('pAlatProduksiIkanTawar'));
    }

    public function edit(PAlatProduksiIkanTawar $pAlatProduksiIkanTawar)
    {
        $alatProduksiIkanTawars = AlatProduksiIkanTawar::all();
        return view('pages.potensi.sda.alat-produksi-ikan-tawar.edit', compact('pAlatProduksiIkanTawar', 'alatProduksiIkanTawars'));
    }

    public function update(Request $request, PAlatProduksiIkanTawar $pAlatProduksiIkanTawar)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'alat_produksi_ikan_tawar_id' => 'required|exists:alat_produksi_ikan_tawar,id',
            'jumlah_alat_luas' => 'required|numeric|min:0',
            'hasil_produksi' => 'required|numeric|min:0',
        ]);

        $pAlatProduksiIkanTawar->update($request->all());

        return redirect()->route('p-alat-produksi-ikan-tawar.index')->with('success', 'Data alat produksi ikan tawar berhasil diubah.');
    }

    public function destroy(PAlatProduksiIkanTawar $pAlatProduksiIkanTawar)
    {
        $pAlatProduksiIkanTawar->delete();
        return redirect()->route('p-alat-produksi-ikan-tawar.index')->with('success', 'Data alat produksi ikan tawar berhasil dihapus.');
    }
}
