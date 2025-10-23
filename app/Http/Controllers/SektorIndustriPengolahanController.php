<?php

namespace App\Http\Controllers;

use App\Models\SektorIndustriPengolahan;
use Illuminate\Http\Request;

class SektorIndustriPengolahanController extends Controller
{
    public function index()
{
    $sektors = SektorIndustriPengolahan::latest()->get();
    return view('pages.perkembangan.produk-domestik.sektor-industri-pengolahan.index', compact('sektors'));
}

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.sektor-industri-pengolahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_industri' => 'required|string|max:255',
            'nilai_produksi' => 'required|integer',
            'nilai_bahan_baku' => 'required|integer',
            'nilai_bahan_penolong' => 'required|integer',
            'biaya_antara' => 'required|integer',
            'jumlah_jenis_industri' => 'required|integer',
        ]);

        SektorIndustriPengolahan::create($request->all());

        return redirect()->route('perkembangan.produk-domestik.sektor-industri-pengolahan.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sektor = SektorIndustriPengolahan::findOrFail($id);
        return view('pages.perkembangan.produk-domestik.sektor-industri-pengolahan.edit', compact('sektor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_industri' => 'required|string|max:255',
            'nilai_produksi' => 'required|integer',
            'nilai_bahan_baku' => 'required|integer',
            'nilai_bahan_penolong' => 'required|integer',
            'biaya_antara' => 'required|integer',
            'jumlah_jenis_industri' => 'required|integer',
        ]);

        $sektor = SektorIndustriPengolahan::findOrFail($id);
        $sektor->update($request->all());

        return redirect()->route('perkembangan.produk-domestik.sektor-industri-pengolahan.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $sektor = SektorIndustriPengolahan::findOrFail($id);
        $sektor->delete();

        return redirect()->route('perkembangan.produk-domestik.sektor-industri-pengolahan.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
