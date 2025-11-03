<?php

namespace App\Http\Controllers;

use App\Models\RumahMenurutAtap;
use App\Models\Desa;
use App\Models\JenisAtap;
use Illuminate\Http\Request;

class RumahMenurutAtapController extends Controller
{
    public function index()
    {
        $items = RumahMenurutAtap::with(['desa', 'jenisAtap'])->get();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.index', compact('items'));
    }

    public function create()
    {
        $desas = Desa::all();
        $jenisAtaps = JenisAtap::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.create', compact('desas', 'jenisAtaps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_desa' => 'required',
            'tanggal' => 'required|date',
            'id_aset_atap' => 'required',
            'jumlah' => 'required|integer',
        ]);

        RumahMenurutAtap::create([
            'id_desa' => $request->id_desa,
            'tanggal' => $request->tanggal,
            'id_aset_atap' => $request->id_aset_atap,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_atap.index')
                         ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $item = RumahMenurutAtap::findOrFail($id);
        $desas = Desa::all();
        $jenisAtaps = JenisAtap::all();

        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.edit', compact('item', 'desas', 'jenisAtaps'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_desa' => 'required',
            'tanggal' => 'required|date',
            'id_aset_atap' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $item = RumahMenurutAtap::findOrFail($id);
        $item->update([
            'id_desa' => $request->id_desa,
            'tanggal' => $request->tanggal,
            'id_aset_atap' => $request->id_aset_atap,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_atap.index')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    public function show($id)
    {
        $item = RumahMenurutAtap::with(['desa', 'jenisAtap'])->findOrFail($id);
        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.show', compact('item'));
    }

    public function destroy($id)
    {
        $item = RumahMenurutAtap::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_atap.index')
                         ->with('success', 'Data berhasil dihapus!');
    }
}
