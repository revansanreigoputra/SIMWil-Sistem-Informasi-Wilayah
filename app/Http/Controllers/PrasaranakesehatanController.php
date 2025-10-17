<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Jpkesehatan;
use App\Models\Prasaranakesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PrasaranakesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('kesehatan.view');
        $prasaranakesehatans = Prasaranakesehatan::with('jpkesehatan', 'desa')->latest()->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.kesehatan.index', compact('prasaranakesehatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('kesehatan.create');
        $jpkesehatans = Jpkesehatan::all();
        $desas = Desa::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.kesehatan.create', compact('jpkesehatans', 'desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('kesehatan.create');
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'jpkesehatan_id' => 'required|exists:jpkesehatans,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        Prasaranakesehatan::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.kesehatan.index')
            ->with('success', 'Data Prasarana Kesehatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prasaranakesehatan $prasarana_kesehatan)
    {
        Gate::authorize('kesehatan.view');
        return view('pages.potensi.potensi-prasarana-dan-sarana.kesehatan.show', [
            'prasaranaKesehatan' => $prasarana_kesehatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prasaranakesehatan $prasarana_kesehatan)
    {
        Gate::authorize('kesehatan.update');
        $jpkesehatans = Jpkesehatan::all();
        $desas = Desa::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.kesehatan.edit', [
            'prasaranaKesehatan' => $prasarana_kesehatan,
            'jpkesehatans' => $jpkesehatans,
            'desas' => $desas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prasaranakesehatan $prasarana_kesehatan)
    {
        Gate::authorize('kesehatan.update');
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'jpkesehatan_id' => 'required|exists:jpkesehatans,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $prasarana_kesehatan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.kesehatan.index')
            ->with('success', 'Data Prasarana Kesehatan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prasaranakesehatan $prasarana_kesehatan)
    {
        Gate::authorize('kesehatan.delete');
        $prasarana_kesehatan->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.kesehatan.index')
            ->with('success', 'Data Prasarana Kesehatan berhasil dihapus.');
    }
}