<?php

namespace App\Http\Controllers;

use App\Models\kdrt;
use App\Models\Desa;
use Illuminate\Http\Request;

class KdrtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = kdrt::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.kdrt.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.kdrt.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_kasus_suami_terhadap_istri' => 'nullable|integer|min:0',
            'jumlah_kasus_istri_terhadap_suami' => 'nullable|integer|min:0',
            'jumlah_kasus_orangtua_terhadap_anak' => 'nullable|integer|min:0',
            'jumlah_kasus_anak_terhadap_orangtua' => 'nullable|integer|min:0',
            'jumlah_kasus_kepala_keluarga_terhadap_anggota_lainnya' => 'nullable|integer|min:0',
        ]);
        $validated['desa_id'] = session('desa_id');
        kdrt::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.kdrt.index')->with('success', 'Data KDRT berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $kdrt = kdrt::with(['desa'])->findOrFail($id);
       $kdrt->load(['desa']);
       return view('pages.perkembangan.keamanandanketertiban.kdrt.show', compact('kdrt')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kdrt = kdrt::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.kdrt.edit', compact('kdrt', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jumlah_kasus_suami_terhadap_istri' => 'nullable|integer|min:0',
            'jumlah_kasus_istri_terhadap_suami' => 'nullable|integer|min:0',
            'jumlah_kasus_orangtua_terhadap_anak' => 'nullable|integer|min:0',
            'jumlah_kasus_anak_terhadap_orangtua' => 'nullable|integer|min:0',
            'jumlah_kasus_kepala_keluarga_terhadap_anggota_lainnya' => 'nullable|integer|min:0',
        ]);
        $kdrt = kdrt::findOrFail($id);
        $kdrt->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.kdrt.index')->with('success', 'Data KDRT berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kdrt = kdrt::findOrFail($id);
        $kdrt->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.kdrt.index')->with('success', 'Data KDRT berhasil dihapus.');
    }
}
