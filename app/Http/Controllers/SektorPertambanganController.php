<?php

namespace App\Http\Controllers;

use App\Models\SektorPertambangan;
use Illuminate\Http\Request;

class SektorPertambanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pertambangan = SektorPertambangan::all();
        return view('pages.perkembangan.produk-domestik.sektor-pertambangan.index', compact('data_pertambangan'));
    }

   public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'total_nilai_produksi_tahun_ini' => 'required|integer',
            'total_nilai_bahan_baku_digunakan' => 'required|integer',
            'total_nilai_bahan_penolong_digunakan' => 'required|integer',
            'total_biaya_antara_dihabiskan' => 'required|integer',
            'jumlah_total_jenis_bahan_tambang_dan_galian' => 'required|integer',
        ]);

        SektorPertambangan::create($validatedData);

        return redirect()->route('perkembangan.produk-domestik.sektor-pertambangan.index')
                         ->with('success', 'Data sektor pertambangan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'total_nilai_produksi_tahun_ini' => 'required|numeric',
            'total_nilai_bahan_baku_digunakan' => 'required|numeric',
            'total_nilai_bahan_penolong_digunakan' => 'required|numeric',
            'total_biaya_antara_dihabiskan' => 'required|numeric',
            'jumlah_total_jenis_bahan_tambang_dan_galian' => 'required|numeric',
        ]);

        $data = SektorPertambangan::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('perkembangan.produk-domestik.sektor-pertambangan.index')
                         ->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = SektorPertambangan::findOrFail($id);
        $data->delete();

        return redirect()->route('perkembangan.produk-domestik.sektor-pertambangan.index')
                         ->with('success', 'Data berhasil dihapus!');
    }
}
    // ... (metode lainnya seperti create, show, edit, update, destroy)
