<?php

namespace App\Http\Controllers;

use App\Models\AirBersih;
use App\Models\Desa;
use Illuminate\Http\Request;

class AirBersihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $airBersihs = AirBersih::with('desa')->where('desa_id', $desaId)->orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.index', compact('airBersihs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'sumur_pompa' => 'required|integer|min:0',
            'sumur_gali' => 'required|integer|min:0',
            'hidran_umum' => 'required|integer|min:0',
            'penampung_air_hujan' => 'required|integer|min:0',
            'tangki_air_bersih' => 'required|integer|min:0',
            'embung' => 'required|integer|min:0',
            'mata_air' => 'required|integer|min:0',
            'bangunan_pengolahan_air' => 'required|integer|min:0',
        ]);

        $data = $validated;
        $data['desa_id'] = session('desa_id');

        AirBersih::create($data);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.index')->with('success', 'Data prasarana air bersih berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AirBersih $airBersih)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.show', compact('airBersih'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AirBersih $airBersih)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.edit', compact('airBersih'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AirBersih $airBersih)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'sumur_pompa' => 'required|integer|min:0',
            'sumur_gali' => 'required|integer|min:0',
            'hidran_umum' => 'required|integer|min:0',
            'penampung_air_hujan' => 'required|integer|min:0',
            'tangki_air_bersih' => 'required|integer|min:0',
            'embung' => 'required|integer|min:0',
            'mata_air' => 'required|integer|min:0',
            'bangunan_pengolahan_air' => 'required|integer|min:0',
        ]);

        $data = $validated;
        $data['desa_id'] = session('desa_id');

        $airBersih->update($data);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.index')->with('success', 'Data prasarana air bersih berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AirBersih $airBersih)
    {
        $airBersih->delete();

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.prasarana-air-bersih.index')->with('success', 'Data prasarana air bersih berhasil dihapus.');
    }
}