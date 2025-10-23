<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Sanitasi;
use Illuminate\Http\Request;

class SanitasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $sanitasies = Sanitasi::with('desa')->where('desa_id', $desaId)->orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.index', compact('sanitasies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $saluranDrainaseOptions = Sanitasi::getSaluranDrainaseOptions();
        $kondisiSaluranOptions = Sanitasi::getKondisiSaluranOptions();
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.create', compact('saluranDrainaseOptions', 'kondisiSaluranOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'sumur_resapan_air' => 'required|integer|min:0',
            'mck_umum' => 'required|integer|min:0',
            'jamban_keluarga' => 'required|integer|min:0',
            'saluran_drainase' => 'required|in:ada,tidak ada',
            'kondisi_saluran' => 'required|in:rusak,mampet,kurang memadai,baik',
        ]);

        $data = $validated;
        $data['desa_id'] = session('desa_id');

        Sanitasi::create($data);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.index')->with('success', 'Data prasarana sanitasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sanitasi $sanitasi)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.show', compact('sanitasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sanitasi $sanitasi)
    {
        $saluranDrainaseOptions = Sanitasi::getSaluranDrainaseOptions();
        $kondisiSaluranOptions = Sanitasi::getKondisiSaluranOptions();
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.edit', compact('sanitasi', 'saluranDrainaseOptions', 'kondisiSaluranOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sanitasi $sanitasi)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'sumur_resapan_air' => 'required|integer|min:0',
            'mck_umum' => 'required|integer|min:0',
            'jamban_keluarga' => 'required|integer|min:0',
            'saluran_drainase' => 'required|in:ada,tidak ada',
            'kondisi_saluran' => 'required|in:rusak,mampet,kurang memadai,baik',
        ]);

        $data = $validated;
        $data['desa_id'] = session('desa_id');

        $sanitasi->update($data);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.index')->with('success', 'Data prasarana sanitasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sanitasi $sanitasi)
    {
        $sanitasi->delete();

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-sanitasi.index')->with('success', 'Data prasarana sanitasi berhasil dihapus.');
    }
}