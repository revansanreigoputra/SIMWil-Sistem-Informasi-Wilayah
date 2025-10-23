<?php

namespace App\Http\Controllers;

use App\Models\WajibBelajar9Tahun;
use App\Models\Desa;
use Illuminate\Http\Request;

class WajibBelajar9TahunController extends Controller
{
    public function index()
    {
        $items = WajibBelajar9Tahun::with('desa')->paginate(10);
        return view('pages.perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index', compact('items'));
    }

    public function create()
    {
        $desas = Desa::all();
        return view('pages.perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'penduduk' => 'required|integer',
            'masih_sekolah' => 'required|integer',
            'tidak_sekolah' => 'required|integer',
        ]);

        WajibBelajar9Tahun::create($request->all());

        return redirect()->route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index')
            ->with('success', 'Data Wajib Belajar 9 Tahun berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = WajibBelajar9Tahun::with('desa')->findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.show', compact('item'));
    }

    public function edit($id)
    {
        $item = WajibBelajar9Tahun::findOrFail($id);
        $desas = Desa::all();
        return view('pages.perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.edit', compact('item', 'desas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'penduduk' => 'required|integer',
            'masih_sekolah' => 'required|integer',
            'tidak_sekolah' => 'required|integer',
        ]);

        $item = WajibBelajar9Tahun::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index')
            ->with('success', 'Data Wajib Belajar 9 Tahun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = WajibBelajar9Tahun::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.pendidikanmasyarakat.wajib_belajar_9_tahun.index')
            ->with('success', 'Data Wajib Belajar 9 Tahun berhasil dihapus.');
    }
}
