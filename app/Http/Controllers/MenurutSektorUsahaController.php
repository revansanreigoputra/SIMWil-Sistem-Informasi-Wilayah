<?php

namespace App\Http\Controllers;

use App\Models\MenurutSektorUsaha;
use Illuminate\Http\Request;

class MenurutSektorUsahaController extends Controller
{
    public function index()
    {
        $data = MenurutSektorUsaha::orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kk' => 'required|integer',
            'anggota' => 'required|integer',
            'buruh' => 'required|integer',
            'anggota_buruh' => 'required|integer',
            'pendapatan' => 'required|integer',
        ]);

        MenurutSektorUsaha::create($request->all());

        return redirect()->route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show(MenurutSektorUsaha $menurut_sektor_usaha)
    {
        return view('pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.show', compact('menurut_sektor_usaha'));
    }

    public function edit(MenurutSektorUsaha $menurut_sektor_usaha)
    {
        return view('pages.perkembangan.pendapatanperkapital.menurut_sektor_usaha.edit', compact('menurut_sektor_usaha'));
    }

    public function update(Request $request, MenurutSektorUsaha $menurut_sektor_usaha)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kk' => 'required|integer',
            'anggota' => 'required|integer',
            'buruh' => 'required|integer',
            'anggota_buruh' => 'required|integer',
            'pendapatan' => 'required|integer',
        ]);

        $menurut_sektor_usaha->update($request->all());

        return redirect()->route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(MenurutSektorUsaha $menurut_sektor_usaha)
    {
        $menurut_sektor_usaha->delete();

        return redirect()->route('perkembangan.pendapatanperkapital.menurut_sektor_usaha.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
