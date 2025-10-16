<?php

namespace App\Http\Controllers;

use App\Models\KesejahteraanKeluarga;
use Illuminate\Http\Request;

class KesejahteraanKeluargaController extends Controller
{
    public function index()
    {
        $data = KesejahteraanKeluarga::latest()->paginate(10);
        return view('pages.perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'prasejahtera' => 'required|integer',
            'sejahtera1' => 'required|integer',
            'sejahtera2' => 'required|integer',
            'sejahtera3' => 'required|integer',
            'sejahteraplus' => 'required|integer',
        ]);

        KesejahteraanKeluarga::create($request->all());
        return redirect()->route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $item = KesejahteraanKeluarga::findOrFail($id);
        return view('pages.perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.show', compact('item'));
    }

    public function edit($id)
    {
        $item = KesejahteraanKeluarga::findOrFail($id);
        return view('pages.perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'prasejahtera' => 'required|integer',
            'sejahtera1' => 'required|integer',
            'sejahtera2' => 'required|integer',
            'sejahtera3' => 'required|integer',
            'sejahteraplus' => 'required|integer',
        ]);

        $item = KesejahteraanKeluarga::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $item = KesejahteraanKeluarga::findOrFail($id);
        $item->delete();
        return redirect()->route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
