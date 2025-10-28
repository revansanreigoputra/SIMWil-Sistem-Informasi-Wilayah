<?php

namespace App\Http\Controllers;

use App\Models\TingkatPendidikanMasyarakat;
use App\Models\Desa;
use Illuminate\Http\Request;

class TingkatPendidikanMasyarakatController extends Controller
{
    /**
     * Tampilkan semua data.
     */
    public function index()
    {
        $items = TingkatPendidikanMasyarakat::with('desa')->latest()->paginate(10);
        return view('pages.perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index', compact('items'));
    }

    /**
     * Tampilkan form tambah data.
     */
    public function create()
    {
        $desas = Desa::all();
        return view('pages.perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.create', compact('desas'));
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'tidak_tamat_sd' => 'nullable|integer',
            'sd' => 'nullable|integer',
            'sltp' => 'nullable|integer',
            'slta' => 'nullable|integer',
            'diploma' => 'nullable|integer',
            'sarjana' => 'nullable|integer',
            'p_buta' => 'nullable|numeric',
            'p_tamat' => 'nullable|numeric',
            'p_cacat' => 'nullable|numeric',
        ]);

        TingkatPendidikanMasyarakat::create($validated);

        return redirect()->route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index')
                         ->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail data.
     */
    public function show($id)
    {
        $item = TingkatPendidikanMasyarakat::with('desa')->findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.show', compact('item'));
    }

    /**
     * Tampilkan form edit data.
     */
    public function edit($id)
    {
        $item = TingkatPendidikanMasyarakat::findOrFail($id);
        $desas = Desa::all();
        return view('pages.perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.edit', compact('item', 'desas'));
    }

    /**
     * Update data.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'tidak_tamat_sd' => 'nullable|integer',
            'sd' => 'nullable|integer',
            'sltp' => 'nullable|integer',
            'slta' => 'nullable|integer',
            'diploma' => 'nullable|integer',
            'sarjana' => 'nullable|integer',
            'p_buta' => 'nullable|numeric',
            'p_tamat' => 'nullable|numeric',
            'p_cacat' => 'nullable|numeric',
        ]);

        $item = TingkatPendidikanMasyarakat::findOrFail($id);
        $item->update($validated);

        return redirect()->route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        $item = TingkatPendidikanMasyarakat::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.pendidikanmasyarakat.tingkat_pendidikan_masyarakat.index')
                         ->with('success', 'Data berhasil dihapus!');
    }
}
