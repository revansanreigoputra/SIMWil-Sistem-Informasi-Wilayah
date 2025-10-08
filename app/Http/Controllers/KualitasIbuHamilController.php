<?php

namespace App\Http\Controllers;

use App\Models\KualitasIbuHamil;
use Illuminate\Http\Request;

class KualitasIbuHamilController extends Controller
{
    public function index()
    {
        $kualitas = KualitasIbuHamil::latest()->get();
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-ibu-hamil.index', compact('kualitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_ibu_hamil' => 'required|integer',
            'total_pemeriksaan' => 'required|integer',
            'jumlah_melahirkan' => 'required|integer',
            'jumlah_kematian_ibu' => 'required|integer',
            'jumlah_ibu_nifas_hidup' => 'required|integer',
        ]);

        KualitasIbuHamil::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = KualitasIbuHamil::findOrFail($id);

        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_ibu_hamil' => 'required|integer',
            'total_pemeriksaan' => 'required|integer',
            'jumlah_melahirkan' => 'required|integer',
            'jumlah_kematian_ibu' => 'required|integer',
            'jumlah_ibu_nifas_hidup' => 'required|integer',
        ]);

        $data->update($request->all());
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = KualitasIbuHamil::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
