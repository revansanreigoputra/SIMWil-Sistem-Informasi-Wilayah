<?php

namespace App\Http\Controllers;

use App\Models\berbangsa;
use App\Models\Desa;
use Illuminate\Http\Request;

class BerbangsaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = berbangsa::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.kedaulatanmasyarakat.berbangsa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.kedaulatanmasyarakat.berbangsa.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',

            // Semua kolom lainnya wajib diisi angka, minimal 0
            'kegiatan_pemantapan_pancasila' => 'required|integer|min:0',
            'jumlah_kegiatan_pemantapan_pancasila' => 'required|integer|min:0',
            'jenis_kegiatan_bhineka_tunggal_ika' => 'required|integer|min:0',
            'jumlah_kegiatan_bhineka_tunggal_ika' => 'required|integer|min:0',
            'jenis_kegiatan_pemantapan_kesatuan_bangsa' => 'required|integer|min:0',
            'kasus_desa_minta_suaka' => 'required|integer|min:0',
            'warga_melintas_resmi' => 'required|integer|min:0',
            'warga_melintas_tidak_resmi' => 'required|integer|min:0',
            'kasus_pertempuran_antar_kelompok' => 'required|integer|min:0',
            'serangan_terhadap_fasilitas' => 'required|integer|min:0',
            'kasus_merongrong_nkri' => 'required|integer|min:0',
            'korban_manusia' => 'required|integer|min:0',
            'masalah_ketenagakerjaan' => 'required|integer|min:0',
            'kasus_kejahatan_perbatasan' => 'required|integer|min:0',
            'sengketa_perbatasan_desa' => 'required|integer|min:0',
            'sengketa_perbatasan_antar_daerah' => 'required|integer|min:0',
            'kasus_diplomatik' => 'required|integer|min:0',
            'kasus_disintegrasi' => 'required|integer|min:0',
            'kasus_penangkapan' => 'required|integer|min:0',
            'kasus_nelayan_petani' => 'required|integer|min:0',
        ]);

        Berbangsa::create($request->all());

        return redirect()->route('perkembangan.kedaulatanmasyarakat.berbangsa.index')
                         ->with('success', 'Data Berbangsa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berbangsa = berbangsa::findOrFail($id);
        $berbangsa->load(['desa']); // pastikan relasi terload
        return view('pages.perkembangan.kedaulatanmasyarakat.berbangsa.show', compact('berbangsa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berbangsa = berbangsa::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.kedaulatanmasyarakat.berbangsa.edit', compact('berbangsa', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',

            // Semua kolom lainnya wajib diisi angka, minimal 0
            'kegiatan_pemantapan_pancasila' => 'required|integer|min:0',
            'jumlah_kegiatan_pemantapan_pancasila' => 'required|integer|min:0',
            'jenis_kegiatan_bhineka_tunggal_ika' => 'required|integer|min:0',
            'jumlah_kegiatan_bhineka_tunggal_ika' => 'required|integer|min:0',
            'jenis_kegiatan_pemantapan_kesatuan_bangsa' => 'required|integer|min:0',
            'kasus_desa_minta_suaka' => 'required|integer|min:0',
            'warga_melintas_resmi' => 'required|integer|min:0',
            'warga_melintas_tidak_resmi' => 'required|integer|min:0',
            'kasus_pertempuran_antar_kelompok' => 'required|integer|min:0',
            'serangan_terhadap_fasilitas' => 'required|integer|min:0',
            'kasus_merongrong_nkri' => 'required|integer|min:0',
            'korban_manusia' => 'required|integer|min:0',
            'masalah_ketenagakerjaan' => 'required|integer|min:0',
            'kasus_kejahatan_perbatasan' => 'required|integer|min:0',
            'sengketa_perbatasan_desa' => 'required|integer|min:0',
            'sengketa_perbatasan_antar_daerah' => 'required|integer|min:0',
            'kasus_diplomatik' => 'required|integer|min:0',
            'kasus_disintegrasi' => 'required|integer|min:0',
            'kasus_penangkapan' => 'required|integer|min:0',
            'kasus_nelayan_petani' => 'required|integer|min:0',
        ]);

        $berbangsa = berbangsa::findOrFail($id);
        $berbangsa->update($validated);
        return redirect()->route('perkembangan.kedaulatanmasyarakat.berbangsa.index')
                         ->with('success', 'Data Berbangsa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $berbangsa = berbangsa::findOrFail($id);
        $berbangsa->delete();
        return redirect()->route('perkembangan.kedaulatanmasyarakat.berbangsa.index')->with('success', 'Data Berbangsa berhasil dihapus.');
    }
    public function getDesasByKecamatan($id_kecamatan)
    {
        $desas = Desa::where('id_kecamatan', $id_kecamatan)->get();
        return response()->json($desas);
    }
}
