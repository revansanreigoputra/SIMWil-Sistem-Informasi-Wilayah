<?php

namespace App\Http\Controllers;

use App\Models\KualitasPersalinan;
use Illuminate\Http\Request;

class KualitasPersalinanController extends Controller
{
    public function index()
{
    // ambil semua data terbaru
    $kualitas = \App\Models\KualitasPersalinan::latest()->get();

    // kirim variabel $kualitas ke view (sesuai index.blade.php)
    return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.index', compact('kualitas'));
}

    public function create()
    {
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
        ]);

        KualitasPersalinan::create($request->all());

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data Kualitas Persalinan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = KualitasPersalinan::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = KualitasPersalinan::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
        ]);

        $data = KualitasPersalinan::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data Kualitas Persalinan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = KualitasPersalinan::findOrFail($id);
        $data->delete();

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data Kualitas Persalinan berhasil dihapus.');
    }
}
