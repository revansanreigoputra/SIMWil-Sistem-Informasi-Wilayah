<?php

namespace App\Http\Controllers;

use App\Models\PSumberAirBersih;
use App\Models\MasterPotensi\SumberAirBersih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PSumberAirBersihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = Session::get('desa_id');
        $pSumberAirBersihs = PSumberAirBersih::with(['desa', 'sumberAirBersih'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();
        return view('pages.potensi.sda.sumber-air-bersih.index', compact('pSumberAirBersihs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sumberAirBersihs = SumberAirBersih::all();
        return view('pages.potensi.sda.sumber-air-bersih.create', compact('sumberAirBersihs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sumber_air_bersih_id' => 'required|exists:sumber_air_bersih,id',
            'jumlah' => 'required|numeric|min:0',
            'pemanfaat' => 'required|numeric|min:0',
            'kondisi' => 'required|in:baik,rusak',
        ]);

        $data = $request->all();
        $data['desa_id'] = Session::get('desa_id');

        PSumberAirBersih::create($data);

        return redirect()->route('p-sumber-air-bersih.index')->with('success', 'Data sumber air bersih berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PSumberAirBersih $pSumberAirBersih)
    {
        return view('pages.potensi.sda.sumber-air-bersih.show', compact('pSumberAirBersih'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PSumberAirBersih $pSumberAirBersih)
    {
        $sumberAirBersihs = SumberAirBersih::all();
        return view('pages.potensi.sda.sumber-air-bersih.edit', compact('pSumberAirBersih', 'sumberAirBersihs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PSumberAirBersih $pSumberAirBersih)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'sumber_air_bersih_id' => 'required|exists:sumber_air_bersih,id',
            'jumlah' => 'required|numeric|min:0',
            'pemanfaat' => 'required|numeric|min:0',
            'kondisi' => 'required|in:baik,rusak',
        ]);

        $pSumberAirBersih->update($request->all());

        return redirect()->route('p-sumber-air-bersih.index')->with('success', 'Data sumber air bersih berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PSumberAirBersih $pSumberAirBersih)
    {
        $pSumberAirBersih->delete();
        return redirect()->route('p-sumber-air-bersih.index')->with('success', 'Data sumber air bersih berhasil dihapus.');
    }
}
