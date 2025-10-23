<?php

namespace App\Http\Controllers;

use App\Models\SaranaProduksi;
use App\Models\Desa;
use Illuminate\Http\Request;

class SaranaProduksiController extends Controller
{
    public function index()
    {
        $data = SaranaProduksi::with('desa')->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.asetekonomi.sarana_produksi.index', compact('data'));
    }

    public function create()
    {
        $desas = Desa::all();
        return view('pages.perkembangan.asetekonomi.sarana_produksi.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'desa_id' => 'required|integer|exists:desas,id',
            'tanggal' => 'required|date',
        ]);

        // Ambil nilai produksi 1–12
        $produksi = $request->only([
            'produksi1','produksi2','produksi3','produksi4','produksi5',
            'produksi6','produksi7','produksi8','produksi9','produksi10',
            'produksi11','produksi12'
        ]);

        // Hitung jumlah otomatis
        $jumlah = array_sum($produksi);

        // Isi produksi13 otomatis sama dengan jumlah total
        $produksi['produksi13'] = $jumlah;

        // Gabungkan data untuk disimpan
        $data = [
            'desa_id' => $request->desa_id,
            'tanggal' => $request->tanggal,
            ...$produksi,
            'jumlah' => $jumlah,
        ];

        SaranaProduksi::create($data);

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_produksi.index')
            ->with('success', 'Data berhasil disimpan.');
    }

    public function show($id)
    {
        $item = SaranaProduksi::with('desa')->findOrFail($id);
        return view('pages.perkembangan.asetekonomi.sarana_produksi.show', compact('item'));
    }

    public function edit($id)
    {
        $item = SaranaProduksi::findOrFail($id);
        $desas = Desa::all();
        return view('pages.perkembangan.asetekonomi.sarana_produksi.edit', compact('item', 'desas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desa_id' => 'required|integer|exists:desas,id',
            'tanggal' => 'required|date',
        ]);

        $produksi = $request->only([
            'produksi1','produksi2','produksi3','produksi4','produksi5',
            'produksi6','produksi7','produksi8','produksi9','produksi10',
            'produksi11','produksi12'
        ]);

        $jumlah = array_sum($produksi);
        $produksi['produksi13'] = $jumlah;

        $sarana = SaranaProduksi::findOrFail($id);
        $sarana->update([
            'desa_id' => $request->desa_id,
            'tanggal' => $request->tanggal,
            ...$produksi,
            'jumlah' => $jumlah,
        ]);

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_produksi.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = SaranaProduksi::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('perkembangan.asetekonomi.sarana_produksi.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
