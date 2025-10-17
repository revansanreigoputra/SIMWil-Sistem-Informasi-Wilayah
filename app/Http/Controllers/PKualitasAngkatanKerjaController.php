<?php

namespace App\Http\Controllers;

use App\Models\PKualitasAngkatanKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PKualitasAngkatanKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pKualitasAngkatanKerjas = PKualitasAngkatanKerja::latest()->paginate(10);
        return view('pages.potensi.potensi-sdm.kualitas-angkatan-kerja.index', compact('pKualitasAngkatanKerjas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.potensi.potensi-sdm.kualitas-angkatan-kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'angkatan_kerja' => 'required|string|max:255',
            'jumlah_laki_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data kualitas angkatan kerja.');
        }

        $data = $request->all();
        $data['jumlah_total'] = $data['jumlah_laki_laki'] + $data['jumlah_perempuan'];

        PKualitasAngkatanKerja::create($data);

        return redirect()->route('potensi.potensi-sdm.kualitas-angkatan-kerja.index')->with('success', 'Data kualitas angkatan kerja berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PKualitasAngkatanKerja $pKualitasAngkatanKerja)
    {
        return view('pages.potensi.potensi-sdm.kualitas-angkatan-kerja.show', compact('pKualitasAngkatanKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PKualitasAngkatanKerja $pKualitasAngkatanKerja)
    {
        return view('pages.potensi.potensi-sdm.kualitas-angkatan-kerja.edit', compact('pKualitasAngkatanKerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PKualitasAngkatanKerja $pKualitasAngkatanKerja)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'angkatan_kerja' => 'required|string|max:255',
            'jumlah_laki_laki' => 'required|integer|min:0',
            'jumlah_perempuan' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbarui data kualitas angkatan kerja.');
        }

        $data = $request->all();
        $data['jumlah_total'] = $data['jumlah_laki_laki'] + $data['jumlah_perempuan'];

        $pKualitasAngkatanKerja->update($data);

        return redirect()->route('potensi.potensi-sdm.kualitas-angkatan-kerja.index')->with('success', 'Data kualitas angkatan kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PKualitasAngkatanKerja $pKualitasAngkatanKerja)
    {
        $pKualitasAngkatanKerja->delete();

        return redirect()->route('potensi.potensi-sdm.kualitas-angkatan-kerja.index')->with('success', 'Data kualitas angkatan kerja berhasil dihapus.');
    }
}
