<?php

namespace App\Http\Controllers;

use App\Models\RumahMenurutDinding;
use App\Models\Desa;
use App\Models\JenisDinding;
use Illuminate\Http\Request;

class RumahMenurutDindingController extends Controller
{
    public function index()
    {
        $data = RumahMenurutDinding::with('desa', 'jenisDinding')->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.index', compact('data'));
    }

    public function create()
    {
        $desas = Desa::all();
        $jenisDindings = JenisDinding::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.create', compact('desas', 'jenisDindings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'id_aset_dinding' => 'required|exists:jenis_dindings,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        RumahMenurutDinding::create([
            'id_kec' => 1,
            'id_desa' => $request->id_desa,
            'tanggal' => $request->tanggal,
            'id_aset_dinding' => $request->id_aset_dinding,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_dinding.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = RumahMenurutDinding::with('desa', 'jenisDinding')->findOrFail($id);
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.show', compact('item'));
    }

    public function edit($id)
    {
        $item = RumahMenurutDinding::findOrFail($id);
        $desas = Desa::all();
        $jenisDindings = JenisDinding::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.edit', compact('item', 'desas', 'jenisDindings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'id_aset_dinding' => 'required|exists:jenis_dindings,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $item = RumahMenurutDinding::findOrFail($id);
        $item->update([
            'id_kec' => 1,
            'id_desa' => $request->id_desa,
            'tanggal' => $request->tanggal,
            'id_aset_dinding' => $request->id_aset_dinding,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_dinding.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = RumahMenurutDinding::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_dinding.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
