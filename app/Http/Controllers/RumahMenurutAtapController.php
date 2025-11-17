<?php

namespace App\Http\Controllers;

use App\Models\RumahMenurutAtap;
use App\Models\MasterPerkembangan\AsetAtap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RumahMenurutAtapController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $items = RumahMenurutAtap::with(['desa', 'asetAtap'])
            ->where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.index', compact('items'));
    }

    public function create()
    {
        $asetAtaps = AsetAtap::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.create', compact('asetAtaps'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_aset_atap' => 'required|exists:aset_ataps,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');

        RumahMenurutAtap::create($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_atap.index')
            ->with('success', 'Data Rumah Menurut Atap berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = RumahMenurutAtap::with(['desa', 'asetAtap'])->findOrFail($id);
        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.show', compact('item'));
    }

    public function edit($id)
    {
        $item = RumahMenurutAtap::findOrFail($id);
        $asetAtaps = AsetAtap::all();

        return view('pages.perkembangan.asetekonomi.rumah_menurut_atap.edit', compact('item', 'asetAtaps'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_aset_atap' => 'required|exists:aset_ataps,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $item = RumahMenurutAtap::findOrFail($id);
        $data = $request->all();
        $data['id_desa'] = session('desa_id');

        $item->update($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_atap.index')
            ->with('success', 'Data Rumah Menurut Atap berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = RumahMenurutAtap::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_atap.index')
            ->with('success', 'Data Rumah Menurut Atap berhasil dihapus.');
    }
}
