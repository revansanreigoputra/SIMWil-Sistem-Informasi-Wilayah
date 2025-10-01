<?php 

namespace App\Http\Controllers;

use App\Models\SektorBangunan;
use Illuminate\Http\Request;

class SektorBangunanController extends Controller
{
    public function index()
    {
        $bangunans = SektorBangunan::all();
        return view('pages.perkembangan.produk-domestik.sektor-bangunan.index', compact('bangunans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_bangunan_tahun_ini' => 'required|integer',
            'biaya_pemeliharaan' => 'required|integer',
            'total_nilai_bangunan' => 'required|integer',
            'biaya_antara_lainnya' => 'required|integer',
        ]);

        SektorBangunan::create($request->all());
        return redirect()->route('perkembangan.produk-domestik.sektor-bangunan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, SektorBangunan $sektor_bangunan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_bangunan_tahun_ini' => 'required|integer',
            'biaya_pemeliharaan' => 'required|integer',
            'total_nilai_bangunan' => 'required|integer',
            'biaya_antara_lainnya' => 'required|integer',
        ]);

        $sektor_bangunan->update($request->all());
        return redirect()->route('perkembangan.produk-domestik.sektor-bangunan.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(SektorBangunan $sektor_bangunan)
    {
        $sektor_bangunan->delete();
        return redirect()->route('perkembangan.produk-domestik.sektor-bangunan.index')->with('success', 'Data berhasil dihapus');
    }
}
