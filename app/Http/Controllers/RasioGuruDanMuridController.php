<?php

namespace App\Http\Controllers;

use App\Models\RasioGuruDanMurid;
use App\Models\Desa;
use Illuminate\Http\Request;

class RasioGuruDanMuridController extends Controller
{
    public function index()
    {
        $items = RasioGuruDanMurid::with('desa')->paginate(10);
        return view('pages.perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index', compact('items'));
    }

    public function create()
    {
        $desas = Desa::all();
        return view('pages.perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'guru_tk' => 'required|integer',
            'siswa_tk' => 'required|integer',
            'guru_sd' => 'required|integer',
            'siswa_sd' => 'required|integer',
            'guru_sltp' => 'required|integer',
            'siswa_sltp' => 'required|integer',
            'guru_slta' => 'required|integer',
            'siswa_slta' => 'required|integer',
            'guru_slb' => 'required|integer',
            'siswa_slb' => 'required|integer',
        ]);

        RasioGuruDanMurid::create($request->all());

        return redirect()->route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index')
            ->with('success', 'Data Rasio Guru & Murid berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = RasioGuruDanMurid::with('desa')->findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.show', compact('item'));
    }

    public function edit($id)
    {
        $item = RasioGuruDanMurid::findOrFail($id);
        $desas = Desa::all();
        return view('pages.perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.edit', compact('item', 'desas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'guru_tk' => 'required|integer',
            'siswa_tk' => 'required|integer',
            'guru_sd' => 'required|integer',
            'siswa_sd' => 'required|integer',
            'guru_sltp' => 'required|integer',
            'siswa_sltp' => 'required|integer',
            'guru_slta' => 'required|integer',
            'siswa_slta' => 'required|integer',
            'guru_slb' => 'required|integer',
            'siswa_slb' => 'required|integer',
        ]);

        $item = RasioGuruDanMurid::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index')
            ->with('success', 'Data Rasio Guru & Murid berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = RasioGuruDanMurid::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.pendidikanmasyarakat.rasio_guru_dan_murid.index')
            ->with('success', 'Data Rasio Guru & Murid berhasil dihapus.');
    }
}
