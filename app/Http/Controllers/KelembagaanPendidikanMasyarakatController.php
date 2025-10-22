<?php

namespace App\Http\Controllers;

use App\Models\KelembagaanPendidikanMasyarakat;
use App\Models\Desa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KelembagaanPendidikanMasyarakatController extends Controller
{
    public function index()
    {
        $data = KelembagaanPendidikanMasyarakat::with('desa')->orderBy('tanggal', 'desc')->get();
        return view('pages.perkembangan.pendidikanmasyarakat.kelembagaan_pendidikan_masyarakat.index', compact('data'));
    }

    public function create()
    {
        $desas = Desa::all();
        return view('pages.perkembangan.pendidikanmasyarakat.kelembagaan_pendidikan_masyarakat.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'perpustakaan_desa' => 'required|integer|min:0',
            'taman_bacaan' => 'required|integer|min:0',
            'perpustakaan_keliling' => 'required|integer|min:0',
            'sanggar_belajar' => 'required|integer|min:0',
            'kegiatan_lps' => 'required|integer|min:0',
            'kelompok_a' => 'required|integer|min:0',
            'peserta_a' => 'required|integer|min:0',
            'kelompok_b' => 'required|integer|min:0',
            'peserta_b' => 'required|integer|min:0',
            'kelompok_c' => 'required|integer|min:0',
            'peserta_c' => 'required|integer|min:0',
            'kursus_unit' => 'required|integer|min:0',
            'peserta_kursus' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['tanggal'] = Carbon::parse($request->tanggal); // pastikan jadi Carbon

        KelembagaanPendidikanMasyarakat::create($data);

        return redirect()->route('perkembangan.pendidikanmasyarakat.kelembagaan.index')
                         ->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
        $item = KelembagaanPendidikanMasyarakat::findOrFail($id);
        $desas = Desa::all();
        return view('pages.perkembangan.pendidikanmasyarakat.kelembagaan_pendidikan_masyarakat.edit', compact('item', 'desas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_desa' => 'required|exists:desas,id',
            'tanggal' => 'required|date',
            'perpustakaan_desa' => 'required|integer|min:0',
            'taman_bacaan' => 'required|integer|min:0',
            'perpustakaan_keliling' => 'required|integer|min:0',
            'sanggar_belajar' => 'required|integer|min:0',
            'kegiatan_lps' => 'required|integer|min:0',
            'kelompok_a' => 'required|integer|min:0',
            'peserta_a' => 'required|integer|min:0',
            'kelompok_b' => 'required|integer|min:0',
            'peserta_b' => 'required|integer|min:0',
            'kelompok_c' => 'required|integer|min:0',
            'peserta_c' => 'required|integer|min:0',
            'kursus_unit' => 'required|integer|min:0',
            'peserta_kursus' => 'required|integer|min:0',
        ]);

        $item = KelembagaanPendidikanMasyarakat::findOrFail($id);
        $data = $request->all();
        $data['tanggal'] = Carbon::parse($request->tanggal);

        $item->update($data);

        return redirect()->route('perkembangan.pendidikanmasyarakat.kelembagaan.index')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    public function show($id)
    {
        $item = KelembagaanPendidikanMasyarakat::with('desa')->findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.kelembagaan_pendidikan_masyarakat.show', compact('item'));
    }

    public function destroy($id)
    {
        $item = KelembagaanPendidikanMasyarakat::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.pendidikanmasyarakat.kelembagaan.index')
                         ->with('success', 'Data berhasil dihapus!');
    }
}
