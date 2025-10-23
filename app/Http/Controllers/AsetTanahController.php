<?php

namespace App\Http\Controllers;

use App\Models\AsetTanah;
use App\Models\Desa;
use Illuminate\Http\Request;

class AsetTanahController extends Controller
{
    // ✅ Index
    public function index()
    {
        $asetTanahs = AsetTanah::with('desa')->orderBy('tanggal', 'desc')->get();
        $desas = Desa::orderBy('nama_desa', 'asc')->get();

        return view('pages.perkembangan.asetekonomi.aset_tanah.index', compact('asetTanahs', 'desas'));
    }

    // ✅ Form Tambah
    public function create()
    {
        $desas = Desa::orderBy('nama_desa', 'asc')->get();
        return view('pages.perkembangan.asetekonomi.aset_tanah.create', compact('desas'));
    }

    // ✅ Simpan Data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'tidak_memiliki' => 'nullable|integer',
            'tanah1' => 'nullable|integer',
            'tanah2' => 'nullable|integer',
            'tanah3' => 'nullable|integer',
            'tanah4' => 'nullable|integer',
            'tanah5' => 'nullable|integer',
            'tanah6' => 'nullable|integer',
            'tanah7' => 'nullable|integer',
            'tanah8' => 'nullable|integer',
            'tanah9' => 'nullable|integer',
            'tanah10' => 'nullable|integer',
            'tanah11' => 'nullable|integer',
            'memiliki_lebih' => 'nullable|integer',
            'jumlah' => 'nullable|integer',
        ]);

        AsetTanah::create($validated);

        return redirect()->route('perkembangan.asetekonomi.aset_tanah.index')
            ->with('success', 'Data Penguasaan Aset Tanah berhasil ditambahkan.');
    }

    // ✅ Detail
    public function show($id)
    {
        $asetTanah = AsetTanah::with('desa')->findOrFail($id);
        return view('pages.perkembangan.asetekonomi.aset_tanah.show', compact('asetTanah'));
    }

    // ✅ Form Edit
    public function edit($id)
    {
        $asetTanah = AsetTanah::findOrFail($id);
        $desas = Desa::orderBy('nama_desa', 'asc')->get();
        return view('pages.perkembangan.asetekonomi.aset_tanah.edit', compact('asetTanah', 'desas'));
    }

    // ✅ Update Data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'tidak_memiliki' => 'nullable|integer',
            'tanah1' => 'nullable|integer',
            'tanah2' => 'nullable|integer',
            'tanah3' => 'nullable|integer',
            'tanah4' => 'nullable|integer',
            'tanah5' => 'nullable|integer',
            'tanah6' => 'nullable|integer',
            'tanah7' => 'nullable|integer',
            'tanah8' => 'nullable|integer',
            'tanah9' => 'nullable|integer',
            'tanah10' => 'nullable|integer',
            'tanah11' => 'nullable|integer',
            'memiliki_lebih' => 'nullable|integer',
            'jumlah' => 'nullable|integer',
        ]);

        $asetTanah = AsetTanah::findOrFail($id);
        $asetTanah->update($validated);

        return redirect()->route('perkembangan.asetekonomi.aset_tanah.index')
            ->with('success', 'Data Penguasaan Aset Tanah berhasil diperbarui.');
    }

    // ✅ Hapus Data
    public function destroy($id)
    {
        $asetTanah = AsetTanah::findOrFail($id);
        $asetTanah->delete();

        return redirect()->route('perkembangan.asetekonomi.aset_tanah.index')
            ->with('success', 'Data Penguasaan Aset Tanah berhasil dihapus.');
    }
}
