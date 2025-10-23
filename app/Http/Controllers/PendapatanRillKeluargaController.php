<?php

namespace App\Http\Controllers;

use App\Models\PendapatanRillKeluarga;
use App\Models\Desa;
use Illuminate\Http\Request;

class PendapatanRillKeluargaController extends Controller
{
    public function index()
    {
        $data = PendapatanRillKeluarga::with('desa')->latest()->paginate(10);
        return view('pages.perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index', compact('data'));
    }

    public function create()
    {
        $desas = Desa::all();
        return view('pages.perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_desa' => 'required',
            'tanggal' => 'required|date',
            'kk' => 'required|integer',
            'ak' => 'required|integer|min:1',
            'pendapatan_kk' => 'required|numeric',
            'pendapatan_ak' => 'required|numeric',
        ]);

        $total1 = $request->pendapatan_kk + $request->pendapatan_ak;
        $total2 = $total1 / $request->ak;

        PendapatanRillKeluarga::create([
            'id_desa' => $request->id_desa,
            'tanggal' => $request->tanggal,
            'kk' => $request->kk,
            'ak' => $request->ak,
            'pendapatan_kk' => $request->pendapatan_kk,
            'pendapatan_ak' => $request->pendapatan_ak,
            'total1' => $total1,
            'total2' => $total2,
        ]);

        return redirect()->route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = PendapatanRillKeluarga::findOrFail($id);
        $desas = Desa::all();
        return view('pages.perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.edit', compact('item', 'desas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_desa' => 'required',
            'tanggal' => 'required|date',
            'kk' => 'required|integer',
            'ak' => 'required|integer|min:1',
            'pendapatan_kk' => 'required|numeric',
            'pendapatan_ak' => 'required|numeric',
        ]);

        $total1 = $request->pendapatan_kk + $request->pendapatan_ak;
        $total2 = $total1 / $request->ak;

        $item = PendapatanRillKeluarga::findOrFail($id);
        $item->update([
            'id_desa' => $request->id_desa,
            'tanggal' => $request->tanggal,
            'kk' => $request->kk,
            'ak' => $request->ak,
            'pendapatan_kk' => $request->pendapatan_kk,
            'pendapatan_ak' => $request->pendapatan_ak,
            'total1' => $total1,
            'total2' => $total2,
        ]);

        return redirect()->route('perkembangan.pendapatanperkapital.pendapatan_rill_keluarga.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PendapatanRillKeluarga::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
