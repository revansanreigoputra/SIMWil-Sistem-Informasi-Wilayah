<?php

namespace App\Http\Controllers;

use App\Models\RumahMenurutDinding;
use App\Models\MasterPerkembangan\AsetDinding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RumahMenurutDindingController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $items = RumahMenurutDinding::with(['desa', 'asetDinding'])
            ->where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.index', compact('items'));
    }

    public function create()
    {
        $asetDindings = AsetDinding::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.create', compact('asetDindings'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_aset_dinding' => 'required|exists:aset_dindings,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');
        $data['id_kec'] = 1;

        RumahMenurutDinding::create($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_dinding.index')
            ->with('success', 'Data Rumah Menurut Dinding berhasil ditambahkan.');
    }

    public function show(RumahMenurutDinding $rumahMenurutDinding)
    {
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.show', compact('rumahMenurutDinding'));
    }

    public function edit(RumahMenurutDinding $rumahMenurutDinding)
    {
        $asetDindings = AsetDinding::all();
        return view('pages.perkembangan.asetekonomi.rumah_menurut_dinding.edit', compact('rumahMenurutDinding', 'asetDindings'));
    }

    public function update(Request $request, RumahMenurutDinding $rumahMenurutDinding)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'id_aset_dinding' => 'required|exists:aset_dindings,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');
        $data['id_kec'] = 1;

        $rumahMenurutDinding->update($data);

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_dinding.index')
            ->with('success', 'Data Rumah Menurut Dinding berhasil diperbarui.');
    }

    public function destroy(RumahMenurutDinding $rumahMenurutDinding)
    {
        $rumahMenurutDinding->delete();

        return redirect()->route('perkembangan.asetekonomi.rumah_menurut_dinding.index')
            ->with('success', 'Data Rumah Menurut Dinding berhasil dihapus.');
    }
}
