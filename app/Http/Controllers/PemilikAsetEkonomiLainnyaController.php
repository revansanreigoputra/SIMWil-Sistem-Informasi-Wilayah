<?php

namespace App\Http\Controllers;

use App\Models\PemilikAsetEkonomiLainnya;
use App\Models\Desa;
use App\Models\JenisAsetLainnya;
use Illuminate\Http\Request;

class PemilikAsetEkonomiLainnyaController extends Controller
{
    public function index()
    {
        $items = PemilikAsetEkonomiLainnya::with(['desa', 'jenisAsetLainnya'])->get();
        return view('pages.perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index', compact('items'));
    }

    public function create()
    {
        $desas = Desa::all();
        $jenisAsetLainnyas = JenisAsetLainnya::all();
        return view('pages.perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.create', compact('desas', 'jenisAsetLainnyas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'id_jenis_aset_lainnya' => 'required|exists:jenis_aset_lainnyas,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        PemilikAsetEkonomiLainnya::create($request->all());

        return redirect()->route('perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.index')
                         ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = PemilikAsetEkonomiLainnya::with(['desa', 'jenisAsetLainnya'])->findOrFail($id);
        return view('pages.perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.show', compact('item'));
    }

    public function edit($id)
    {
        $item = PemilikAsetEkonomiLainnya::findOrFail($id);
        $desas = Desa::all();
        $jenisAsetLainnyas = JenisAsetLainnya::all();
        return view('pages.perkembangan.asetekonomi.pemilik_aset_ekonomi_lainnya.edit', compact('item', 'desas', 'jenisAsetLainnyas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'id_jenis_aset_lainnya' => 'required|exists:jenis_aset_lainnyas,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:0',
        ]);

        $item = PemilikAsetEkonomiLainnya::findOrFail($id);
        $item->update($request->all());

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
