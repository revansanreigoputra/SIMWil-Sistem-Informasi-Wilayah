<?php

namespace App\Http\Controllers;

use App\Models\KelembagaanPendidikanMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class KelembagaanPendidikanMasyarakatController extends Controller
{
    public function index()
    {
        $desaId = session('desa_id');
        $data = KelembagaanPendidikanMasyarakat::with('desa')
            ->where('id_desa', $desaId)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('pages.perkembangan.pendidikanmasyarakat.kelembagaan_pendidikan_masyarakat.index', compact('data'));
    }

    public function create()
    {
        return view('pages.perkembangan.pendidikanmasyarakat.kelembagaan_pendidikan_masyarakat.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['id_desa'] = session('desa_id');
        $data['tanggal'] = Carbon::parse($request->tanggal);

        KelembagaanPendidikanMasyarakat::create($data);

        return redirect()->route('perkembangan.pendidikanmasyarakat.kelembagaan.index')
            ->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        $item = KelembagaanPendidikanMasyarakat::with('desa')->findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.kelembagaan_pendidikan_masyarakat.show', compact('item'));
    }

    public function edit($id)
    {
        $item = KelembagaanPendidikanMasyarakat::findOrFail($id);
        return view('pages.perkembangan.pendidikanmasyarakat.kelembagaan_pendidikan_masyarakat.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = KelembagaanPendidikanMasyarakat::findOrFail($id);
        $data = $request->all();
        $data['id_desa'] = session('desa_id');
        $data['tanggal'] = Carbon::parse($request->tanggal);

        $item->update($data);

        return redirect()->route('perkembangan.pendidikanmasyarakat.kelembagaan.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $item = KelembagaanPendidikanMasyarakat::findOrFail($id);
        $item->delete();

        return redirect()->route('perkembangan.pendidikanmasyarakat.kelembagaan.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
