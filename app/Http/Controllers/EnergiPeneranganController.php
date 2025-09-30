<?php

namespace App\Http\Controllers;

use App\Models\EnergiPenerangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnergiPeneranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $energiPenerangans = EnergiPenerangan::orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.potensi.potensi-prasarana-dan-sarana.energiPenerangan.index', compact('energiPenerangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.energiPenerangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'listrik_pln' => 'required|integer|min:0',
            'diesel_umum' => 'required|integer|min:0',
            'genset_pribadi' => 'required|integer|min:0',
            'lampu_minyak' => 'required|integer|min:0',
            'kayu_bakar' => 'required|integer|min:0',
            'batu_bara' => 'required|integer|min:0',
            'tanpa_penerangan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        EnergiPenerangan::create($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.index')
            ->with('success', 'Data Energi Penerangan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EnergiPenerangan $energiPenerangan)
    {        return view('pages.potensi.potensi-prasarana-dan-sarana.energiPenerangan.show', compact('energiPenerangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EnergiPenerangan $energiPenerangan)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.energiPenerangan.edit', compact('energiPenerangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EnergiPenerangan $energiPenerangan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'listrik_pln' => 'required|integer|min:0',
            'diesel_umum' => 'required|integer|min:0',
            'genset_pribadi' => 'required|integer|min:0',
            'lampu_minyak' => 'required|integer|min:0',
            'kayu_bakar' => 'required|integer|min:0',
            'batu_bara' => 'required|integer|min:0',
            'tanpa_penerangan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $energiPenerangan->update($request->all());

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.index')
            ->with('success', 'Data Energi Penerangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnergiPenerangan $energiPenerangan)
    {
        $energiPenerangan->delete();

        return redirect()->route('potensi.potensi-prasarana-dan-sarana.energiPenerangan.index')
            ->with('success', 'Data Energi Penerangan berhasil dihapus.');
    }
}