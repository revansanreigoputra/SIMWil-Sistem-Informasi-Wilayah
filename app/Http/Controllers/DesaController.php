<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index()
    {
        $desas = Desa::with('kecamatan')->get();
        return view('pages.desa.index', compact('desas'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('pages.desa.create', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'nama_desa' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $exists = Desa::where('kecamatan_id', $request->kecamatan_id)
                        ->where('nama_desa', $value)
                        ->exists();
                    if ($exists) {
                        $fail('Nama desa sudah terdaftar di kecamatan tersebut.');
                    }
                },
            ],
            'kode_pum' => 'required|unique:desas,kode_pum',
        ]);
        Desa::create($request->all());
        return redirect()->route('desa.index')->with('success', 'Desa berhasil ditambahkan');
    }

    public function edit(Desa $desa)
    {
        $kecamatans = Kecamatan::all();
        return view('pages.desa.edit', compact('desa', 'kecamatans'));
    }

    public function update(Request $request, Desa $desa)
    {
        $request->validate([
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'nama_desa' => [
                'required',
                function ($attribute, $value, $fail) use ($request, $desa) {
                    $exists = Desa::where('kecamatan_id', $request->kecamatan_id)
                        ->where('nama_desa', $value)
                        ->where('id', '!=', $desa->id)
                        ->exists();
                    if ($exists) {
                        $fail('Nama desa sudah terdaftar di kecamatan tersebut.');
                    }
                },
            ],
            'kode_pum' => 'required|unique:desas,kode_pum,' . $desa->id,
        ]);
        $desa->update($request->all());
        return redirect()->route('desa.index')->with('success', 'Desa berhasil diupdate');
    }

    public function destroy(Desa $desa)
    {
        $desa->delete();
        return redirect()->route('desa.index')->with('success', 'Desa berhasil dihapus');
    }
    public function show(Desa $desa)
    {
        $desa->load(['kecamatan', 'perangkatDesas.jabatan']);
        return view('pages.desa.show', compact('desa'));
    }
}