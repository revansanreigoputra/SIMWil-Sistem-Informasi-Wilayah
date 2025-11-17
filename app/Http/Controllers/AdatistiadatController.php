<?php

namespace App\Http\Controllers;

use App\Models\adatistiadat;
use App\Models\Desa;
use Illuminate\Http\Request;

class AdatistiadatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = adatistiadat::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.peransertamasyarakat.adatistiadat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.adatistiadat.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'perkawinan' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'kelahiran_anak' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'upacara_kematian' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'pengelolaan_hutan' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'tanah_pertanian' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'pengelolaan_laut' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'memecahkan_konflik' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'menjauhkan_bala' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'memulihkan_hubungan_alam' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'penanggulangan_kemiskinan' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
        ]);
        $validated['desa_id'] = session('desa_id');
        adatistiadat::create($validated);
        return redirect()->route('perkembangan.peransertamasyarakat.adatistiadat.index')->with('success', 'Data adat istiadat masyarakat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $adatistiadat = adatistiadat::with(['desa'])->findOrFail($id);
        $adatistiadat->load('desa');
        return view('pages.perkembangan.peransertamasyarakat.adatistiadat.show', compact('adatistiadat'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $adatistiadat = adatistiadat::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.peransertamasyarakat.adatistiadat.edit', compact('adatistiadat', 'desas')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'perkawinan' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'kelahiran_anak' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'upacara_kematian' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'pengelolaan_hutan' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'tanah_pertanian' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'pengelolaan_laut' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'memecahkan_konflik' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'menjauhkan_bala' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'memulihkan_hubungan_alam' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
            'penanggulangan_kemiskinan' => 'required|in:Aktif,Tidak Aktif,Pernah Ada',
        ]);

        $adatistiadat = adatistiadat::findOrFail($id);
        $adatistiadat->update($validated);

        return redirect()->route('perkembangan.peransertamasyarakat.adatistiadat.index')->with('success', 'Data adat istiadat masyarakat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $adatistiadat = adatistiadat::findOrFail($id);
        $adatistiadat->delete();
        return redirect()->route('perkembangan.peransertamasyarakat.adatistiadat.index')->with('success', 'Data adat istiadat masyarakat berhasil dihapus.');
    }
}
