<?php

namespace App\Http\Controllers;

use App\Models\PemilikAsetEkonomiLainnya;
use App\Models\MasterPerkembangan\AsetLainnya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PemilikAsetEkonomiLainnyaController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');

        $items = PemilikAsetEkonomiLainnya::with(['desa', 'asetLainnya'])
                    ->where('id_desa', $desaId)
                    ->orderBy('tanggal', 'desc')
                    ->paginate(10);

        return view('pages.perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index', compact('items'));
    }

    public function create()
    {
        $asetLainnya = AsetLainnya::all();
        return view('pages.perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.create', compact('asetLainnya'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_aset_lainnya' => 'required|exists:aset_lainnya,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');

        PemilikAsetEkonomiLainnya::create($data);

        return redirect()->route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = PemilikAsetEkonomiLainnya::with(['desa', 'asetLainnya'])->findOrFail($id);
        return view('pages.perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.show', compact('item'));
    }

    public function edit($id)
    {
        $item = PemilikAsetEkonomiLainnya::findOrFail($id);
        $asetLainnya = AsetLainnya::all();

        return view('pages.perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.edit', compact('item', 'asetLainnya'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_aset_lainnya' => 'required|exists:aset_lainnya,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');

        $item = PemilikAsetEkonomiLainnya::findOrFail($id);
        $item->update($data);

        return redirect()->route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = PemilikAsetEkonomiLainnya::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
