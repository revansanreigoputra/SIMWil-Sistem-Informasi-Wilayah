<?php

namespace App\Http\Controllers;

use App\Models\PengolahanHasilTernak;
use App\Models\Desa;
use App\Models\MasterPotensi\JenisUsahaPengolahanHasilTernak;
use Illuminate\Http\Request;

class PengolahanHasilTernakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $pengolahanHasilTernaks = PengolahanHasilTernak::with(['desa', 'jenisUsahaPengolahanHasilTernak'])
            ->where('desa_id', $desaId)
            ->latest()
            ->get();
        return view('pages.potensi.sda.pengolahan-hasil-ternak.index', compact('pengolahanHasilTernaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisUsahaPengolahanHasilTernaks = JenisUsahaPengolahanHasilTernak::all();
        return view('pages.potensi.sda.pengolahan-hasil-ternak.create', compact('jenisUsahaPengolahanHasilTernaks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_olahan_hasil_ternak_id' => 'required|exists:jenis_usaha_pengolahan_hasil_ternak,id',
            'jumlah_pemilik' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['desa_id'] = session('desa_id');

        PengolahanHasilTernak::create($data);

        return redirect()->route('pengolahan-hasil-ternak.index')->with('success', 'Data pengolahan hasil ternak berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengolahanHasilTernak $pengolahanHasilTernak)
    {
        return view('pages.potensi.sda.pengolahan-hasil-ternak.show', compact('pengolahanHasilTernak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengolahanHasilTernak $pengolahanHasilTernak)
    {
        $jenisUsahaPengolahanHasilTernaks = JenisUsahaPengolahanHasilTernak::all();
        return view('pages.potensi.sda.pengolahan-hasil-ternak.edit', compact('pengolahanHasilTernak', 'jenisUsahaPengolahanHasilTernaks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengolahanHasilTernak $pengolahanHasilTernak)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_olahan_hasil_ternak_id' => 'required|exists:jenis_usaha_pengolahan_hasil_ternak,id',
            'jumlah_pemilik' => 'required|integer|min:0',
        ]);

        $pengolahanHasilTernak->update($request->all());

        return redirect()->route('pengolahan-hasil-ternak.index')->with('success', 'Data pengolahan hasil ternak berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengolahanHasilTernak $pengolahanHasilTernak)
    {
        $pengolahanHasilTernak->delete();
        return redirect()->route('pengolahan-hasil-ternak.index')->with('success', 'Data pengolahan hasil ternak berhasil dihapus.');
    }
}
