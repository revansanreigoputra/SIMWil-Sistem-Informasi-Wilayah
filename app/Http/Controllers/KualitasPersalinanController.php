<?php

namespace App\Http\Controllers;

use App\Models\KualitasPersalinan;
use Illuminate\Http\Request;

class KualitasPersalinanController extends Controller
{

   public function index()
{
    $desaId = auth()->user()->desa_id ?? null; // jika user punya kolom desa_id
    $kualitas = KualitasPersalinan::when($desaId, fn($q) => $q->where('desa_id', $desaId))
                 ->latest()->get();

    return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.index', compact('kualitas'));
}

public function create()
{
    $desas = \App\Models\Desa::all();
    return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.create', compact('desas'));
}

public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'desa_id' => 'required|exists:desas,id',
    ]);

    KualitasPersalinan::create([
    'desa_id' => $request->desa_id,
    'tanggal' => $request->tanggal,
    'persalinan_rumah_sakit_umum' => $request->persalinan_rumah_sakit_umum,
    'persalinan_puskesmas' => $request->persalinan_puskesmas,
    'persalinan_praktek_bidan' => $request->persalinan_praktek_bidan,
    'total_persalinan' => $request->total_persalinan,
    'persalinan_rumah_bersalin' => $request->persalinan_rumah_bersalin,
    'persalinan_polindes' => $request->persalinan_polindes,
    'persalinan_balai_kesehatan_ibu_anak' => $request->persalinan_balai_kesehatan_ibu_anak, // ✅ penting!
    'persalinan_praktek_dokter' => $request->persalinan_praktek_dokter,
    'rumah_sendiri' => $request->rumah_sendiri,
    'rumah_dukun' => $request->rumah_dukun,
    'ditolong_dokter' => $request->ditolong_dokter,
    'ditolong_bidan' => $request->ditolong_bidan,
    'ditolong_perawat' => $request->ditolong_perawat,
    'ditolong_dukun_bersalin' => $request->ditolong_dukun_bersalin, // ✅ penting!
    'ditolong_keluarga' => $request->ditolong_keluarga,
]);

    return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
        ->with('success', 'Data Kualitas Persalinan berhasil ditambahkan.');
}


    public function show($id)
    {
        $data = KualitasPersalinan::findOrFail($id);
        return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.show', compact('data'));
    }

public function edit($id)
{
    $data = KualitasPersalinan::findOrFail($id);
    $desas = \App\Models\Desa::all();
    return view('pages.perkembangan.kesehatan-masyarakat.kualitas-persalinan.edit', compact('data', 'desas'));
}


   public function update(Request $request, $id)
{
    $request->validate([
        'desa_id' => 'required|exists:desas,id',
        'tanggal' => 'required|date',
    ]);


    $data = KualitasPersalinan::findOrFail($id);
    $data->update($request->all());

    return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
        ->with('success', 'Data berhasil diperbarui.');
}


    public function destroy($id)
    {
        $data = KualitasPersalinan::findOrFail($id);
        $data->delete();

        return redirect()->route('perkembangan.kesehatan-masyarakat.kualitas-persalinan.index')
            ->with('success', 'Data Kualitas Persalinan berhasil dihapus.');
    }
}
