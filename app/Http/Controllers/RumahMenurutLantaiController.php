<?php

namespace App\Http\Controllers;

use App\Models\RumahMenurutLantai;
use App\Models\MasterPerkembangan\AsetLantai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RumahMenurutLantaiController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $items = RumahMenurutLantai::with(['desa', 'asetLantai'])
            ->where('desa_id', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.index', compact('items'));
    }

    public function create()
    {
        $asetLantais = AsetLantai::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.create', compact('asetLantais'));
    }

    public function store(Request $request)
    {
        $desaId = session('desa_id');
        if (!$desaId) {
            return redirect()->back()->with('error', 'Desa belum dipilih.')->withInput();
        }

        $request->validate([
            'jenis_lantai_id' => 'required|exists:aset_lantais,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        RumahMenurutLantai::create([
            'desa_id' => $desaId,
            'jenis_lantai_id' => $request->jenis_lantai_id,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_lantai.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $desaId = session('desa_id');
        $item = RumahMenurutLantai::with(['desa', 'asetLantai'])
            ->where('desa_id', $desaId)
            ->findOrFail($id);

        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.show', compact('item'));
    }

    public function edit($id)
    {
        $desaId = session('desa_id');
        $item = RumahMenurutLantai::where('desa_id', $desaId)->findOrFail($id);
        $asetLantais = AsetLantai::all();

        return view('pages.perkembangan.asetekonomi.rumah_menurut_lantai.edit', compact('item', 'asetLantais'));
    }

    public function update(Request $request, $id)
    {
        $desaId = session('desa_id');
        if (!$desaId) {
            return redirect()->back()->with('error', 'Desa belum dipilih.')->withInput();
        }

        $request->validate([
            'jenis_lantai_id' => 'required|exists:aset_lantais,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        $item = RumahMenurutLantai::where('desa_id', $desaId)->findOrFail($id);
        $item->update([
            'jenis_lantai_id' => $request->jenis_lantai_id,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_lantai.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $desaId = session('desa_id');
        $item = RumahMenurutLantai::where('desa_id', $desaId)->findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_lantai.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
