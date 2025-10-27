<?php

namespace App\Http\Controllers;

use App\Models\SektorJasaJasa;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorJasaJasaController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = SektorJasaJasa::with('desa')
                    ->where('desa_id', $desaId)
                    ->latest()
                    ->paginate(10);

        return view('pages.perkembangan.produk-domestik.sektor-jasa-jasa.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.produk-domestik.sektor-jasa-jasa.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data sektor jasa-jasa.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        SektorJasaJasa::create($data);
        return redirect()->route('perkembangan.produk-domestik.sektor-jasa-jasa.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = SektorJasaJasa::with('desa')->findOrFail($id);
        return view('pages.perkembangan.produk-domestik.sektor-jasa-jasa.show', compact('data'));
    }

    public function edit(SektorJasaJasa $sektorJasaJasa)
    {
        return view('pages.perkembangan.produk-domestik.sektor-jasa-jasa.edit', compact('sektorJasaJasa'));
    }

    public function update(Request $request, SektorJasaJasa $sektorJasaJasa)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data.');
        }

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        $sektorJasaJasa->update($data);

        return redirect()->route('perkembangan.produk-domestik.sektor-jasa-jasa.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(SektorJasaJasa $sektorJasaJasa)
    {
        $sektorJasaJasa->delete();
        return redirect()->route('perkembangan.produk-domestik.sektor-jasa-jasa.index')->with('success', 'Data berhasil dihapus.');
    }
}
