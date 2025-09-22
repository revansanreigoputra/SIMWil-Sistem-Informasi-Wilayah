<?php

namespace App\Http\Controllers;

use App\Models\Irigasi;
use Illuminate\Http\Request;

class IrigasiController extends Controller
{
    public function index()
    {
        $irigasis = Irigasi::all();
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-dan-irigasi.index', compact('irigasis'));
    }

    public function create()
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-dan-irigasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'saluran_primer' => 'required|numeric|min:0',
            'saluran_primer_rusak' => 'required|numeric|min:0|lte:saluran_primer',
            'saluran_sekunder' => 'required|numeric|min:0',
            'saluran_sekunder_rusak' => 'required|numeric|min:0|lte:saluran_sekunder',
            'saluran_tersier' => 'required|numeric|min:0',
            'saluran_tersier_rusak' => 'required|numeric|min:0|lte:saluran_tersier',
            'pintu_sadap' => 'required|integer|min:0',
            'pintu_sadap_rusak' => 'required|integer|min:0|lte:pintu_sadap',
            'pintu_pembagi_air' => 'required|integer|min:0',
            'pintu_pembagi_air_rusak' => 'required|integer|min:0|lte:pintu_pembagi_air',
        ]);

        Irigasi::create($request->all());
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.irigasi.index')->with('success', 'Irigasi created successfully.');
    }

    public function show(Irigasi $irigasi)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-dan-irigasi.show', compact('irigasi'));
    }

    public function edit(Irigasi $irigasi)
    {
        return view('pages.potensi.potensi-prasarana-dan-sarana.prasarana-dan-irigasi.edit', compact('irigasi'));
    }

    public function update(Request $request, Irigasi $irigasi)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'saluran_primer' => 'required|numeric|min:0',
            'saluran_primer_rusak' => 'required|numeric|min:0|lte:saluran_primer',
            'saluran_sekunder' => 'required|numeric|min:0',
            'saluran_sekunder_rusak' => 'required|numeric|min:0|lte:saluran_sekunder',
            'saluran_tersier' => 'required|numeric|min:0',
            'saluran_tersier_rusak' => 'required|numeric|min:0|lte:saluran_tersier',
            'pintu_sadap' => 'required|integer|min:0',
            'pintu_sadap_rusak' => 'required|integer|min:0|lte:pintu_sadap',
            'pintu_pembagi_air' => 'required|integer|min:0',
            'pintu_pembagi_air_rusak' => 'required|integer|min:0|lte:pintu_pembagi_air',
        ]);

        $irigasi->update($request->all());
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.irigasi.index')->with('success', 'Irigasi updated successfully.');
    }

    public function destroy(Irigasi $irigasi)
    {
        $irigasi->delete();
        return redirect()->route('potensi.potensi-prasarana-dan-sarana.irigasi.index')->with('success', 'Irigasi deleted successfully.');
    }
}