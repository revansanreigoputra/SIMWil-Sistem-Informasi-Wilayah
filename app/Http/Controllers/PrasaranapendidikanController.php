<?php

namespace App\Http\Controllers;

use App\Models\Jpgedung;
use App\Models\Prasaranapendidikan;
use Illuminate\Http\Request;

class PrasaranapendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $prasaranapendidikans = Prasaranapendidikan::with(['jpgedung', 'desa'])->where('desa_id', $desaId)->latest()->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.ppendidikan.index', compact('prasaranapendidikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jpgedungs = Jpgedung::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.ppendidikan.create', compact('jpgedungs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jpgedung_id' => 'required|exists:jpgedungs,id',
            'jumlah_sewa' => 'required|integer|min:0',
            'jumlah_milik_sendiri' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        Prasaranapendidikan::create($data);

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.ppendidikan.index')->with('success', 'Data prasarana pendidikan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prasaranapendidikan $prasaranapendidikan)
    {
        
        return view('pages.potensi.potensi-prasarana-dan-sarana.ppendidikan.show', ['prasaranapendidikan' => $prasaranapendidikan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prasaranapendidikan $prasaranapendidikan)
    {
        $jpgedungs = Jpgedung::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.ppendidikan.edit', compact('prasaranapendidikan', 'jpgedungs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prasaranapendidikan $prasaranapendidikan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jpgedung_id' => 'required|exists:jpgedungs,id',
            'jumlah_sewa' => 'required|integer|min:0',
            'jumlah_milik_sendiri' => 'required|integer|min:0',
        ]);

        $prasaranapendidikan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.ppendidikan.index')->with('success', 'Data prasarana pendidikan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prasaranapendidikan $prasaranapendidikan)
    {
        $prasaranapendidikan->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.ppendidikan.index')->with('success', 'Data prasarana pendidikan berhasil dihapus.');
    }
}