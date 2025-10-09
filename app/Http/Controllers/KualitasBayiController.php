<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KualitasBayi; // pastikan model di-import

class KualitasBayiController extends Controller
{
    public function index()
    {
        $kualitas = KualitasBayi::all();
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.index', compact('kualitas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_keguguran' => 'required|integer',
            'jumlah_bayi_lahir' => 'required|integer',
            'jumlah_bayi_lahir_hidup' => 'required|integer',
            'jumlah_bayi_lahir_mati' => 'required|integer',
            'jumlah_bayi_berat_kurang_25' => 'required|integer',
            'jumlah_bayi_cacat' => 'required|integer',
        ]);

        KualitasBayi::create($validated);
        return back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, KualitasBayi $kualitas_bayi)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_keguguran' => 'required|integer',
            'jumlah_bayi_lahir' => 'required|integer',
            'jumlah_bayi_lahir_hidup' => 'required|integer',
            'jumlah_bayi_lahir_mati' => 'required|integer',
            'jumlah_bayi_berat_kurang_25' => 'required|integer',
            'jumlah_bayi_cacat' => 'required|integer',
        ]);

        $kualitas_bayi->update($validated);
        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(KualitasBayi $kualitas_bayi)
    {
        $kualitas_bayi->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
