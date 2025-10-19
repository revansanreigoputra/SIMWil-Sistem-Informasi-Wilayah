<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\PrasaranaPeribadatan;
use App\Models\TempatIbadah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PrasaranaPeribadatanController extends Controller
{
    public function index()
    {
        Gate::authorize('peribadatan.view');
        $prasaranaPeribadatans = PrasaranaPeribadatan::with('tempatIbadah', 'desa')->latest()->get();
        return view('pages.potensi.potensi-prasarana-dan-sarana.peribadatan.index', compact('prasaranaPeribadatans'));
    }

    public function create()
    {
        Gate::authorize('peribadatan.create');
        $desas = Desa::all();
        $tempatIbadahs = TempatIbadah::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.peribadatan.create', compact('tempatIbadahs', 'desas'));
    }

    public function store(Request $request)
    {
        Gate::authorize('peribadatan.create');
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'tempat_ibadah_id' => 'required|exists:tempat_ibadahs,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        PrasaranaPeribadatan::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.peribadatan.index')
            ->with('success', 'Data prasarana peribadatan berhasil ditambahkan.');
    }

    public function show(PrasaranaPeribadatan $prasaranaPeribadatan)
    {
        Gate::authorize('peribadatan.view');
        return view('pages.potensi.potensi-prasarana-dan-sarana.peribadatan.show', compact('prasaranaPeribadatan'));
    }

    public function edit(PrasaranaPeribadatan $prasaranaPeribadatan)
    {
        Gate::authorize('peribadatan.update');
        $desas = Desa::all();
        $tempatIbadahs = TempatIbadah::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.peribadatan.edit', compact('prasaranaPeribadatan', 'tempatIbadahs', 'desas'));
    }

    public function update(Request $request, PrasaranaPeribadatan $prasaranaPeribadatan)
    {
        Gate::authorize('peribadatan.update');
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'tempat_ibadah_id' => 'required|exists:tempat_ibadahs,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $prasaranaPeribadatan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.peribadatan.index')
            ->with('success', 'Data prasarana peribadatan berhasil diupdate.');
    }

    public function destroy(PrasaranaPeribadatan $prasaranaPeribadatan)
    {
        Gate::authorize('peribadatan.delete');
        $prasaranaPeribadatan->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.peribadatan.index')
            ->with('success', 'Data prasarana peribadatan berhasil dihapus.');
    }
}