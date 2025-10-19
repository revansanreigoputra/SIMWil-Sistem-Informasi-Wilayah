<?php

namespace App\Http\Controllers;

use App\Models\CakupanImunisasi;
use App\Models\Desa;
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
    $desas = Desa::all(); // ambil semua data desa
    return view('pages.perkembangan.kesehatan-masyarakat.cakupan-imunisasi.create', compact('desas'));
}

   public function store(Request $request)
{
    $request->validate([
        'desa_id' => 'required|exists:desas,id',
        'tanggal' => 'required|date',
    ]);

    // Simpan data ke database
    CakupanImunisasi::create([
        'desa_id' => $request->desa_id,
        'tanggal' => $request->tanggal,
        'bayi_usia_2_bulan' => $request->bayi_usia_2_bulan,
        'bayi_2_bulan_dpt1_bcg_polio1' => $request->bayi_2_bulan_dpt1_bcg_polio1,
        'bayi_usia_3_bulan' => $request->bayi_usia_3_bulan,
        'bayi_3_bulan_dpt2_polio2' => $request->bayi_3_bulan_dpt2_polio2,
        'bayi_usia_4_bulan' => $request->bayi_usia_4_bulan,
        'bayi_4_bulan_dpt3_polio3' => $request->bayi_4_bulan_dpt3_polio3,
        'bayi_usia_9_bulan' => $request->bayi_usia_9_bulan,
        'bayi_9_bulan_campak' => $request->bayi_9_bulan_campak,
        'bayi_imunisasi_cacar' => $request->bayi_imunisasi_cacar,
    ]);

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
    $desas = Desa::all(); // Ambil semua data desa untuk dropdown

    return view('pages.perkembangan.kesehatan-masyarakat.cakupan-imunisasi.edit', compact('data', 'desas'));
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
