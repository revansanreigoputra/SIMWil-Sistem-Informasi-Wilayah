<?php

namespace App\Http\Controllers;

use App\Models\Jpolahraga;
use App\Models\Prasaranaolahraga;
use Illuminate\Http\Request;

class PrasaranaolahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prasaranaolahragas = Prasaranaolahraga::with('jpolahraga')->latest()->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.olahraga.index', compact('prasaranaolahragas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jpolahragas = Jpolahraga::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.olahraga.create', compact('jpolahragas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jpolahraga_id' => 'required|exists:jpolahragas,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        Prasaranaolahraga::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.olahraga.index')->with('success', 'Data prasarana olahraga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prasaranaolahraga $prasarana_olahraga)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.olahraga.show', ['prasaranaOlahraga' => $prasarana_olahraga]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prasaranaolahraga $prasarana_olahraga)
    {
        $jpolahragas = Jpolahraga::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.olahraga.edit', ['prasaranaOlahraga' => $prasarana_olahraga, 'jpolahragas' => $jpolahragas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prasaranaolahraga $prasarana_olahraga)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jpolahraga_id' => 'required|exists:jpolahragas,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $prasarana_olahraga->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.olahraga.index')->with('success', 'Data prasarana olahraga berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prasaranaolahraga $prasarana_olahraga)
    {
        $prasarana_olahraga->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.olahraga.index')->with('success', 'Data prasarana olahraga berhasil dihapus.');
    }
}