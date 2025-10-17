<?php

namespace App\Http\Controllers;

use App\Models\PenderitaSakit;
use App\Models\JenisPenyakit;
use App\Models\MasterPerkembangan\TempatPerawatan; 
use Illuminate\Http\Request;

class PenderitaSakitController extends Controller
{
    public function index()
    {
        $penderitaSakit = PenderitaSakit::with(['jenisPenyakit', 'tempatPerawatan'])->latest()->get();
        $jenisPenyakit = JenisPenyakit::all();
        $tempatPerawatan = TempatPerawatan::all();

        return view('pages.perkembangan.kesehatan-masyarakat.penderita-sakit.index', compact(
            'penderitaSakit',
            'jenisPenyakit',
            'tempatPerawatan'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_penyakit_id' => 'required|exists:jenis_penyakits,id',
            'jumlah_penderita' => 'required|integer|min:0',
            'tempat_perawatan_id' => 'required|exists:tempat_perawatan,id',
        ]);

        PenderitaSakit::create($request->all());
        return back()->with('success', 'Data berhasil ditambahkan.');
    }

public function show($id)
{
    $data = PenderitaSakit::findOrFail($id);
    return view('pages.perkembangan.kesehatan-masyarakat.penderita-sakit.show', compact('data'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_penyakit_id' => 'required|exists:jenis_penyakits,id',
            'jumlah_penderita' => 'required|integer|min:0',
            'tempat_perawatan_id' => 'required|exists:tempat_perawatan,id',
        ]);

        $penderita = PenderitaSakit::findOrFail($id);
        $penderita->update($request->all());
        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PenderitaSakit::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
