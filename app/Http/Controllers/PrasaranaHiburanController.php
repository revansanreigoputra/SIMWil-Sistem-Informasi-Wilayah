<?php

namespace App\Http\Controllers;

use App\Models\JpHiburan;
use App\Models\PrasaranaHiburan;
use Illuminate\Http\Request;

class PrasaranaHiburanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prasaranahiburans = PrasaranaHiburan::with('jphiburan')->latest()->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.hiburan.index', compact('prasaranahiburans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jphiburans = JpHiburan::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.hiburan.create', compact('jphiburans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jphiburan_id' => 'required|exists:jp_hiburans,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        PrasaranaHiburan::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.hiburan.index')->with('success', 'Data prasarana hiburan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PrasaranaHiburan $prasaranahiburan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.hiburan.show', compact('prasaranahiburan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrasaranaHiburan $prasaranahiburan)
    {
        $jphiburans = JpHiburan::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.hiburan.edit', compact('prasaranahiburan', 'jphiburans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrasaranaHiburan $prasaranahiburan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jphiburan_id' => 'required|exists:jp_hiburans,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $prasaranahiburan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.hiburan.index')->with('success', 'Data prasarana hiburan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrasaranaHiburan $prasaranahiburan)
    {
        $prasaranahiburan->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.hiburan.index')->with('success', 'Data prasarana hiburan berhasil dihapus.');
    }
}