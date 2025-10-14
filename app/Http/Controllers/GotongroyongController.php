<?php

namespace App\Http\Controllers;

use App\Models\Gotongroyong;
use App\Models\Desa;
use Illuminate\Http\Request;

class GotongroyongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gotongroyong::with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.peransertamasyarakat.gotongroyong.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.gotongroyong.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'jumlah_kelompok_arisan' => 'nullable|integer|min:0',
            'jumlah_penduduk_orang_tua_asuh' => 'nullable|integer|min:0',
            'dana_sehat' => 'required|in:Ada,Tidak Ada',
            'pembangunan_rumah' => 'required|in:Ada,Tidak Ada',
            'pengolahan_tanah' => 'required|in:Ada,Tidak Ada',
            'pembiayaan_pendidikan' => 'required|in:Ada,Tidak Ada',
            'pemeliharaan_fasilitas_umum' => 'required|in:Ada,Tidak Ada',
            'pemberian_modal_usaha' => 'required|in:Ada,Tidak Ada',
            'pengerjaan_sawah_kebun' => 'required|in:Ada,Tidak Ada',
            'penangkapan_ikan_usaha' => 'required|in:Ada,Tidak Ada',
            'menjaga_ketertiban' => 'required|in:Ada,Tidak Ada',
            'peristiwa_kematian' => 'required|in:Ada,Tidak Ada',
            'menjaga_kebersihan_desa' => 'required|in:Ada,Tidak Ada',
            'membangun_jalan_irigasi' => 'required|in:Ada,Tidak Ada',
            'pemberantasan_sarang_nyamuk' => 'required|in:Ada,Tidak Ada',
        ]);

        Gotongroyong::create($validated);

        return redirect()->route('perkembangan.peransertamasyarakat.gotongroyong.index')->with('success', 'Data semangat kegotongroyongan penduduk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $gotongroyong = Gotongroyong::findOrFail($id);
        $gotongroyong ->load(['desa']);
        return view('pages.perkembangan.peransertamasyarakat.gotongroyong.show', compact('gotongroyong'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gotongroyong = Gotongroyong::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.gotongroyong.edit', compact('gotongroyong', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_desa' => 'required|exists:desas,id',
            'jumlah_kelompok_arisan' => 'nullable|integer|min:0',
            'jumlah_penduduk_orang_tua_asuh' => 'nullable|integer|min:0',
            'dana_sehat' => 'required|in:Ada,Tidak Ada',
            'pembangunan_rumah' => 'required|in:Ada,Tidak Ada',
            'pengolahan_tanah' => 'required|in:Ada,Tidak Ada',
            'pembiayaan_pendidikan' => 'required|in:Ada,Tidak Ada',
            'pemeliharaan_fasilitas_umum' => 'required|in:Ada,Tidak Ada',
            'pemberian_modal_usaha' => 'required|in:Ada,Tidak Ada',
            'pengerjaan_sawah_kebun' => 'required|in:Ada,Tidak Ada',
            'penangkapan_ikan_usaha' => 'required|in:Ada,Tidak Ada',
            'menjaga_ketertiban' => 'required|in:Ada,Tidak Ada',
            'peristiwa_kematian' => 'required|in:Ada,Tidak Ada',
            'menjaga_kebersihan_desa' => 'required|in:Ada,Tidak Ada',
            'membangun_jalan_irigasi' => 'required|in:Ada,Tidak Ada',
            'pemberantasan_sarang_nyamuk' => 'required|in:Ada,Tidak Ada',
        ]);

        $gotongroyong = Gotongroyong::findOrFail($id);
        $gotongroyong->update($validated);

        return redirect()->route('perkembangan.peransertamasyarakat.gotongroyong.index')
            ->with('success', 'Data semangat kegotongroyongan penduduk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gotongroyong = Gotongroyong::findOrFail($id);
        $gotongroyong->delete();
        return redirect()->route('perkembangan.peransertamasyarakat.gotongroyong.index')
            ->with('success', 'Data semangat kegotongroyongan penduduk berhasil dihapus.');
    }

    /**
     * Get desa by kecamatan (optional ajax)
     */
    public function getDesasByKecamatan($id_kecamatan)
    {
        $desas = Desa::where('id_kecamatan', $id_kecamatan)->get();
        return response()->json($desas);
    }
}
