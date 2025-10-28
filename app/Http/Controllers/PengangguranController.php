<?php

namespace App\Http\Controllers;

use App\Models\Pengangguran;
use App\Models\Desa;
use Illuminate\Http\Request;

class PengangguranController extends Controller
{
    public function index()
    {
        // Hanya load relasi desa
        $penganggurans = Pengangguran::with('desa')->orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.perkembangan.ekonomimasyarakat.pengangguran.index', compact('penganggurans'));
    }

    public function create()
    {
        // Ambil semua desa
        $desas = Desa::all();
        return view('pages.perkembangan.ekonomimasyarakat.pengangguran.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|integer|exists:desas,id',
            'angkatan_kerja' => 'required|integer|min:0',
            'masih_sekolah' => 'required|integer|min:0',
            'ibu_rumah_tangga' => 'required|integer|min:0',
            'bekerja_penuh' => 'required|integer|min:0',
            'bekerja_tidak_tentu' => 'required|integer|min:0',
            'tidak_bekerja' => 'required|integer|min:0',
            'bekerja' => 'required|integer|min:0',
        ]);

        Pengangguran::create($request->all());

        return redirect()->route('perkembangan.ekonomimasyarakat.pengangguran.index')
            ->with('success', 'Data pengangguran berhasil ditambahkan.');
    }

    public function show(Pengangguran $pengangguran)
    {
        $pengangguran->load('desa'); // load relasi desa
        return view('pages.perkembangan.ekonomimasyarakat.pengangguran.show', compact('pengangguran'));
    }

    public function edit(Pengangguran $pengangguran)
    {
        $desas = Desa::all();
        return view('pages.perkembangan.ekonomimasyarakat.pengangguran.edit', compact('pengangguran','desas'));
    }

    public function update(Request $request, Pengangguran $pengangguran)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|integer|exists:desas,id',
            'angkatan_kerja' => 'required|integer|min:0',
            'masih_sekolah' => 'required|integer|min:0',
            'ibu_rumah_tangga' => 'required|integer|min:0',
            'bekerja_penuh' => 'required|integer|min:0',
            'bekerja_tidak_tentu' => 'required|integer|min:0',
            'tidak_bekerja' => 'required|integer|min:0',
            'bekerja' => 'required|integer|min:0',
        ]);

        $pengangguran->update($request->all());

        return redirect()->route('perkembangan.ekonomimasyarakat.pengangguran.index')
            ->with('success', 'Data pengangguran berhasil diperbarui.');
    }

    public function destroy(Pengangguran $pengangguran)
    {
        $pengangguran->delete();
        return redirect()->route('perkembangan.ekonomimasyarakat.pengangguran.index')
            ->with('success', 'Data pengangguran berhasil dihapus.');
    }
}
