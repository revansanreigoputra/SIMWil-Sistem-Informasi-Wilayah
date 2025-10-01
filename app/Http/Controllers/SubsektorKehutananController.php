<?php

namespace App\Http\Controllers;

use App\Models\SubsektorKehutanan;
use Illuminate\Http\Request;

class SubsektorKehutananController extends Controller
{
    public function index()
    {
        $kehutanan = SubsektorKehutanan::all();
        return view('pages.perkembangan.produk-domestik.subsektor-kehutanan.index', compact('kehutanan'));
    }

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.subsektor-kehutanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'total_nilai_produksi_tahun_ini' => 'required|numeric',
            'total_nilai_bahan_baku_digunakan' => 'required|numeric',
            'total_nilai_bahan_penolong_digunakan' => 'required|numeric',
            'total_biaya_antara_dihabiskan' => 'required|numeric',
        ]);

        SubsektorKehutanan::create($request->all());
        return redirect()->route('perkembangan.produk-domestik.subsektor-kehutanan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = SubsektorKehutanan::findOrFail($id);
        return view('pages.perkembangan.produk-domestik.subsektor-kehutanan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'total_nilai_produksi_tahun_ini' => 'required|numeric',
            'total_nilai_bahan_baku_digunakan' => 'required|numeric',
            'total_nilai_bahan_penolong_digunakan' => 'required|numeric',
            'total_biaya_antara_dihabiskan' => 'required|numeric',
        ]);

        $item = SubsektorKehutanan::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('perkembangan.produk-domestik.subsektor-kehutanan.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $item = SubsektorKehutanan::findOrFail($id);
        $item->delete();
        return redirect()->route('perkembangan.produk-domestik.subsektor-kehutanan.index')->with('success', 'Data berhasil dihapus');
    }
}
