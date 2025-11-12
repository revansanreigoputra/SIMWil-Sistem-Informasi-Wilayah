<?php

namespace App\Http\Controllers;

use App\Models\konfliksara;
use App\Models\Desa;
use Illuminate\Http\Request;

class KonfliksaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desaId = session('desa_id');
        $data = konfliksara::where('desa_id',$desaId)->with(['desa'])->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.keamanandanketertiban.konfliksara.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.konfliksara.create', compact('desas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kasus_konflik_tahun_ini' => 'nullable|integer',
            'kasus_konflik_sara_tahun_ini' => 'nullable|integer',
            'kasus_pertengkaran_tetangga' => 'nullable|integer',
            'kasus_pertengkaran_rt_rw' => 'nullable|integer',
            'konflik_pendatang_dan_asli' => 'nullable|integer',
            'konflik_kelompok_desa_kelurahan_lain' => 'nullable|integer',
            'konflik_dengan_pemerintah' => 'nullable|integer',
            'kerugian_material_dengan_pemerintah' => 'nullable|integer',
            'korban_jiwa_dengan_pemerintah' => 'nullable|integer',
            'konflik_dengan_perusahaan' => 'nullable|integer',
            'korban_jiwa_dengan_perusahaan' => 'nullable|integer',
            'kerugian_material_dengan_perusahaan' => 'nullable|integer',
            'konflik_dengan_lembaga_politik' => 'nullable|integer',
            'korban_jiwa_dengan_lembaga_politik' => 'nullable|integer',
            'kerugian_material_dengan_lembaga_politik' => 'nullable|integer',
            'prasarana_rusak_konflik_sara' => 'nullable|integer',
            'rumah_rusak_konflik_sara' => 'nullable|integer',
            'korban_luka_konflik_sara' => 'nullable|integer',
            'korban_meninggal_konflik_sara' => 'nullable|integer',
            'anak_janda_konflik_sara' => 'nullable|integer',
            'anak_yatim_konflik_sara' => 'nullable|integer',
            'pelaku_diadili' => 'nullable|integer',
        ]);
        $validated['desa_id'] = session('desa_id');
        konfliksara::create($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.konfliksara.index')->with('success', 'Data konflik sara berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $konfliksara = konfliksara::with(['desa'])->findOrFail($id);
        $konfliksara->load(['desa']);
        return view('pages.perkembangan.keamanandanketertiban.konfliksara.show', compact('konfliksara'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $konfliksara = konfliksara::findOrFail($id);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('pages.perkembangan.keamanandanketertiban.konfliksara.edit', compact('konfliksara', 'desas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kasus_konflik_tahun_ini' => 'nullable|integer',
            'kasus_konflik_sara_tahun_ini' => 'nullable|integer',
            'kasus_pertengkaran_tetangga' => 'nullable|integer',
            'kasus_pertengkaran_rt_rw' => 'nullable|integer',
            'konflik_pendatang_dan_asli' => 'nullable|integer',
            'konflik_kelompok_desa_kelurahan_lain' => 'nullable|integer',
            'konflik_dengan_pemerintah' => 'nullable|integer',
            'kerugian_material_dengan_pemerintah' => 'nullable|integer',
            'korban_jiwa_dengan_pemerintah' => 'nullable|integer',
            'konflik_dengan_perusahaan' => 'nullable|integer',
            'korban_jiwa_dengan_perusahaan' => 'nullable|integer',
            'kerugian_material_dengan_perusahaan' => 'nullable|integer',
            'konflik_dengan_lembaga_politik' => 'nullable|integer',
            'korban_jiwa_dengan_lembaga_politik' => 'nullable|integer',
            'kerugian_material_dengan_lembaga_politik' => 'nullable|integer',
            'prasarana_rusak_konflik_sara' => 'nullable|integer',
            'rumah_rusak_konflik_sara' => 'nullable|integer',
            'korban_luka_konflik_sara' => 'nullable|integer',
            'korban_meninggal_konflik_sara' => 'nullable|integer',
            'anak_janda_konflik_sara' => 'nullable|integer',
            'anak_yatim_konflik_sara' => 'nullable|integer',
            'pelaku_diadili' => 'nullable|integer',
        ]);
        $konfliksara = konfliksara::findOrFail($id);
        $konfliksara->update($validated);
        return redirect()->route('perkembangan.keamanandanketertiban.konfliksara.index')->with('success', 'Data konflik sara berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $konfliksara = konfliksara::findOrFail($id);
        $konfliksara->delete();
        return redirect()->route('perkembangan.keamanandanketertiban.konfliksara.index')->with('success', 'Data konflik sara berhasil dihapus.');
    }
}
