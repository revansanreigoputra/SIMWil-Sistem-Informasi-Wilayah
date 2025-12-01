<?php

namespace App\Http\Controllers;

use App\Models\Kebisingan;
use Illuminate\Http\Request;

class KebisinganController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $kebisingans = Kebisingan::with('desa')->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.sda.kebisingan.index', compact('kebisingans'));
    }

    public function create()
    {
        return view('pages.potensi.sda.kebisingan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'tingkat_kebisingan' => 'required|in:ringan,sedang,tinggi',
            'sumber_kebisingan' => 'required|string|max:255',
            'ekses_dampak_kebisingan' => 'required|in:ya,tidak',
            'efek_terhadap_penduduk' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        Kebisingan::create($data);

        return redirect()->route('kebisingan.index')->with('success', 'Data kebisingan berhasil ditambahkan.');
    }

    public function show(Kebisingan $kebisingan)
    {
        return view('pages.potensi.sda.kebisingan.show', compact('kebisingan'));
    }

    public function edit(Kebisingan $kebisingan)
    {
        return view('pages.potensi.sda.kebisingan.edit', compact('kebisingan'));
    }

    public function update(Request $request, Kebisingan $kebisingan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'tingkat_kebisingan' => 'required|in:ringan,sedang,tinggi',
            'sumber_kebisingan' => 'required|string|max:255',
            'ekses_dampak_kebisingan' => 'required|in:ya,tidak',
            'efek_terhadap_penduduk' => 'nullable|string',
        ]);

        $kebisingan->update($request->all());

        return redirect()->route('kebisingan.index')->with('success', 'Data kebisingan berhasil diubah.');
    }

    public function destroy(Kebisingan $kebisingan)
    {
        $kebisingan->delete();
        return redirect()->route('kebisingan.index')->with('success', 'Data kebisingan berhasil dihapus.');
    }
}
