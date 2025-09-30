<?php

namespace App\Http\Controllers;

use App\Models\PerkembanganPenduduk;
use Illuminate\Http\Request;

class PerkembanganPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
{
    $perkembangan_penduduks = PerkembanganPenduduk::orderBy('tanggal', 'desc')->get();
    return view('pages.perkembangan.perkembanganpenduduk.daftarpenduduk.index', compact('perkembangan_penduduks'));
    
}




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jumlah_laki_laki_tahun_ini' => 'required|integer',
        'jumlah_perempuan_tahun_ini' => 'required|integer',
        'jumlah_laki_laki_tahun_lalu' => 'required|integer',
        'jumlah_perempuan_tahun_lalu' => 'required|integer',
        'jumlah_kepala_keluarga_laki_laki_tahun_ini' => 'required|integer',
        'jumlah_kepala_keluarga_perempuan_tahun_ini' => 'required|integer',
        'jumlah_kepala_keluarga_laki_laki_tahun_lalu' => 'required|integer',
        'jumlah_kepala_keluarga_perempuan_tahun_lalu' => 'required|integer',
    ]);

    PerkembanganPenduduk::create($request->all());

    return redirect()->route('perkembangan-penduduk.index')
                     ->with('success', 'Data berhasil ditambahkan.');
}


    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
{
    $data = PerkembanganPenduduk::findOrFail($id);
    return view('pages.perkembangan.perkembanganpenduduk.daftarpenduduk.edit', compact('data'));
}
    public function create()
{
    // arahkan ke view form create
    return view('pages.perkembangan.perkembanganpenduduk.daftarpenduduk.create_edit_modal');
}
    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'tanggal' => 'required|date',
        'jumlah_laki_laki_tahun_ini' => 'required|integer',
        'jumlah_perempuan_tahun_ini' => 'required|integer',
        'jumlah_laki_laki_tahun_lalu' => 'required|integer',
        'jumlah_perempuan_tahun_lalu' => 'required|integer',
        'jumlah_kepala_keluarga_laki_laki_tahun_ini' => 'required|integer',
        'jumlah_kepala_keluarga_perempuan_tahun_ini' => 'required|integer',
        'jumlah_kepala_keluarga_laki_laki_tahun_lalu' => 'required|integer',
        'jumlah_kepala_keluarga_perempuan_tahun_lalu' => 'required|integer',
    ]);

    $data = PerkembanganPenduduk::findOrFail($id);
    $data->update($request->all());

    return redirect()->route('perkembangan-penduduk.index')
                     ->with('success', 'Data berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerkembanganPenduduk $perkembangan_penduduk)
{
    $perkembangan_penduduk->delete();

    return redirect()->route('perkembangan-penduduk.index')
                     ->with('success', 'Data berhasil dihapus');
}

    
}