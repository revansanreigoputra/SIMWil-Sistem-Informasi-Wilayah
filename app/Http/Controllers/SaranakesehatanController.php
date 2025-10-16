<?php

namespace App\Http\Controllers;

use App\Models\Jskesehatan;
use App\Models\Saranakesehatan;
use Illuminate\Http\Request;

class SaranakesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saranakesehatans = Saranakesehatan::with('jskesehatan')->latest()->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.skesehatan.index', compact('saranakesehatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jskesehatans = Jskesehatan::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.skesehatan.create', compact('jskesehatans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jskesehatan_id' => 'required|exists:jskesehatans,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        Saranakesehatan::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.skesehatan.index')->with('success', 'Data Sarana Kesehatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Saranakesehatan $saranakesehatan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.skesehatan.show', compact('saranakesehatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saranakesehatan $saranakesehatan)
    {
        $jskesehatans = Jskesehatan::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.skesehatan.edit', compact('saranakesehatan', 'jskesehatans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saranakesehatan $saranakesehatan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jskesehatan_id' => 'required|exists:jskesehatans,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $saranakesehatan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.skesehatan.index')->with('success', 'Data Sarana Kesehatan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saranakesehatan $saranakesehatan)
    {
        $saranakesehatan->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.skesehatan.index')->with('success', 'Data Sarana Kesehatan berhasil dihapus.');
    }
}