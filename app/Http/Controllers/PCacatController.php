<?php

namespace App\Http\Controllers;

use App\Models\PCacat;
use App\Models\MasterDDK\Cacat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PCacatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('p_cacat.view'), 403);

        $desaId = session('desa_id');
        $pCacats = PCacat::with('cacat')->where('desa_id', $desaId)->latest()->get();

        return view('pages.potensi.potensi-sdm.cacat.index', compact('pCacats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('p_cacat.create'), 403);

        $cacats = Cacat::all();

        return view('pages.potensi.potensi-sdm.cacat.create', compact('cacats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('p_cacat.create'), 403);

        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'cacat_id' => ['required', 'exists:cacats,id'],
            'jumlah_laki_laki' => ['required', 'integer', 'min:0'],
            'jumlah_perempuan' => ['required', 'integer', 'min:0'],
        ]);

        $validated['jumlah_total'] = $validated['jumlah_laki_laki'] + $validated['jumlah_perempuan'];
        $validated['desa_id'] = session('desa_id');

        PCacat::create($validated);

        return redirect()->route('potensi.potensi-sdm.cacat.index')->with('success', 'Data Potensi Cacat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PCacat $pCacat)
    {
        abort_if(Gate::denies('p_cacat.view'), 403);

        return view('pages.potensi.potensi-sdm.cacat.show', compact('pCacat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PCacat $pCacat)
    {
        abort_if(Gate::denies('p_cacat.update'), 403);

        $cacats = Cacat::all();

        return view('pages.potensi.potensi-sdm.cacat.edit', compact('pCacat', 'cacats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PCacat $pCacat)
    {
        abort_if(Gate::denies('p_cacat.update'), 403);

        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'cacat_id' => ['required', 'exists:cacats,id'],
            'jumlah_laki_laki' => ['required', 'integer', 'min:0'],
            'jumlah_perempuan' => ['required', 'integer', 'min:0'],
        ]);

        $validated['jumlah_total'] = $validated['jumlah_laki_laki'] + $validated['jumlah_perempuan'];
        $validated['desa_id'] = session('desa_id'); // Ensure desa_id is kept consistent

        $pCacat->update($validated);

        return redirect()->route('potensi.potensi-sdm.cacat.index')->with('success', 'Data Potensi Cacat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PCacat $pCacat)
    {
        abort_if(Gate::denies('p_cacat.delete'), 403);

        $pCacat->delete();

        return redirect()->route('potensi.potensi-sdm.cacat.index')->with('success', 'Data Potensi Cacat berhasil dihapus!');
    }
}
