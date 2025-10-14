<?php

namespace App\Http\Controllers;

use App\Models\KualitasBayi;
use Illuminate\Http\Request;

class KualitasBayiController extends Controller
{
    public function index()
    {
        $kualitas = KualitasBayi::latest()->get();
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.index', compact('kualitas'));
    }

    public function create()
    {
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_keguguran_kandungan' => 'required|integer|min:0',
            'jumlah_bayi_lahir' => 'required|integer|min:0',
            'jumlah_bayi_lahir_hidup' => 'required|integer|min:0',
            'jumlah_bayi_mati_0_1_bulan' => 'required|integer|min:0',
            'jumlah_bayi_mati_1_12_bulan' => 'required|integer|min:0',
            'jumlah_bayi_lahir_berat_kurang_2_5_kg' => 'required|integer|min:0',
            'jumlah_bayi_0_5_tahun_hidup_disabilitas' => 'required|integer|min:0',
        ]);

        KualitasBayi::create($request->all());
        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = KualitasBayi::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.show', compact('data'));
    }

    public function edit($id)
    {
        $data = KualitasBayi::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-bayi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_keguguran_kandungan' => 'required|integer|min:0',
            'jumlah_bayi_lahir' => 'required|integer|min:0',
            'jumlah_bayi_lahir_hidup' => 'required|integer|min:0',
            'jumlah_bayi_mati_0_1_bulan' => 'required|integer|min:0',
            'jumlah_bayi_mati_1_12_bulan' => 'required|integer|min:0',
            'jumlah_bayi_lahir_berat_kurang_2_5_kg' => 'required|integer|min:0',
            'jumlah_bayi_0_5_tahun_hidup_disabilitas' => 'required|integer|min:0',
        ]);

        $data = KualitasBayi::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = KualitasBayi::findOrFail($id);
        $data->delete();

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-bayi.index')
            ->with('success', 'Data kualitas bayi berhasil dihapus.');
    }
}
