<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\{
    AnggotaKeluarga,
    Desa,
    PerangkatDesa,
    Kecamatan,
    DataKeluarga
};

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKeluargas = DataKeluarga::with(['desas', 'kecamatans', 'perangkatDesas'])->get();
        return view('pages.data_keluarga.index', compact('dataKeluargas'));
    }

    public function create()
    {
        $desas = Desa::all();
        $kecamatans = Kecamatan::all();
        $perangkatDesas = PerangkatDesa::all();
        return view('pages.data_keluarga.create', compact('desas', 'kecamatans', 'perangkatDesas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required|string|unique:data_keluargas,no_kk',
            'kepala_keluarga' => 'required|string',
            'alamat' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'desa_id' => 'required|exists:desas,id',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'nama_pengisi_id' => 'required|exists:perangkat_desas,id',
        ]);

        DataKeluarga::create($validatedData);

        return redirect()->route('data_keluarga.index')->with('success', 'Data Kepala Keluarga berhasil ditambahkan.');
    }

    public function edit(DataKeluarga $dataKeluarga)
    {
        $desas = Desa::all();
        $kecamatans = Kecamatan::all();
        $perangkatDesas = PerangkatDesa::all();

        return view('pages.data_keluarga.edit', compact('dataKeluarga', 'desas', 'kecamatans', 'perangkatDesas'));
    }

    public function update(Request $request, DataKeluarga $dataKeluarga)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required|string|unique:data_keluargas,no_kk,' . $dataKeluarga->id,
            'kepala_keluarga' => 'required|string',
            'alamat' => 'required|string',
            'desa_id' => 'required|exists:desas,id',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'kecamatan_id' => 'required|exists:kecamatans,id',
            'nama_pengisi_id' => 'nullable|exists:perangkat_desas,id',
        ]);

        $dataKeluarga->update($validatedData);

        return redirect()->route('data_keluarga.index')->with('success', 'Data Kepala Keluarga berhasil diperbarui.');
    }

    public function destroy(DataKeluarga $dataKeluarga)
    {
        $dataKeluarga->delete();

        return redirect()->route('data_keluarga.index')->with('success', 'Data Kepala Keluarga berhasil dihapus.');
    }
}
