<?php

namespace App\Http\Controllers;

use App\Models\RumahMenurutLantai;
use App\Models\Desa;
use App\Models\JenisLantai;
use Illuminate\Http\Request;

class RumahMenurutLantaiController extends Controller
{
    public function index()
    {
        $items = RumahMenurutLantai::with(['desa', 'jenisLantai'])->get();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.index', compact('items'));
    }

    public function create()
    {
        $desas = Desa::all();
        $jenisLantais = JenisLantai::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.create', compact('desas', 'jenisLantais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'jenis_lantai_id' => 'required|exists:jenis_lantais,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        RumahMenurutLantai::create($request->all());

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_lantai.index')
                         ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(RumahMenurutLantai $rumahMenurutLantai)
    {
        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.show', [
            'item' => $rumahMenurutLantai
        ]);
    }

    public function edit(RumahMenurutLantai $rumahMenurutLantai)
    {
        $desas = Desa::all();
        $jenisLantais = JenisLantai::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.edit', compact('rumahMenurutLantai', 'desas', 'jenisLantais'));
    }

    public function update(Request $request, RumahMenurutLantai $rumahMenurutLantai)
    {
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'jenis_lantai_id' => 'required|exists:jenis_lantais,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        $rumahMenurutLantai->update($request->all());

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_lantai.index')
                         ->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(RumahMenurutLantai $rumahMenurutLantai)
    {
        $rumahMenurutLantai->delete();

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_lantai.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}
