<?php

namespace App\Http\Controllers;

use App\Models\PSumberAirPanas;
use App\Models\MasterPotensi\SumberAirPanas;
use Illuminate\Http\Request;

class PSumberAirPanasController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $pSumberAirPanas = PSumberAirPanas::with(['desa', 'jenisSumberAirPanas'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();
        return view('pages.potensi.sda.sumber-air-panas.index', compact('pSumberAirPanas'));
    }

    public function create()
    {
        $sumberAirPanas = SumberAirPanas::all();
        $pemanfaatanOptions = ['wisata', 'pengobatan', 'energi'];
        $kepemilikanOptions = ['pemerintah', 'swasta', 'adat'];
        return view('pages.potensi.sda.sumber-air-panas.create', compact('sumberAirPanas', 'pemanfaatanOptions', 'kepemilikanOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_sumber_air_panas_id' => 'required|exists:sumber_air_panas,id',
            'jumlah_lokasi' => 'required|numeric|min:0',
            'pemanfaatan' => 'nullable|array',
            'pemanfaatan.*' => 'in:wisata,pengobatan,energi',
            'kepemilikan' => 'nullable|array',
            'kepemilikan.*' => 'in:pemerintah,swasta,adat',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');
        $data['pemanfaatan'] = json_encode($request->input('pemanfaatan', []));
        $data['kepemilikan'] = json_encode($request->input('kepemilikan', []));

        PSumberAirPanas::create($data);

        return redirect()->route('p-sumber-air-panas.index')->with('success', 'Data sumber air panas berhasil ditambahkan.');
    }

    public function show(PSumberAirPanas $pSumberAirPanas)
    {
        return view('pages.potensi.sda.sumber-air-panas.show', compact('pSumberAirPanas'));
    }

    public function edit(PSumberAirPanas $pSumberAirPanas)
    {
        $sumberAirPanas = SumberAirPanas::all();
        $pemanfaatanOptions = ['wisata', 'pengobatan', 'energi'];
        $kepemilikanOptions = ['pemerintah', 'swasta', 'adat'];
        return view('pages.potensi.sda.sumber-air-panas.edit', compact('pSumberAirPanas', 'sumberAirPanas', 'pemanfaatanOptions', 'kepemilikanOptions'));
    }

    public function update(Request $request, PSumberAirPanas $pSumberAirPanas)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_sumber_air_panas_id' => 'required|exists:sumber_air_panas,id',
            'jumlah_lokasi' => 'required|numeric|min:0',
            'pemanfaatan' => 'nullable|array',
            'pemanfaatan.*' => 'in:wisata,pengobatan,energi',
            'kepemilikan' => 'nullable|array',
            'kepemilikan.*' => 'in:pemerintah,swasta,adat',
        ]);

        $data = $request->all();
        $data['pemanfaatan'] = json_encode($request->input('pemanfaatan', []));
        $data['kepemilikan'] = json_encode($request->input('kepemilikan', []));

        $pSumberAirPanas->update($data);

        return redirect()->route('p-sumber-air-panas.index')->with('success', 'Data sumber air panas berhasil diubah.');
    }

    public function destroy(PSumberAirPanas $pSumberAirPanas)
    {
        $pSumberAirPanas->delete();
        return redirect()->route('p-sumber-air-panas.index')->with('success', 'Data sumber air panas berhasil dihapus.');
    }
}
