<?php

namespace App\Http\Controllers;

use App\Models\CakupanImunisasi;
use Illuminate\Http\Request;

class CakupanImunisasiController extends Controller
{
    public function index()
    {
        $cakupan = CakupanImunisasi::latest()->get();
        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index', compact('cakupan'));
    }

    public function create()
    {
        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-imunisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
        ]);

        CakupanImunisasi::create($request->all());
        return redirect()->route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index')
            ->with('success', 'Data Cakupan Imunisasi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = CakupanImunisasi::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-imunisasi.show', compact('data'));
    }

    public function edit($id)
    {
        $data = CakupanImunisasi::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.cakupan-imunisasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
        ]);

        $data = CakupanImunisasi::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index')
            ->with('success', 'Data Cakupan Imunisasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = CakupanImunisasi::findOrFail($id);
        $data->delete();

        return redirect()->route('perkembangan.kesehatan-masyarakat.cakupan-imunisasi.index')
            ->with('success', 'Data Cakupan Imunisasi berhasil dihapus.');
    }
}
